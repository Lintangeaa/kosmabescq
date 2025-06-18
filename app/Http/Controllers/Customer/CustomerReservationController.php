<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Kost;
use App\Models\Reservation;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Snap;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;

class CustomerReservationController extends Controller
{
    // Menampilkan daftar reservasi milik user yang sedang login
    public function index()
    {
        $reservations = Reservation::where('user_id', Auth::id())->with('kost')->get();

        Log::info('Reservation found:', [$reservations]);

        return view('customer.reservations.index', compact('reservations'));
    }

    // Menampilkan form untuk membuat reservasi baru
    public function create(Request $request)
    {
        $kostId = $request->input('kost_id'); // Tangkap kost_id dari query parameter
        $kost = Kost::findOrFail($kostId);   // Ambil detail kost yang sesuai

        return view('customer.reservations.create', compact('kost'));
    }

    // Menyimpan data reservasi baru
    public function store(Request $request)
    {
        $request->validate([
            'kost_id' => 'required|exists:kosts,id',
            'total' => 'required|integer|min:1',
            'start_date' => 'required|date|after_or_equal:today',
            'alamat' => 'required|string|max:500',
            'no_hp' => 'required|string|max:15',
        ]);

        // Calculate end date by adding months to start date
        $startDate = \Carbon\Carbon::parse($request->start_date);
        $endDate = $startDate->copy()->addMonths((int)$request->total);

        Reservation::create([
            'reservation_id' => Reservation::generateUniqueReservationId(),
            'user_id' => Auth::id(),
            'kost_id' => $request->kost_id,
            'total' => $request->total,
            'status' => 'Menunggu Pembayaran',
            'tanggal_reservasi' => $request->start_date,
            'tanggal_keluar' => $endDate->format('Y-m-d'),
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);

        return redirect()->route('customer.reservations.index')->with('success', 'Reservasi berhasil dibuat.');
    }

    public function getPayment($id)
    {
        $reservation = Reservation::findOrFail($id);

        return view('customer.reservations.payment', compact('reservation'));
    }

    public function payment($id)
    {
        try {
            Log::info('Starting payment process for reservation ID:', [$id]);

            $reservation = Reservation::where('reservation_id', '=', $id)->firstOrFail();
            Log::info('CONFIG:', [config('services.midtrans.server_key'), config('services.midtrans.client_key'), config('services.midtrans.is_production'), config('services.midtrans.url')]);

            $payment = Payment::where('reservation_id', $reservation->id)->first();
            Log::info('Payment record:', [$payment]);

            if ($payment) {
                $snapToken = $payment->token;
            } else {
                $user = Auth::user();

                Config::$serverKey = config('services.midtrans.server_key');
                Config::$clientKey = config('services.midtrans.client_key');
                Config::$isProduction = config('services.midtrans.is_production');

                $params = [
                    'transaction_details' => [
                        'order_id' => $id,
                        'gross_amount' => $reservation->total * $reservation->kost->harga,
                    ],
                    'customer_details' => [
                        'first_name' => $user->name,
                        'email' => $user->email,
                    ],
                ];

                Log::info('Midtrans parameters:', [$params]);

                $snapToken = \Midtrans\Snap::getSnapToken($params);

                Log::info('Snap token generated:', [$snapToken]);

                Payment::create([
                    'reservation_id' => $reservation->id,
                    'total' => $reservation->total * $reservation->kost->harga,
                    'token' => $snapToken,
                ]);
            }

            return view('customer.reservations.payment', compact('reservation', 'snapToken'));

        } catch (\Exception $e) {
            Log::error('Error in payment process:', [$e->getMessage()]);
            return redirect()->route('customer.reservations.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            // Validasi input status
            $request->validate([
                'status' => 'required|in:Dibayar,Dibatalkan,Selesai', // Pastikan status yang diterima valid
            ]);

            // Cari reservation berdasarkan ID
            $reservation = Reservation::findOrFail($id);

            // Perbarui status reservation sesuai dengan input dari request
            $reservation->status = $request->status;
            $reservation->save();

            return response()->json([
                'message' => 'Status pembayaran berhasil diperbarui',
                'reservation' => $reservation
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function invoice($reservationId)
    {
        try {
            // Ambil reservasi berdasarkan ID
            $reservation = Reservation::where('reservation_id', $reservationId)->firstOrFail();

            // Ambil data pembayaran terkait
            $payment = Payment::where('reservation_id', $reservation->id)->first();

            // Pastikan reservasi sudah dibayar atau selesai
            if (!in_array($reservation->status, ['Dibayar', 'Selesai'])) {
                return redirect()->route('customer.reservations.index')->with('error', 'Reservasi belum dibayar.');
            }

            // Tampilkan invoice
            return view('customer.reservations.invoice', compact('reservation', 'payment'));

        } catch (\Exception $e) {
            // Log error dan berikan pesan error
            Log::error('Error showing invoice:', [$e->getMessage()]);
            return redirect()->route('customer.reservations.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function downloadInvoice($reservationId)
    {
        try {
            // Ambil data reservasi dan pembayaran
            $reservation = Reservation::where('reservation_id', $reservationId)->firstOrFail();
            $payment = Payment::where('reservation_id', $reservation->id)->first();

            // Pastikan reservasi sudah dibayar atau selesai
            if (!in_array($reservation->status, ['Dibayar', 'Selesai'])) {
                return redirect()->route('customer.reservations.index')->with('error', 'Reservasi belum dibayar.');
            }

            // Membuat view PDF
            $pdf = PDF::loadView('customer.reservations.invoice-pdf', compact('reservation', 'payment'));

            // Download PDF
            return $pdf->download('INV-' . $reservation->reservation_id . '.pdf');

        } catch (\Exception $e) {
            Log::error('Error generating PDF:', [$e->getMessage()]);
            return redirect()->route('customer.reservations.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}


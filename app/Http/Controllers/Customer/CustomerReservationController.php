<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Kost;
use App\Models\Reservation;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class CustomerReservationController extends Controller
{
    // Menampilkan daftar reservasi milik user yang sedang login
    public function index()
    {
        $reservations = Reservation::where('user_id', Auth::id())->with('kost')->get();

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
        ]);        

        $reservation = Reservation::create([
            'user_id' => Auth::id(),
            'kost_id' => $request->kost_id,
            'total' => $request->total,
            'status' => 'Menunggu Pembayaran',
            'tanggal_reservasi' => $request->start_date
        ]);

        return redirect()->route('customer.reservations.index')->with('success', 'Reservasi berhasil dibuat.');
    }

    public function payment($id)
    {
        try {
            $reservation = Reservation::findOrFail($id);

            // Cek apakah sudah ada pembayaran untuk reservasi ini
            $payment = Payment::where('reservation_id', $reservation->id)->first();

            if ($payment) {
                // Jika pembayaran sudah ada, gunakan token yang ada
                $snapToken = $payment->token;
            } else {
                // Jika belum ada pembayaran, buat token Snap baru
                $user = Auth::user();

                // Konfigurasi Midtrans menggunakan konfigurasi di config/services.php
                Config::$serverKey = config('services.midtrans.server_key');
                Config::$clientKey = config('services.midtrans.client_key');
                Config::$isProduction = config('services.midtrans.production');

                // Parameter transaksi untuk Midtrans
                $params = [
                    'transaction_details' => [
                        'order_id' => 'ORDER-' . $reservation->id,  // Pastikan order_id unik
                        'gross_amount' => $reservation->total * $reservation->kost->harga,     // Total harga dari reservasi dikalikan harga kost
                    ],
                    'customer_details' => [
                        'first_name' => $user->name,
                        'email' => $user->email,
                    ],
                ];

                // Mendapatkan token Snap dari Midtrans
                $snapToken = \Midtrans\Snap::getSnapToken($params);

                // Membuat entri pembayaran baru di database
                Payment::create([
                    'reservation_id' => $reservation->id,
                    'total' => $reservation->total * $reservation->kost->harga,
                    'token' => $snapToken,  // Menyimpan token untuk pembayaran
                ]);
            }

            // Mengirimkan data untuk ditampilkan di view
            return view('customer.reservations.payment', compact('reservation', 'snapToken'));
            
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, arahkan kembali ke halaman reservasi dengan pesan error
            return redirect()->route('customer.reservations.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function updateStatusToPaid(Request $request, $id)
    {
        try {
            $reservation = Reservation::findOrFail($id);

            // Update status pembayaran menjadi "dibayar"
            $reservation->status = 'Dibayar';
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

}


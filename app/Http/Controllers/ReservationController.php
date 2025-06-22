<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Mail\CheckoutReminderMail;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('kost', 'user')->get();
        return view('admin.reservations.index', compact('reservations'));
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            $request->validate([
                'status' => 'required|in:Dibayar,Dibatalkan,Selesai',
            ]);

            $reservation = Reservation::where('reservation_id', $id)->firstOrFail();
            $reservation->status = $request->status;
            $reservation->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Status reservasi berhasil diperbarui.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function sendNotification(Request $request)
    {
        try {
            if ($request->has('reservation_id')) {
                // Send notification for specific reservation without any restrictions
                $reservation = Reservation::with(['user', 'kost'])
                    ->where('reservation_id', $request->reservation_id)
                    ->firstOrFail();

                if ($reservation->user && $reservation->user->email) {
                    Mail::to($reservation->user->email)->send(new CheckoutReminderMail($reservation));

                    // Update email_sent status for tracking purposes only
                    $reservation->email_sent = true;
                    $reservation->save();

                    return response()->json([
                        'status' => 'success',
                        'message' => 'Notifikasi berhasil dikirim ke ' . $reservation->user->email
                    ]);
                }

                return response()->json([
                    'status' => 'error',
                    'message' => 'Email pengguna tidak ditemukan'
                ], 404);
            } else {
                // Send notifications for all upcoming checkouts within 7 days
                // Only send to those that haven't received emails yet
                $sevenDaysFromNow = Carbon::now()->addDays(7);

                $reservations = Reservation::with(['user', 'kost'])
                    ->whereIn('status', ['Dibayar', 'Selesai'])
                    ->where('email_sent', false)
                    ->whereDate('tanggal_keluar', '<=', $sevenDaysFromNow)
                    ->whereDate('tanggal_keluar', '>', Carbon::now())
                    ->get();

                $emailsSent = 0;
                foreach ($reservations as $reservation) {
                    if ($reservation->user && $reservation->user->email) {
                        Mail::to($reservation->user->email)->send(new CheckoutReminderMail($reservation));

                        // Update email_sent status
                        $reservation->email_sent = true;
                        $reservation->save();

                        $emailsSent++;
                    }
                }

                if ($emailsSent > 0) {
                    return response()->json([
                        'status' => 'success',
                        'message' => "Notifikasi berhasil dikirim ke {$emailsSent} penghuni"
                    ]);
                } else {
                    return response()->json([
                        'status' => 'info',
                        'message' => "Tidak ada notifikasi yang perlu dikirim"
                    ]);
                }
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal mengirim notifikasi: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getUpcomingCheckouts()
    {
        $twoWeeksFromNow = Carbon::now()->addDays(14);
        $reservations = Reservation::with(['user', 'kost'])
            ->whereIn('status', ['Dibayar', 'Selesai'])
            ->whereDate('tanggal_keluar', '<=', $twoWeeksFromNow)
            ->whereDate('tanggal_keluar', '>', Carbon::now())
            ->get();

        return response()->json($reservations);
    }
}

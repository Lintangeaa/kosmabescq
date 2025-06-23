<?php

// app/Console/Commands/NotifyReservationCheckout.php

namespace App\Console\Commands;

use App\Mail\CheckoutReminderMail;
use App\Models\Reservation;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class NotifyReservationCheckout extends Command
{
    protected $signature = 'reservation:notify-checkout';
    protected $description = 'Send checkout reminder emails to users with reservations ending within 7 days';

    public function handle()
    {
        try {
            $reservations = Reservation::where('status', 'Dibayar')
                ->where('email_sent', false)
                ->get();

            $emailsSent = 0;

            foreach ($reservations as $reservation) {
                $endDate = Carbon::parse($reservation->tanggal_reservasi)->addMonths(floor($reservation->total));
                $today = Carbon::now();
                $daysUntilEnd = $today->diffInDays($endDate, false);

                if ($daysUntilEnd <= 7 && $daysUntilEnd > 0) {
                    if ($reservation->user && $reservation->user->email) {
                        try {
                            Mail::to($reservation->user->email)
                                ->send(new CheckoutReminderMail($reservation));

                            // Create notification
                            Notification::create([
                                'user_id' => $reservation->user_id,
                                'reservation_id' => $reservation->id,
                                'type' => 'auto_reminder',
                                'message' => "Pengingat otomatis: Masa sewa kos {$reservation->kost->nama} akan jatuh tempo pada " . $endDate->format('d M Y') . ". Harap segera lakukan pembayaran untuk melanjutkan masa sewa.",
                            ]);

                            // Update email_sent status
                            $reservation->email_sent = true;
                            $reservation->save();

                            $emailsSent++;
                        } catch (\Exception $e) {
                            $this->error("Failed to send email to {$reservation->user->email}: {$e->getMessage()}");
                        }
                    }
                }
            }

            $this->info("Checkout reminder emails sent successfully to {$emailsSent} out of {$reservations->count()} users.");
            return 0;
        } catch (\Exception $e) {
            $this->error("An error occurred: {$e->getMessage()}");
            return 1;
        }
    }
}


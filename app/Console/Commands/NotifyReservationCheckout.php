<?php

// app/Console/Commands/NotifyReservationCheckout.php

namespace App\Console\Commands;

use App\Mail\CheckoutReminderMail;
use App\Models\Reservation;
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
            $sevenDaysFromNow = Carbon::now()->addDays(7);

            $reservations = Reservation::with(['user', 'kost'])
                ->whereIn('status', ['Dibayar', 'Selesai'])
                ->whereDate('tanggal_keluar', '<=', $sevenDaysFromNow)
                ->whereDate('tanggal_keluar', '>', Carbon::now())
                ->get();

            $emailsSent = 0;

            foreach ($reservations as $reservation) {
                if ($reservation->user && $reservation->user->email) {
                    try {
                        Mail::to($reservation->user->email)
                            ->send(new CheckoutReminderMail($reservation));
                        $emailsSent++;
                    } catch (\Exception $e) {
                        $this->error("Failed to send email to {$reservation->user->email}: {$e->getMessage()}");
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


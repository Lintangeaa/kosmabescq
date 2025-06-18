<?php

namespace App\Mail;

use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;

class CheckoutReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;

    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    public function build()
    {
        try {
            if (!View::exists('emails.checkout_reminder')) {
                throw new \Exception('Email template not found');
            }

            return $this->view('emails.checkout_reminder')
                        ->subject('Pengingat: Masa Sewa Kos Akan Berakhir');
        } catch (\Exception $e) {
            Log::error('Failed to build checkout reminder email: ' . $e->getMessage());
            throw $e;
        }
    }
}

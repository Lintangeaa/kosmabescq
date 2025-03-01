<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reservation extends Model
{
    protected $table = 'reservations';
    protected $fillable = [
        'reservation_id',
        'user_id',
        'kost_id',
        'total',
        'status',
        'tanggal_reservasi'
    ];

    public static function generateUniqueReservationId()
    {
        $today = now()->format('dmY');
        do {
            $randomNumber = mt_rand(1000, 9999);

            $reservationId = 'K' . $today . $randomNumber;

            $uniqueString = substr($reservationId, 0, 11);
        } while (self::reservationIdExists($uniqueString));

        return $uniqueString;
    }

    public static function reservationIdExists($reservationId)
    {
        return DB::table('reservations')->where('reservation_id', $reservationId)->exists();
    }

    public function kost()
    {
        return $this->belongsTo(Kost::class, 'kost_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'reservation_id');
    }
}


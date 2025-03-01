<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

        $randomNumber = mt_rand(1000000, 9999999); 

        return 'K' . $today . $randomNumber;
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


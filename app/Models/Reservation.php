<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';
    protected $fillable = [
        'user_id',
        'kost_id',
        'total',
        'status',
        'tanggal_reservasi',
        'created_at',
        'updated_at',
    ];

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


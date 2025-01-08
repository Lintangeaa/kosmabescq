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
        $today = now()->format('dmY');  // Format tanggal (ddmmyyyy)
        
        // Ambil reservasi terakhir untuk hari ini
        $latestReservation = self::whereDate('created_at', today())->latest()->first();

        // Jika sudah ada reservasi untuk hari ini, ambil nomor urut terakhir
        if ($latestReservation) {
            // Ambil 3 karakter terakhir dari ID dan jadikan integer
            $latestId = (int)substr($latestReservation->id, -2); // Ambil 2 digit terakhir dari ID yang sudah ada
            $newId = $latestId + 1;  // Tambah satu untuk ID baru
        } else {
            $newId = 1;  // Jika tidak ada reservasi, mulai dari 1
        }

        // Format nomor urut dengan 2 digit, misalnya 01, 02, dst.
        return 'R' . $today . str_pad($newId, 2, '0', STR_PAD_LEFT);  // Hasil ID: RddmmyyyyNN
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


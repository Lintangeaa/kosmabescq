<?php

namespace App\Models;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    protected $table = 'kosts';
    protected $fillable = [
        'nama',
        'user_id',  // Menambahkan user_id
        'image',
        'aktif',
        'address_id',
        'harga',
        'fasilitas',
        'informasi',
        'total_kamar',
        'alamat_lengkap',
        'gmap'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    // Relasi dengan User (pemilik Kost)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}


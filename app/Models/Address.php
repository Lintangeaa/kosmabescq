<?php

namespace App\Models;

use App\Models\Kost;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    // Mass assignable fields
    protected $fillable = [
        'provinsi',
        'kota',
        'kecamatan',
        'desa',
        'created_at',
        'updated_at',
    ];

    /**
     * Relasi dengan model Kost.
     * Satu alamat dapat memiliki banyak kost.
     */
    public function kosts()
    {
        return $this->hasMany(Kost::class, 'address_id');
    }

    /**
     * Format alamat lengkap secara dinamis.
     *
     * @return string
     */
    public function getFormattedAddressAttribute()
    {
        return "{$this->desa}, {$this->kecamatan}, {$this->kota}, {$this->provinsi}";
    }

    /**
     * Relasi tambahan jika diperlukan untuk pengguna.
     * Misalnya, satu alamat digunakan oleh banyak pengguna.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'address_id');
    }
}


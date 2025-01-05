<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Menambahkan kolom role
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function kosts()
    {
        return $this->hasMany(Kost::class);
    }

    // Menambahkan metode untuk memeriksa apakah pengguna adalah Admin, Owner, atau Customer
    public function isAdmin()
    {
        return $this->role === 'Admin';
    }

    public function isOwner()
    {
        return $this->role === 'Owner';
    }

    public function isCustomer()
    {
        return $this->role === 'Customer';
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}


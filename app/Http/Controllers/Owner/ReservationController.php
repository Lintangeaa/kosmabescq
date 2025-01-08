<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        // Ambil semua reservasi yang memiliki kost yang dimiliki oleh owner yang sedang login
        $reservations = Reservation::whereHas('kost', function ($query) {
            $query->where('user_id', Auth::id());  // Pastikan kost milik owner yang sedang login
        })->with('kost', 'user')->get();  // Menambahkan 'user' untuk eager load relasi user

        return view('owner.reservations.index', compact('reservations'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::whereHas('kost', function ($query) {
            $query->where('user_id', Auth::id());
        })->with('kost', 'user')->get();

        return view('admin.reservations.index', compact('reservations'));
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            $request->validate([
                'status' => 'required|in:Dibayar,Dibatalkan,Selesai',
            ]);

            $reservation = Reservation::where('reservation_id', $id)->firstOrFail();

            $reservation->status = $request->status;
            $reservation->save();

            return redirect()->route('admin.reservations.index')->with('success', 'Status reservasi berhasil diperbarui.');

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}

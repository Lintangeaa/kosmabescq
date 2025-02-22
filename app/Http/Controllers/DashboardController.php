<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kost;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil semua data kost dengan relasi address, user, dan reservations
        $kosts = Kost::with([
            'address',
            'user',
            'reservations' => function ($query) {
                $query->selectRaw('kost_id, SUM(total) as reserved_count')
                    ->groupBy('kost_id');
            }
        ])->get();

        // Menghitung kamar tersedia dan menambahkan reserved_count
        foreach ($kosts as $kost) {
            $reserved_count = optional($kost->reservations->first())->reserved_count ?? 0;
            $kost->reserved_count = $reserved_count;
            $kost->kamar_tersedia = $kost->total_kamar - $reserved_count;
        }

        // Sort Kos Populer: Berdasarkan reservasi terbanyak
        $kosPopuler = $kosts->sortByDesc('reserved_count')->take(5);

        // Sort Kos Kami: Berdasarkan sisa kamar terbanyak
        $kosKami = $kosts->sortByDesc('kamar_tersedia')->take(8);

        return view('dashboard', compact('kosPopuler', 'kosKami'));
    }
}

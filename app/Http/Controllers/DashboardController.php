<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kost;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil semua data kost dengan relasi address, user, dan reservations
        $kosts = Kost::with([
            'address',
            'user',
            'reservations' => function ($query) {
                $query->whereIn('status', ['Dibayar', 'Menunggu Pembayaran', 'Selesai'])
                    ->selectRaw('kost_id, COUNT(*) as active_reservations')
                    ->groupBy('kost_id');
            }
        ])->get();

        // Menghitung kamar tersedia berdasarkan reservasi aktif
        $totalKamarTersedia = 0;
        foreach ($kosts as $kost) {
            $active_reservations = optional($kost->reservations->first())->active_reservations ?? 0;
            $kost->reserved_count = $active_reservations;
            $kost->kamar_tersedia = $kost->total_kamar - $active_reservations;
            $totalKamarTersedia += $kost->kamar_tersedia;
        }

        // Hitung statistik untuk dashboard
        $totalKos = $kosts->count();

        // Hitung total reservasi yang sudah dibayar atau selesai
        $totalReservasi = Reservation::whereIn('status', ['Dibayar', 'Selesai'])->count();

        // Hitung total pendapatan dari reservasi yang sudah dibayar atau selesai
        $totalPendapatan = Reservation::whereIn('status', ['Dibayar', 'Selesai'])
            ->join('kosts', 'reservations.kost_id', '=', 'kosts.id')
            ->select(DB::raw('SUM(reservations.total * kosts.harga) as total_pendapatan'))
            ->value('total_pendapatan') ?? 0;

        // Sort Kos Populer: Berdasarkan reservasi aktif
        $kosPopuler = $kosts->count() > 0 ? $kosts->sortByDesc('reserved_count')->take(5) : collect();

        // Sort Kos Kami: Berdasarkan sisa kamar terbanyak
        $kosKami = $kosts->count() > 0 ? $kosts->sortByDesc('kamar_tersedia')->take(8) : collect();

        return view('dashboard', compact(
            'kosPopuler',
            'kosKami',
            'totalKos',
            'totalKamarTersedia',
            'totalReservasi',
            'totalPendapatan'
        ));
    }
}

<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kost;
use Illuminate\Support\Facades\Auth;

class CustomerKostController extends Controller
{

    public function index()
    {
        // Retrieve all Kost records with related address, user, and reservations
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
        foreach ($kosts as $kost) {
            $active_reservations = optional($kost->reservations->first())->active_reservations ?? 0;
            $kost->reserved_count = $active_reservations;
            $kost->kamar_tersedia = $kost->total_kamar - $active_reservations;
        }

        // Sort Kos Populer: Berdasarkan reservasi terbanyak
        $kosPopuler = $kosts->count() > 0 ? $kosts->sortByDesc('reserved_count')->take(5) : collect();

        // Sort Kos Kami: Berdasarkan sisa kamar terbanyak
        $kosKami = $kosts->count() > 0 ? $kosts->sortByDesc('kamar_tersedia')->take(8) : collect();

        // Jika pengguna adalah admin atau pemilik kost, redirect ke dashboard
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role === 'Admin' || $user->role === 'Owner') {
                return redirect()->route('dashboard');
            }
        }

        return view('customer.kost.index', compact('kosPopuler', 'kosKami'));
    }

    public function show($id)
    {
        // Retrieve a single Kost with its related address and user
        $kost = Kost::with(['address', 'user'])->findOrFail($id);

        return view('customer.kost.show', compact('kost'));
    }

    public function all(Request $request)
    {
        // Ambil input pencarian
        $query = $request->input('query');

        // Query dasar
        $kosts = Kost::with(['reservations' => function ($query) {
            $query->whereIn('status', ['Dibayar', 'Menunggu Pembayaran'])
                ->selectRaw('kost_id, COUNT(*) as active_reservations')
                ->groupBy('kost_id');
        }]);

        // Jika ada input pencarian, tambahkan filter
        if ($query) {
            $kosts->where('nama', 'like', "%{$query}%")
                ->orWhereHas('address', function ($q) use ($query) {
                    $q->where('provinsi', 'like', "%{$query}%")
                        ->orWhere('kota', 'like', "%{$query}%")
                        ->orWhere('kecamatan', 'like', "%{$query}%")
                        ->orWhere('desa', 'like', "%{$query}%");
                });
        }

        $kosts = $kosts->get();

        // Hitung kamar tersedia berdasarkan reservasi aktif
        foreach ($kosts as $kost) {
            $active_reservations = optional($kost->reservations->first())->active_reservations ?? 0;
            $kost->kamar_tersedia = $kost->total_kamar - $active_reservations;
        }

        return view('customer.kost.all', compact('kosts'));
    }

}

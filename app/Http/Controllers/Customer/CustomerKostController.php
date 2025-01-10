<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kost;

class CustomerKostController extends Controller
{

    public function index()
    {
        // Retrieve all Kost records with related address, user, and available rooms
        $kosts = Kost::with([
            'address',
            'user',
            'reservations' => function($query) {
                $query->selectRaw('kost_id, SUM(total) as reserved_count')
                    ->groupBy('kost_id');
            }
        ])->get();

        // Menghitung kamar tersedia dengan menggunakan optional untuk menghindari kesalahan null
        foreach ($kosts as $kost) {
            $reserved_count = optional($kost->reservations->first())->reserved_count ?? 0;
            $kost->kamar_tersedia = $kost->total_kamar - $reserved_count;
        }

        // Jika pengguna adalah admin atau pemilik kost, redirect ke dashboard
        if (auth()->user()->isAdmin() || auth()->user()->isOwner()) {
            return redirect()->route('dashboard');
        }

        return view('customer.kost.index', compact('kosts'));
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
            $query->selectRaw('kost_id, SUM(total) as reserved_count')
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

        // Hitung kamar tersedia
        foreach ($kosts as $kost) {
            $reserved_count = optional($kost->reservations->first())->reserved_count ?? 0;
            $kost->kamar_tersedia = $kost->total_kamar - $reserved_count;
        }

        return view('customer.kost.all', compact('kosts'));
    }

}

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

        // Calculating available rooms
        foreach ($kosts as $kost) {
            $kost->kamar_tersedia = $kost->total_kamar - $kost->reservations->first()->reserved_count ?? 0;
        }

        return view('customer.kost.index', compact('kosts'));
    }


    public function show($id)
    {
        // Retrieve a single Kost with its related address and user
        $kost = Kost::with(['address', 'user'])->findOrFail($id);

        return view('customer.kost.show', compact('kost'));
    }
}

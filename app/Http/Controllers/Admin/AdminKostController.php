<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Kost;
use Illuminate\Http\Request;

class AdminKostController extends Controller
{
    public function index()
    {
        $kosts = Kost::with('address')->paginate(10);
        return view('admin.kost.index', compact('kosts'));
    }

    public function create()
    {
        $addresses = Address::all();
        return view('admin.kost.create', compact('addresses'));
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirimkan termasuk alamat lengkap dan gambar
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'desa' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string',
            'gmap' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'fasilitas' => 'required|string',
            'informasi' => 'required|string',
            'total_kamar' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation
        ]);

        // Cek apakah alamat sudah ada di database
        $address = Address::where('provinsi', $validated['provinsi'])
                        ->where('kota', $validated['kota'])
                        ->where('kecamatan', $validated['kecamatan'])
                        ->where('desa', $validated['desa'])
                        ->first();

        // Jika alamat tidak ada, buat alamat baru
        if (!$address) {
            $address = Address::create([
                'provinsi' => $validated['provinsi'],
                'kota' => $validated['kota'],
                'kecamatan' => $validated['kecamatan'],
                'desa' => $validated['desa'],
            ]);
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('kost_images', 'public');
        }

        // Menyimpan kost dengan address_id yang sudah ada dan image
        $kostData = [
            'nama' => $validated['nama'],
            'user_id' => auth()->id(),
            'aktif' => true,
            'address_id' => $address->id,
            'harga' => $validated['harga'],
            'fasilitas' => $validated['fasilitas'],
            'informasi' => $validated['informasi'],
            'total_kamar' => $validated['total_kamar'],
            'alamat_lengkap' => $validated['alamat_lengkap'],
            'gmap' => $validated['gmap'],
            'image' => $imagePath, // Save the image path
        ];

        Kost::create($kostData);

        return redirect()->route('admin.kost.index')->with('success', 'Kost berhasil ditambahkan.');
    }

    public function show(Kost $kost)
    {
        return view('customer.kost.show', compact('kost'));
    }

    public function edit(Kost $kost)
    {
        $addresses = Address::all();
        return view('kost.edit', compact('kost', 'addresses'));
    }

    public function update(Request $request, Kost $kost)
    {
        // Validasi data yang dikirimkan termasuk alamat lengkap dan gambar
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'aktif' => 'required|boolean',
            'provinsi' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'desa' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'fasilitas' => 'required|string',
            'informasi' => 'required|string',
            'total_kamar' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation
        ]);

        // Cek apakah alamat sudah ada di database
        $address = Address::where('provinsi', $validated['provinsi'])
                        ->where('kota', $validated['kota'])
                        ->where('kecamatan', $validated['kecamatan'])
                        ->where('desa', $validated['desa'])
                        ->first();

        // Jika alamat tidak ada, buat alamat baru
        if (!$address) {
            $address = Address::create([
                'provinsi' => $validated['provinsi'],
                'kota' => $validated['kota'],
                'kecamatan' => $validated['kecamatan'],
                'desa' => $validated['desa'],
            ]);
        }
        dd($request->all());
        // Handle Image Upload
        if ($request->hasFile('image')) {
            dd($request->file('image'));
            // Delete old image if it exists
            if ($kost->image && Storage::disk('public')->exists($kost->image)) {
                Storage::disk('public')->delete($kost->image);
            }
            
            // Store new image
            $imagePath = $request->file('image')->store('kost_images', 'public');
            $kost->image = $imagePath;
        }

        // Update kost data
        $kost->update([
            'nama' => $validated['nama'],
            'aktif' => $validated['aktif'],
            'address_id' => $address->id,
            'harga' => $validated['harga'],
            'fasilitas' => $validated['fasilitas'],
            'informasi' => $validated['informasi'],
            'total_kamar' => $validated['total_kamar'],
            'alamat_lengkap' => $validated['alamat_lengkap'],
        ]);

        return redirect()->route('kost.index')->with('success', 'Kost berhasil diperbarui.');
    }

    public function destroy(Kost $kost)
    {
        $kost->delete();

        return redirect()->route('kost.index')->with('success', 'Kost berhasil dihapus.');
    }
}

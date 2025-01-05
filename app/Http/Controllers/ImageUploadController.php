<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        // Validasi file gambar
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Batasi ukuran file
        ]);

        // Cek jika ada file yang di-upload
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            // Menyimpan gambar ke storage
            $path = $request->file('file')->store('public/images'); // Menyimpan gambar di direktori storage/public/images

            // Mendapatkan URL file gambar
            $url = Storage::url($path);

            // Mengembalikan URL gambar dalam format JSON
            return response()->json(['location' => $url]);
        }

        return response()->json(['error' => 'Invalid file'], 400);
    }
}


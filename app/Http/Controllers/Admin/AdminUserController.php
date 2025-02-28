<?php

// app/Http/Controllers/Admin/AdminUserController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan semua user
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk membuat user baru
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:Admin,Owner,Customer', // Validasi role
        ]);

        // Membuat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role, // Menyimpan role yang dipilih
        ]);

        return redirect()->route('admin.user.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Menampilkan detail user
        $user = User::findOrFail($id);
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Menampilkan form edit untuk user tertentu
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // Menghindari email yang duplikat
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:Admin,Owner,Customer', // Validasi role
        ]);

        // Mencari user dan memperbarui data
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password); // Mengubah password jika ada
        }
        $user->role = $request->role; // Memperbarui role
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'User updated successfully.');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        foreach ($user->reservations as $reservation) {
            $reservation->payments()->delete();
            
            $reservation->delete();
        }

        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'Pengguna berhasil dihapus');
    }

}

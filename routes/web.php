<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminKostController;
use App\Http\Controllers\Customer\CustomerKostController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\Customer\CustomerReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', [CustomerKostController::class, 'index'])->name('customer.kost.index');
    Route::get('/kost/{kost}', [CustomerKostController::class, 'show'])->name('customer.kost.show');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Menambahkan nama pada resource route admin/kost dan admin/user
    Route::resource('admin/kost', AdminKostController::class)->names([
        'index' => 'admin.kost.index',
        'create' => 'admin.kost.create',
        'store' => 'admin.kost.store',
        'show' => 'admin.kost.show',
        'edit' => 'admin.kost.edit',
        'update' => 'admin.kost.update',
        'destroy' => 'admin.kost.destroy',
    ]);

    Route::resource('admin/user', AdminUserController::class)->names([
        'index' => 'admin.user.index',
        'create' => 'admin.user.create',
        'store' => 'admin.user.store',
        'show' => 'admin.user.show',
        'edit' => 'admin.user.edit',
        'update' => 'admin.user.update',
        'destroy' => 'admin.user.destroy',
    ]);

    Route::resource('customer/reservation', CustomerReservationController::class)->names([
        'index' => 'customer.reservations.index',
        'create' => 'customer.reservations.create',
        'store' => 'customer.reservations.store',
        'show' => 'customer.reservations.show',
        'destroy' => 'customer.reservations.destroy'
    ]);

    Route::get('/customer/reservation/{reservation}/payment', [CustomerReservationController::class, 'payment'])->name('customer.reservations.payment');
});

Route::post('upload-image', [ImageUploadController::class, 'upload'])->name('upload.image');

require __DIR__ . '/auth.php';

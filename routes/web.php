<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Customer\CustomerKostController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\Customer\CustomerReservationController;
use App\Http\Controllers\KostController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/', [CustomerKostController::class, 'index'])->name('customer.kost.index');
    Route::get('/kost/{kost}', [CustomerKostController::class, 'show'])->name('customer.kost.show');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('admin/kost', KostController::class)->names([
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

    Route::get('/kos', [CustomerKostController::class, 'all'])->name('customer.kost.all');

    Route::get('/payment/{reservation}', [CustomerReservationController::class, 'payment'])->name('customer.reservations.payment');
    Route::get('/reservations/{reservation}/invoice', [CustomerReservationController::class, 'invoice'])->name('customer.reservations.invoice');
    Route::get('/reservations/{reservation}/download-invoice', [CustomerReservationController::class, 'downloadInvoice'])->name('customer.reservations.downloadInvoice');

    Route::prefix('admin')->name('admin.')->group(function() {
        Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
        Route::put('/reservations/{reservation}/update-status', [ReservationController::class, 'updateStatus'])->name('reservations.update-status');
    });
});



Route::post('upload-image', [ImageUploadController::class, 'upload'])->name('upload.image');

require __DIR__ . '/auth.php';
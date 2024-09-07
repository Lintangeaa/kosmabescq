<?php

use App\Http\Controllers\MasterProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('master-product')->name('master-product.')->group(function () {
        Route::get('create', [MasterProductController::class, 'create'])->name('create');
        Route::post('store', [MasterProductController::class, 'store'])->name('store');
        Route::get('/', [MasterProductController::class, 'index'])->name('index');
        Route::get('{product}', [MasterProductController::class, 'show'])->name('show');
    });
});

require __DIR__ . '/auth.php';

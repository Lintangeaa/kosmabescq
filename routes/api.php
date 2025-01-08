<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CustomerReservationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::put('/reservations/{id}/status', [CustomerReservationController::class, 'updateStatusToPaid'])
    ->name('reservations.updateStatusToPaid');



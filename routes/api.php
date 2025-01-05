<?php

use App\Http\Controllers\Customer\CustomerReservationController;

Route::put('/reservations/{id}/status', [CustomerReservationController::class, 'updateStatusToPaid'])
    ->name('reservations.updateStatusToPaid');


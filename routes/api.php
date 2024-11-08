<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RideController;

Route::prefix('rider')->group(function () {
    Route::post('/ride', [RideController::class, 'store']);
});

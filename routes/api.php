<?php

use App\Http\Controllers\Api\ApiInfoController;
use App\Http\Controllers\Api\ReservationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('info', [ApiInfoController::class, 'index']);

Route::prefix('reservation')->group(function () {
   Route::post('/', [ReservationController::class, 'store']) ;
   Route::delete('/{reservation}', [ReservationController::class, 'destroy'])->middleware('auth:sanctum') ;
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

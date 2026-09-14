<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockmovementController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/stock-movements', [StockmovementController::class, 'index']);
Route::post('/stock-movements', [StockmovementController::class, 'store']);
Route::delete('/stock-movements/{id}', [StockmovementController::class,'destroy']);
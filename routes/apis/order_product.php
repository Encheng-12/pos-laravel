<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderProductController;




Route::prefix("/order_product")->group(function () {
    Route::get('/', [OrderProductController::class,'index']);
    Route::post('/', [OrderProductController::class, 'store']);
    Route::get('/{id}', [OrderProductController::class,'show']);
    Route::put('/{id}', [OrderProductController::class,'update']);
    Route::delete('/{id}', [OrderProductController::class,'destroy']);
});
<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;




Route::prefix("/categories")->group(function () {
    Route::post('/', [CategoryController::class, 'store']);
    Route::get('/', [CategoryController::class,'index']);
    Route::put('/{id}', [CategoryController::class,'update']);
    Route::delete('/{id}', [CategoryController::class,'destroy']);
});
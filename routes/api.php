<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function (): void {
    // Auth helpers
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

// Notification

Route::post('/send-mail', [NotificationController::class, ]);

require __DIR__ . '/apis/categories.php';
require __DIR__ . '/apis/users.php';
require __DIR__ . '/apis/products.php';
require __DIR__ . '/apis/orders.php';
require __DIR__ . '/apis/payments.php';
require __DIR__ . '/apis/stock_movements.php';
require __DIR__ . '/apis/order_product.php';

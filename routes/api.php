<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Note;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function (): void {
    // Auth helpers
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('/health', fn () => response()->json(['ok' => true]));
Route::get('/notes', fn () => Note::latest()->limit(20)->get());
Route::post('/notes', function (Request $request) {
    $data = $request->validate(['title' => 'required|string|max:150']);
    return response()->json(Note::create($data), 201);
});


// Notification

Route::post('/send-mail', [NotificationController::class, 'sendMail']);

require __DIR__ . '/apis/categories.php';
require __DIR__ . '/apis/users.php';
require __DIR__ . '/apis/products.php';
require __DIR__ . '/apis/orders.php';
require __DIR__ . '/apis/payments.php';
require __DIR__ . '/apis/stock_movements.php';
require __DIR__ . '/apis/order_product.php';


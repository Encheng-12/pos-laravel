<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

require __DIR__ . '/apis/categories.php';
require __DIR__ . '/apis/users.php';
require __DIR__ . '/apis/products.php';
require __DIR__ . '/apis/orders.php';
require __DIR__ . '/apis/payments.php';
require __DIR__ . '/apis/stock_movements.php';
require __DIR__ . '/apis/order_product.php';


<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('banners', App\Http\Controllers\BannerController::class)->only('index');

Route::apiResource('categories', App\Http\Controllers\CategoryController::class)->only('index');

Route::apiResource('brands', App\Http\Controllers\BrandController::class)->only('index');

Route::apiResource('products', App\Http\Controllers\ProductController::class)->except('store', 'update', 'destroy');

Route::apiResource('carts', App\Http\Controllers\CartController::class)->except('show', 'destroy');

Route::apiResource('orders', App\Http\Controllers\OrderController::class)->except('update', 'show', 'destroy');

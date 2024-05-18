<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('banners', App\Http\Controllers\BannerController::class)->only('index');

Route::apiResource('categories', App\Http\Controllers\CategoryController::class)->only('index');

Route::apiResource('brands', App\Http\Controllers\BrandController::class)->only('index');

Route::apiResource('carts', App\Http\Controllers\CartController::class)->except('show', 'destroy');

Route::apiResource('orders', App\Http\Controllers\OrderController::class)->except('update', 'show', 'destroy');

Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('products', App\Http\Controllers\ProductController::class)->except('store', 'update', 'destroy');

    Route::post('products/favorites', [App\Http\Controllers\ProductController::class, 'getFavoritesForCurrentUser']);

    Route::post('products/{product}/favorite', [App\Http\Controllers\ProductController::class, 'favorite']);

    Route::post('products/{product}/unfavorite', [App\Http\Controllers\ProductController::class, 'unfavorite']);
});
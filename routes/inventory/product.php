<?php

use App\Http\Controllers\Inventory\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('products', [ProductController::class, 'index'])->name('product.index');

    Route::get('products/create', [ProductController::class, 'create'])->name('product.create');
});
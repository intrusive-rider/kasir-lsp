<?php

use App\Http\Controllers\Inventory\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('products', [ProductController::class, 'index'])->name('product.index');

    Route::get('products/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('products/create', [ProductController::class, 'store'])->name('product.store');

    Route::get('products/edit/{product:name}', [ProductController::class, 'edit'])->name('product.edit');
    Route::patch('products/edit/{product:name}', [ProductController::class, 'update'])->name('product.update');

    Route::delete('products/{product:name}', [ProductController::class, 'destroy'])->name('product.destroy');
});
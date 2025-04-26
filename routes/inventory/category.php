<?php

use App\Http\Controllers\Inventory\CategoryController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category/create', [CategoryController::class, 'store'])->name('category.store');

    Route::get('category/edit/{category:name}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::patch('category/edit/{category:name}', [CategoryController::class, 'update'])->name('category.update');

    Route::delete('categories/{category:name}', [CategoryController::class, 'destroy'])->name('category.destroy');
});
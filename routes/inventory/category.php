<?php

use App\Http\Controllers\Inventory\CategoryController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('categories', [CategoryController::class, 'create'])->name('category.index');
});
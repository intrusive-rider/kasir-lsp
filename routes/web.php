<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

require __DIR__ . '/inventory/product.php';
require __DIR__ . '/inventory/category.php';

require __DIR__ . '/customer/order.php';



Route::get('/', [DashboardController::class, 'render'])
    ->middleware('auth')
    ->name('dashboard');

<?php

use App\Http\Controllers\Customer\OrderController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('order/create', [OrderController::class, 'create'])->name('order.create');

    Route::get('order/checkout/{order}', [OrderController::class, 'checkout'])->name('order.checkout');
    Route::post('order/checkout/{order}', [OrderController::class, 'pay'])->name('order.pay');

    Route::post('order/cancel/{order}', [OrderController::class, 'cancel'])->name('order.cancel');

    Route::get('orders', [OrderController::class, 'index'])->name('order.index');
});
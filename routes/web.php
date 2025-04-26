<?php

use App\Models\Customer\Order;
use App\Models\Inventory\Category;
use App\Models\Inventory\Product;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

require __DIR__ . '/inventory/product.php';
require __DIR__ . '/inventory/category.php';

require __DIR__ . '/customer/order.php';

$dashboard_stats = [
    'product' => Product::count(),
    'stock' => Product::pluck('stock')->sum(),
    'category' => Category::count(),
    'revenue' => 'Rp' . Order::whereDate('updated_at', today())->pluck('total')->sum() / 1000 . 'k',
    'order' => Order::whereDate('updated_at', today())->count(),
];

Route::view('/', 'dashboard', $dashboard_stats)
    ->middleware('auth')
    ->name('dashboard');

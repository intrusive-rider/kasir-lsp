<?php

namespace App\Http\Controllers;

use App\Models\Customer\Order;
use App\Models\Inventory\Category;
use App\Models\Inventory\Product;

class DashboardController extends Controller
{
    public function render()
    {
        $dashboard_stats = [
            'product' => Product::count(),
            'stock' => Product::pluck('stock')->sum(),
            'category' => Category::count(),
            'revenue' => 'Rp' . number_format(Order::pluck('total')->sum()),
            'order' => Order::whereDate('updated_at', today())->count(),
        ];

        return view('dashboard', $dashboard_stats);
    }
}

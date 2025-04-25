<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Inventory\Category;
use App\Models\Inventory\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::count();
        $storage = Product::all()->sum('stock');
        
        return view('inventory.product.index', compact('products', 'storage'));
    }

    public function create()
    {
        return view('inventory.product.create', [
            'categories' => Category::all(),
        ]);        
    }
}

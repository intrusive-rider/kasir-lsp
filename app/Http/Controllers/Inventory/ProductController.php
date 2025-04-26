<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\ProductRequest;
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
        $categories =  Category::all();
        return view('inventory.product.create', compact('categories'));        
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        Product::create($data);
        return redirect()->route('product.index')->with('toast', [
            'type' => 'success',
            'msg' => "Product '" . $data['name'] . "' created."
        ]);
    }

    public function edit(Product $product)
    {
        $categories =  Category::all();
        return view('inventory.product.edit', compact('product', 'categories'));
    }

    public function update(Product $product, ProductRequest $request)
    {
        $data = $request->validated();
        $product->update($data);
        
        return redirect()->route('product.index')->with('toast', [
            'type' => 'success',
            'msg' => "Product '" . $data['name'] . "' updated."
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('toast', [
            'type' => 'warning',
            'msg' => "Product '" . $product->name . "' deleted."
        ]);;
    }
}

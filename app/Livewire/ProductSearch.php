<?php

namespace App\Livewire;

use App\Models\Inventory\Category;
use App\Models\Inventory\Product;
use Livewire\Component;

class ProductSearch extends Component
{
    public $search = '';

    public function render()
    {
        $products = Product::with('category')
            ->where('name', 'like', '%' . $this->search . '%')
            ->get();

        $categories = Category::all()->load('products');

        return view('livewire.product-search', compact('products', 'categories'));
    }
}

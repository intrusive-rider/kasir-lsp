<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\CategoryRequest;
use App\Models\Inventory\Category;

class CategoryController extends Controller
{
    public function create()
    {
        return view('inventory.category.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        Category::create($data);

        return redirect()->route('product.index')->with('toast', [
            'type' => 'success',
            'msg' => "Category '" . $data['name'] . "' created."
        ]);
    }

    public function edit(Category $category)
    {
        return view('inventory.category.edit', compact('category'));
    }

    public function update(Category $category, CategoryRequest $request)
    {
        $data = $request->validated();
        $category->update($data);

        return redirect()->route('product.index')->with('toast', [
            'type' => 'success',
            'msg' => "Category '" . $data['name'] . "' updated."
        ]);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('toast', [
            'type' => 'warning',
            'msg' => "Category '" . $category->name . "' deleted."
        ]);;
    }
}

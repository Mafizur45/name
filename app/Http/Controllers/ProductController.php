<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // ✅ Show all products + search
    public function productList(Request $request)
    {
        $query = Product::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->orderBy('created_at', 'desc')->get();

        return view('product.index', compact('products'));
    }

    // ✅ Show create form
    public function create()
    {
        return view('product.create');
    }

    // ✅ Store new product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        Product::create($request->only('name', 'quantity', 'price'));

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    // ✅ Show single product
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    // ✅ Show edit form
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    // ✅ Update product
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        $product->update($request->only('name', 'quantity', 'price'));

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    // ✅ Delete product
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
}

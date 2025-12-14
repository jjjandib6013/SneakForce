<?php

namespace App\Http\Controllers;

use App\Models\Product;

class CollectionController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('collection.index', compact('products'));
    }

    // Show all products to admin
    public function adminIndex()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    // Show create form
    public function create()
    {
        return view('admin.products.create');
    }

    // Store new product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'description', 'price']);

        if($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $data['image'] = '/storage/' . $path;
        }

        Product::create($data);

        return redirect()->route('admin.products')->with('success', 'Product added!');
    }
}

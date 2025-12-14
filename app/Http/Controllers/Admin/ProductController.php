<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        // Always eager-load categories
        $query = Product::with('categories');

        // Search
        if ($request->search) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        // Filter by category (many-to-many)
        if ($request->category) {
            $query->whereHas('categories', function($q) use ($request) {
                $q->where('categories.id', $request->category);
            });
        }

        $products = $query->latest()->paginate(12);

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_ids' => 'required|array',
            'category_ids.*' => 'exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('products', 'public')
            : null;

        $product = Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'image' => $imagePath,
        ]);

        $product->categories()->sync($validated['category_ids']);

        return redirect()->route('admin.products.index')
                        ->with('success', 'Product created successfully!');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product','categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'category_ids' => 'required|array',
            'category_ids.*' => 'exists:categories,id',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->image->store('products', 'public');
        }

        $product->update($validated);
        $product->categories()->sync($validated['category_ids']);

        return redirect()->route('admin.products.index')
                        ->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->back()
        ->with('success', 'Product deleted successfully!');
        }
}
    
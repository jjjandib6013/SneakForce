<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class CategoryProductSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::pluck('id')->toArray();
        $products = Product::all();

        foreach ($products as $product) {
            // Random 1–3 categories for each shoe
            $randomCategories = collect($categories)->random(rand(1, 3))->toArray();
            $product->categories()->sync($randomCategories);
        }
    }
}

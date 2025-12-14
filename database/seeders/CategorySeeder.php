<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Men',
            'Women',
            'Kids',
            'Running',
            'Basketball',
            'Casual',
            'Nike',
            'Adidas',
            'Puma',
            'Slides',
            'Boots',
            'Sneakers',
            'Formal',
            'Outdoor',
            'Sports',
            'Streetwear',
            'MSCHF',
            'Fashion',
            'Limited Edition',
            'Futuristic',
            'Lifestyle',
            'Comfort',
            'Yeezy',

        ];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}

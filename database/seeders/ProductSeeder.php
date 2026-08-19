<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'عصير برتقال',
            'description' => 'وصف.',
            'price' => '5',
            'category_id' => 1,
            'image' => 'images/categories/default.png',
            'brand_id' => 1,
        ]);
    }
}

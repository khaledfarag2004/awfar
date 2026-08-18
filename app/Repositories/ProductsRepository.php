<?php
namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;

class ProductsRepository {
    public function getAllProducts(){
        return Product::with('category')->get();
    }
    public function findById(Product $product)
    {
        return $product->load(['category', 'brand']);
    }
}

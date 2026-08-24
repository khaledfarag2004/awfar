<?php
namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;

class ProductsRepository {
    public function findById(int $id)
    {
        return Product::find($id);
    }
    public function getAllProducts(){
        return Product::with('category')->get();
    }

}

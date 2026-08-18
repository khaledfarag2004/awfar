<?php
namespace App\Servce;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\ProductsRepository;

class ProductsService {
    protected $productsRepo;
    public function __construct(ProductsRepository $productsRepo) {
        $this->productsRepo = $productsRepo;
    }
    public function getAllProducts(){
        return $this->productsRepo->getAllProducts();
    }
    public function getHomeProducts()
    {
        return Product::with('category')
            ->where('status', 1)
            ->latest()
            ->take(10)
            ->get();
    }
    public function getProductById(Product $product)
    {
        return $this->productsRepo->findById($product);
    }
}

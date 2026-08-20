<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Servce\ProductsService;
use App\Http\Resources\ProductResource;
use App\Http\Resources\HomeProductResource;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductsService $productService)
    {
        $this->productService = $productService;
    }

    public function HomeProducts()
    {
        $products = $this->productService->getHomeProducts();

        return response()->json([
            'status' => true,
            'message' => 'قائمة المنتجات الرئيسية',
            'data' => HomeProductResource::collection($products),
        ]);
    }

    public function show(Product $product)
    {
        $product = $this->productService->getProductById($product);

        return response()->json([
            'status' => true,
            'message' => 'تفاصيل المنتج',
            'data' => new ProductResource($product),
        ]);
    }
}

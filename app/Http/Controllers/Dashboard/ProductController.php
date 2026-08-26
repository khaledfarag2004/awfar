<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Products\CreateProductRequest;
use App\Http\Requests\Dashboard\Products\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category','brand')->paginate(10);
        return view('dashboard.products.index',compact('products'));
    }
    public function show(Product $product)
    {
        return view('dashboard.products.show',compact('product'));
    }
    public function create() {
        $categories = Category::all();
        $brands = Brand::all();
        return view('dashboard.products.create',compact('categories','brands'));
    }
    public function store(CreateProductRequest $request) {
        $data = $request->validated();
        Product::create($data);
        return redirect()->route('products.index')->with('success','Product created successfully.');
    }
    public function edit(Product $product) {
        $categories = Category::all();
        $brands = Brand::all();
        return view('Dashboard.products.edit',compact('product','categories','brands'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $product->update($data);
        return redirect()->route('products.index')->with('success','Product updated successfully.');
    }
    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('products.index')->with('success','Product deleted successfully.');
    }
}

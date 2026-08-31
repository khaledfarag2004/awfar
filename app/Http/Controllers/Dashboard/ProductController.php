<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Products\CreateProductRequest;
use App\Http\Requests\Dashboard\Products\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'brand'])
            ->paginate(10);

        return view('dashboard.products.index', compact('products'));
    }

    public function show($locale, $id)
    {
        $product = Product::findOrFail($id);

        return view('dashboard.products.show', compact('product'));
    }

    public function create($locale)
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view(
            'dashboard.products.create',
            compact('categories', 'brands')
        );
    }

    public function store(CreateProductRequest $request, $locale)
    {
        $data = $request->validated();

        Product::create($data);

        return redirect()
            ->route('products.index', [
                'locale' => $locale
            ])
            ->with(
                'success',
                __('messages.success_product_created')
            );
    }

    public function edit($locale, $id)
    {
        $product = Product::findOrFail($id);

        $categories = Category::all();
        $brands = Brand::all();

        return view(
            'dashboard.products.edit',
            compact('product', 'categories', 'brands')
        );
    }

    public function update(
        UpdateProductRequest $request,
                             $locale,
                             $id
    ) {
        $product = Product::findOrFail($id);

        $product->update(
            $request->validated()
        );

        return redirect()
            ->route('products.index', [
                'locale' => $locale
            ])
            ->with(
                'success',
                __('messages.success_product_updated')
            );
    }

    public function destroy($locale, $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()
            ->route('products.index', [
                'locale' => $locale
            ])
            ->with(
                'success',
                __('messages.success_product_deleted')
            );
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Brands\CreateBrandRequest;
use App\Http\Requests\Dashboard\Brands\UpdateBrandRequest;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(10);
        return view('Dashboard.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('Dashboard.brands.create');
    }

    public function store(CreateBrandRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('assets/img/brands', 'public');
        }

        Brand::create($data);

        return redirect()->route('brands.index')->with('success', 'Brand created successfully');
    }

    public function edit(Brand $brand)
    {
        return view('Dashboard.brands.edit', compact('brand'));
    }

    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('assets/img/brands', 'public');
        }

        $brand->update($data);

        return redirect()->route('brands.index')->with('success', 'Brand updated successfully');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully');
    }
}

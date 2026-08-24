<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Category\CreateCategoryRequest;
use App\Http\Requests\Dashboard\Category\UpadteCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('Dashboard.categories.index', compact('categories'));
    }
    public function show(Category $category)
    {
        return view('Dashboard.categories.show', compact('category'));
    }
    public function create()
    {
        return view('Dashboard.categories.create');
    }
    public function store(CreateCategoryRequest $request)
    {
        $data = $request->validated();
        Category::create($data);
        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }
    public function edit(Category $category)
    {
        return view('Dashboard.categories.edit', compact('category'));
    }
    public function update(UpadteCategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}


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
    public function show($locale,Category $category,)
    {
        return view('Dashboard.categories.show', compact('category'));
    }
    public function create($locale)
    {
        return view('Dashboard.categories.create');
    }
    public function store(CreateCategoryRequest $request,$locale)
    {
        $data = $request->validated();
        Category::create($data);
        return redirect()->route('categories.index', ['locale' => app()->getLocale()])->with('success', __('messages.success_category_created'));
    }
    public function edit($locale,Category $category)
    {
        return view('Dashboard.categories.edit', compact('category'));
    }
    public function update(UpadteCategoryRequest $request, $locale,Category $category)
    {
        $data = $request->validated();
        $category->update($data);
        return redirect()->route('categories.index', ['locale' => app()->getLocale()])->with('success', __('messages.success_category_updated'));
    }
    public function destroy(Category $category,$locale)
    {
        $category->delete();
        return redirect()->route('categories.index', ['locale' => app()->getLocale()])->with('success', __('messages.success_category_deleted'));
    }
}


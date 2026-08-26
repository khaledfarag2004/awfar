<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryServices;
    public function __construct(CategoryService $categoryServices){
        $this->categoryServices = $categoryServices;
    }
    public function allCategories()
    {
        $data = $this->categoryServices->getAllCategories();
        return response()->json([
            'success' => true,
            'message' => 'جميع الفئات',
            'data' => $data
        ]);
    }
}

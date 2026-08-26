<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $UserCount = User::count();
        $ProudactCount = Product::count();
        $brandCount = Brand::count();
        $categoriesCount = Category::count();
        $users = User::with('city')->paginate(5);
        return view('dashboard.layout.content', compact('UserCount', 'ProudactCount', 'brandCount',
        'categoriesCount', 'users'));
    }
}

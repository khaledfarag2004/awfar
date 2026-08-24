<?php

use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\BrandController;
use App\Http\Controllers\Dashboard\BannerController;
use Illuminate\Support\Facades\Route;

Route::get('/',[DashboardController::class,'index'])->name('dashboard');
// User Route
Route::resource('user',UserController::class);

// Product Route
Route::resource('products',ProductController::class);

// Category Route
Route::resource('categories', CategoryController::class);

// Banner Route
Route::resource('banners', BannerController::class)->except('show');

// Brands Route
Route::resource('brands', BrandController::class)->except('show');

// City Route
Route::resource('cities', CityController::class)->except('show');

// Cart Route
Route::get('order',[OrderController::class,'index'])->name('order.index');

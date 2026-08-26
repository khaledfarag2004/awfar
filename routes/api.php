<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\CartController;

// Auth Route
Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);
Route::post('/verify-email', [AuthController::class, 'verifyOtp'])->middleware('auth:sanctum');
Route::post('/resend-otp', [AuthController::class, 'resendOtp']);

Route::post('/forget-password', [AuthController::class, 'forgetPassword']);
Route::post('/reset-password', [AuthController::class, 'resetPassword'])
    ->middleware('auth:sanctum');
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Category Route
Route::get('/category', [CategoryController::class, 'allCategories']);

// Banner Route
Route::get('/banners', [BannerController::class, 'allBanners']);

// Products Route
Route::get('/products', [ProductController::class, 'HomeProducts']);
Route::get('/products/{product}', [ProductController::class, 'show']);

// Brands Route
Route::get('/brands', [BrandController::class, 'allBrands']);

// Profile Route
Route::get('profile/{profile}', [ProfileController::class, 'showProfile']);
Route::put('profile/{profile}', [ProfileController::class, 'update']);
Route::put('/profile/{id}/change-password', [ProfileController::class, 'changePassword']);

// Cart Route
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/cart/items', [CartController::class, 'addToCart']);
    Route::post('/checkout', [CartController::class, 'checkout']);
});

Route::get('about-us', [AboutController::class, 'index']);

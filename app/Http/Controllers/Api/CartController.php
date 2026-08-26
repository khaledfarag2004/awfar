<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AddToCartRequest;
use Illuminate\Http\Request;
use App\Services\CartService;

class CartController extends Controller
{
    public function __construct(
        protected CartService $cartService
    ) {}

    public function addToCart(AddToCartRequest $request)
    {
        $item = $this->cartService->addToCart(
            auth()->id(),
            $request->validated()
        );

        return response()->json([
            'status' => true,
            'message' => 'تم اضافه المنتج بنجاح',
            'data' => $item,
        ]);
    }
}

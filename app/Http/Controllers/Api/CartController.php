<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AddToCartRequest;
use Illuminate\Http\Request;
use App\Services\CartService;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

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

    public function checkout()
    {
        $result = $this->cartService->checkout(auth()->id());

        if (!$result['success']) {
            return response()->json([
                'success' => false,
                'message' => $result['message'],
            ], 400);
        }

        return response()->json([
            'success' => true,
            'message' => $result['message'],
            'data'    => $result['order'],
        ]);
    }}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AddToCartRequest;
use App\Http\Requests\Api\UpdateCartRequest;
use Illuminate\Http\Request;
use App\Services\CartService;

class CartController extends Controller
{
    public function __construct(
        protected CartService $cartService
    ) {}

    public function addToCart(AddToCartRequest $request)
    {
        $item = $this->cartService->addToCart(auth()->id(), $request->validated());

        return response()->json([
            'success' => true,
            'message' => 'تم اضافه المنتج بنجاح',
            'data'    => $item,
        ]);
    }

    public function getCart()
    {
        $result = $this->cartService->getCart(auth()->id());
        return response()->json($result);
    }

    public function removeFromCart($productId)
    {
        $result = $this->cartService->removeFromCart(auth()->id(), $productId);
        return response()->json($result);
    }

    public function updateQuantity(UpdateCartRequest $request, $productId)
    {
        $data = $request->validated();
        $result = $this->cartService->updateQuantity(auth()->id(), $productId, $data['quantity']);
        return response()->json($result);
    }

    public function checkout()
    {
        $result = $this->cartService->checkout(auth()->id());

        if (!$result['success']) {
            return response()->json($result, 400);
        }

        return response()->json($result);
    }
}

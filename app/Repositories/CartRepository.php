<?php
namespace App\Repositories;
use App\Models\Cart;

class CartRepository
{
    public function getUserCart(int $userId)
    {
        return Cart::with('items.product')
            ->where('user_id', $userId)
            ->first();
    }

    public function createCart(int $userId)
    {
        return Cart::create([
            'user_id' => $userId,
        ]);
    }
}

<?php
namespace App\Repositories;
use App\Models\CartItem;

class CartItemRepository
{
    public function findItem(int $cartId, int $productId)
    {
        return CartItem::where('cart_id', $cartId)
            ->where('product_id', $productId)
            ->first();
    }

    public function create(array $data)
    {
        return CartItem::create($data);
    }

    public function updateQuantity(CartItem $item, int $quantity)
    {
        $item->update([
            'quantity' => $quantity,
        ]);

        return $item;
    }

    public function delete(CartItem $item)
    {
        return $item->delete();
    }
}

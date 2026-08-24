<?php
namespace App\Services;

use App\Repositories\CartRepository;
use App\Repositories\CartItemRepository;
use App\Repositories\ProductsRepository;
use App\Models\Cart;
use App\Models\CartItem;
class CartService
{
    public function __construct(
        protected ProductsRepository $productRepository
    ) {}

    public function addToCart(int $userId, array $data)
    {
        $product = $this->productRepository->findById(
            (int) $data['product_id']
        );

        if (!$product) {
            throw new \Exception('Product not found');
        }

        $cart = Cart::firstOrCreate([
            'user_id' => $userId,
        ]);

        $item = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();

        if ($item) {

            $item->increment(
                'quantity',
                (int) $data['quantity']
            );

        } else {

            $item = CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => (int) $data['quantity'],
            ]);
        }

        $item->load('product');

        return [
            'cart_id'    => $item->cart_id,
            'product'    => $item->product->name,
            'quantity'   => $item->quantity,
        ];
    }
}

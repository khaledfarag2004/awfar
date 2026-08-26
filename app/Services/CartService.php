<?php
namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
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
    public function checkout(int $userId)
    {
        $cart = Cart::with('items.product')
            ->where('user_id', $userId)
            ->first();
        if (!$cart) {
            return [
                'success' => false,
                'message' => 'الكارت غير موجود',
            ];
        }
        if ($cart->items->isEmpty()) {
            return [
                'success' => false,
                'message' => 'الكارت فاضي',
            ];
        }
        return DB::transaction(function () use ($cart, $userId) {
            $total = 0;
            foreach ($cart->items as $item) {
                $total += $item->product->price * $item->quantity;
            }
            $order = Order::create([
                'user_id' => $userId,
                'total'   => $total,
                'status'  => 'pending',
            ]);
            foreach ($cart->items as $item) {
                $order->items()->create([
                    'product_id' => $item->product_id,
                    'quantity'   => $item->quantity,
                    'price'      => $item->product->price,
                ]);
            }
            $cart->items()->delete();
            $order->load([
                'user',
                'items.product'
            ]);

            return [
                'success' => true,
                'message' => 'تم إنشاء الطلب بنجاح',

                'order' => [
                    'id'     => $order->id,
                    'user'   => $order->user->name,
                    'total'  => $order->total,
                    'status' => $order->status,

                    'items' => $order->items->map(function ($item) {
                        return [
                            'product'  => $item->product->name,
                            'quantity' => $item->quantity,
                            'price'    => $item->price,
                            'subtotal' => $item->price * $item->quantity,
                        ];
                    })->values(),
                ],
            ];
        });
    }
}

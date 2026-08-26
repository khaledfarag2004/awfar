<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user', 'items.product')->get();
        $totalRevenue = $orders->sum(fn($order) =>
        $order->items->sum(fn($i) => $i->product->price * $i->quantity)
        );
        $weeklyRevenue = $orders->where('created_at', '>=', now()->subWeek())
            ->sum(fn($order) =>
            $order->items->sum(fn($i) => $i->product->price * $i->quantity)
            );

        return view('Dashboard.order.index', compact('orders', 'totalRevenue', 'weeklyRevenue'));
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $order = Order::where('user_id', auth()->user()->id)->where(
            'status',
            0
        )->first();

        if (!empty($order)) {
            $orderDetails = OrderDetail::where('order_id', $order->id)->get();
            $user = User::where('id', $order->user_id)->first();

            
            return view('checkout', [
                'title' => 'Checkout',
                'order' => $order,
                'orderDetails' => $orderDetails,
                'user' => $user,
            ]);
        }
    }
}

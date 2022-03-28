<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    public function store(Request $request, Product $product)
    {
        // ddd($product->id);
        $dateTime = new DateTime();
        if ($request->quantity > $product->stock) {
            return redirect('/products/' . $product->slug)->with('error', 'Stock tidak mencukupi');
        }
        if (empty(Order::where('user_id', Auth::user()->id)->where('status', 0)->first())) {
            // $order = new Order();
            // $order->user_id = Auth::user()->id;
            // $order->time = $dateTime->format('Y-m-d H:i:s');
            // $order->status = 0;
            // $order->total = 0;
            // $order->save();
            Order::insert([
                'user_id' => Auth::user()->id,
                'time' => $dateTime->format('Y-m-d H:i:s'),
                'status' => 0,
                'total' => 0,
            ]);
        }
        $product_id = Product::where('id', $product->id)->first();
        $orderUserStatus = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $detailOrderId = OrderDetail::where('order_id', $orderUserStatus->id)->where('product_id', $product_id->id)->first();
        $tambahOrder = [];
        if (empty($detailOrderId)) {
            // $tambahOrder = new OrderDetail();
            // $tambahOrder->order_id = $orderUserStatus->id;
            // $tambahOrder->product_id = $product_id->id;
            // $tambahOrder->price = $product->price * $request->quantity;
            $tambahOrder = [
                'order_id' => $orderUserStatus->id,
                'product_id' => $product_id->id,
                'price' => $product->price * $request->quantity,
            ];
            if ($request->quantity != 0) {
                $tambahOrder['quantity'] = $request->quantity;
            } else {
                return redirect('/')->with('error', 'Jumlah yang anda pesan minimal 1 barang');
            }
            OrderDetail::insert($tambahOrder);
        } else {
            $detailOrderId->price += $product->price * $request->quantity;
            if ($request->quantity != 0) {
                $detailOrderId->quantity += $request->quantity;
            } else {
                return redirect('/')->with('error', 'Jumlah yang anda pesan minimal 1 barang');
            }
            $detailOrderId->update();
        }
        $orderUserStatus->total += $product->price * $request->quantity;
        $orderUserStatus->update();
        return redirect('/cart')->with('success', 'Barang berhasil ditambahkan ke keranjang');
    }
}

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

        $dateTime = new DateTime();
        if ($request->quantity > $product->stock) {
            return redirect('/products/' . $product->slug)->with('warning', 'Stock tidak mencukupi!');
        }
        if (empty(Order::where('user_id', Auth::user()->id)->where('status', 0)->first())) {

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

            $tambahOrder = [
                'order_id' => $orderUserStatus->id,
                'product_id' => $product_id->id,
                'price' => $product->price * $request->quantity,
            ];
            if ($request->quantity != 0) {
                $tambahOrder['quantity'] = $request->quantity;
            } else {
                return redirect('/products/' . $product->slug)->with('error', 'Jumlah yang anda pesan minimal 1 barang');
            }
            OrderDetail::insert($tambahOrder);
        } else {
            $detailOrderId->price += $product->price * $request->quantity;
            if ($request->quantity != 0) {
                $detailOrderId->quantity += $request->quantity;
            } else {
                return redirect()->back()->with('error', 'Masukkan jumlah pesanan anda!');
            }
            $detailOrderId->update();
        }
        $orderUserStatus->total += $product->price * $request->quantity;
        $orderUserStatus->update();
        return redirect()->back()->with('success', 'Barang berhasil ditambahkan ke keranjang!');
    }
    public function delete(OrderDetail $orderDetail)
    {

        $orderDetailId = OrderDetail::where('id', $orderDetail->id)->first();
        $orderId = Order::where('id', $orderDetailId->order_id)->first();
        $orderId->total -= $orderDetailId->price;
        $orderId->update();

        $orderDetail->delete();
        return redirect('/cart')->with('success', 'Pesanan berhasil dibatalkan!');
    }
}

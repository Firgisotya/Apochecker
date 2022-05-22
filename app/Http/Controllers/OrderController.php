<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.histori_order.index', [
            'orders' => Order::latest()->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $tes = $order->id;
        $coba =  OrderDetail::where('order_id', $tes)->get();
        $orderDetails = $coba->first();
        // ddd($bisa->product);
        return view('admin.histori_order.detail', [
            'order' => $order,
            'orderDetails' => $orderDetails,
            'tes' => $coba,
            'loop' => $coba->count(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $tes = OrderDetail::where('order_id', $id)->get();
        $order = $tes->first();
        // ddd($order->product->name);
        $count = $order->product->stock - $order->quantity;
        Product::find($order->product_id)->update(['stock' => $count]);
        Order::where('id', $id)->update([
            'status' => 2,

        ]);
        return redirect('/admin/order');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OrderDetail::where('order_id', $id)->delete();
        Order::where('id', $id)->delete();
        return redirect('/admin/order');
    }
}

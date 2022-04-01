<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shop', [
            'title' => 'Shop',
            'products' => Product::latest()->paginate(6),
            'categories' => Category::all(),
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
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('single-product', [
            'title' => 'Single Product',
            'product' => $product,
            'related' => Product::where('category_id', $product->category_id)->take(3)->get()->except($product->id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}

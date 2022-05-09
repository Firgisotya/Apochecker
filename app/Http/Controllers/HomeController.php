<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Testimoni;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
    public function home()
    {
        return view('index_2', [
            'title' => 'Home',
            'testimonis' => Testimoni::all(),
            'recents' => News::latest()->take(3)->get(),
            'products' => Product::where('id', 1)->orWhere('id', 12)->orWhere('id', 20)->get(),
        ]);
    }
    public function about()
    {
        return view('about', [
            'title' => 'About',
            'testimonis' => Testimoni::all(),
        ]);
    }
    public function cart()
    {
        // $order = Order::where('user_id', auth()->user()->id)->where(
        //     'status',
        //     0
        // )->first();

        // if (!empty($order)) {
        //     $orderDetails = OrderDetail::where('order_id', $order->id)->get();
        // }
        return view('cart', [
            'title' => 'Cart',
            // 'order' => $order,
            // 'orderDetails' => $orderDetails,
        ]);
    }
    // protected $pesan,  $details = [];
    // public function cart2()
    // {

    //     if (Auth::user()) {
    //         $this->pesan = Order::where('user_id', auth()->user()->id)->where(
    //             'status',
    //             1
    //         )->first();
    //         // ddd($order->id);
    //         if ($this->pesan) {
    //             $this->details = OrderDetail::where('order_id', $this->pesan->id)->get();
    //         }
    //         ddd($this->details);
    //         return view('cart2', [
    //             'title' => 'Cart',
    //             'order' => $this->pesan,
    //             'orderDetails' => $this->details,
    //         ]);
    //     }
    // }
    protected $pesanan, $pesanan_details = [];
    public function cart3()
    {
        if (Auth::user()) {
            $this->pesanan = Order::where('user_id', Auth::user()->id)->where('status', '2')->first();
            if ($this->pesanan) {
                $this->pesanan_details = OrderDetail::where('order_id', $this->pesanan->id)->get();
            }
            // ddd($this->pesanan_details);
        }
        return view('history_order', [
            'title' => 'Cart',
            'order' => $this->pesanan,
            'orderDetails' => $this->pesanan_details
        ]);
    }
    public function cart2()
    {
        if (Auth::user()) {
            $this->pesanan = Order::where('user_id', Auth::user()->id)->where('status', '1')->first();
            if ($this->pesanan) {
                $this->pesanan_details = OrderDetail::where('order_id', $this->pesanan->id)->get();
            }
            // ddd($this->pesanan_details);
        }
        return view('cart2', [
            'title' => 'Cart',
            'order' => $this->pesanan,
            'orderDetails' => $this->pesanan_details
        ]);
    }
    public function contact()
    {
        return view('contact', [
            'title' => 'Contact',
        ]);
    }

    public function shop()
    {
    }

    public function singleProduct()
    {
        return view('single-product', [
            'title' => 'Single Product',
        ]);
    }
    public function checkout()
    {
        return view('checkout', [
            'title' => 'Checkout',
            'user' => Auth::user(),

        ]);
    }
    public function profile()
    {
        return view('profile', [
            'title' => 'Profile',
            'user' => Auth::user(),
        ]);
    }
    public function validation(Request $request)
    {
        ddd($request);
        return view('validation', [
            'title' => 'Validation',
        ]);
    }
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'image' => 'image|file',
        ]);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('user');
            // $validateData['image'] = $request->file('image')->store('user', 'public');
        }
        User::where('id', $id)
            ->update($validateData);
        return redirect('/profile')->with('success', 'Profile telah diupdate!');
    }
    public function payments()
    {
        return view('payments', [
            'title' => 'Payments',
            'user' => Auth::user(),
        ]);
    }
    public function buktiPembayaran(Request $request)
    {
        $validateData = $request->validate([
            'bukti_pembayaran' => 'required|image',
        ]);
        if ($request->file('bukti_pembayaran')) {
            $validateData['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        }
        Order::where('user_id', Auth::user()->id)->where('status', 0)->update([
            'status' => 1,
            'bukti_pembayaran' => $validateData['bukti_pembayaran'],
        ]);
        return redirect('/cart2')->with('success', 'Bukti pembayaran telah diupload!');
    }
}

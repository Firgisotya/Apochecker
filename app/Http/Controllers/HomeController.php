<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
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
    public function index()
    {
        return view(
            'admin.index',
            [
                'users' => User::count(),
                'categories' => Category::count(),
                'products' => Product::count(),
                'orders' => Order::count(),
                'news' => News::count(),
                'testimonies' => Testimoni::count(),
                'gopay1' => Order::where('payments', 'Gopay')->count(),
                'gopay2' => Order::where('payments', 'Gopay')->sum('total'),
                'bri1' => Order::where('payments', 'BRI')->count(),
                'bri2' => Order::where('payments', 'BRI')->sum('total'),
                'bca1' => Order::where('payments', 'BCA')->count(),
                'bca2' => Order::where('payments', 'BCA')->sum('total'),
                'linkaja1' => Order::where('payments', 'LinkAja')->count(),
                'linkaja2' => Order::where('payments', 'LinkAja')->sum('total'),
                'mandiri1' => Order::where('payments', 'Mandiri')->count(),
                'mandiri2' => Order::where('payments', 'Mandiri')->sum('total'),
                'shopeepay1' => Order::where('payments', 'Shopeepay')->count(),
                'shopeepay2' => Order::where('payments', 'Shopeepay')->sum('total'),
            ]
        );
    }
    public function cart()
    {
        $order = Order::where('user_id', auth()->user()->id)->where(
            'status',
            0
        )->first();

        if (!empty($order)) {
            $orderDetails = OrderDetail::where('order_id', $order->id)->get();
            $user = User::where('id', $order->user_id)->first();

            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => $order->id,
                    'gross_amount' => $order->total,
                ),
                'customer_details' => array(
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);
        }

        return view('cart', [
            'title' => 'Cart',
            'order' => $order,
            'orderDetails' => $orderDetails,
            'user' => $user,
            'snapToken' => $snapToken,
        ]);
    }
  
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
        return redirect('/process')->with('success', 'Bukti pembayaran telah diupload!');
    }
}

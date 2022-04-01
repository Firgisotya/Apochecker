<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Order;
use App\Models\Testimoni;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

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

        return view('cart', [
            'title' => 'Cart',
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
    public function validation()
    {
        return view('validation', [
            'title' => 'Validation',
        ]);
    }
}

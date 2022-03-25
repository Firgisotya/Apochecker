<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('index_2', [
            'title' => 'Home',
            'testimonis' => Testimoni::all(),
            'recents' => News::latest()->take(3)->get(),
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
        ]);
    }
}

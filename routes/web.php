<?php

use App\Models\News;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardNewsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\tesController;
use App\Models\Testimoni;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route untuk Homepage
Route::get('/', [HomeController::class, 'home']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/cart', [HomeController::class, 'cart']);
Route::get('/cart2', [HomeController::class, 'cart2']);
Route::get('/checkout', [HomeController::class, 'checkout']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::resource('/news', NewsController::class);
Route::resource('/products', ProductController::class);
Route::post('/pesan/{product}', [PesanController::class, 'store']);
Route::get('/profile', [HomeController::class, 'profile']);
Route::put('/profile/{id}', [HomeController::class, 'update']);
Route::delete('/order/{order_detail}', [PesanController::class, 'delete']);
Route::resource('/pesanan', PesananController::class);
Route::resource('/user', UserController::class);
Route::get('/payments', [HomeController::class, 'payments']);
Route::post('buktiPembayaran', [HomeController::class, 'buktiPembayaran']);



Auth::routes();



Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', function () {
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
    })->name('index');
    Route::resource('/admin/product', ObatController::class)->except('show');
    Route::resource('/admin/category', CategoryController::class)->except('show');
    Route::resource('/admin/news', DashboardNewsController::class);
    Route::resource('/admin/user', UserController::class)->except('show');
    Route::get('/admin/histori_stok', [StokController::class, 'index']);
    Route::get('/admin/stok/create', [StokController::class, 'create']);
    Route::post('/admin/stok', [StokController::class, 'store']);
    Route::delete('/admin/histori_stok/{id}', [StokController::class, 'destroy']);
    Route::resource('/admin/order', OrderController::class);
});

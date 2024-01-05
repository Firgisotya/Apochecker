<?php

use App\Models\News;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Testimoni;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\DashboardNewsController;
use App\Http\Controllers\DashboardContactController;
use App\Http\Controllers\ExpiredController;

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
Route::post('/cart', [HomeController::class, 'cart']);
Route::get('/process', [HomeController::class, 'cart2']);
Route::get('/history_order', [HomeController::class, 'cart3']);
// Route::get('/checkout', [HomeController::class, 'checkout']);
Route::get('/checkout', [CheckoutController::class, 'index']);
Route::resource('/contact', ContactController::class);
Route::resource('/news', NewsController::class);
Route::resource('/products', ProductController::class);
Route::post('/pesan/{product}', [PesanController::class, 'store'])->middleware('auth');
Route::get('/profile', [HomeController::class, 'profile']);
Route::put('/profile/{id}', [HomeController::class, 'update']);
Route::delete('/order/{order_detail}', [PesanController::class, 'delete']);
Route::resource('/pesanan', PesananController::class);
Route::resource('/user', UserController::class);
Route::get('/payments', [HomeController::class, 'payments']);
Route::post('buktiPembayaran', [HomeController::class, 'buktiPembayaran']);
Route::resource('/testimoni', TestimoniController::class);



Auth::routes();


// Route untuk Dashboard
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('index');
    Route::resource('/admin/product', ObatController::class)->except('show');
    Route::resource('/admin/category', CategoryController::class)->except('show');
    Route::resource('/admin/news', DashboardNewsController::class);
    Route::resource('/admin/user', UserController::class)->except('show');
    Route::get('/admin/histori_stok', [StokController::class, 'index']);
    Route::get('/admin/stok/create', [StokController::class, 'create']);
    Route::post('/admin/stok', [StokController::class, 'store']);
    Route::delete('/admin/histori_stok/{id}', [StokController::class, 'destroy']);
    Route::resource('/admin/order', OrderController::class);
    Route::resource('/admin/contact', DashboardContactController::class);
    Route::resource('/admin/product/expired', ExpiredController::class)->only(['edit', 'update']);
});

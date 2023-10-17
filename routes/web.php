<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\toSql;

Route::get('/login', function () {
    return view('dashboard.login');
});

Route::post('/admin/login', [DashboardController::class, 'login']);
Route::get('/admin/registration', [RegisterController::class, 'registration']);
Route::post('/admin/store', [RegisterController::class, 'store']);
Route::post('/admin/review', [DashboardController::class, 'adminReview']);

Route::get('/admin', [DashboardController::class, 'admin'])->middleware('admin')->middleware('admin');
Route::get('/adminSessionDestroy', [DashboardController::class, 'adminSessionDestroy'])->middleware('admin');
Route::get('/admin/orders', [DashboardController::class, 'orders'])->middleware('admin');
Route::get('/admin/orderDetail/{id}', [DashboardController::class, 'orderDetail'])->middleware('admin');
Route::patch('/admin/orderUpdate/{id}', [DashboardController::class, 'orderUpdate'])->middleware('admin');
Route::get('/admin/logout', [DashboardController::class, 'logout'])->middleware('admin');

Route::post('/admin/forgotPassword', [DashboardController::class, 'forgotPassword'])->middleware('admin');
Route::get('/admin/forgotPassword', function () {
    return view('dashboard.forgotPassword');
})->middleware('admin');

Route::get('/admin/products', [DashboardController::class, 'products'])->middleware('admin');
Route::get('/admin/productsEdit/{id}', [DashboardController::class, 'productsEdit'])->middleware('admin');
Route::post('/admin/productsUpdate/{id}', [DashboardController::class, 'productsUpdate'])->middleware('admin');
Route::get('/admin/addProduct', [DashboardController::class, 'addProduct'])->middleware('admin');
Route::post('/admin/addnewProduct', [DashboardController::class, 'addnewProduct'])->middleware('admin');


Route::delete('admin/productDestroy/{post}', [DashboardController::class, 'productDestroy'])->middleware('admin');

// products
Route::get('/', [ProductController::class, 'index']);
Route::get('detail/{product:id}', [ProductController::class, 'detail']);
Route::get('product/order', [ProductController::class, 'productOrder']);
Route::get('product/cartDelete', [ProductController::class, 'cartOrderDelete']);

Route::get('product/cart', [ProductController::class, 'cart']);
Route::get('product/checkout', [ProductController::class, 'checkout']);
Route::post('product/processCheckout', [ProductController::class, 'processCheckout']);
Route::get('contactus', [ProductController::class, 'contactus']);
Route::post('contactus', [ProductController::class, 'contactuspost']);

Route::get('/session', function () {
    if (session()->has('cart')) {
        $count = count(session('cart'));
        echo $count . "<br>";
        print_r(session()->all());
    } else {
        echo "session is NOT available.";
    }
});

Route::get('/sessionDestroy', [ProductController::class, 'sessionDestroy']);

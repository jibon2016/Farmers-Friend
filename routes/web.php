<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductSearchController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OfferController;

Route::get('/',         [HomeController::class, 'index'])->name('home');

// Admin Route

// Route::get('dashboard',       [DashboardController::class, 'index'])->name('dashboard');
// Route::get('admin/login',     [LoginController::class, 'showLoginForm'] )->name('admin.login');
// Route::post('admin/login',    [LoginController::class, 'Login'] )->name('admin.login.confirm');
// Route::get('admin/logout',    [LoginController::class, 'logout'] )->name('admin.logout');

// Route::resource('products',   Admin\ProductsController::class);
// Route::resource('categories', Admin\CategoriesController::class);

Route::group(['prefix' => 'admin'], function(){

    Route::group(['middleware' => 'admin.guest'], function(){
        Route::get('/login',     [LoginController::class, 'showLoginForm'] )->name('admin.login');
        Route::post('/login',    [LoginController::class, 'Login'] )->name('admin.login');
    });

    Route::group(['middleware' => 'admin.auth'], function(){
    Route::get('/dashboard',        [DashboardController::class, 'index'])->name('dashboard');
    Route::get('logout',            [LoginController::class, 'logout'] )->name('admin.logout');
    Route::resource('products',     Admin\ProductsController::class);
    Route::resource('categories',   Admin\CategoriesController::class);
    Route::get('order',             [AdminOrderController::class, 'index'])->name('admin.orders');
    Route::get('order/{id}',        [AdminOrderController::class, 'show'])->name('orders.show');
    Route::delete('order/{id}',     [AdminOrderController::class, 'destroy'])->name('orders.destroy');

    });
});


Route::group(['middleware' => 'auth'],function (){

    Route::get('product/{slug}',[OrderController::class, 'index'])->name('product.order');
    Route::get('product/offer/{slug}', [OfferController::class, 'index'])->name('product.offer');



    // SSLCOMMERZ Start
    Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
    Route::post('/checkout', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

    Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
    Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

    Route::post('/success', [SslCommerzPaymentController::class, 'success']);
    Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
    Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

    Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
    //SSLCOMMERZ END

});


    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('category/{id}',   [CategoryController::class, 'index'])->name('category');
    Route::post('productall',     [ProductSearchController::class, 'search'])->name('productall');
    Route::get('verify',         [SmsController::class, 'index'])->name('verify');
    Route::post('verify',        [SmsController::class, 'store']);
    Route::get('/verify/user/document', [SmsController::class, 'showDocument'])->name('document.verify');
    Route::post('/verify/documet', [SmsController::class, 'StoreDocumet'])->name('document.store');
    Auth::routes();









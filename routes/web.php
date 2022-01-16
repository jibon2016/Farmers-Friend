<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DemandController;
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
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\UserOrderOfferController;

Route::get('/',         [HomeController::class, 'index'])->name('home');


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
    Route::get('order/approve/{id}',[AdminOrderController::class, 'approve'])->name('order.approve');
    Route::delete('order/{id}',     [AdminOrderController::class, 'destroy'])->name('orders.destroy');

    Route::get('demand',             [DemandController::class, 'index'])->name('admin.demand');
    Route::get('demand/{id}',        [DemandController::class, 'show'])->name('demand.show');
    Route::get('demand/approve/{id}',[DemandController::class, 'approve'])->name('demand.approve');
    Route::delete('demand/{id}',     [DemandController::class, 'destroy'])->name('demand.destroy');


    Route::get('user',              [UserController::class, 'index'])->name('users');
    Route::get('user/{id}',         [UserController::class, 'show'])->name('users.show');
    Route::get('unverified',        [UserController::class, 'notVerified'])->name('unverified');
    Route::get('unverified/{id}',   [UserController::class, 'showNotVerified'])->name('show.unverified');
    Route::get('nid/{id}',          [UserController::class, 'nidApprove'])->name('nid.approve');


    });
});

//Admin Login
Route::group(['middleware' => 'auth'],function (){

    Route::get('product/{slug}',        [OrderController::class, 'index'])->name('product.order');
    Route::get('product/offer/{slug}',  [OfferController::class, 'index'])->name('product.offer');
    Route::post('order/confirm',        [OfferController::class, 'confirm'])->name('order.confirm');
    Route::get('user/invoice/{id}',     [InvoiceController::class, 'index'])->name('user.invoice');
    Route::post('product/offer',        [OfferController::class, 'create'])->name('product.offer.create');
    Route::get('offer/invoice/{id}',    [OfferController::class, 'invoice'])->name('offer.invoice');
    Route::get('user/product/{id}',     [UserOrderOfferController::class,'userOrderOffer'])->name('user.order.offer');
    Route::get('user/offer/{id}',       [UserOrderOfferController::class,'showUserOffer'])->name('user.single.offer');
    Route::get('user/order/{id}',       [UserOrderOfferController::class,'showUserOrder'])->name('user.single.order');
    Route::get('all/{id}/offer-order',  [UserOrderOfferController::class,'allOfferAndOrder'])->name('all.offer.order');





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

//All guest User
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('category/{id}',   [CategoryController::class, 'index'])->name('category');
    Route::post('productall',     [ProductSearchController::class, 'search'])->name('productall');
    Route::get('verify',         [SmsController::class, 'index'])->name('verify');
    Route::post('verify',        [SmsController::class, 'store']);
    Route::get('/verify/user/document', [SmsController::class, 'showDocument'])->name('document.verify');
    Route::post('/verify/documet', [SmsController::class, 'StoreDocumet'])->name('document.store');
    Auth::routes();









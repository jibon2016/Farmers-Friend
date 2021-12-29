<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductSearchController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Auth;

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
    Route::get('/dashboard',       [DashboardController::class, 'index'])->name('dashboard');
    Route::get('logout',    [LoginController::class, 'logout'] )->name('admin.logout');
    Route::resource('products',   Admin\ProductsController::class);
    Route::resource('categories', Admin\CategoriesController::class);


    });
});


Route::group(['middleware' => 'auth'],function (){
    Route::get('product/{slug}',[OrderController::class, 'index'])->name('product.order');



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
Route::get('verify',         [SmsController::class, 'index']);
Route::post('verify',        [SmsController::class, 'store']);

Auth::routes();









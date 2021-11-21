<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductsController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;



Route::get('/',  [HomeController::class, 'index'])->name('home');


Route::get('login',   [LoginController::class, 'index'] )->name('login');
Route::post('login',  [LoginController::class, 'authenticate'] )->name('login.confirm');
Route::get('logout',  [LoginController::class, 'logout'] )->name('logout');


Route::group(['middleware' => 'auth'],function (){

  Route::get('dashboard',  [DashboardController::class, 'index'])->name('dashboard');

  Route::resource('products', Admin\ProductsController::class);

});
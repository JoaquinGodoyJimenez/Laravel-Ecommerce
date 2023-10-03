<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('ecommerce.index');
});

Route::get('/cart', function () {
    return view('ecommerce.cart');
});

Route::get('/checkout', function () {
    return view('ecommerce.checkout');
});

Route::get('/contact', function () {
    return view('ecommerce.contact');
});

Route::get('/login', function () {
    return view('ecommerce.login');
});

Route::get('/account', function () {
    return view('ecommerce.myaccount');
});

Route::get('/productdetail', function () {
    return view('ecommerce.productdetail');
});

Route::get('/productlist', function () {
    return view('ecommerce.productlist');
});

Route::get('/wishlist', function () {
    return view('ecommerce.wishlist');
});
<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/my-account', function () {
    return view('my_account_info');
});


Route::get('/my-account/address', function () {
    return view('my_account_address');
});


Route::get('/login', function () {
    return view('login');
});

Route::get('/retrieval', function () {
    return view('password_retrieval');
});


Route::get('/registration', function () {
    return view('registration');
});


Route::get('/my-account/feedback', function () {
    return view('my_account_feedback');
});


Route::get('/my-account/become-seller', function () {
    return view('my_account_seller');
});


Route::get('/my-account/chosen', function () {
    return view('my_account_chosen');
});

Route::get('/my-account/my-orders', function () {
    return view('my_account_orders');
});

Route::get('/my-account/my-items', function () {
    return view('my_account_seller_items');
});


Route::get('/my-account/my-statistics', function () {
    return view('my_account_statistics');
});


Route::get('/my-account/my-items-order', function () {
    return view('my_account_seller_orders');
});

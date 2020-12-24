<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
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
})->name('home');


Route::get('/my-account', function () {
    return view('my_account_info');
})->name('info')->middleware('auth');


Route::get('/my-account/address', function () {
    return view('my_account_address');
})->name('address')->middleware('auth');;


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [SessionController::class, 'store'])->name('login');

Route::get('/retrieval', function () {
    return view('password_retrieval');
})->name('reset_password');


Route::get('/registration', function () {
    return view('registration');
})->name('registration');

Route::post('/registration', [RegistrationController::class, 'store'])->name('registration');


Route::get('/my-account/feedback', function () {
    return view('my_account_feedback');
})->name('feedback')->middleware('auth');


Route::get('/my-account/become-seller', function () {
    return view('my_account_seller');
})->name('seller');


Route::get('/my-account/chosen', function () {
    return view('my_account_chosen');
})->name('chosen');

Route::get('/my-account/my-orders', function () {
    return view('my_account_orders');
})->name('orders')->middleware('auth');

Route::get('/my-account/my-items', function () {
    return view('my_account_seller_items');
})->name('items')->middleware('auth');


Route::get('/my-account/my-statistics', function () {
    return view('my_account_statistics');
})->name('statistics')->middleware('auth');


Route::get('/my-account/my-items-order', function () {
    return view('my_account_seller_orders');
})->name('iorder')->middleware('auth');


Route::get('/cart', function () {
    return view('cart');
})->name('cart');

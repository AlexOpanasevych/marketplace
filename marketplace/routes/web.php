<?php

use App\Chosen;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChosenController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use App\Models\Order;
use App\Models\OrderedProduct;
use App\Seller;
use Illuminate\Support\Facades\Auth;
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
    $product_list = \App\Models\Product::all();
    $category_list = \App\Models\Category::all();
    $chosen_list = empty(Chosen::all()) ? null : Chosen::all();
    return view('welcome', ['product_list' => $product_list,
        'category_list' => $category_list,
        'chosen_list' => $chosen_list]);
})->name('home');

Route::get('/my-account', function () {
    $category_list = \App\Models\Category::all();
    $seller = Seller::where('user_id', '=', Auth::user()->id)->get()->first();
    return view('my_account_info', ['seller' => $seller, 'category_list' => $category_list]);
})->name('info')->middleware('auth');


Route::get('/my-account/address', function () {
    $category_list = \App\Models\Category::all();
    $seller = Seller::where('user_id', '=', Auth::user()->id)->get()->first();
    return view('my_account_address', ['seller' => $seller, 'category_list' => $category_list]);
})->name('address')->middleware('auth');;


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [SessionController::class, 'store'])->name('login');
Route::get('/logout', function () {
    Auth::logout();
    return view('welcome');
});

Route::get('/forgot-password', function () {
    return view('password_retrieval');
})->name('reset-password');


Route::get('/registration', function () {
    return view('registration');
})->name('registration');

Route::post('/registration', [RegistrationController::class, 'store'])->name('registration');


Route::get('/my-account/feedback', function () {
    $category_list = \App\Models\Category::all();
    $seller = Seller::where('user_id', '=', Auth::user()->id)->get()->first();
    return view('my_account_feedback', ['seller' => $seller, 'category_list' => $category_list]);
})->name('feedback')->middleware('auth');


Route::get('/my-account/become-seller', function () {
    $category_list = \App\Models\Category::all();
    return view('my_account_seller', [
        'seller' => Seller::where('user_id', '=', Auth::user()->id)->get()->first(),
        'category_list' => $category_list
    ]);
})->name('seller');
Route::post('/my-account/become-seller', [SessionController::class, 'becomeSeller'])->name('seller');


Route::get('/my-account/chosen', function () {
    $category_list = \App\Models\Category::all();
    $seller = Seller::where('user_id', '=', Auth::user()->id)->get()->first();

    $chosen_list = Chosen::where('user_id', '=', Auth::user()->id);

    return view('my_account_chosen', [
        'seller' => $seller,
        'chosen_list' => $chosen_list,
        'category_list' => $category_list
    ]);
})->name('chosen');

Route::get('/my-account/my-orders', function () {
    $seller = Seller::where('user_id', '=', Auth::user()->id)->get()->first();
    $category_list = \App\Models\Category::all();
    $orders = Order::where('user_id', '=', Auth::user()->id)->get();
    $orderedProductsList = [];
    foreach ($orders as $order) {
        $orderedProducts = OrderedProduct::leftJoin('orders', function ($join) use ($order) {
            $join->on('ordered_product.order_id', '=', $order->id);
        })->where('order_id', '=', $order->id)->get();
        array_push($orderedProductsList, $orderedProducts);
    }

    return view('my_account_orders', [
        'seller' => $seller,
        'orders_list' => $orderedProductsList,
        'category_list' => $category_list]);
})->name('orders')->middleware('auth');

Route::get('/my-account/my-items', function () {
    $category_list = \App\Models\Category::all();
    $seller = Seller::where('user_id', '=', Auth::user()->id)->get()->first();
    return view('my_account_seller_items', ['seller' => $seller, 'category_list' => $category_list]);
})->name('items')->middleware('auth');


Route::get('/my-account/my-statistics', function () {
    $category_list = \App\Models\Category::all();
    $seller = Seller::where('user_id', '=', Auth::user()->id)->get()->first();
    return view('my_account_statistics', ['seller' => $seller, 'category_list' => $category_list]);
})->name('statistics')->middleware('auth');


Route::get('/my-account/my-items-order', function () {
    $category_list = \App\Models\Category::all();
    $seller = Seller::where('user_id', '=', Auth::user()->id)->get()->first();
    return view('my_account_seller_orders', ['seller' => $seller, 'category_list' => $category_list]);
})->name('iorder')->middleware('auth');


Route::get('/cart', function () {
    $category_list = \App\Models\Category::all();
    $cart_products = \App\User::where('id', '=', Auth::user()->id)->get()->first()->cart()->first()->cart_product()->get();
    $overall_price = 0;
    foreach($cart_products as $cart_product) {
        $overall_price += $cart_product->product->price;
    }
    return view('cart', [
        'category_list' => $category_list,
        'cart_products' => $cart_products,
        'overall_price' => $overall_price]);
})->name('cart');

Route::get('/cart/confirm', function () {
    $category_list = \App\Models\Category::all();
    return view('confirm_order', ['category_list' => $category_list]);
})->name('cart-confirm');


//to do!!!!!!!!!!!!!!!!
Route::post('/cart/add', function ($cart_product) { //increment product_number in cart_product
    $category_list = \App\Models\Category::all();
    return view('confirm_order', ['category_list' => $category_list]);
})->name('cart-confirm');

Route::post('/cart/remove', function ($cart_product) { //remove cart_product entry completely
    $category_list = \App\Models\Category::all();
    return view('confirm_order', ['category_list' => $category_list]);
})->name('cart-confirm');
//to do!!!!!!!!!!!!!!!!

Route::post('/my-account/change-user-data', [SessionController::class, 'changeUserData'])->name('change-udata');
Route::post('/my-account/change-password', [SessionController::class, 'changePassword'])->name('change-password');
Route::post('/my-account/change-contacts', [SessionController::class, 'changeContacts'])->name('change-contacts');
Route::post('/forgot-password', [SessionController::class, 'resetPassword'])->name('reset-password');

// Password reset link request routes...
Route::get('password/email', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.email');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@postReset')->name('password.reset');

Route::post('/my-account/address', [SessionController::class, 'changeAddress'])->name('address');
Route::post('/my-account/email', [SessionController::class, 'sendFeedback'])->name('feedback');

Route::get('/cart/add/{id}', [CartController::class, 'addToCart'])->name('add-cart');
Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('remove-cart');

Route::get('/my-account/chosen/remove/{id}', [ChosenController::class, 'removeFromChosen'])->name('remove-chosen');
Route::get('/my-account/chosen/add/{id}', [ChosenController::class, 'addToChosen'])->name('add-chosen');


Route::get('/{id}', function ($id) {
    $product_list = \App\Models\Category::where('id', '=', $id)->get()->first()->product()->get();
    $category_list = \App\Models\Category::all();
    $chosen_list = empty(Chosen::all()) ? null : Chosen::all();
    return view('welcome', [
        'product_list' => $product_list,
        'category_list' => $category_list,
        'chosen_list' => $chosen_list,
        'chosen_id' => $id,
        ]);
})->name('home-category');

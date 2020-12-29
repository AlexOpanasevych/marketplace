<?php

use App\Chosen;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChosenController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderedProduct;
use App\Models\Product;
use App\Seller;
use App\User;
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
    return view('welcome', ['product_list' => $product_list, 'category_list' => $category_list]);
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
    $seller_products = Product::where('seller_id', '=', $seller->id)->get();

    return view('my_account_seller_items', [
        'seller' => $seller,
        'seller_products' => $seller_products,
        'category_list' => $category_list
    ]);
})->name('items')->middleware('auth');

Route::get('/add-product', function () {

    $category_list = \App\Models\Category::all();


    return view('add_product', ['category_list' => $category_list]);
})->name('add-product');

Route::get('/remove-product/{id}', function ($id) {

    Product::destroy($id);


    return back();
})->name('remove-product');

Route::get('/product/{id}', function ($id) {
    return view('product', [
        'product' => Product::find($id),
    ]);
})->name('product');

Route::get('/my-account/my-statistics', function () {
    $category_list = \App\Models\Category::all();
    $seller = Seller::where('user_id', '=', Auth::user()->id)->get()->first();
    return view('my_account_statistics', ['seller' => $seller, 'category_list' => $category_list]);
})->name('statistics')->middleware('auth');


Route::get('/my-account/my-items-order', function () {
    $category_list = \App\Models\Category::all();
    $seller = Seller::where('user_id', '=', Auth::user()->id)->get()->first();

    $seller_products = Product::where('seller_id', '=', $seller->id)->leftJoin('ordered_products', 'products.id', '=', 'ordered_products.id')->get();
//    foreach($seller_products as $product) {
//        $order_number += $product->ordered_number;
//    }
    $orders = Order::leftJoin('users', function($join) {
        $join->on('users.id', '=', 'orders.user_id');
    })->get();
    if(!empty($orders)) {
        $orders = $orders->whereIn('id', '=', $seller_products->values('order_id'));
    }
    return view('my_account_seller_orders', ['seller' => $seller, 'category_list' => $category_list, 'seller_products' => $seller_products, 'orders' => $orders]);
})->name('iorder')->middleware('auth');


Route::get('/cart', function () {
    $category_list = \App\Models\Category::all();
    return view('cart', ['category_list' => $category_list]);
})->name('cart');

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


Route::post('/add-product', function (\Illuminate\Support\Facades\Request $request) {


    $product_name = $request->product_name;
    $product_exists = Product::where('product_name', '=', $product_name);
    if(!isset($product_exists)) {
        $product_quantity = $request->product_quantity;
        $product_price = $request->product_price;
        $product_descripton = $request->product_descripton;
        $product_photo = $request->product_photo;
        $product_category = $request->product_category;

        $category = \App\Models\Category::where('category_name', '=', $product_category);

        $seller = Seller::where('user_id', '=', Auth::user()->id);

        $product = new Product();
        $product->quantity = $product_quantity;
        $product->price = $product_price;
        $product->description = $product_descripton;
        $product->photo_path = $product_photo;
        $product->category_id = $category->id;
        $product->seller_id = $seller->id;
        $product->save();

        return back();

    }
    else {
        return back()->withErrors([
            'product.exists' => 'Продукт з заданим ім\'ям існує',
        ]);
    }
})->name('add-product');


Route::get('/superuser-main', function () {

    $orders = Order::all();
    $sum  = 0;
    foreach ($orders as $order) {
        $ordered_products = $order->ordered_product();
        foreach ($ordered_products as $ordered_product) {
            $products = $ordered_product->product();
            foreach ($products as $product) {
                $sum += $product->price;
            }
        }
    }

    return view('superuser.superuser_main', [
        'category_list' => \App\Models\Category::all(),
        'user_count' => \App\User::all()->count(),
        'seller_count' => Seller::all()->count(),
        'order_count' => Order::all()->count(),
        'products_count' => Product::all()->count(),
        'sum_orders' => $sum
    ]);
});

Route::get('/superuser-requests', function () {
   return view('superuser.superuser_seller_requests', [
       'category_list' => \App\Models\Category::all(),
       'requests' => \App\SellerRequest::all(),
   ]);
});

Route::get('/superuser-items', function () {
    return view('superuser.superuser_all_items', [
        'category_list' => \App\Models\Category::all(),
        'products' => Product::all(),
    ]);
});

Route::get('/superuser-users', function () {
    return view('superuser.superuser_all_users', [
        'category_list' => \App\Models\Category::all(),
        'users' => \App\User::all(),
    ]);
});

Route::get('/remove-user/{id}', function ($id) {
    if(Auth::user()->id !== $id) {
        User::destroy($id);
    }
        return back();
})->name('remove-user');

Route::get('/block-user/{id}', function ($id) {

    if(Auth::user()->id !== $id) {
        User::destroy($id);
    }

    return back();
})->name('block-user');


Route::get('/superuser-sellers', function () {
    return view('superuser.superuser_all_sellers', [
        'category_list' => \App\Models\Category::all(),
        'sellers' => \App\Seller::all(),
    ]);
});

Route::get('/superuser-orders', function () {
    return view('superuser.superuser_all_orders', [
        'category_list' => \App\Models\Category::all(),
        'orders' => Order::all(),
    ]);
});


Route::get('/ban-seller/{id}', function ($id) {
    Seller::destroy($id);
    return back();
})->name('ban-seller');

Route::get('/ban-products/{id}', function ($id) {
    $products = Product::where('seller_id', '=', $id);
    foreach ($products as $i) {
        Product::destroy($i->id);
    }
    return back();
})->name('ban-products');

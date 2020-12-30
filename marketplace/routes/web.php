<?php

use App\Chosen;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChosenController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderedProduct;
use App\Models\Product;
use App\Seller;
use App\User;
use Illuminate\Http\Request;
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
    $products_id = [];
    foreach(\App\Models\CartProduct::all() as $item) {
        array_push($products_id, $item->product_id);
    }

    $category_list = \App\Models\Category::all();
    $chosen_list = empty(Chosen::all()) ? null : Chosen::all();
    return view('welcome', [
        'product_list' => $product_list,
        'category_list' => $category_list,
        'chosen_list' => $chosen_list,
        'products_id' => $products_id]);
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
    $seller = Auth::user()->seller()->first();
    $orders = Auth::user()->order()->get();
    $orderedProductsList = [];
    $productsList = [];
    $array_order_prices = [];
    foreach ($orders as $order) {
        $orderedProducts = $order->ordered_product()->get();
        $products = [];
        $productsprices = [];
        foreach ($orderedProducts as $orderedProduct) {
            array_push($array_order_prices, $orderedProduct->product()->first()->price);
            array_push($products, $orderedProduct->product()->first());
        }
        array_push($orderedProductsList, $orderedProducts);
        array_push($productsList, $products);
        array_push($array_order_prices, $productsprices);
    }
    return view('my_account_orders', [
        'seller' => $seller,
        'orders_list' => $orders,
        'ordered_products_list' => $orderedProductsList,
        'products_list' => $productsList,
        'category_list' => \App\Models\Category::all(),
        'prod_prices' => $array_order_prices]);
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
        'item' => Product::find($id),
        'product_comments' => \App\Models\Comment::where('product_id', '=', $id),
        'category_list' => \App\Models\Category::all(),
    ]);
})->name('product');

Route::get('/my-account/my-statistics', function () {
    $category_list = \App\Models\Category::all();
    $seller = Seller::where('user_id', '=', Auth::user()->id)->get()->first();
    return view('my_account_statistics', ['seller' => $seller, 'category_list' => $category_list]);
})->name('statistics')->middleware('auth');


Route::get('/my-account/my-items-order', function () {
    $category_list = \App\Models\Category::all();
    $seller = Auth::user()->seller()->first();
    $seller_products = Auth::user()->seller()->first()->product()->get();

    $orderedProducts = [];
    $orders = [];
    foreach($seller_products as $pr) {
        $orderedPr = $pr->ordered_product()->get();
//        dd(is_null($orderedPr->first()));
        array_push($orders, $orderedPr->first()->order()->first());
        array_push($orderedProducts, $orderedPr);
    }
    return view('my_account_seller_orders', ['seller' => $seller, 'category_list' => $category_list, 'seller_products' => $seller_products,
        'orders' => $orders, 'ordered_products' => $orderedProducts]);
})->name('iorder')->middleware('auth');


Route::get('/cart', function () {
    $category_list = \App\Models\Category::all();
    $cart_products = \App\User::where('id', '=', Auth::user()->id)->get()->first()->cart()->first()->cart_product()->get();
    $overall_products = 0;
    $overall_price = 0;
    foreach($cart_products as $cart_product) {
        $overall_price += $cart_product->product->price * $cart_product->product_number;
        $overall_products += $cart_product->product_number;
    }
    return view('cart', [
        'category_list' => $category_list,
        'cart_products' => $cart_products,
        'overall_price' => $overall_price,
        'overall_products' => $overall_products]);
})->name('cart');

Route::get('/cart/confirm', function () {
    $category_list = \App\Models\Category::all();
    return view('confirm_order', ['category_list' => $category_list]);
})->name('cart-confirm');

Route::post('/cart/confirm', function (Request $request) {
    if(Auth::check()) {
        $cart_id = Auth::user()->cart()->first()->id;
        $cart_products = \App\Models\CartProduct::where('cart_id', '=', $cart_id);

        $newOrder = new Order;
        $newOrder->user_id = Auth::user()->id;
        $newOrder->status_id = 1;
        $newOrder->save();

        $cart_products_get = $cart_products->get();
        foreach ($cart_products_get as $prod) {
            $ord_prod = new OrderedProduct();
            $ord_prod->order_id = $newOrder->id;
            $ord_prod->product_id = $prod->product_id;
            $ord_prod->ordered_number = $prod->product_number;
            $ord_prod->save();
        }

        $cart_products->delete();
    }
    return redirect()->route('home');
})->name('home-confirm');

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
Route::get('/cart/increment/{id}', [CartController::class, 'incrementInCart'])->name('increment-cart');
Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('remove-cart');

Route::get('/my-account/chosen/remove/{id}', [ChosenController::class, 'removeFromChosen'])->name('remove-chosen');
Route::get('/my-account/chosen/add/{id}', [ChosenController::class, 'addToChosen'])->name('add-chosen');

Route::get('/{id}', function ($id) {
    $category = Category::find($id);
    if(!is_null($category))
        $product_list = Category::find($id)->product()->get();
    else $product_list = new \Illuminate\Database\Eloquent\Collection();
    $chosen_list = empty(Chosen::all()) ? null : Chosen::all();

    $category_list = \App\Models\Category::all();
    $products_id = [];
    foreach(\App\Models\CartProduct::all() as $item) {
        array_push($products_id, $item->product_id);
    }
    return view('welcome', [
        'product_list' => $product_list,
        'category_list' => $category_list,
        'chosen_list' => $chosen_list,
        'chosen_id' => $id,
        'products_id' => $products_id
        ]);
})->name('home-category');

Route::post('/add-product', function (Request $request){
    $product_name = $request->product_name;
//    if(!isset($product_exists)) {
        $product_quantity = $request->product_quantity;
        $product_price = $request->product_price;
        $product_descripton = $request->product_descripton;
        $product_photo = $request->product_photo;
        $product_category = $request->product_category;

        $category = \App\Models\Category::where('category_name', '=', $product_category);

        $seller = Seller::where('user_id', '=', Auth::user()->id)->get();

        $product = new Product();
        $product->product_name = $product_name;
        $product->quantity = $product_quantity;
        $product->price = $product_price;
        $product->description = $product_descripton;
        $product->photo_path = $product_photo;
        $product->category_id = $category->id;
        $product->seller_id = $seller->id;
        $product->save();

        return back();
})->name('add-product');

Route::post('/add-comment', function (Request $request) {

})->name('add-comment');
Route::get('/superuser-main', function () {

    $orders = Order::all();
    $sum  = 0;
    foreach ($orders as $order) {
        $ordered_products = $order->ordered_product()->get();
        dd($ordered_products);
//        foreach ($ordered_products as $ordered_product) {
//            $products = $ordered_product->first()->product()->first();
//            foreach ($products as $product) {
//                $sum += $product->price;
//            }
//        }
    }

    return view('superuser.superuser_main', [
        'category_list' => \App\Models\Category::all(),
        'user_count' => \App\User::all()->count(),
        'seller_count' => Seller::all()->count(),
        'order_count' => Order::all()->count(),
        'products_count' => Product::all()->count(),
        'sum_orders' => $sum
    ]);
})->name('smain');

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

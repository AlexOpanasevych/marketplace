<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart($id) {
        if(Auth::check()) {
            $product = Product::find($id);
            $user_id = Auth::user()->id;
            $cart = Cart::where('user_id', '=', $user_id)->get()->first();
            if(!isset($cart)) {
                $cart = new Cart();
                $cart->user_id = $user_id;
                $cart->save();
            }
            $cart_product = new Product();
            $cart_product->product_id = $id;
            $cart_product->card_id = $cart->id;
            $cart_product->product_number = $product->product_number;
            $cart_product->save();
        }
        return back();
    }

    public function removeFromCart($id) {
        if(Auth::check()) {
            $cartProduct = CartProduct::find($id);
            if(isset($cartProduct)) {
                $cartProduct->delete();
            }
        }
        return back();
    }
}

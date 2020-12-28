<?php

namespace App\Http\Controllers;

use App\Chosen;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChosenController extends Controller
{
    public function addToChosen($id) {
        if(Auth::check()) {
            $user_id = Auth::user()->id;
            $chosen_exists = Chosen::where('user_id', '=', $user_id)->where('product_id', '=', $id)->get()->first();
            if(!isset($chosen_exists)) {
                $chosen_item = new Chosen();
                $chosen_item->product_id = $id;
                $chosen_item->user_id = $user_id;
                $chosen_item->save();

            }
        }
        return back();
    }

    public function removeFromChosen($chosen_id) {
        Chosen::destroy($chosen_id);
    }
}

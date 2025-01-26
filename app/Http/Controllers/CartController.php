<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        return view('cart');
    }

    public function checkout(Request $request){
      //check user auth
      if(!Auth::check()){
        return redirect()->route('login')->with('error', 'You must be logged in to checkout');
      }

      session()->flash('clear_cart', true);

      return redirect()->route('cart.index')->with('success', 'Payment successful');
    }
}

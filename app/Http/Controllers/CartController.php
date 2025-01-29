<?php

namespace App\Http\Controllers;

use App\Exceptions\Payment\ChargeFailedException;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{
  public function index()
  {
    return view('cart');
  }

  public function checkout(Request $request, PaymentService $paymentService)
  {
    $request->validate([
      "ids" => ['required', 'array'],
      "ids.*" => ['required', 'numeric', 'exists:products,id', 'min:1000'],
    ]);

    $products = Product::query()->whereIn('id', $request->input('ids'))->get();
    $totalPrice = $products->sum('price');

    Order::query()->create([
      "user_id" => Auth::id(),
    ])->orderLines()->createMany($products->map(function ($product) {
      return [
        "product_id" => $product->id,
        "price" => $product->price,
      ];
    }));

    try{
      $payment_url = $paymentService->charge(
        $request->user(),
        $totalPrice,
         route('store')
      );
      return response()->json($payment_url, 200);
    }catch(ChargeFailedException){
      return response()->json([
        'error' => 'Payment failed',
      ], 400);
    }
  }
}

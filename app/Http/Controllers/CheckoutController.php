<?php

namespace App\Http\Controllers;

use App\Data\Items;
use App\Exceptions\PaymentFailed;
use App\Gateways\Paystack;
use App\Http\Requests\CheckoutRequest;
use App\Services\OrderService;
use App\Services\PaymentService;

class CheckoutController extends Controller
{
    private PaymentService $paymentService;
    public function __construct(
        private OrderService $orderService,
    ){
        $this->paymentService = resolve(PaymentService::class, ['gateway' => resolve(Paystack::class)]);
    }

    public function index()
    {
        return view('shop.cart');
    }

    public function store(CheckoutRequest $request){
        $request->validated();
        $order = $this->orderService->place(
            $request->user(),
            Items::fromArray($request->get('items'))
        );

        try {
            return response()->json([
                'redirect_url' => $this->paymentService->createPaymentLink($order)
            ]);
        } catch (PaymentFailed $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }
}

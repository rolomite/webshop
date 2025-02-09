<?php

namespace App\Http\Controllers;

use App\Exceptions\PaymentFailed;
use App\Gateways\Paystack;
use App\Models\Payment;
use App\Services\PaymentService;
use Illuminate\Http\Request;

class PaymentCallbackController extends Controller
{
    public function __invoke(Request $request)
    {
        $payment = Payment::query()->where('reference', $request->query('reference'))->first();

        if (!$payment) {
            return redirect('/')->with(['error' => 'Transaction not found']);
        }

        $paymentService = resolve(PaymentService::class, ['gateway' => $payment->gateway->getClient()]);

        try {
            $paymentService->verify($payment);

            return redirect('/')->with([
                'success' => 'Payment successfully',
            ]);
        } catch (PaymentFailed $e) {
            return redirect('/')->with([
                'error' => $e->getMessage(),
            ]);
        }
    }
}

<?php

namespace App\Services;


use App\Enums\PaymentStatus;
use App\Exceptions\PaymentFailed;
use App\Gateways\Contracts\GatewayContract;
use App\Models\Contracts\Payable;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PaymentService
{
    public function __construct(private readonly GatewayContract $gateway){}

    /**
     * @throws PaymentFailed
     */
    public function createPayment(Payable $payable): Payment
    {
        $user = Auth::user();
        $payment = $payable->payment()->make([
            'reference' => 'ORD-' . time() . Str::random(8),
            'amount' => $payable->getTotal(),
            'user_id' => $user->id,
            'gateway' => $this->gateway->getName(),
            'status' => PaymentStatus::PENDING
        ]);

        $data = $this->gateway->charge($user, $payment->amount, $payment->reference);

        $payment->fill(['meta' => [
            'authorization_url' => $data['authorization_url'],
            'reference' => $data['reference'],
        ]])->save();

        return $payment;
    }

    /**
     * @throws PaymentFailed
     */
    public function createPaymentLink(Payable $payable): string
    {
        $payment = $this->createPayment($payable);
        return $this->gateway->getLinkFromPayment($payment);
    }

    public function verify(Payment $payment): void
    {
        if($payment->status === 'paid') throw new PaymentFailed('Payment already used');
        if(!$this->gateway->verify($payment->reference)){
            throw new PaymentFailed('This payment not verified');
        };
        $payment->update([
            'status' => PaymentStatus::PAID,
        ]);
    }
}

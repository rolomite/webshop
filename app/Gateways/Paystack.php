<?php

namespace App\Gateways;

use App\Enums\Gateway;
use App\Exceptions\PaymentFailed;
use App\Gateways\Contracts\GatewayContract;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class Paystack implements GatewayContract
{
    public function client(): \Illuminate\Http\Client\PendingRequest
    {
        return Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . config('services.paystack.secret'),
        ])->baseUrl('https://api.paystack.co');
    }


    /**
     * @throws PaymentFailed|ConnectionException
     */
    public function charge(User $user, float $amount, ?string $reference = null): array
    {
        $response = $this->client()->post('/transaction/initialize', [
            'amount' => $amount * 100,
            'email' => $user->getAttribute('email'),
            'callback_url' => route('payment.callback'),
            'reference' => $reference ?? $this->generateReference(),
        ]);

        if(!$response->successful()){
            throw new PaymentFailed('Payment failed: ' . $response->getReasonPhrase());
        }

        return $response->json('data');
    }

    private function generateReference(): string
    {
        return 'ORD-' . time() . Str::random(8);
    }

    public function verify(string $reference): bool
    {
        $response = $this->client()->get("transaction/verify/{$reference}");

        $data = $response->json();

        if ($response->failed() || !$data['status']) {
            return false;
        }

        if ($data['data']['status'] !== 'success') {
            return false;
        }

        return true;
    }

    public function getLinkFromPayment(Payment $payment): string
    {
        return $payment->meta['authorization_url'] ?? '';
    }

    public function getName(): Gateway
    {
        return Gateway::PAYSTACK;
    }
}

<?php

namespace App\Gateways\Contracts;

use App\Enums\Gateway;
use App\Exceptions\PaymentFailed;
use App\Models\Payment;
use App\Models\User;

interface GatewayContract
{
    /**
     * @throws PaymentFailed
     */
    public function charge(User $user, float $amount, ?string $reference);

    public function verify(string $reference): bool;

    public function getLinkFromPayment(Payment $payment): string;

    public function getName(): Gateway;
}

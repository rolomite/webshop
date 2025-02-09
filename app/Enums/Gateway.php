<?php

namespace App\Enums;

use App\Exceptions\GatewayNotFound;
use App\Gateways\Paystack;

enum Gateway: string
{
    case PAYSTACK = 'paystack';

    public function getClient()
    {
        return match ($this){
            self::PAYSTACK => resolve(Paystack::class),
            default =>  throw new GatewayNotFound
        };
    }
}

<?php

namespace App\Models\Contracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface Payable
{
    public function getTotal(): float;
}

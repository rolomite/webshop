<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * @property int|float $subtotal
 */
class Order extends Model implements \App\Models\Contracts\Payable
{
    protected $guarded = [];

    public function getSubtotalAttribute(): int | float
    {
        return $this->orderLines->sum('total');
    }

    public function orderLines(): HasMany
    {
        return $this->hasMany(OrderLine::class);
    }

    public function payment(): MorphOne
    {
        return $this->morphOne(Payment::class, 'payable');
    }

    public function getTotal(): float
    {
        return $this->subtotal;
    }
}

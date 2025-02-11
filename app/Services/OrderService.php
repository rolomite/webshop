<?php

namespace App\Services;

use App\Data\Item;
use App\Data\Items;
use App\Exceptions\OrderCreationError;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderService
{
    /**
     * Create a new class instance.
     */
    public function create(User $user): Order
    {
        /** @var Order $order */
        $order = Order::query()->create([
            'user_id' => Auth::id(),
        ]);

        return $order;
    }

    public function addOrderLines(Order $order, Items $items)
    {
        return $order->orderLines()->createMany($items->map(fn(Item $item) => [
            'product_id' => $item->id,
            'quantity' => $item->quantity,
        ]));
    }

    public function place(User $user, Items $items): Order
    {
        return DB::transaction(function () use ($user, $items) {
            $order = $this->create($user);
            $this->addOrderLines($order, $items);
            return $order;
        });
    }
}

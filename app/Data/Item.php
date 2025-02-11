<?php

namespace App\Data;

use App\Models\Product;

class Item
{
    public readonly int $id;
    private readonly string $name;
    public readonly  float $price;

    public function __construct(
        public readonly Product $product,
        public readonly int $quantity,
    )
    {
        $this->id = $product->id;
        $this->name = $product->name;
        $this->price = $product->price;
    }

    public function getTotal(): float
    {
        return $this->price * $this->quantity;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            Product::find($data['id']),
            $data['quantity']
        );
    }
}

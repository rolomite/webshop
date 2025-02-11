<?php

namespace App\Data;

use Illuminate\Support\Collection;

class Items extends Collection
{
    /**
     * @param Item[] $items
     */
    public function __construct(protected $items)
    {
        parent::__construct($this->items);
    }

    public static function fromArray(array $items): Items
    {
        return new self(collect($items)->map(function ($item) {
            return Item::fromArray($item);
        })->toArray());
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        return view('shop.index', [
            'products' => Product::query()->latest()->paginate()
        ]);
    }

    public function show(Product $product)
    {
        return view('shop.show', [
            'product' => $product
        ]);
    }
}

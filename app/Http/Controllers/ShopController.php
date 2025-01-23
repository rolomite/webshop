<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

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

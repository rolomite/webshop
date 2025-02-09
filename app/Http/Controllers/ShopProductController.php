<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class ShopProductController extends Controller
{
    public function index()
    {
        return view('shop.product.index', [
            'products' => Product::public()->latest()->paginate()
        ]);
    }

    public function show(Product $product)
    {
        return view('shop.product.show', [
            'product' => $product
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\fc;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product.index', [
            'products' => Product::query()->latest()->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        $images = [];



        foreach ($request->images as $key => $image) {
            if($image->isValid()) {
                $images[] = $image->storePublicly('images', 'public');
            }
        }


        $product = Product::query()->create([
            "name" => $data["name"],
            "price" => $data["price"],
            "description" => $data["description"],
            "images" => $images ?? [],
            "featured_image" => $images[0] ?? '',
            "published_at" => $data['published_at'] === "published" ? now() : null,
        ]);

        return redirect()->route('admin.products.show', $product)->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $images = $request->get('old_images');


        foreach ($request->images ?? [] as $key => $image) {
            if($image->isValid()) {
                $images[] = $image->storePublicly('images', 'public');
            }
        }


        $product->update([
            "name" => $data["name"],
            "price" => $data["price"],
            "description" => $data["description"],
            "images" => $images ?? [],
            "featured_image" => $images[0] ?? '',
            "published_at" => $data['published_at'] === "published" ? now() : null,
        ]);

        return redirect()->back()->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
    }
}

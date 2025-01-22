<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\fc;
use App\Models\Product;
use Illuminate\Http\Request;

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

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->storePublicly('images', 'public');
        }


        Product::query()->create([
            "project_name" => $data["project_name"],
            "preview_link" => $data["preview_link"],
            "description" => $data["description"],
            "repo_link" => $data["repo_link"],
            "image" => $data["image"],
            "price" => $data["price"],
            "published_at" => $data['publish_now'] === "publish" ? now() : null,
        ]);
        
        return redirect()->route('products.create')->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}

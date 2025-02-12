<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::query()->latest()->paginate(),
        ]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Category::query()->create($data);
        return redirect()->route('admin.categories.index')->with('success', 'category added successfully');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category' => $category,
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $category->update($data);
        return redirect()->route('admin.categories.index')->with('success', 'category updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'category has been removed');
    }
}

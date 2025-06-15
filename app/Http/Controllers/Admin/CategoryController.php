<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.category.index', [
            'categories' => Category::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string'],
            'slug' => ['nullable', 'string'],
        ]);

        if (! $request->slug) {
            $attributes['slug'] = Str::slug($attributes['name']);
        }

        Category::create($attributes);

        return redirect()->back()->with('success', 'Category created successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $attributes = $request->validate([
            'name' => ['nullable', 'string'],
            'slug' => ['nullable', 'string'],
        ]);

        if (! $request->slug) {
            $attributes['slug'] = Str::slug($attributes['name']);
        }

        $category->update($attributes);

        return redirect()->back()->with('success', 'Category update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully!');
    }
}

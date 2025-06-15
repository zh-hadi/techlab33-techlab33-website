<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProjectCategory::latest()->get();

        return view('backend.pages.project.category.index', [
            'categories' => $categories,
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

        ProjectCategory::create($attributes);

        return redirect()->back()->with('success', 'Category created successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectCategory $porject_category)
    {
        $attributes = $request->validate([
            'name' => ['nullable', 'string'],
            'slug' => ['nullable', 'string'],
        ]);

        if (! $request->slug) {
            $attributes['slug'] = Str::slug($attributes['name']);
        }

        $porject_category->update($attributes);

        return redirect()->back()->with('success', 'Category update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectCategory $porject_category)
    {
        $porject_category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully!');
    }
}

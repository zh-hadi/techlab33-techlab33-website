<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.tag.index', [
            'tags' => Tag::latest()->get(),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string'],
            'slug' => ['nullable', 'string']
        ]);

        if(!$request->slug){
            $attributes['slug'] = Str::slug($attributes['name']);
        }

       Tag::create($attributes);

       return redirect()->back()->with('success', 'Tag created successfully!');
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $attributes = $request->validate([
            'name' => ['nullable', 'string'],
            'slug' => ['nullable', 'string']
        ]);

        if(!$request->slug){
            $attributes['slug'] = Str::slug($attributes['name']);
        }

       $tag->update($attributes);

       return redirect()->back()->with('success', 'Tag update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->back()->with('success', 'Tag deleted successfully!');
    }
}

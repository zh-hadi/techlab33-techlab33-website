<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Services\FileService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct(protected FileService $fileService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('tags')->latest()->get();

        // return $posts;

        return view('backend.pages.post.index', [
            'posts' => $posts,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.post.create', [
            'tags' => Tag::latest()->get(),
            'categories' => Category::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $attributes = $request->validated();

        $attributes['slug'] = Str::slug($attributes['title']);

        if ($request->hasFile('image')) {
            $path = $this->fileService->upload('post/image/', $request->file('image'));
            $attributes['image'] = $path;
        }

        $tags = $attributes['tags'];
        $category = $attributes['category_id'];

        unset($attributes['tags']);
        unset($attributes['category_id']);

        $user = Auth::user();
        $attributes['user_id'] = $user->id;
        $post = Post::create($attributes);

        foreach ($tags as $tag) {
            $post->tags()->attach($tag);
        }

        if (Category::find($category)) {
            $post->categories()->attach($category);
        }

        return redirect()->route('posts.index')->with('success', 'Tag created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('backend.pages.post.edit', [
            'post' => $post,
            'tags' => Tag::latest()->get(),
            'categories' => Category::latest()->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $attributes = $request->validated();

        // Update slug from title
        $attributes['slug'] = Str::slug($attributes['title']);

        // Handle image upload if exists
        if ($request->hasFile('image')) {
            if ($post->image) {
                $this->fileService->delete($post->image);
            }
            $path = $this->fileService->upload('post/image/', $request->file('image'));
            $attributes['image'] = $path;
        }

        // Extract tags and category
        $tags = $attributes['tags'];
        $category = $attributes['category_id'];

        // Remove tags and category_id from main attributes
        unset($attributes['tags'], $attributes['category_id']);

        // Update the post
        $post->update($attributes);

        // Sync tags
        $post->tags()->sync($tags);

        // Sync category (many-to-many)
        if (Category::find($category)) {
            $post->categories()->sync([$category]);
        }

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            $this->fileService->delete($post->image);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post Deleted Successfully');
    }
}

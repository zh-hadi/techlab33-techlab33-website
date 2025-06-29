<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class BlogPageController extends Controller
{
    public function index()
    {
        $categorySlug = request()->category;
        $category = $categorySlug ? Category::where('slug', $categorySlug)->first() : null;

        $tagSlug = request()->tag;
        $tag = $tagSlug ? Tag::where('slug', $tagSlug)->first() : null;

        $query = Post::with(['user', 'categories', 'tags']);

        if ($category) {
            $query->whereHas('categories', function ($q) use ($category) {
                $q->where('categories.id', $category->id);
            });
        }

        if ($tag) {
            $query->whereHas('tags', function ($q) use ($tag) {
                $q->where('tags.id', $tag->id);
            });
        }

        $blogs = $query->latest()->paginate(6);

        // return $blogs;

        return view('frontend.pages.blog.index', [
            'title' => 'Our Blog | TechLab33 Ltd',
            'blogs' => $blogs,
        ]);
    }

    public function show(Post $post)
    {
        // return $post;
        // $post = Post::with(['user', 'categories', 'tags'])->where('slug', $slug)->firstOrFail();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->get();
        $recent_poste = Post::latest()->take(5)->get();
        $tags = Tag::all();

        $post->load('user');

        // return $post;

        /** @phpstan-ignore-next-line */
        if (! $post) {
            abort(404);
        }

        // return $post;
        // return $recentPoste;
        return view('frontend.pages.blog.show', [
            'post' => $post,
            'categories' => $categories,
            'recent_posts' => $recent_poste,
            'tags' => $tags,
        ]);
    }
}

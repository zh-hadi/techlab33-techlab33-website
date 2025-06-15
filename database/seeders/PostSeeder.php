<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $categoriesId = Category::pluck('id')->toArray();
        $tagsId = Tag::pluck('id')->toArray();
        Post::factory()->count(15)->create([
            'user_id' => $user->id,
        ])->each(function ($post) use ($categoriesId, $tagsId) {
            $categories = Arr::random($categoriesId);
            $post->categories()->attach($categories);

            $tags = collect($tagsId)->random(rand(1, 3))->toArray();
            $post->tags()->attach($tags);
        });
    }
}

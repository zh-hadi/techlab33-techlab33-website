<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Feature;
use App\Models\Post;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;


class HomePageController extends Controller
{
    public function index()
    {
        return view('frontend.pages.home', [
            'blogs' => Post::take(3)->get(),
            'service_categories' => ServiceCategory::where('status', true)->get(),
            'aboutdata' => About::first(),
            'features' => Feature::all(),
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Feature;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Http\Request;


class HomePageController extends Controller
{
    public function index()
    {
        $title = "Tech Lab33 Limited - Our Innovation Your Advantage";
        return view('frontend.pages.home', [
            'title' => $title,
            'blogs' => Post::take(3)->get(),
            'service_categories' => Service::where('status', true)->get(),
            'aboutdata' => About::first(),
            'features' => Feature::all(),
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\BusinessPartner;
use App\Models\Skill;
use App\Models\Testimonial;

class AboutPageController extends Controller
{
    public function index()
    {
        $title = 'About US - Tech Lab33 Limited';

        return view('frontend.pages.about', [
            'title' => $title,
            'aboutdata' => About::first(),
            'business_partners' => BusinessPartner::where('status', 'active')->latest()->get(),
            'skills' => Skill::where('status', 'active')->latest()->get(),
            'testimonials' => Testimonial::where('status', 'active')->latest()->get(),
        ]);
    }
}

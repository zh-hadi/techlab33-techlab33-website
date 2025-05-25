<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Skill;
use App\Models\Testimonial;
use App\Models\BusinessPartner;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function index()
    {
        return view('frontend.pages.about', [
            'aboutdata' => About::first(),
            'business_partners' => BusinessPartner::where('status', 'active')->latest()->get(),
            'skills' => Skill::where('status', 'active')->latest()->get(),
            'testimonials' => Testimonial::where('status', 'active')->latest()->get(),
        ]);
    }
}

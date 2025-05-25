<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\BusinessPartner;
use App\Models\Testimonial;

class AboutController extends Controller
{
    public function index()
    {
        return view('backend.pages.about.index', [
            'about' => About::first(),
            'testimonials' => Testimonial::latest()->get(),
            'businessPartners' => BusinessPartner::latest()->get(),
        ]);
    }

    public function update(Request $request, About $about)
    {
        $attributes = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'video_url' => 'nullable|url',
            'clients' => 'nullable|integer',
            'projects' => 'nullable|integer',
            'hoursofsupport' => 'nullable|integer',
            'workers' => 'nullable|integer',
        ]);

        $about->update($attributes);

        return redirect()->back()->with('success', 'About info updated successfully.');
    }

}

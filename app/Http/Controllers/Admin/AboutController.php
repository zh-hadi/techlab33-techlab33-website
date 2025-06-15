<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\BusinessPartner;
use App\Models\Testimonial;
use App\Services\FileService;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __construct(protected FileService $fileServices) {}

    public function index()
    {
        // return About::first();
        return view('backend.pages.about.index', [
            'about' => About::first(),
            // 'testimonials' => Testimonial::latest()->get(),
            // 'businessPartners' => BusinessPartner::latest()->get(),
        ]);
    }

    public function update(Request $request, About $about)
    {

        $attributes = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'video_url' => 'required|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'clients' => 'required|integer',
            'projects' => 'required|integer',
            'hoursofsupport' => 'required|integer',
            'workers' => 'required|integer',
            'skill_title' => 'required|string',
            'testimonial_title' => 'required|string',

        ]);

        if ($request->hasFile('image')) {

            if ($about->image) {
                $this->fileServices->delete($about->image);
            }

            $path = $this->fileServices->upload('about/', $request->file('image'));
            $attributes['image'] = $path;
        }

        $about->update($attributes);

        return redirect()->back()->with('success', 'About info updated successfully.');
    }
}

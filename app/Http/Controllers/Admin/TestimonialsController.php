<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestmonialRequest;
use App\Models\Testimonial;
use App\Services\FileService;

class TestimonialsController extends Controller
{
    public function __construct(protected FileService $fileServices) {}

    public function index()
    {
        return view('backend.pages.testimonials.index', [
            'testimonials' => Testimonial::latest()->get(),
        ]);
    }

    public function store(StoreTestmonialRequest $request)
    {
        $attributes = $request->validated();

        if ($request->hasFile('image')) {
            $path = $this->fileServices->upload('profile/', $request->file('image'));
            $attributes['image'] = $path;
        }

        Testimonial::create($attributes);

        return redirect()->back()->with('success', 'Testimonial added successfully.');
    }

    public function update(StoreTestmonialRequest $request, Testimonial $testimonial)
    {
        $attributes = $request->validated();

        if ($request->hasFile('image')) {

            if ($testimonial->image) {
                $this->fileServices->delete($testimonial->image);
            }

            $path = $this->fileServices->upload('profile/', $request->file('image'));
            $attributes['image'] = $path;
        }

        $testimonial->update($attributes);

        return redirect()->back()->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        // Delete image file
        if ($testimonial->image) {
            $this->fileServices->delete($testimonial->image);
        }

        $testimonial->delete();

        return redirect()->back()->with('success', 'Testimonial deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    public function destroy(Testimonial $testimonial)
    {
        dd("working");
        // Delete image file
        if ($testimonial->image && file_exists(public_path('uploads/testimonials/' . $testimonial->image))) {
            unlink(public_path('uploads/testimonials/' . $testimonial->image));
        }

        $testimonial->delete();

        return redirect()->back()->with('success', 'Testimonial deleted successfully.');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServicesPageController extends Controller
{
    public function index()
    {
        return view('frontend.pages.services.index', [
            'service_categories' => ServiceCategory::where('status', true)->get(),
        ]);
    }

    public function show()
    {
        return view('frontend.pages.services.show');
    }
}

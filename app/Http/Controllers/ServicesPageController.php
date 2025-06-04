<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesPageController extends Controller
{
    public function index()
    {
        $title = 'Our Services | TechLab33 Ltd';
        return view('frontend.pages.services.index', [
            'title' => $title,
            'service_categories' => Service::where('status', true)->get(),
            'services' => Service::where('status', true)->get(),
        ]);
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->first();

         if (!$service) {
            abort(404); 
        }

        // return $service;
        return view('frontend.pages.services.show', [
            'service' => $service,
            'services' => Service::where('status', true)->get(),
        ]);
    }
}

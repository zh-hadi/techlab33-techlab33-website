<?php

namespace App\Http\Controllers;

class ContactPageController extends Controller
{
    public function index()
    {
        return view('frontend.pages.contact', [
            'title' => 'Contact US | TechLab33 Ltd',
        ]);
    }
}

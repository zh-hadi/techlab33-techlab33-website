<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    public function index()
    {
        return view('frontend.pages.contact', [
            'title' => 'Contact US | TechLab33 Ltd'
        ]);
    }
}

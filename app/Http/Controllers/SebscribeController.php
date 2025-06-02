<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SebscribeController extends Controller
{
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['required', 'email']
        ]);
    }
}

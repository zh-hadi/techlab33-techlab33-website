<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NewsLaterMail;
use App\Models\SubscribeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewslaterMessageController extends Controller
{
    public function index()
    {
        return view('backend.pages.newslater.index');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'subject' => ['required', 'string'],
            'body' => ['required'],
        ]);

        $subscribers = SubscribeEmail::where('status', 1)->pluck('email'); // fetch all emails

        foreach ($subscribers as $email) {
            // Queue each email
            Mail::to($email)->queue(new NewsLaterMail($attributes));
        }

        return redirect()->back()->with('success', 'Newsletter is being sent to all subscribers!');
    }
}

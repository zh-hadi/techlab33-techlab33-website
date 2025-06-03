<?php

namespace App\Http\Controllers\Admin;

use App\Models\SubscribeEmail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function index()
    {
        return view('backend.pages.subscribe.index', [
            'emails' => SubscribeEmail::all()
        ]);
    }
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['required', 'email']
        ]);


        $subscription_email = SubscribeEmail::create($attributes);

        if ($request->ajax()) {
            return response('OK', 200);
        }
    }

    public function update(Request $request, SubscribeEmail $subscribe)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'status' => 'required|boolean',
        ]);

        
        $subscribe->update([
            'email' => $request->email,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Email updated successfully.');
    }


    public function destroy(SubscribeEmail $subscribe)
    {
        $subscribe->delete();

        return redirect()->back()->with('success', 'Email Remove successfully!');
    }
}

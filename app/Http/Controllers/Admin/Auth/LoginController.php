<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('backend.pages.auth.login');
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $attributes['email'])->first();

        if (! $user) {
            return back()->withErrors([
                'email' => 'The Email is invalid',
            ])->withInput();
        }

        if (! Hash::check($attributes['password'], $user->password)) {
            return back()->withErrors([
                'password' => 'Incorrect password',
            ])->withInput();
        }

        Auth::login($user);
        $request->session()->regenerateToken();

        return redirect()->intended('admin/settings');
    }
}

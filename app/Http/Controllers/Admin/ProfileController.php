<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\FileService;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct(protected FileService $fileService) {}

    public function index()
    {
        return view('backend.pages.profile.index', [
            'user' => Auth::user(),
        ]);
    }

    public function update(User $profile)
    {
        $attributes = request()->validate([
            'name' => ['required', 'string'],
            'image' => ['nullable', 'image'],
        ]);

        if (request()->hasFile('image')) {
            if ($profile->image) {
                $this->fileService->delete($profile->image);
            }
            $path = $this->fileService->upload('profile/image/', request()->file('image'));
            $attributes['image'] = $path;
        }

        $profile->update($attributes);

        return redirect()->back()->with('success', 'Profile update successfully');
    }
}

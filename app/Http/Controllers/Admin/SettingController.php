<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function __construct(protected  FileService $fileServices){}

    public function index()
    {
        
        $setting = Setting::first();
        return view('backend.setting.index', [
            'setting' => $setting
        ]);
    }


    public function update(Request $request, Setting $setting)
    {
        // $setting = Setting::findOrFail($id);

        $attributes = $request->validate([
            'website_name' => 'required|string|max:255',
            'website_email' => 'required|email',
            'website_logo' => 'nullable|image|mimes:jpg,jpeg,png,svg,gif,webp',
            'website_favicon' => 'nullable|image|mimes:jpg,jpeg,png,svg,gif,webp',
            'address' => 'nullable|string|max:500',
            'phone' => 'nullable|string|max:50',
            'whatsapp_number' => 'nullable|string|max:50',
            'telephone' => 'nullable|string|max:50',
            'hotline_number' => 'nullable|string|max:50',
            'facebook_link' => 'nullable|url',
            'linkedin_link' => 'nullable|url',
            'x_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'google_map_location' => 'nullable|string',
        ]);

        // Handle logo upload
        if ($request->hasFile('website_logo')) {
            if ($setting->website_logo ) {
                $this->fileServices->delete($setting->website_logo);
            }
            $logoPath = $this->fileServices->upload('logo/', $request->file('website_logo'));
            $attributes['website_logo'] = $logoPath;
          
        }

     
        // Handle favicon upload
        if ($request->hasFile('website_favicon')) {
            if ($setting->website_favicon) {
                $this->fileServices->delete($setting->website_favicon);
            }
            $path  = $this->fileServices->upload('logo/', $request->file('website_favicon'));
            $attributes['website_favicon'] =  $path;
        }

        // return $attributes;

        $setting->update($attributes);

        return redirect()->route('settings.index')->with('success', 'Setting updated successfully.');
    }

}

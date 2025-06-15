<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessPartner;
use App\Services\FileService;
use Illuminate\Http\Request;

class BusinessPartnerController extends Controller
{
    public function __construct(protected FileService $fileServices) {}

    public function index()
    {
        return view('backend.pages.business_partner.index', [
            'businessPartners' => BusinessPartner::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,svg'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        if ($request->hasFile('logo')) {
            $path = $this->fileServices->upload('businessPartner/logo/', $request->file('logo'));
            $attributes['logo'] = $path;
        }

        BusinessPartner::create($attributes);

        return redirect()->back()->with('success', 'Created successfully.');
    }

    public function update(Request $request, BusinessPartner $business_partner)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,svg'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        if ($request->hasFile('logo')) {
            if ($business_partner->logo) {
                $this->fileServices->delete($business_partner->logo);
            }

            $path = $this->fileServices->upload('businessPartner/logo/', $request->file('logo'));
            $attributes['logo'] = $path;
        }

        $business_partner->update($attributes);

        return redirect()->back()->with('success', 'Updated successfully.');
    }

    public function destroy(BusinessPartner $business_partner)
    {
        if ($business_partner->logo) {
            $this->fileServices->delete($business_partner->logo);
        }

        $business_partner->delete();

        return redirect()->back()->with('success', 'Deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.services.category.index', [
            'serviceCategories' => ServiceCategory::latest()->get(),
        ]);
    }

  

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string'
        ]);

        ServiceCategory::create([
            'name' => $request->name,
            'description' => $request->description,
            'icon' => $request->icon,
        ]);

        return redirect()->back()->with('success', 'Service Category added successfully.');
    }

    /**
     * Display the specified resource.
     */
   
    /**
     * Show the form for editing the specified resource.
     */
 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceCategory $service_category)
    {
       $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|boolean',
            'icon' => 'required|string'
        ]);

        $service_category->update([
            'name' => $request->name,
            'description' => $request->description,
            'icon' => $request->icon,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Service Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceCategory $service_category)
    {
        $service_category->delete();

         return back()->with('success', 'Service Category deleted successfully!');
    }
}

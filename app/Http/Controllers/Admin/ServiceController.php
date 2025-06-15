<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function __construct(private FileService $fileService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.services.index', [
            'services' => Service::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('backend.pages.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'icon' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp',
        ]);

        if ($request->hasFile('image')) {
            $path = $this->fileService->upload('services/images/', $request->image);
        }

        Service::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'content' => $request->content,
            'icon' => $request->icon,
            'image' => $path ? $path : null,
        ]);

        return redirect()->route('services.index')->with('success', 'Service Category added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view('backend.pages.services.show', [
            'service' => $service,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('backend.pages.services.edit', [
            'service' => $service,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'icon' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        // Handle image upload if a new one is provided
        if ($request->hasFile('image')) {

            $this->fileService->delete($service->image);

            $path = $this->fileService->upload('services/images/', $request->image);
            $service->image = $path;
        }

        // Update other fields
        $service->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'content' => $request->content,
            'icon' => $request->icon,
            'image' => $service->image, // retain current image if not updated
        ]);

        return redirect()->route('services.index')->with('success', 'Service Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $this->fileService->delete($service->image);
        $service->delete();

        return back()->with('success', 'Service Category deleted successfully!');
    }
}

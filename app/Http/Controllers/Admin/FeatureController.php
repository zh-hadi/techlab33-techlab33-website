<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFeatureRequest;
use App\Http\Requests\UpdateFeatureRequest;
use App\Models\Feature;
use App\Services\FeatureService;

class FeatureController extends Controller
{
    public function __construct(private FeatureService $featureService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.feature.index', [
            'features' => Feature::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.feature.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeatureRequest $request)
    {
        $this->featureService->store($request->validated());

        return redirect()->route('features.index')->with('success', 'Feature created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feature $feature)
    {
        return view('backend.pages.feature.edit', [
            'feature' => $feature,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeatureRequest $request, Feature $feature)
    {
        $this->featureService->update($feature, $request->validated());

        return redirect()->route('features.index')->with('success', 'Feature updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feature $feature)
    {

        $result = $this->featureService->delete($feature);

        if ($result) {
            return redirect()->back()->with('success', 'Feature Deleted Successfully!');
        }

        return redirect()->back()->with('error', 'Failed to delete feature.');
    }
}

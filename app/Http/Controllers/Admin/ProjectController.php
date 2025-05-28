<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Image;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ProjectController extends Controller
{

    public function __construct(protected FileService $fileService )
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with(['images', 'category'])->latest()->get();

        // return $projects;
        return view('backend.pages.project.index', [
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProjectCategory::all();
        return view('backend.pages.project.create',[
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $attributes = $request->validated();
        $attributes['slug'] = Str::slug($attributes['name']);

        $project = Project::create(Arr::except($attributes, 'images'));

        if($request->hasFile('images')){
            foreach($request->file('images') as $file){
                $path = $this->fileService->upload('project/images/', $file);
                $project->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('projects.index')->with('success', 'Project Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project->load(['images', 'category']);

        // return $project;
        return view('backend.pages.project.show', [
            'project' => $project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $categories = ProjectCategory::all();
         return view('backend.pages.project.edit',[
            'categories' => $categories,
            'project' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProjectRequest $request, Project $project)
    {
 
        $attributes = $request->validated();
        $attributes['slug'] = Str::slug($attributes['name']);

        $project->update(Arr::except($attributes, 'images'));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $this->fileService->upload('project/images/', $file);
                $project->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        foreach($project->images as $image){
            $this->fileService->delete($image);

            $image->delete();
        }

        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project and associated images deleted successfully.');
    }


    public function deleteImage(Image $image)
    {
            $this->fileService->delete($image->image_path);

            $image->delete();

            return back()->with('success', 'Image deleted successfully!');
    }
}

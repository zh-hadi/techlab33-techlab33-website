<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectPageController extends Controller
{
    public function index()
    {
        $projects = Project::with(['category', 'images'])->latest()->get();
        $categories = ProjectCategory::all();

      return view('frontend.pages.projects.index', [
            'projects' => $projects,
            'categories' => $categories,
        ]);
    }

    public function show($slug)
    {
        $project = Project::with('category')->where('slug', $slug)->first();

     
        return view('frontend.pages.projects.show', [
            'project' => $project
        ]);
    }
}

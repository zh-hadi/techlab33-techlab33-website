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
        $title = 'Our Projects | TechLab33 Ltd';

      return view('frontend.pages.projects.index', [
            'title' => $title,
            'projects' => $projects,
            'categories' => $categories,
        ]);
    }

    public function show($slug)
    {
        $project = Project::with('category')->where('slug', $slug)->first();

         if (!$project) {
            abort(404); 
        }
     
        return view('frontend.pages.projects.show', [
            'project' => $project
        ]);
    }
}

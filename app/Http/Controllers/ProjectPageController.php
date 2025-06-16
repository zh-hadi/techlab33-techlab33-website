<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectCategory;

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

    public function show(Project $project)
    {
        $project->load('category');

        if (! $project) {
            abort(404);
        }

        return view('frontend.pages.projects.show', [
            'project' => $project,
        ]);
    }
}

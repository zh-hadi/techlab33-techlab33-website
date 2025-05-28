<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectPageController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();

      return view('frontend.pages.projects.index', [
            'projects' => $projects
        ]);
    }
}

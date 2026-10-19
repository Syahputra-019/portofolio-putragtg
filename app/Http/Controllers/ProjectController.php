<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('skills')->orderBy('sort_order')->paginate(9);

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        $project->load('skills');

        return view('projects.show', compact('project'));
    }
}

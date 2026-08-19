<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;

class HomeController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $skills = Skill::orderBy('sort_order')->get();
        $featuredProjects = Project::where('is_featured', true)
            ->orderBy('sort_order')
            ->take(6)
            ->get();
        $experiences = Experience::orderBy('start_date')->get();

        return view('home', compact('profile', 'skills', 'featuredProjects', 'experiences'));
    }
}
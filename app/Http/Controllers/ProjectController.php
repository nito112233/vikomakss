<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        return view('pages.projects', [
            'projects' => Project::published()->orderBy('sort_order')->get(),
        ]);
    }
}

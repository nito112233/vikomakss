<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(Request $request): View
    {
        $categories = array_keys(__('site.categories'));
        $category = $request->query('category', 'all');
        abort_unless(is_string($category) && in_array($category, $categories, true), 404);

        return view('pages.projects', [
            'projects' => Project::published()
                ->when($category !== 'all', fn ($query) => $query->where('category', $category))
                ->orderBy('sort_order')->get(),
            'category' => $category,
        ]);
    }

    public function show(Project $project): View
    {
        abort_unless($project->published_at !== null && $project->published_at->isPast(), 404);

        return view('pages.project', [
            'project' => $project,
            'related' => Project::published()->where('id', '!=', $project->id)->orderBy('sort_order')->limit(2)->get(),
        ]);
    }
}

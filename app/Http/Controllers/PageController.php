<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.home', [
            'projects' => Project::published()->where('is_featured', true)->orderBy('sort_order')->limit(3)->get(),
        ]);
    }

    public function services(): View
    {
        return view('pages.services');
    }

    public function about(): View
    {
        return view('pages.about');
    }

    public function contact(): View
    {
        return view('pages.contact');
    }
}

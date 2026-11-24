<?php

namespace App\Http\Controllers;

use App\Models\StudyGuide;
use Illuminate\Http\Request;

class StudyGuideController extends Controller
{
    public function index()
    {
        $guides = StudyGuide::where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->paginate(12);
            
        return view('study-guides.index', compact('guides'));
    }

    public function show($slug)
    {
        $guide = StudyGuide::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('study-guides.show', compact('guide'));
    }
}

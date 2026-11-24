<?php

namespace App\Http\Controllers;

use App\Models\BibleStory;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BibleStoryController extends Controller
{
    public function show($slug)
    {
        $story = BibleStory::where('slug', $slug)
                    ->where('is_published', true)
                    ->with(['lesson', 'quizQuestions'])
                    ->firstOrFail();

        return view('childrens-ministry.stories.show', compact('story'));
    }

    public function downloadPdf($slug)
    {
        $story = BibleStory::where('slug', $slug)
                    ->where('is_published', true)
                    ->with(['lesson', 'quizQuestions'])
                    ->firstOrFail();

        $pdf = Pdf::loadView('childrens-ministry.stories.pdf', compact('story'));
        
        return $pdf->download(str_replace(' ', '_', strtolower($story->title)) . '_study_package.pdf');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ChurchProgram;
use Illuminate\Http\Request;

class ChurchProgramController extends Controller
{
    public function index()
    {
        // Group by category, prioritizing Saturday and then by order/start time
        $sabbathPrograms = ChurchProgram::where('is_active', true)
                            ->where('day', 'Saturday')
                            ->with('activities')
                            ->orderBy('order')
                            ->orderBy('start_time')
                            ->get()
                            ->groupBy('category');

        $midweekPrograms = ChurchProgram::where('is_active', true)
                            ->where('category', 'Mid-week')
                            ->with('activities')
                            ->orderBy('day')
                            ->orderBy('start_time')
                            ->get();

        return view('programs.index', compact('sabbathPrograms', 'midweekPrograms'));
    }
}

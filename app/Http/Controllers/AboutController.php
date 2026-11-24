<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function beliefs()
    {
        $jsonPath = storage_path('app/data/beliefs.json');
        
        $beliefs = [];
        if (file_exists($jsonPath)) {
            $beliefs = json_decode(file_get_contents($jsonPath), true) ?: [];
        }

        return view('about.beliefs', compact('beliefs'));
    }
}

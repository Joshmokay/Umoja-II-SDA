<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrayerRequest;

class PrayerRequestController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'category' => 'required|string|max:100',
            'request_text' => 'required|string|max:5000',
        ]);

        PrayerRequest::create([
            'name' => \Illuminate\Support\Facades\Crypt::encryptString($validated['name'] ?? 'Anonymous'),
            'category' => $validated['category'],
            'request_text' => \Illuminate\Support\Facades\Crypt::encryptString($validated['request_text']),
        ]);

        return response()->json([
            'message' => 'Your prayer request has been received. We are grateful that you shared it with us.'
        ]);
    }
}

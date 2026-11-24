<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrayerRequest;

class PrayerRequestController extends Controller
{
    public function index()
    {
        $requests = PrayerRequest::orderBy('submitted_at', 'desc')->paginate(15);
        return view('admin.prayer-requests.index', compact('requests'));
    }

    public function show(PrayerRequest $prayerRequest)
    {
        if ($prayerRequest->status === 'New') {
            $prayerRequest->update([
                'status' => 'Being Prayed For',
                'reviewed_at' => now(),
                'reviewed_by' => auth()->id(),
            ]);
        }
        
        return view('admin.prayer-requests.show', compact('prayerRequest'));
    }

    public function update(Request $request, PrayerRequest $prayerRequest)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:New,Being Prayed For,Ongoing,Completed,Archived'
        ]);

        $prayerRequest->update($validated);

        return redirect()->route('admin.prayer-requests.index')->with('success', 'Prayer request status updated.');
    }
}

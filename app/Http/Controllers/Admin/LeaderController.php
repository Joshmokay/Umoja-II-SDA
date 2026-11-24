<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leader;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Storage;

class LeaderController extends Controller
{
    public function index()
    {
        $leaders = Leader::orderBy('display_order')->get();
        return view('admin.leaders.index', compact('leaders'));
    }

    public function create()
    {
        return view('admin.leaders.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'description' => 'nullable|string',
            'display_order' => 'integer',
            'is_active' => 'boolean',
            'portrait' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $leader = new Leader();
        $leader->name = $validated['name'];
        $leader->role = $validated['role'];
        $leader->description = $validated['description'] ?? null;
        $leader->display_order = $request->input('display_order', 0);
        $leader->is_active = $request->has('is_active');

        if ($request->hasFile('portrait')) {
            $leader->portrait_path = $request->file('portrait')->store('leaders', 'public');
        }

        $leader->save();

        return redirect()->route('admin.leaders.index')->with('success', 'Leader added successfully.');
    }

    public function edit(Leader $leader)
    {
        return view('admin.leaders.edit', compact('leader'));
    }

    public function update(Request $request, Leader $leader)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'description' => 'nullable|string',
            'display_order' => 'integer',
            'is_active' => 'boolean',
            'portrait' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $leader->name = $validated['name'];
        $leader->role = $validated['role'];
        $leader->description = $validated['description'] ?? null;
        $leader->display_order = $request->input('display_order', 0);
        $leader->is_active = $request->has('is_active');

        if ($request->hasFile('portrait')) {
            if ($leader->portrait_path && Storage::disk('public')->exists($leader->portrait_path)) {
                Storage::disk('public')->delete($leader->portrait_path);
            }
            $leader->portrait_path = $request->file('portrait')->store('leaders', 'public');
        }

        $leader->save();

        return redirect()->route('admin.leaders.index')->with('success', 'Leader updated successfully.');
    }

    public function destroy(Leader $leader)
    {
        if ($leader->portrait_path && Storage::disk('public')->exists($leader->portrait_path)) {
            Storage::disk('public')->delete($leader->portrait_path);
        }
        $leader->delete();

        return redirect()->route('admin.leaders.index')->with('success', 'Leader deleted successfully.');
    }
}

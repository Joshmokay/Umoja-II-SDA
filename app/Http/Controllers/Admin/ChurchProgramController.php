<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChurchProgram;
use App\Models\ProgramActivity;
use Illuminate\Http\Request;

class ChurchProgramController extends Controller
{
    public function index()
    {
        $programs = ChurchProgram::orderBy('day')->orderBy('start_time')->get();
        return view('admin.church-programs.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.church-programs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'day' => 'required|string|max:50',
            'start_time' => 'nullable|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i',
            'category' => 'required|string|max:50',
            'is_recurring' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'integer',
            'activities' => 'nullable|array',
            'activities.*.name' => 'required|string|max:255',
            'activities.*.start_time' => 'nullable|date_format:H:i',
            'activities.*.end_time' => 'nullable|date_format:H:i',
            'activities.*.description' => 'nullable|string',
        ]);

        $program = ChurchProgram::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'day' => $validated['day'],
            'start_time' => $validated['start_time'] ?? null,
            'end_time' => $validated['end_time'] ?? null,
            'category' => $validated['category'],
            'is_recurring' => $request->has('is_recurring'),
            'is_active' => $request->has('is_active'),
            'order' => $validated['order'] ?? 0,
        ]);

        if (!empty($validated['activities'])) {
            foreach ($validated['activities'] as $index => $activity) {
                $program->activities()->create([
                    'name' => $activity['name'],
                    'start_time' => $activity['start_time'] ?? null,
                    'end_time' => $activity['end_time'] ?? null,
                    'description' => $activity['description'] ?? null,
                    'order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.church-programs.index')->with('success', 'Program created successfully.');
    }

    public function edit(ChurchProgram $churchProgram)
    {
        $churchProgram->load('activities');
        return view('admin.church-programs.edit', compact('churchProgram'));
    }

    public function update(Request $request, ChurchProgram $churchProgram)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'day' => 'required|string|max:50',
            'start_time' => 'nullable|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i',
            'category' => 'required|string|max:50',
            'is_recurring' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'integer',
            'activities' => 'nullable|array',
            'activities.*.name' => 'required|string|max:255',
            'activities.*.start_time' => 'nullable|date_format:H:i',
            'activities.*.end_time' => 'nullable|date_format:H:i',
            'activities.*.description' => 'nullable|string',
        ]);

        $churchProgram->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'day' => $validated['day'],
            'start_time' => $validated['start_time'] ?? null,
            'end_time' => $validated['end_time'] ?? null,
            'category' => $validated['category'],
            'is_recurring' => $request->has('is_recurring'),
            'is_active' => $request->has('is_active'),
            'order' => $validated['order'] ?? 0,
        ]);

        // Delete old activities and recreate to handle sorting/removing simply
        $churchProgram->activities()->delete();

        if (!empty($validated['activities'])) {
            foreach ($validated['activities'] as $index => $activity) {
                $churchProgram->activities()->create([
                    'name' => $activity['name'],
                    'start_time' => $activity['start_time'] ?? null,
                    'end_time' => $activity['end_time'] ?? null,
                    'description' => $activity['description'] ?? null,
                    'order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.church-programs.index')->with('success', 'Program updated successfully.');
    }

    public function destroy(ChurchProgram $churchProgram)
    {
        $churchProgram->delete();
        return redirect()->route('admin.church-programs.index')->with('success', 'Program deleted successfully.');
    }
}

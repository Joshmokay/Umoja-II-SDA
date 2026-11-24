<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudyGuide;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class StudyGuideController extends Controller
{
    public function index()
    {
        $guides = StudyGuide::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.study-guides.index', compact('guides'));
    }

    public function create()
    {
        return view('admin.study-guides.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'author' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'file_path' => 'nullable|file|mimes:pdf|max:10240', // 10MB Max PDF
            'is_published' => 'boolean'
        ]);

        $validated['slug'] = Str::slug($validated['title']) . '-' . uniqid();
        $validated['is_published'] = $request->has('is_published');

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('study-guides/covers', 'public');
        }

        if ($request->hasFile('file_path')) {
            $validated['file_path'] = $request->file('file_path')->store('study-guides/files', 'public');
        }

        if (isset($validated['content'])) {
            $validated['content'] = clean($validated['content']);
        }

        StudyGuide::create($validated);

        return redirect()->route('admin.study-guides.index')->with('success', 'Study Guide created successfully.');
    }

    public function edit(StudyGuide $study_guide)
    {
        return view('admin.study-guides.form', compact('study_guide'));
    }

    public function update(Request $request, StudyGuide $study_guide)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'author' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'file_path' => 'nullable|file|mimes:pdf|max:10240',
            'is_published' => 'boolean'
        ]);

        $validated['is_published'] = $request->has('is_published');

        if ($request->hasFile('cover_image')) {
            if ($study_guide->cover_image) {
                Storage::disk('public')->delete($study_guide->cover_image);
            }
            $validated['cover_image'] = $request->file('cover_image')->store('study-guides/covers', 'public');
        }

        if ($request->hasFile('file_path')) {
            if ($study_guide->file_path) {
                Storage::disk('public')->delete($study_guide->file_path);
            }
            $validated['file_path'] = $request->file('file_path')->store('study-guides/files', 'public');
        }

        if (isset($validated['content'])) {
            $validated['content'] = clean($validated['content']);
        }

        $study_guide->update($validated);

        return redirect()->route('admin.study-guides.index')->with('success', 'Study Guide updated successfully.');
    }

    public function destroy(StudyGuide $study_guide)
    {
        if ($study_guide->cover_image) {
            Storage::disk('public')->delete($study_guide->cover_image);
        }
        if ($study_guide->file_path) {
            Storage::disk('public')->delete($study_guide->file_path);
        }
        
        $study_guide->delete();

        return redirect()->route('admin.study-guides.index')->with('success', 'Study Guide deleted successfully.');
    }
}

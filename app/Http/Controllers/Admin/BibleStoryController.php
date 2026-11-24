<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BibleStory;
use App\Models\BibleStoryLesson;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BibleStoryController extends Controller
{
    public function index()
    {
        $stories = BibleStory::orderBy('order')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.bible-stories.index', compact('stories'));
    }

    public function create()
    {
        return view('admin.bible-stories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'content' => 'required|string',
            'is_published' => 'boolean',
            'lesson_title' => 'nullable|string|max:255',
            'lesson_content' => 'required_with:lesson_title|string',
            'questions' => 'nullable|array',
            'questions.*.question' => 'required|string',
            'questions.*.option_a' => 'required|string',
            'questions.*.option_b' => 'required|string',
            'questions.*.option_c' => 'required|string',
            'questions.*.option_d' => 'required|string',
            'questions.*.correct_answer' => 'required|in:A,B,C,D',
        ]);

        $data = $request->except(['image', 'lesson_title', 'lesson_content', 'questions']);
        $data['slug'] = Str::slug($data['title']) . '-' . uniqid();
        $data['is_published'] = $request->has('is_published');
        $data['order'] = BibleStory::max('order') + 1;

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('bible_stories', 'public');
        }

        $story = BibleStory::create($data);

        if ($request->filled('lesson_content')) {
            $story->lesson()->create([
                'title' => $request->lesson_title,
                'content' => $request->lesson_content,
            ]);
        }

        if ($request->has('questions') && is_array($request->questions)) {
            foreach ($request->questions as $index => $q) {
                $story->quizQuestions()->create([
                    'question' => $q['question'],
                    'option_a' => $q['option_a'],
                    'option_b' => $q['option_b'],
                    'option_c' => $q['option_c'],
                    'option_d' => $q['option_d'],
                    'correct_answer' => $q['correct_answer'],
                    'order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.bible-stories.index')->with('success', 'Bible Story created successfully.');
    }

    public function edit(BibleStory $bibleStory)
    {
        $bibleStory->load(['lesson', 'quizQuestions']);
        return view('admin.bible-stories.edit', compact('bibleStory'));
    }

    public function update(Request $request, BibleStory $bibleStory)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'content' => 'required|string',
            'is_published' => 'boolean',
            'lesson_title' => 'nullable|string|max:255',
            'lesson_content' => 'required_with:lesson_title|string',
            'questions' => 'nullable|array',
            'questions.*.question' => 'required|string',
            'questions.*.option_a' => 'required|string',
            'questions.*.option_b' => 'required|string',
            'questions.*.option_c' => 'required|string',
            'questions.*.option_d' => 'required|string',
            'questions.*.correct_answer' => 'required|in:A,B,C,D',
        ]);

        $data = $request->except(['image', 'lesson_title', 'lesson_content', 'questions']);
        $data['is_published'] = $request->has('is_published');
        
        if ($request->title !== $bibleStory->title) {
            $data['slug'] = Str::slug($data['title']) . '-' . uniqid();
        }

        if ($request->hasFile('image')) {
            if ($bibleStory->image_path) {
                Storage::disk('public')->delete($bibleStory->image_path);
            }
            $data['image_path'] = $request->file('image')->store('bible_stories', 'public');
        }

        $bibleStory->update($data);

        if ($request->filled('lesson_content')) {
            $bibleStory->lesson()->updateOrCreate(
                ['bible_story_id' => $bibleStory->id],
                [
                    'title' => $request->lesson_title,
                    'content' => $request->lesson_content,
                ]
            );
        } else {
            $bibleStory->lesson()->delete();
        }

        // Recreate questions
        $bibleStory->quizQuestions()->delete();
        if ($request->has('questions') && is_array($request->questions)) {
            foreach ($request->questions as $index => $q) {
                $bibleStory->quizQuestions()->create([
                    'question' => $q['question'],
                    'option_a' => $q['option_a'],
                    'option_b' => $q['option_b'],
                    'option_c' => $q['option_c'],
                    'option_d' => $q['option_d'],
                    'correct_answer' => $q['correct_answer'],
                    'order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.bible-stories.index')->with('success', 'Bible Story updated successfully.');
    }

    public function destroy(BibleStory $bibleStory)
    {
        if ($bibleStory->image_path) {
            Storage::disk('public')->delete($bibleStory->image_path);
        }
        $bibleStory->delete();
        return redirect()->route('admin.bible-stories.index')->with('success', 'Bible Story deleted successfully.');
    }
}

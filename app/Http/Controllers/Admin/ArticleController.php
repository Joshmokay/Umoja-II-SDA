<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::with('category')->orderBy('created_at', 'desc');
        
        if ($request->has('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }
        
        $articles = $query->paginate(15)->appends($request->query());
        return view('admin.articles.index', compact('articles'));
    }

    public function create(Request $request)
    {
        $categories = ArticleCategory::all();
        $preselected_category = null;
        if ($request->has('category')) {
            $preselected_category = ArticleCategory::where('slug', $request->category)->first();
        }
        return view('admin.articles.create', compact('categories', 'preselected_category'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:article_categories,id',
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status' => 'required|in:published,draft',
            'is_featured' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']) . '-' . time();
        
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('public/articles');
            $validated['featured_image'] = str_replace('public/', 'storage/', $path);
        }

        if ($validated['status'] === 'published') {
            $validated['published_at'] = now();
        }

        Article::create($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Article created successfully.');
    }

    public function edit(Article $article)
    {
        $categories = ArticleCategory::all();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:article_categories,id',
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status' => 'required|in:published,draft',
            'is_featured' => 'boolean',
        ]);

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('public/articles');
            $validated['featured_image'] = str_replace('public/', 'storage/', $path);
        }

        $validated['is_featured'] = $request->has('is_featured');

        if ($validated['status'] === 'published' && !$article->published_at) {
            $validated['published_at'] = now();
        }

        $article->update($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Article updated successfully.');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Article deleted successfully.');
    }
}

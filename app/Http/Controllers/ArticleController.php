<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleCategory;

class ArticleController extends Controller
{
    public function category($category_slug)
    {
        $category = ArticleCategory::where('slug', $category_slug)->firstOrFail();
        $articles = Article::where('category_id', $category->id)
            ->where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->paginate(12);

        return view('articles.category', compact('category', 'articles'));
    }

    public function show($category_slug, $article_slug)
    {
        $category = ArticleCategory::where('slug', $category_slug)->firstOrFail();
        $article = Article::where('category_id', $category->id)
            ->where('slug', $article_slug)
            ->where('status', 'published')
            ->firstOrFail();

        return view('articles.show', compact('category', 'article'));
    }
}

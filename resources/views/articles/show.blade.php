@extends('layouts.front')

@section('title', $article->title . ' - ' . $category->name . ' - Umoja II SDA Church')

@section('styles')
<style>
    /* Legacy Styles specifically for The Seven Seals content */
    .seals-body {
        font-family: 'Garamond', 'Georgia', serif;
        font-size: 1.15rem;
        line-height: 1.8;
        color: #333333;
    }
    .seals-heading {
        font-family: 'Garamond', 'Georgia', serif;
        color: #8b0000;
        margin-top: 2rem;
        margin-bottom: 1rem;
        border-bottom: 1px solid #ccc;
        padding-bottom: 0.5rem;
    }
    .seals-heading h1, .seals-heading h2, .seals-heading h3 {
        margin: 0;
        font-weight: bold;
    }
    .seals-footer {
        font-family: 'Garamond', 'Georgia', serif;
        font-size: 0.9rem;
        font-style: italic;
        color: #666;
        border-top: 1px solid #eee;
        padding-top: 1rem;
        margin-top: 3rem;
    }
    .seals-image-container {
        margin: 2rem 0;
        text-align: center;
    }
    .seals-image-container img {
        max-width: 100%;
        height: auto;
        border: 4px solid #f4f4f4;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    .seals-caption {
        font-size: 0.9rem;
        color: #666;
        font-style: italic;
        margin-top: 0.5rem;
    }
    .seals-highlight {
        background-color: #fff9c4;
        padding: 0.2rem 0.4rem;
        border-radius: 3px;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .seals-body {
            font-size: 1.05rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-20 lg:pt-40 lg:pb-28 overflow-hidden bg-[#151515]">
    <!-- Background Elements -->
    <div class="absolute inset-0 z-0">
        @if($article->featured_image)
            <img src="{{ asset($article->featured_image) }}" alt="{{ $article->title }}" class="absolute inset-0 w-full h-full object-cover opacity-30">
        @endif
        <div class="absolute inset-0 bg-gradient-to-b from-[#151515]/90 via-[#1a1f2e]/80 to-[#151515]"></div>
    </div>

    <div class="max-w-[1000px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <a href="{{ route('articles.category', $category->slug) }}" class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/20 backdrop-blur-sm mb-6 hover:bg-white/20 transition-colors text-white/90">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            <span class="text-xs font-sans font-bold uppercase tracking-widest">{{ $category->name }}</span>
        </a>
        
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif text-white font-bold leading-tight mb-8 drop-shadow-lg">
            {{ $article->title }}
        </h1>
        
        <div class="flex flex-wrap items-center justify-center text-sm md:text-base font-sans text-gray-300 gap-x-6 gap-y-3">
            <span class="flex items-center">
                <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                Published on {{ $article->published_at->format('F d, Y') }}
            </span>
            @if($article->author)
                <span class="flex items-center">
                    <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    By {{ $article->author }}
                </span>
            @endif
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="py-16 md:py-24 bg-white relative">
    <div class="max-w-[800px] mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Social Sharing (Optional) -->
        <div class="flex items-center justify-between py-6 border-b border-gray-100 mb-10">
            <h3 class="font-sans font-bold text-gray-800 tracking-wide uppercase text-sm">Share this article</h3>
            <div class="flex space-x-4">
                <a href="#" class="text-gray-400 hover:text-[#2B548B] transition-colors"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg></a>
                <a href="#" class="text-gray-400 hover:text-[#2B548B] transition-colors"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg></a>
            </div>
        </div>
        
        <!-- Main Article Content -->
        <!-- Pro-tip: the seals-body class maps to the legacy styles we defined above -->
        <article class="prose prose-lg md:prose-xl max-w-none prose-a:text-[#2B548B] hover:prose-a:text-[#1E3F6C] prose-img:rounded-xl prose-img:shadow-md seals-body">
            {!! clean_html($article->content) !!}
        </article>
        
        <!-- Article Footer / Author Bio -->
        <div class="mt-16 pt-10 border-t border-gray-100 flex flex-col md:flex-row items-center md:items-start gap-6">
            <div class="w-20 h-20 rounded-full bg-gray-100 flex items-center justify-center shrink-0 border-4 border-white shadow-sm">
                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            </div>
            <div class="text-center md:text-left">
                <h4 class="font-serif text-xl font-bold text-gray-900 mb-2">Written by {{ $article->author ?? 'Umoja II SDA Church' }}</h4>
                <p class="font-sans text-gray-600 text-sm md:text-base leading-relaxed">
                    This article is part of our {{ $category->name }} series, dedicated to helping members and guests grow deeper in faith and Biblical understanding.
                </p>
                <div class="mt-4">
                    <a href="{{ route('articles.category', $category->slug) }}" class="text-[#2B548B] hover:text-[#1E3F6C] font-sans font-bold text-sm uppercase tracking-wide transition-colors">
                        View more from this category &rarr;
                    </a>
                </div>
            </div>
        </div>
        
    </div>
</section>
@endsection

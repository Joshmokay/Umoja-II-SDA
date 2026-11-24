@extends('layouts.front')

@section('title', $category->name . ' - Umoja II SDA Church')

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-20 lg:pt-40 lg:pb-28 overflow-hidden bg-[#151515]">
    <!-- Background Elements -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-b from-[#151515] via-[#1a1f2e] to-[#151515]"></div>
        <!-- Decorative Grid -->
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTEgMWgydjJIMUMxeiIgZmlsbD0icmdiYSgyNTUsIDI1NSwgMjU1LCAwLjA1KSIgZmlsbC1ydWxlPSJldmVub2RkIi8+PC9zdmc+')] opacity-30"></div>
    </div>

    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/20 backdrop-blur-sm mb-6">
            <span class="w-2 h-2 rounded-full bg-[#3B82F6] animate-pulse"></span>
            <span class="text-xs font-sans font-bold uppercase tracking-widest text-white/90">Articles</span>
        </div>
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif text-white font-bold leading-tight mb-6 drop-shadow-lg">
            {{ $category->name }}
        </h1>
        @if($category->description)
            <p class="max-w-2xl mx-auto text-lg md:text-xl text-gray-300 font-sans font-light">
                {{ $category->description }}
            </p>
        @endif
    </div>
</section>

<!-- Content Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
        
        @if($articles->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($articles as $article)
                    <article class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 group border border-gray-100 flex flex-col h-full">
                        <a href="{{ route('articles.show', [$category->slug, $article->slug]) }}" class="block relative aspect-[16/9] overflow-hidden">
                            @if($article->featured_image)
                                <img src="{{ asset($article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </a>
                        
                        <div class="p-6 md:p-8 flex-grow flex flex-col">
                            <div class="flex items-center text-sm font-sans text-gray-500 mb-4 space-x-4">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    {{ $article->published_at->format('M d, Y') }}
                                </span>
                                @if($article->author)
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        {{ $article->author }}
                                    </span>
                                @endif
                            </div>
                            
                            <h3 class="text-xl md:text-2xl font-serif text-[#151515] font-bold mb-3 leading-snug group-hover:text-[#2B548B] transition-colors">
                                <a href="{{ route('articles.show', [$category->slug, $article->slug]) }}">
                                    {{ $article->title }}
                                </a>
                            </h3>
                            
                            <p class="text-gray-600 font-sans line-clamp-3 mb-6">
                                {{ $article->excerpt ?? Str::limit(strip_tags($article->content), 150) }}
                            </p>
                            
                            <div class="mt-auto pt-4 border-t border-gray-100">
                                <a href="{{ route('articles.show', [$category->slug, $article->slug]) }}" class="inline-flex items-center text-[#2B548B] font-sans font-bold text-sm tracking-wide hover:text-[#1E3F6C] transition-colors uppercase group/btn">
                                    Read Article 
                                    <svg class="w-4 h-4 ml-2 transform transition-transform duration-300 group-hover/btn:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-16 flex justify-center">
                {{ $articles->links() }}
            </div>

        @else
            <div class="text-center py-16 bg-white rounded-2xl shadow-sm border border-gray-100">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H14"></path></svg>
                <h3 class="text-xl font-serif text-gray-800 font-bold mb-2">No Articles Found</h3>
                <p class="text-gray-500 font-sans">There are currently no articles in this category. Please check back later.</p>
            </div>
        @endif
        
    </div>
</section>
@endsection

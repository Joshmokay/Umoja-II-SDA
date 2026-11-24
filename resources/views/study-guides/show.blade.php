@extends('layouts.front')

@section('content')

<!-- Header Section -->
@php
    $usedFonts = [];
    $allGoogleFonts = ['EB Garamond', 'Merriweather', 'Libre Baskerville', 'Lora', 'Crimson Text', 'Crimson Pro', 'Source Serif 4', 'Noto Serif', 'PT Serif', 'Spectral', 'Alegreya', 'Cardo', 'Cormorant Garamond', 'Playfair Display', 'Libre Caslon Text', 'Bitter', 'Open Sans', 'Roboto', 'Inter', 'Lato', 'Montserrat', 'Poppins', 'Nunito', 'Raleway', 'Source Sans 3', 'Work Sans', 'DM Sans', 'Manrope', 'Figtree', 'Noto Sans', 'Ubuntu', 'Rubik', 'Archivo', 'Mulish', 'Quicksand', 'Cinzel', 'Cormorant', 'Abril Fatface', 'Oswald', 'Bebas Neue', 'Libre Franklin', 'Merriweather Sans', 'DM Serif Display', 'Prata', 'Source Code Pro', 'JetBrains Mono', 'Fira Code', 'IBM Plex Mono'];

    if ($guide->content) {
        foreach ($allGoogleFonts as $font) {
            if (stripos($guide->content, $font) !== false) {
                $usedFonts[] = urlencode($font) . ':ital,wght@0,400;0,700;1,400;1,700';
            }
        }
    }
@endphp
@if(count($usedFonts) > 0)
    <link href="https://fonts.googleapis.com/css2?family={{ implode('&family=', $usedFonts) }}&display=swap" rel="stylesheet">
@endif

<section class="bg-gray-50 border-b border-gray-200 pt-32 pb-12">
    <div class="container mx-auto px-4 max-w-5xl">
        
        <div class="mb-6 flex items-center space-x-3 text-sm font-medium text-gray-500">
            <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Home</a>
            <span>/</span>
            <a href="{{ route('study-guides.index') }}" class="hover:text-primary transition-colors">Study Guides</a>
            <span>/</span>
            <span class="text-gray-900 truncate">{{ $guide->title }}</span>
        </div>

        <div class="flex flex-col md:flex-row md:items-start gap-8 md:gap-12 bg-white p-8 md:p-10 rounded-3xl shadow-sm border border-gray-100">
            
            <!-- Cover Image (Left) -->
            <div class="w-full md:w-1/3 shrink-0">
                <div class="aspect-[3/4] bg-gray-100 rounded-2xl overflow-hidden shadow-md relative">
                    @if($guide->cover_image)
                        <img src="{{ Storage::url($guide->cover_image) }}" alt="{{ $guide->title }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-primary/5 text-primary/30">
                            <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Meta (Right) -->
            <div class="w-full md:w-2/3 flex flex-col justify-center h-full pt-2">
                @if($guide->category)
                    <span class="inline-block py-1 px-3 rounded text-xs font-bold tracking-wider uppercase bg-primary/10 text-primary mb-4 self-start">
                        {{ $guide->category }}
                    </span>
                @endif
                
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-serif font-bold text-gray-900 mb-6 leading-tight">
                    {{ $guide->title }}
                </h1>
                
                @if($guide->description)
                    <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                        {{ $guide->description }}
                    </p>
                @endif
                
                <div class="flex flex-wrap items-center gap-6 text-sm text-gray-500 mb-8 bg-gray-50 rounded-xl p-4 border border-gray-100 self-start">
                    @if($guide->author)
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            <span class="font-medium text-gray-900">{{ $guide->author }}</span>
                        </div>
                    @endif
                    
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="font-medium text-gray-900">{{ $guide->updated_at->format('M j, Y') }}</span>
                    </div>
                </div>

                @if($guide->file_path)
                    <a href="{{ Storage::url($guide->file_path) }}" target="_blank" class="inline-flex items-center justify-center px-8 py-3.5 bg-primary text-white rounded-xl hover:bg-primary/90 font-bold text-lg shadow-[0_4px_14px_0_rgba(11,27,51,0.39)] hover:shadow-[0_6px_20px_rgba(11,27,51,0.23)] hover:-translate-y-0.5 transition-all w-full sm:w-auto self-start">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Download Guide
                    </a>
                @endif
            </div>
            
        </div>
    </div>
</section>

<!-- Full Content Section -->
<section class="py-16 bg-white min-h-[40vh]">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="prose prose-lg md:prose-xl prose-indigo max-w-none prose-headings:font-serif prose-headings:text-gray-900 prose-p:text-gray-700 prose-p:leading-relaxed prose-a:text-primary hover:prose-a:text-primary/80">
            {!! $guide->content !!}
        </div>
    </div>
</section>

@endsection

@extends('layouts.front')

@section('content')

<!-- Hero Section -->
<section class="relative overflow-hidden min-h-[40vh] md:min-h-[50vh] flex items-center pt-48 pb-16 bg-[#1a2b42]">
    
    <!-- Background Image with Blend -->
    <div class="absolute inset-0 z-0">
        <!-- Assuming we don't have a specific background image, we can use a soft gradient base. If we had an image, it would be here with object-cover and mix-blend-overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-[#111e30] via-[#1a2b42] to-[#2B548B]"></div>
    </div>
    
    <!-- Decorative overlays for depth -->
    <div class="absolute inset-0 z-0 opacity-40 mix-blend-screen pointer-events-none">
        <div class="absolute -top-32 -right-32 w-[600px] h-[600px] bg-blue-500 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-indigo-500 rounded-full blur-[100px]"></div>
    </div>

    <!-- Church Logo Subtle Background -->
    <div class="absolute right-0 top-1/2 -translate-y-1/2 opacity-5 z-0 pointer-events-none">
        <img src="{{ asset('assets/adventist-symbol--white.svg') }}" alt="Background Logo" class="w-[600px] h-auto object-contain">
    </div>

    <div class="container mx-auto px-4 max-w-7xl relative z-10 text-center">
        <span class="inline-block py-1.5 px-5 rounded-full bg-white/10 text-white font-bold text-xs tracking-[0.2em] uppercase mb-6 border border-white/20 shadow-sm backdrop-blur-sm">
            Our Doctrines
        </span>
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif font-bold text-white leading-tight mb-6 drop-shadow-lg shadow-black/30">
            Fundamental Beliefs
        </h1>
        <div class="w-24 h-1 bg-accent mx-auto mb-8 rounded-full shadow-[0_2px_10px_rgba(251,191,36,0.6)]"></div>
        <p class="text-lg md:text-xl text-white/95 mb-0 leading-relaxed font-sans max-w-3xl mx-auto font-light drop-shadow-sm">
            Seventh-day Adventists accept the Bible as their only creed and hold certain fundamental beliefs to be the teaching of the Holy Scriptures.
        </p>
    </div>
    
    <!-- Subtle bottom transition -->
    <div class="absolute bottom-0 left-0 w-full h-16 bg-gradient-to-t from-gray-50 to-transparent z-10"></div>
</section>

<!-- Beliefs Grid Section -->
<section class="py-20 bg-gray-50 relative z-20">
    <div class="container mx-auto px-4 max-w-[1400px]">
        
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-serif font-bold text-primary mb-6">The 28 Fundamental Beliefs</h2>
            <p class="text-gray-600 font-sans text-lg">
                These statements constitute the church's understanding and expression of the teaching of Scripture.
            </p>
        </div>

        @if(!empty($beliefs))
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                @foreach($beliefs as $belief)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 hover:shadow-md transition-shadow duration-300 flex flex-col h-full group relative overflow-hidden">
                        
                        <!-- Number watermark -->
                        <div class="absolute -right-6 -top-10 text-[120px] font-serif font-bold text-gray-50 opacity-50 pointer-events-none transition-transform group-hover:scale-110 duration-500">
                            {{ $belief['number'] }}
                        </div>

                        <!-- Header -->
                        <div class="flex items-start mb-5 relative z-10">
                            <div class="flex-shrink-0 w-12 h-12 bg-primary/10 text-primary rounded-lg flex items-center justify-center font-bold text-xl mr-5">
                                {{ $belief['number'] }}
                            </div>
                            <h3 class="text-xl md:text-2xl font-serif font-bold text-gray-900 leading-tight mt-1">
                                {{ $belief['title'] }}
                            </h3>
                        </div>
                        
                        <!-- Content -->
                        <div class="prose prose-sm prose-gray max-w-none flex-grow mb-6 relative z-10">
                            <p class="text-gray-700 leading-relaxed font-sans text-[15px]">
                                {{ $belief['full_text'] ?? $belief['summary'] }}
                            </p>
                        </div>
                        
                        <!-- Scriptures -->
                        @if(!empty($belief['scriptures']))
                            <div class="mt-auto pt-5 border-t border-gray-100 relative z-10">
                                <p class="text-[13px] text-gray-500 font-sans italic leading-relaxed">
                                    <span class="font-semibold text-primary/70 not-italic mr-1">References:</span>
                                    {{ $belief['scriptures'] }}
                                </p>
                            </div>
                        @endif
                        
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-20 bg-white rounded-xl shadow-sm border border-gray-100">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                <h3 class="text-xl font-serif font-bold text-gray-700 mb-2">Beliefs Content Unavailable</h3>
                <p class="text-gray-500 font-sans">The fundamental beliefs data could not be loaded at this time.</p>
            </div>
        @endif
        
    </div>
</section>

@endsection

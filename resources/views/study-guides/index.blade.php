@extends('layouts.front')

@section('content')

<!-- Hero Section -->
<section class="relative overflow-hidden min-h-[40vh] md:min-h-[50vh] flex items-center pt-48 pb-16 bg-[#1a2b42]">
    
    <!-- Background Image with Blend -->
    <div class="absolute inset-0 z-0">
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
            Discover & Learn
        </span>
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif font-bold text-white leading-tight mb-6 drop-shadow-lg shadow-black/30">
            Study Guides
        </h1>
        <div class="w-24 h-1 bg-accent mx-auto mb-8 rounded-full shadow-[0_2px_10px_rgba(251,191,36,0.6)]"></div>
        <p class="text-lg md:text-xl text-white/95 mb-0 leading-relaxed font-sans max-w-3xl mx-auto font-light drop-shadow-sm">
            Deepen your understanding of Scripture through our structured, step-by-step study guides.
        </p>
    </div>
    
    <!-- Subtle bottom transition -->
    <div class="absolute bottom-0 left-0 w-full h-16 bg-gradient-to-t from-gray-50 to-transparent z-10"></div>
</section>

<!-- Guides Grid Section -->
<section class="py-20 bg-gray-50 relative z-20 min-h-[50vh]">
    <div class="container mx-auto px-4 max-w-[1400px]">
        
        @if($guides->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($guides as $guide)
                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 flex flex-col overflow-hidden group">
                        
                        <!-- Cover Image -->
                        <div class="relative h-56 bg-gray-100 overflow-hidden">
                            @if($guide->cover_image)
                                <img src="{{ Storage::url($guide->cover_image) }}" alt="{{ $guide->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-primary/5 text-primary/30">
                                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                </div>
                            @endif
                            
                            @if($guide->category)
                                <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase text-primary shadow-sm">
                                    {{ $guide->category }}
                                </div>
                            @endif
                        </div>

                        <!-- Content -->
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-serif font-bold text-gray-900 mb-3 group-hover:text-primary transition-colors">
                                <a href="{{ route('study-guides.show', $guide->slug) }}" class="focus:outline-none">
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    {{ $guide->title }}
                                </a>
                            </h3>
                            
                            <p class="text-gray-600 text-sm leading-relaxed mb-6 line-clamp-3 flex-grow">
                                {{ Str::limit($guide->description, 120) }}
                            </p>
                            
                            <!-- Footer -->
                            <div class="pt-4 border-t border-gray-100 flex items-center justify-between mt-auto">
                                <span class="text-xs text-gray-500 font-medium">
                                    @if($guide->author)
                                        By {{ $guide->author }}
                                    @endif
                                </span>
                                <span class="text-accent font-bold text-sm flex items-center group-hover:translate-x-1 transition-transform">
                                    Read Guide
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </span>
                            </div>
                        </div>
                        
                    </div>
                @endforeach
            </div>

            <div class="mt-12">
                {{ $guides->links() }}
            </div>
        @else
            <div class="text-center py-20 bg-white rounded-2xl shadow-sm border border-gray-100 max-w-3xl mx-auto">
                <div class="w-20 h-20 bg-primary/5 text-primary rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h3 class="text-2xl font-serif font-bold text-gray-900 mb-3">Check Back Soon</h3>
                <p class="text-gray-500 font-sans text-lg">We are currently preparing new study guides. Please check back later for spiritual resources.</p>
            </div>
        @endif
        
    </div>
</section>

@endsection

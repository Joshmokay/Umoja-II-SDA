@if(isset($healthCategory))
    @php
        $featuredArticle = null;
        $secondaryArticles = collect();
        if ($healthArticles->isNotEmpty()) {
            // Find the first featured article, or default to the latest if none is marked featured
            $featuredArticle = $healthArticles->where('is_featured', true)->first() ?? $healthArticles->first();
            
            // Secondary articles are the next 2 latest articles (excluding the featured one)
            $secondaryArticles = $healthArticles->where('id', '!=', $featuredArticle->id)->take(2);
        }
    @endphp

    <section class="py-20 md:py-28 bg-white overflow-hidden border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="flex items-center justify-between mb-12 border-b-2 border-gray-900 pb-4 scroll-reveal">
                <h2 class="text-3xl md:text-4xl font-serif font-black text-gray-900 tracking-tight uppercase">
                    Health & Lifestyle
                </h2>
                <a href="{{ route('health-lifestyle.index') }}" class="hidden sm:flex items-center text-sm font-bold text-gray-900 hover:text-blue-600 transition-colors uppercase tracking-widest group">
                    Explore Lifestyle
                    <svg class="w-5 h-5 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            @if($healthArticles->isEmpty())
                <div class="bg-gray-50 border border-dashed border-gray-300 rounded-xl p-12 text-center scroll-reveal">
                    <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Check back soon</h3>
                    <p class="text-gray-500 max-w-md mx-auto">We are currently preparing insightful articles on health and wellbeing. New content will be published here shortly.</p>
                </div>
            @else
                <div class="flex flex-col lg:flex-row gap-12 lg:gap-16">
                    
                    <!-- Main Featured Article (Left Side) -->
                    <div class="lg:w-7/12 flex flex-col scroll-reveal">
                        <a href="{{ route('health-lifestyle.show', $featuredArticle->slug) }}" class="group block relative overflow-hidden mb-6 aspect-video bg-gray-100">
                            @if($featuredArticle->featured_image)
                                <img src="{{ asset($featuredArticle->featured_image) }}" alt="{{ $featuredArticle->title }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 ease-in-out">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gray-200 text-gray-400 font-serif italic">
                                    No Image Available
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition-colors duration-300"></div>
                        </a>
                        
                        <div class="flex items-center gap-2 mb-4">
                            <span class="bg-gray-100 text-gray-700 text-xs font-bold px-3 py-1 uppercase tracking-wider flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                                {{ $healthCategory->name }}
                            </span>
                        </div>

                        <a href="{{ route('health-lifestyle.show', $featuredArticle->slug) }}" class="block group-hover:text-blue-700 transition-colors">
                            <h3 class="text-3xl md:text-5xl font-serif font-bold text-gray-900 mb-4 leading-tight tracking-tight">
                                {{ $featuredArticle->title }}
                            </h3>
                        </a>

                        <p class="text-gray-600 text-lg leading-relaxed mb-6 font-serif">
                            {{ $featuredArticle->excerpt ?? Str::limit(strip_tags($featuredArticle->content), 150) }}
                        </p>

                        <div class="mt-auto flex items-center text-sm font-bold text-gray-500 uppercase tracking-widest">
                            @if($featuredArticle->author)
                                <span class="text-gray-900 mr-2">{{ $featuredArticle->author }}</span>
                            @endif
                            @if($featuredArticle->published_at)
                                &mdash; <span class="ml-2">{{ $featuredArticle->published_at->format('M j, Y') }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- Secondary Articles (Right Side) -->
                    @if($secondaryArticles->isNotEmpty())
                    <div class="lg:w-5/12 flex flex-col sm:flex-row lg:flex-col gap-10">
                        @foreach($secondaryArticles as $index => $article)
                            <div class="flex-1 flex flex-col scroll-reveal delay-{{ ($index + 1) * 100 }}">
                                <a href="{{ route('health-lifestyle.show', $article->slug) }}" class="group block relative overflow-hidden mb-4 aspect-[4/3] sm:aspect-video lg:aspect-[4/3] bg-gray-100">
                                    @if($article->featured_image)
                                        <img src="{{ asset($article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 ease-in-out">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gray-200 text-gray-400 font-serif italic text-sm">
                                            No Image
                                        </div>
                                    @endif
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition-colors duration-300"></div>
                                </a>
                                
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="bg-gray-100 text-gray-700 text-[10px] font-bold px-2 py-1 uppercase tracking-wider flex items-center">
                                        <svg class="w-3 h-3 mr-1 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                                        Wellbeing
                                    </span>
                                </div>

                                <a href="{{ route('health-lifestyle.show', $article->slug) }}" class="block group-hover:text-blue-700 transition-colors">
                                    <h3 class="text-xl md:text-2xl font-serif font-bold text-gray-900 mb-3 leading-snug">
                                        {{ $article->title }}
                                    </h3>
                                </a>

                                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                                    {{ $article->excerpt ?? Str::limit(strip_tags($article->content), 100) }}
                                </p>

                                <div class="mt-auto flex items-center text-xs font-bold text-gray-500 uppercase tracking-widest">
                                    @if($article->author)
                                        <span class="text-gray-900">{{ $article->author }}</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endif
                    
                </div>
            @endif
            
            <!-- Mobile Explore Link -->
            <div class="mt-10 text-center sm:hidden">
                <a href="{{ route('health-lifestyle.index') }}" class="inline-flex items-center text-sm font-bold text-gray-900 hover:text-blue-600 transition-colors uppercase tracking-widest border-b border-gray-900 pb-1">
                    Explore Lifestyle
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>
    </section>
@endif
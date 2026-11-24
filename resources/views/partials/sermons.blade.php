<section class="section-container">
    <div class="section-content">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 scroll-reveal">
            <div class="section-header-left mb-0">
                <h2 class="section-title">Latest Sermons</h2>
                <div class="section-accent-left"></div>
            </div>
            <a href="#" class="inline-flex items-center text-primary font-semibold hover:text-secondary transition-colors mb-4 md:mb-0">
                View All <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($sermons ?? [] as $index => $sermon)
            <!-- Sermon -->
            <div class="content-card group scroll-reveal delay-{{ ($index % 3 + 1) * 100 }}">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ $sermon->thumbnail_path ? (Str::startsWith($sermon->thumbnail_path, 'http') ? $sermon->thumbnail_path : asset('storage/' . $sermon->thumbnail_path)) : 'https://images.unsplash.com/photo-1544427920-c49ccfbc23f0?q=80&w=2070&auto=format&fit=crop' }}" alt="{{ $sermon->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-black/40 transition-colors flex items-center justify-center">
                        @if($sermon->video_url)
                        <a href="{{ $sermon->video_url }}" target="_blank" class="w-12 h-12 bg-white/90 rounded-full flex items-center justify-center text-primary group-hover:scale-110 transition-transform cursor-pointer shadow-lg">
                            <svg class="w-6 h-6 ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg>
                        </a>
                        @endif
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="font-serif font-bold text-xl text-gray-800 mb-1 group-hover:text-primary transition-colors">{{ $sermon->title }}</h3>
                    <p class="text-sm text-gray-500 font-sans mb-4">{{ $sermon->speaker }} &bull; {{ \Carbon\Carbon::parse($sermon->date)->format('F j, Y') }}</p>
                    <div class="flex space-x-4 border-t border-gray-100 pt-4">
                        @if($sermon->video_url)
                        <a href="{{ $sermon->video_url }}" target="_blank" class="text-xs font-sans font-bold text-secondary uppercase tracking-wider hover:text-primary transition-colors flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Watch
                        </a>
                        @endif
                        @if($sermon->audio_url)
                        <a href="{{ $sermon->audio_url }}" target="_blank" class="text-xs font-sans font-bold text-secondary uppercase tracking-wider hover:text-primary transition-colors flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"></path></svg> Listen
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full">
                <p class="text-gray-500">No sermons available.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

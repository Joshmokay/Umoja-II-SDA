<section class="py-16 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-10 border-b border-gray-200 pb-4">
            <h2 class="text-sm font-bold font-sans text-gray-500 uppercase tracking-widest">Media Gallery</h2>
            <a href="#" class="text-sm font-sans font-bold text-primary hover:text-secondary uppercase tracking-wider flex items-center transition-colors">
                View Gallery <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

        <div class="columns-1 sm:columns-2 lg:columns-3 gap-6 space-y-6">
            @forelse($galleries ?? [] as $gallery)
            <!-- Gallery Item -->
            <div class="group relative rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 break-inside-avoid cursor-pointer">
                <img src="{{ $gallery->cover_image ? (Str::startsWith($gallery->cover_image, 'http') ? $gallery->cover_image : asset('storage/' . $gallery->cover_image)) : 'https://images.unsplash.com/photo-1511632765486-a01980e01a18?q=80&w=2070&auto=format&fit=crop' }}" loading="lazy" alt="{{ $gallery->title }}" class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
            </div>
            @empty
            <p class="text-gray-500 font-sans">No gallery items available.</p>
            @endforelse
        </div>
    </div>
</section>

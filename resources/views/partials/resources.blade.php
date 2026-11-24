<section class="py-16 bg-section border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row gap-12">
            
            <!-- Downloads & Resources (Grid) -->
            <div class="md:w-2/3">
                <div class="flex justify-between items-end mb-8 border-b-2 border-gray-100 pb-4">
                    <h2 class="text-2xl font-serif font-bold text-primary uppercase tracking-widest text-sm">Downloads & Resources</h2>
                    <a href="#" class="text-sm font-sans font-bold text-secondary hover:text-primary uppercase tracking-wider flex items-center transition-colors">
                        View All <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>

                <div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
                    @forelse($downloads ?? [] as $download)
                    <a href="{{ $download->file_path ? (Str::startsWith($download->file_path, 'http') ? $download->file_path : asset('storage/' . $download->file_path)) : '#' }}" target="_blank" class="bg-white border border-gray-100 rounded p-6 flex flex-col items-center justify-center text-center shadow-sm hover:shadow-md hover:border-primary transition-all group">
                        <!-- Icon (you could dynamically pick based on file type or category, fallback to generic document) -->
                        <svg class="w-8 h-8 text-secondary mb-3 group-hover:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        <span class="font-sans font-bold text-gray-800 text-sm group-hover:text-primary transition-colors">{{ $download->title }}</span>
                    </a>
                    @empty
                    <p class="text-gray-500 text-sm col-span-2 lg:col-span-3">No downloads available.</p>
                    @endforelse
                </div>
            </div>

            <!-- Prayer Requests (Right Side Card) -->
            <div class="md:w-1/3">
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden h-full flex flex-col relative group">
                    <img src="https://images.unsplash.com/photo-1544427920-c49ccfbc23f0?q=80&w=2070&auto=format&fit=crop" alt="Prayer" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-white via-white/90 to-white/40"></div>
                    
                    <div class="relative z-10 p-8 flex flex-col h-full justify-end">
                        <h2 class="text-2xl font-serif font-bold text-primary uppercase tracking-widest text-sm mb-4">Prayer Requests</h2>
                        <h3 class="text-2xl font-serif font-bold text-gray-800 mb-3">We believe in the power of prayer.</h3>
                        <p class="text-gray-600 font-sans mb-8">
                            Share your request with us and our prayer team will stand with you.
                        </p>
                        <button @click="$dispatch('open-prayer-modal')" class="inline-block bg-primary hover:bg-secondary text-white font-sans font-bold py-3 px-6 rounded text-center transition-colors shadow-md text-sm uppercase tracking-wider w-full">
                            Submit Prayer Request
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

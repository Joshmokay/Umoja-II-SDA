<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <h4 class="text-primary font-sans font-bold tracking-widest uppercase text-sm mb-3">Ministries</h4>
            <h2 class="text-3xl md:text-4xl font-serif font-bold text-gray-800">Young Adults & Ambassadors</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-{{ count($ministries ?? []) > 2 ? '3' : '2' }} gap-8">
            @forelse($ministries ?? [] as $ministry)
            <!-- Ministry -->
            <div class="group relative rounded-xl overflow-hidden shadow-lg h-80 flex items-end">
                <img src="{{ $ministry->cover_image ? (Str::startsWith($ministry->cover_image, 'http') ? $ministry->cover_image : asset('storage/' . $ministry->cover_image)) : 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=2070&auto=format&fit=crop' }}" alt="{{ $ministry->name }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-primary/50 to-transparent"></div>
                <div class="relative z-10 p-8 w-full">
                    <h3 class="text-2xl font-serif font-bold text-white mb-2 uppercase tracking-wider">{{ $ministry->name }}</h3>
                    <p class="text-blue-100 font-sans mb-6 opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-4 group-hover:translate-y-0 max-w-sm">
                        {{ $ministry->description }}
                    </p>
                    <a href="#" class="inline-block border border-white text-white hover:bg-white hover:text-primary font-sans font-bold py-2 px-6 rounded transition-colors text-xs uppercase tracking-widest">Explore {{ $ministry->name }}</a>
                </div>
            </div>
            @empty
            <p class="text-gray-500 text-center col-span-full">No ministries found.</p>
            @endforelse
        </div>
    </div>
</section>

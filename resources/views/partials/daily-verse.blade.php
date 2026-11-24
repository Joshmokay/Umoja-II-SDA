<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 -mt-8 md:-mt-12 relative z-10">
    <div class="bg-wood rounded-xl shadow-2xl overflow-hidden relative">
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="relative p-10 md:p-16 flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-2/3 text-white mb-8 md:mb-0 text-center md:text-left">
                <p class="font-sans font-bold tracking-widest uppercase text-sm mb-4 text-blue-200">Daily Bible Verse</p>
                @if($dailyVerse ?? false)
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-serif font-bold leading-tight mb-4 drop-shadow-md">
                    "{{ $dailyVerse->verse_text }}"
                </h2>
                <p class="text-xl font-sans text-blue-100 font-semibold tracking-wide">{{ $dailyVerse->reference }} ({{ $dailyVerse->version }})</p>
                @else
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-serif font-bold leading-tight mb-4 drop-shadow-md">
                    "Commit to the Lord whatever you do, and he will establish your plans."
                </h2>
                <p class="text-xl font-sans text-blue-100 font-semibold tracking-wide">Proverbs 16:3 (NIV)</p>
                @endif
            </div>
            <div class="md:w-1/3 flex justify-center md:justify-end">
                <a href="#" class="inline-block border-2 border-white text-white hover:bg-white hover:text-gray-900 font-sans font-semibold py-3 px-8 rounded-full transition-all duration-300 uppercase tracking-wider text-sm shadow-lg">
                    View More Verses
                </a>
            </div>
        </div>
    </div>
</section>

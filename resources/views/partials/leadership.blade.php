<section class="py-16 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-10 border-b-2 border-gray-100 pb-4">
            <h2 class="text-2xl font-serif font-bold text-primary uppercase tracking-widest text-sm">Our Leadership</h2>
            <a href="#" class="text-sm font-sans font-bold text-secondary hover:text-primary uppercase tracking-wider flex items-center transition-colors">
                View All Leaders <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            
            @forelse($leaders ?? [] as $leader)
            <!-- Leader -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden text-center hover:shadow-lg transition-shadow group p-8">
                <div class="w-32 h-32 mx-auto rounded-full overflow-hidden border-4 border-gray-50 mb-4 group-hover:border-blue-100 transition-colors">
                    <img src="{{ $leader->image_path ? (Str::startsWith($leader->image_path, 'http') ? $leader->image_path : asset('storage/' . $leader->image_path)) : 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=2070&auto=format&fit=crop' }}" alt="{{ $leader->name }}" class="w-full h-full object-cover">
                </div>
                <h3 class="font-serif font-bold text-lg text-gray-800 group-hover:text-primary transition-colors">{{ $leader->name }}</h3>
                <p class="text-sm text-gray-500 font-sans mb-4">{{ $leader->role }}</p>
                <div class="flex justify-center space-x-3 text-gray-400">
                    @if($leader->facebook_url)
                    <a href="{{ $leader->facebook_url }}" target="_blank" class="hover:text-primary transition-colors"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg></a>
                    @endif
                    @if($leader->linkedin_url)
                    <a href="{{ $leader->linkedin_url }}" target="_blank" class="hover:text-primary transition-colors"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg></a>
                    @endif
                    @if($leader->email)
                    <a href="mailto:{{ $leader->email }}" class="hover:text-primary transition-colors"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg></a>
                    @endif
                </div>
            </div>
            @empty
            <p class="text-gray-500">No leaders available.</p>
            @endforelse

        </div>
    </div>
</section>

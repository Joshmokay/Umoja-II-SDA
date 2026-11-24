<section class="py-20 lg:py-24 bg-primary relative overflow-hidden">
    <!-- Decorative background patterns -->
    <div class="absolute inset-0 z-0">
        <svg class="absolute left-0 top-0 h-full w-full opacity-10" viewBox="0 0 100 100" preserveAspectRatio="none">
            <path d="M0,100 C20,0 50,0 100,100 Z" fill="currentColor"></path>
        </svg>
        <div class="absolute top-0 right-0 -mr-32 -mt-32 w-96 h-96 bg-white rounded-full opacity-5 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 -ml-32 -mb-32 w-96 h-96 bg-black rounded-full opacity-10 blur-3xl"></div>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        
        <div class="w-16 h-16 bg-white/10 rounded-full flex items-center justify-center text-white mx-auto mb-8 backdrop-blur-sm border border-white/20" x-data x-intersect.once="$el.classList.add('animate-fade-in-up')">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
        </div>
        
        <h2 class="text-3xl md:text-5xl font-serif font-bold text-white mb-6 leading-tight" x-data x-intersect.once="$el.classList.add('animate-fade-in-up')" style="animation-delay: 100ms;">
            How Can We Pray For You?
        </h2>
        
        <p class="text-xl text-primary-100 font-sans leading-relaxed mb-10 max-w-2xl mx-auto" x-data x-intersect.once="$el.classList.add('animate-fade-in-up')" style="animation-delay: 200ms;">
            We believe in the power of prayer and want to lift up your needs. Submit your prayer request, and our pastoral team will intercede on your behalf.
        </p>
        
        <div x-data x-intersect.once="$el.classList.add('animate-fade-in-up')" style="animation-delay: 300ms;">
            <button @click="$dispatch('open-prayer-modal')" class="inline-flex items-center justify-center px-8 py-4 border border-transparent text-lg font-bold rounded-lg text-primary bg-white hover:bg-gray-100 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1 font-sans tracking-wide">
                Submit a Prayer Request
            </button>
        </div>
        
    </div>
</section>

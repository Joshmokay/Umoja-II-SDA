<section class="py-24 bg-gray-50 border-t border-gray-100 relative overflow-hidden">
    <!-- Decorative Pattern -->
    <div class="absolute inset-0 z-0 opacity-30 bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:16px_16px]"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
            
            <div class="w-full lg:w-1/2" x-data x-intersect.once="$el.classList.add('animate-fade-in-up')">
                <div class="inline-flex items-center space-x-2 bg-white px-3 py-1.5 rounded-full mb-6 border border-red-100">
                    <span class="relative flex h-2.5 w-2.5">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-red-500"></span>
                    </span>
                    <span class="text-xs font-sans font-semibold tracking-widest text-red-600 uppercase">Live Broadcast</span>
                </div>
                
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-serif font-bold text-gray-900 mb-6 leading-tight">Worship With Us<br>From Anywhere</h2>
                
                <p class="text-lg text-gray-600 font-sans leading-relaxed mb-8">
                    Can't make it to church this week? Join our global online family. We broadcast our Divine Service and special events live every Sabbath.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ url('live-stream') }}" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-sm font-semibold rounded-md text-white bg-primary hover:bg-primary-dark transition-all duration-300 shadow-sm hover:shadow font-sans tracking-wide">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Watch Live Stream
                    </a>
                    <a href="{{ url('sermons') }}" class="inline-flex items-center justify-center px-6 py-3 border border-gray-200 text-sm font-semibold rounded-md text-gray-700 bg-white hover:bg-gray-50 transition-all duration-300 shadow-sm font-sans tracking-wide">
                        View Past Sermons
                    </a>
                </div>
            </div>
            
            <div class="w-full lg:w-1/2 relative" x-data x-intersect.once="$el.classList.add('animate-fade-in-up')" style="animation-delay: 200ms;">
                <div class="relative w-full aspect-video rounded-2xl overflow-hidden shadow-2xl border border-gray-200 bg-gray-900 group cursor-pointer">
                    <!-- Clean placeholder block for admin upload -->
                    <div class="absolute inset-0 flex items-center justify-center text-gray-500 z-0">
                        <svg class="w-16 h-16 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    
                    <div class="absolute inset-0 bg-black/40 group-hover:bg-black/30 transition-colors z-10"></div>
                    
                    <!-- Play Button Overlay -->
                    <div class="absolute inset-0 flex items-center justify-center z-20">
                        <div class="w-20 h-20 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300 border border-white/30">
                            <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4l12 6-12 6z"></path></svg>
                        </div>
                    </div>
                    
                    <div class="absolute bottom-4 left-4 z-20 bg-black/60 backdrop-blur-md px-3 py-1 rounded text-white text-xs font-sans font-semibold tracking-wider uppercase">
                        Sabbath Divine Service
                    </div>
                </div>
                
                <!-- Floating badge -->
                <div class="absolute -top-6 -right-6 bg-white p-4 rounded-xl shadow-lg border border-gray-100 hidden md:flex items-center space-x-3 animate-float" style="animation-delay: 1s;">
                    <div class="w-10 h-10 bg-red-50 rounded-full flex items-center justify-center text-red-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-gray-900">Live Now</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

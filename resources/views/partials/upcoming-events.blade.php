<section class="section-container">
    <div class="section-content">
        <!-- Upcoming Events Section -->
        <div class="mb-16">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 scroll-reveal">
                <div class="section-header-left mb-0">
                    <h2 class="section-title">Upcoming Events</h2>
                    <div class="section-accent-left"></div>
                </div>
                <a href="{{ route('events.index') }}" class="inline-flex items-center text-primary font-semibold hover:text-secondary transition-colors mb-4 md:mb-0">
                    View All Events <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            @if(!empty($upcomingEvents) && $upcomingEvents->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-6">
                    @foreach($upcomingEvents as $index => $event)
                        <div class="content-card flex flex-col h-full scroll-reveal delay-{{ ($index % 6 + 1) * 100 }}">
                            <!-- Cover Image -->
                            <div class="relative h-48 w-full bg-gray-200">
                                @if($event->image_path)
                                    <img src="{{ Str::startsWith($event->image_path, 'http') ? $event->image_path : asset('storage/' . $event->image_path) }}" alt="{{ $event->title }}" class="absolute inset-0 w-full h-full object-cover">
                                @else
                                    <div class="absolute inset-0 flex items-center justify-center text-gray-400">
                                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                @endif
                                
                                <!-- Date Badge on Image -->
                                <div class="absolute top-4 left-4 bg-white/90 backdrop-blur rounded-lg shadow px-3 py-2 text-center">
                                    <span class="block text-xs font-bold text-primary uppercase tracking-wider leading-none mb-1">{{ \Carbon\Carbon::parse($event->start_date)->format('M') }}</span>
                                    <span class="block text-xl font-bold text-gray-800 leading-none">{{ \Carbon\Carbon::parse($event->start_date)->format('d') }}</span>
                                </div>
                            </div>

                            <!-- Content Details -->
                            <div class="p-6 flex-grow flex flex-col">
                                <h3 class="text-xl font-serif font-bold text-gray-800 mb-4 line-clamp-2">
                                    {{ $event->title }}
                                </h3>
                                
                                <div class="space-y-3 mt-auto">
                                    <!-- Date & Time -->
                                    <div class="flex items-start text-gray-500">
                                        <svg class="w-5 h-5 mr-3 mt-0.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <span class="text-sm">
                                            {{ \Carbon\Carbon::parse($event->start_date)->format('l, F j, Y') }}<br>
                                            {{ \Carbon\Carbon::parse($event->start_date)->format('g:i A') }}
                                            @if($event->end_date)
                                                - {{ \Carbon\Carbon::parse($event->end_date)->format('g:i A') }}
                                            @endif
                                        </span>
                                    </div>

                                    <!-- Location -->
                                    @if($event->location)
                                    <div class="flex items-start text-gray-500">
                                        <svg class="w-5 h-5 mr-3 mt-0.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        <span class="text-sm">{{ $event->location }}</span>
                                    </div>
                                    @endif

                                    <!-- Organizer -->
                                    @if($event->organizer)
                                    <div class="flex items-start text-gray-500">
                                        <svg class="w-5 h-5 mr-3 mt-0.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                        <span class="text-sm">{{ $event->organizer }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-10 content-card">
                    <p class="text-gray-500">No upcoming events.</p>
                </div>
            @endif
        </div>

        <!-- Latest Announcements Section -->
        <div class="mt-20 pt-16 border-t border-gray-200">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 scroll-reveal">
                <div class="section-header-left mb-0">
                    <h2 class="section-title">Latest Announcements</h2>
                    <div class="section-accent-left"></div>
                </div>
                <a href="#" class="inline-flex items-center text-primary font-semibold hover:text-secondary transition-colors mb-4 md:mb-0">
                    View All <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                @forelse($announcements ?? [] as $index => $announcement)
                <!-- Announcement -->
                <a href="#" class="content-card flex flex-row p-0 overflow-hidden group scroll-reveal delay-{{ ($index % 2 + 1) * 100 }} h-40">
                    @if($announcement->image_path)
                    <div class="w-1/3 shrink-0 h-full">
                        <img src="{{ Str::startsWith($announcement->image_path, 'http') ? $announcement->image_path : asset('storage/' . $announcement->image_path) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $announcement->title }}">
                    </div>
                    @endif
                    <div class="p-5 flex flex-col justify-center w-full">
                        <h3 class="font-serif font-bold text-lg text-gray-800 group-hover:text-primary transition-colors mb-1 truncate">{{ $announcement->title }}</h3>
                        <p class="text-xs text-gray-400 font-sans mb-2">{{ $announcement->created_at->format('M d, Y') }}</p>
                        <p class="text-sm text-gray-600 font-sans line-clamp-2">{{ Str::limit(strip_tags($announcement->content), 100) }}</p>
                        <span class="inline-block mt-auto pt-2 text-xs font-sans font-bold text-primary uppercase tracking-wider group-hover:text-secondary transition-colors">Read More &rarr;</span>
                    </div>
                </a>
                @empty
                <div class="col-span-full">
                    <p class="text-gray-500">No announcements.</p>
                </div>
                @endforelse
            </div>
        </div>

    </div>
</section>

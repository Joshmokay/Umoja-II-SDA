@extends('layouts.front')

@section('content')
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 text-center mt-10">
        <h1 class="text-4xl font-serif font-bold text-gray-900 tracking-tight">Upcoming Events</h1>
        <p class="mt-4 max-w-2xl text-lg text-gray-500 mx-auto">Join us for worship, fellowship, and service. Discover what's happening at Umoja II SDA Church.</p>
    </div>

    <div class="relative py-12 bg-gray-50 overflow-hidden">
        <!-- Subtle Background Pattern with Fade to Bottom -->
        <div class="absolute inset-0 z-0 pointer-events-none" style="background-image: radial-gradient(#94a3b8 1px, transparent 1px); background-size: 32px 32px; mask-image: linear-gradient(to bottom, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0) 80%); -webkit-mask-image: linear-gradient(to bottom, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0) 80%);"></div>
        <div class="absolute inset-0 z-0 pointer-events-none bg-gradient-to-b from-blue-50/80 via-transparent to-transparent"></div>

        <div class="relative z-10 max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8">
            
            @if($events->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-6">
                    @foreach($events as $event)
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300 flex flex-col h-full">
                            
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
                                <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm rounded-lg shadow px-3 py-2 text-center border border-white/50">
                                    <span class="block text-xs font-bold text-primary uppercase tracking-wider leading-none mb-1">{{ $event->start_date->format('M') }}</span>
                                    <span class="block text-xl font-bold text-gray-900 leading-none">{{ $event->start_date->format('d') }}</span>
                                </div>
                            </div>

                            <!-- Content Details -->
                            <div class="p-6 flex-grow flex flex-col">
                                <h3 class="text-xl font-serif font-bold text-gray-900 mb-4 line-clamp-2">
                                    {{ $event->title }}
                                </h3>
                                
                                <div class="space-y-3 mt-auto">
                                    <!-- Date & Time -->
                                    <div class="flex items-start text-gray-600">
                                        <svg class="w-5 h-5 mr-3 mt-0.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <span class="text-sm">
                                            {{ $event->start_date->format('l, F j, Y') }}<br>
                                            {{ $event->start_date->format('g:i A') }}
                                            @if($event->end_date)
                                                - {{ $event->end_date->format('g:i A') }}
                                            @endif
                                        </span>
                                    </div>

                                    <!-- Location -->
                                    @if($event->location)
                                    <div class="flex items-start text-gray-600">
                                        <svg class="w-5 h-5 mr-3 mt-0.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        <span class="text-sm">{{ $event->location }}</span>
                                    </div>
                                    @endif

                                    <!-- Organizer -->
                                    @if($event->organizer)
                                    <div class="flex items-start text-gray-600">
                                        <svg class="w-5 h-5 mr-3 mt-0.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                        <span class="text-sm">{{ $event->organizer }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-12">
                    {{ $events->links() }}
                </div>
            @else
                <div class="text-center py-16 bg-white rounded-xl shadow-sm border border-gray-100">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">No upcoming events</h3>
                    <p class="mt-2 text-gray-500">Check back soon for new events and gatherings.</p>
                </div>
            @endif

        </div>
    </div>
@endsection

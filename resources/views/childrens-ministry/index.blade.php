@extends('layouts.children')

@section('content')

<!-- Hero Section -->
<section class="relative bg-sky-50 overflow-hidden min-h-[80vh] flex items-center pt-10 pb-20">
    <!-- Decorative background elements -->
    <div class="absolute inset-0 pointer-events-none opacity-40">
        <!-- Sun -->
        <div class="absolute top-10 right-10 w-32 h-32 bg-amber-300 rounded-full blur-xl mix-blend-multiply"></div>
        <div class="absolute top-16 right-16 w-20 h-20 bg-amber-400 rounded-full shadow-[0_0_50px_rgba(251,191,36,0.8)]"></div>
        <!-- Clouds -->
        <div class="absolute top-32 left-10 w-48 h-16 bg-white rounded-full opacity-80 shadow-lg blur-sm"></div>
        <div class="absolute top-24 left-20 w-32 h-32 bg-white rounded-full opacity-80 shadow-lg blur-sm"></div>
        <div class="absolute top-40 right-1/4 w-40 h-14 bg-white rounded-full opacity-80 shadow-lg blur-sm"></div>
        <div class="absolute top-32 right-[28%] w-24 h-24 bg-white rounded-full opacity-80 shadow-lg blur-sm"></div>
        <!-- Decorative blobs -->
        <div class="absolute bottom-10 left-1/4 w-64 h-64 bg-emerald-200 rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>
        <div class="absolute top-1/2 right-10 w-72 h-72 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>
    </div>

    <div class="container mx-auto px-4 max-w-6xl relative z-10">
        <div class="text-center max-w-4xl mx-auto">
            <span class="inline-block py-1 px-3 rounded-full bg-amber-100 text-amber-700 font-bold text-sm tracking-wider uppercase mb-6 shadow-sm border border-amber-200">
                Umoja II SDA Church
            </span>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-heading font-extrabold text-sky-900 leading-tight mb-6 drop-shadow-sm">
                Welcome to <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-500 via-purple-500 to-rose-500">Children's Ministry!</span>
            </h1>
            <p class="text-lg md:text-2xl text-slate-700 mb-10 leading-relaxed font-medium">
                A joyful place to learn about Jesus, make wonderful friends, grow in faith, and have incredible fun together!
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4 sm:gap-6">
                <a href="#activities" class="inline-flex justify-center items-center px-8 py-4 text-lg font-bold rounded-full text-white bg-gradient-to-r from-rose-400 to-rose-600 hover:from-rose-500 hover:to-rose-700 shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    Explore Our World
                </a>
                <a href="#sabbath-school" class="inline-flex justify-center items-center px-8 py-4 text-lg font-bold rounded-full text-sky-700 bg-white border-2 border-sky-200 hover:border-sky-400 hover:bg-sky-50 shadow-md hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    Join Sabbath School
                </a>
            </div>
        </div>
    </div>
    
    <!-- Wave shape divider -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0]">
        <svg class="relative block w-[calc(100%+1.3px)] h-[80px] md:h-[120px]" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V95.8C59.71,118.08,130.83,123.15,198.8,115.64,242.65,110.82,285.55,87.71,321.39,56.44Z" class="fill-white"></path>
        </svg>
    </div>
</section>

<!-- Introduction Section -->
<section class="py-16 md:py-24 bg-white relative">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="flex flex-col md:flex-row items-center gap-12 lg:gap-20">
            <div class="w-full md:w-1/2 relative">
                <!-- Decorative background blob -->
                <div class="absolute -inset-4 bg-gradient-to-r from-sky-100 to-emerald-100 rounded-[3rem] transform rotate-3 scale-105 opacity-70"></div>
                <img src="https://images.unsplash.com/photo-1511895426328-dc8714191300?auto=format&fit=crop&q=80&w=800" alt="Children laughing and playing" class="relative rounded-[2rem] shadow-2xl border-4 border-white object-cover aspect-video md:aspect-square">
                <!-- Floating badge -->
                <div class="absolute -bottom-6 -right-6 bg-white p-4 rounded-2xl shadow-xl flex items-center gap-4 animate-bounce" style="animation-duration: 3s;">
                    <div class="w-12 h-12 bg-amber-100 text-amber-500 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-gray-800">Jesus Loves</p>
                        <p class="text-xs text-gray-500 font-medium">Little Children</p>
                    </div>
                </div>
            </div>
            
            <div class="w-full md:w-1/2">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-heading font-bold text-sky-900 mb-6 relative inline-block">
                    Growing Together in Jesus
                    <svg class="absolute -bottom-2 left-0 w-full h-3 text-amber-400 opacity-60" viewBox="0 0 100 10" preserveAspectRatio="none"><path d="M0 5 Q 50 10 100 5" stroke="currentColor" stroke-width="4" fill="transparent" stroke-linecap="round"/></svg>
                </h2>
                <p class="text-lg text-slate-600 leading-relaxed mb-6 font-medium">
                    At Umoja II SDA Church, we believe that every child is a precious gift from God. Our Children's Ministry provides a safe, vibrant, and nurturing environment for your little ones.
                </p>
                <p class="text-lg text-slate-600 leading-relaxed mb-8 font-medium">
                    Through engaging Bible stories, creative crafts, joyful singing, and meaningful friendships, we guide children to discover their God-given talents and grow their faith step by step.
                </p>
                
                <ul class="space-y-4 mb-8">
                    <li class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-500 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <span class="text-slate-700 font-bold">Safe & Secure Environment</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-sky-100 text-sky-500 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <span class="text-slate-700 font-bold">Interactive Bible Learning</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-purple-100 text-purple-500 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <span class="text-slate-700 font-bold">Dedicated & Loving Teachers</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Age Groups Section -->
<section class="py-20 bg-slate-50 relative overflow-hidden">
    <!-- Decorative background patterns -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-yellow-100 rounded-full mix-blend-multiply filter blur-3xl opacity-50 transform translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-50 transform -translate-x-1/2 translate-y-1/2"></div>
    
    <div class="container mx-auto px-4 max-w-7xl relative z-10">
        <div class="text-center mb-16">
            <span class="text-emerald-500 font-bold tracking-wider uppercase text-sm mb-2 block">Our Classes</span>
            <h2 class="text-3xl md:text-5xl font-heading font-bold text-slate-800 mb-4">Ministry Age Groups</h2>
            <div class="w-24 h-1.5 bg-gradient-to-r from-emerald-400 to-sky-400 mx-auto rounded-full"></div>
            <p class="mt-6 text-slate-600 max-w-2xl mx-auto text-lg font-medium">Find the perfect class where your child can learn and grow alongside their peers.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
            @foreach($ageGroups as $group)
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 group flex flex-col h-full text-center">
                    <div class="w-16 h-16 mx-auto rounded-2xl flex items-center justify-center mb-6 {{ $group['color'] }} group-hover:scale-110 group-hover:rotate-6 transition-transform duration-300">
                        <!-- Generic icon placeholder, would use real icons in production -->
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            @if($group['icon'] == 'baby')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            @elseif($group['icon'] == 'sun')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            @elseif($group['icon'] == 'book')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            @elseif($group['icon'] == 'users')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            @else
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                            @endif
                        </svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold text-slate-800 mb-1">{{ $group['name'] }}</h3>
                    <p class="text-sm font-bold text-slate-400 mb-4">{{ $group['age_range'] }}</p>
                    <p class="text-slate-600 text-sm flex-grow font-medium leading-relaxed">{{ $group['description'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Fun Activities & Bible Stories -->
<section class="py-20 bg-white" id="activities">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">
            
            <!-- Fun Activities column -->
            <div class="lg:col-span-5 flex flex-col justify-center">
                <span class="text-rose-500 font-bold tracking-wider uppercase text-sm mb-2 block">Interactive</span>
                <h2 class="text-3xl md:text-4xl font-heading font-bold text-slate-800 mb-6">Fun Activities</h2>
                <p class="text-slate-600 text-lg mb-8 font-medium">Learning about God is fun! Explore our interactive activities designed to spark creativity and joy in every child.</p>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach($activities as $activity)
                        <div class="bg-slate-50 hover:bg-white rounded-2xl p-5 border border-slate-100 hover:border-slate-200 shadow-sm hover:shadow-md transition-all group flex items-center gap-4 cursor-pointer">
                            <div class="w-12 h-12 rounded-xl {{ $activity['color'] }} text-white flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-800 group-hover:text-rose-500 transition-colors">{{ $activity['title'] }}</h4>
                                <span class="text-sm text-slate-500 font-medium">{{ $activity['action'] }} &rarr;</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Bible Stories column -->
            <div class="lg:col-span-7">
                <div class="flex justify-between items-end mb-8">
                    <div>
                        <span class="text-sky-500 font-bold tracking-wider uppercase text-sm mb-2 block">Learn & Discover</span>
                        <h2 class="text-3xl md:text-4xl font-heading font-bold text-slate-800">Bible Stories</h2>
                    </div>
                    <a href="#" class="hidden sm:inline-flex text-sky-600 font-bold hover:text-sky-700 transition-colors">View All Stories &rarr;</a>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @forelse($bibleStories as $story)
                        <a href="{{ route('childrens-ministry.stories.show', $story->slug) }}" class="bg-white rounded-3xl overflow-hidden shadow-md border border-slate-100 group cursor-pointer hover:shadow-xl transition-all duration-300 block">
                            <div class="h-48 relative overflow-hidden">
                                <div class="absolute inset-0 bg-sky-900/20 group-hover:bg-transparent transition-colors z-10"></div>
                                @if($story->image_path)
                                    <img src="{{ asset('storage/' . $story->image_path) }}" alt="{{ $story->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full bg-sky-100 flex items-center justify-center transform group-hover:scale-110 transition-transform duration-700">
                                        <svg class="w-16 h-16 text-sky-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                    </div>
                                @endif
                                <div class="absolute bottom-4 left-4 z-20">
                                    <span class="bg-white/90 backdrop-blur text-sky-800 text-xs font-bold px-3 py-1 rounded-full shadow-sm">Read Story</span>
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-heading font-bold text-slate-800 mb-2 group-hover:text-sky-600 transition-colors">{{ $story->title }}</h3>
                                <p class="text-slate-600 text-sm leading-relaxed line-clamp-2 font-medium">{{ Str::limit($story->description, 100) }}</p>
                            </div>
                        </a>
                    @empty
                        <div class="col-span-full py-8 text-center text-slate-500 bg-slate-50 rounded-2xl border border-slate-100 border-dashed">
                            New stories are coming soon!
                        </div>
                    @endforelse
                </div>
                <a href="#" class="inline-flex sm:hidden text-sky-600 font-bold hover:text-sky-700 transition-colors mt-6">View All Stories &rarr;</a>
            </div>
            
        </div>
    </div>
</section>

<!-- Memory Verse -->
<section class="py-16 relative overflow-hidden bg-slate-900">
    <div class="absolute inset-0 bg-gradient-to-br from-indigo-900 to-purple-900 opacity-90"></div>
    <!-- Stars decorative -->
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCI+CjxjaXJjbGUgY3g9IjIwIiBjeT0iMjAiIHI9IjEiIGZpbGw9IiNmZmYiIG9wYWNpdHk9IjAuMiIvPgo8L3N2Zz4=')] opacity-50"></div>
    
    <div class="container mx-auto px-4 max-w-4xl relative z-10 text-center">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-amber-400 text-amber-900 mb-8 shadow-[0_0_30px_rgba(251,191,36,0.6)]">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
        </div>
        
        <h2 class="text-amber-400 font-bold tracking-widest uppercase text-sm mb-6">Memory Verse of the Week</h2>
        
        <blockquote class="text-2xl md:text-4xl font-heading font-bold text-white leading-tight md:leading-tight mb-8">
            "Jesus said, 'Let the little children come to me, and do not hinder them, for the kingdom of heaven belongs to such as these.'"
        </blockquote>
        
        <p class="text-xl text-purple-200 font-bold">— Matthew 19:14 —</p>
    </div>
</section>

<!-- Upcoming Events -->
<section class="py-20 bg-slate-50 relative">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
            <div>
                <span class="text-purple-500 font-bold tracking-wider uppercase text-sm mb-2 block">Mark Your Calendars</span>
                <h2 class="text-3xl md:text-5xl font-heading font-bold text-slate-800">Upcoming Events</h2>
                <div class="w-24 h-1.5 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full mt-4"></div>
            </div>
            <a href="#" class="inline-flex items-center gap-2 px-6 py-3 bg-white border-2 border-purple-100 text-purple-700 font-bold rounded-full hover:bg-purple-50 hover:border-purple-300 transition-colors">
                View All Events
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($events as $event)
                <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100 flex flex-col sm:flex-row group hover:shadow-xl transition-shadow">
                    <div class="sm:w-2/5 h-48 sm:h-auto relative overflow-hidden">
                        <img src="{{ $event['image'] }}" alt="{{ $event['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur rounded-xl px-3 py-2 shadow-sm text-center">
                            <span class="block text-xs font-bold text-purple-600 uppercase">{{ explode(' ', $event['date'])[0] }}</span>
                            <span class="block text-xl font-bold text-slate-800">{{ str_replace(',', '', explode(' ', $event['date'])[1]) }}</span>
                        </div>
                    </div>
                    <div class="sm:w-3/5 p-6 md:p-8 flex flex-col justify-center">
                        <h3 class="text-2xl font-heading font-bold text-slate-800 mb-3 group-hover:text-purple-600 transition-colors">{{ $event['title'] }}</h3>
                        <p class="text-slate-600 text-sm font-medium mb-4 line-clamp-2">{{ $event['description'] }}</p>
                        
                        <div class="space-y-2 mt-auto">
                            <div class="flex items-center gap-2 text-sm text-slate-500">
                                <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span class="font-medium">{{ $event['time'] }}</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-slate-500">
                                <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <span class="font-medium">{{ $event['location'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4 max-w-7xl text-center">
        <span class="text-amber-500 font-bold tracking-wider uppercase text-sm mb-2 block">Smiles & Joy</span>
        <h2 class="text-3xl md:text-5xl font-heading font-bold text-slate-800 mb-12">Children's Gallery</h2>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
            @foreach($gallery as $index => $img)
                <div class="relative group rounded-3xl overflow-hidden aspect-square {{ $index == 0 || $index == 3 ? 'md:col-span-2 md:aspect-[2/1]' : '' }}">
                    <img src="{{ $img }}" alt="Gallery Image" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-sky-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <span class="text-white font-bold opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">View Photo</span>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="mt-12">
            <a href="#" class="inline-flex items-center gap-2 text-sky-600 font-bold hover:text-sky-700 transition-colors">
                View Full Gallery
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>
    </div>
</section>

<!-- Parents Corner -->
<section class="py-20 bg-sky-50 border-t border-sky-100">
    <div class="container mx-auto px-4 max-w-5xl">
        <div class="bg-white rounded-[3rem] shadow-xl p-8 md:p-16 border-4 border-white relative overflow-hidden">
            <!-- Calm decorative background -->
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-sky-300 via-indigo-300 to-purple-300"></div>
            
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-indigo-50 text-indigo-500 mb-6">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <h2 class="text-3xl md:text-4xl font-heading font-bold text-slate-800 mb-4">Parents' Corner</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto font-medium">Resources, information, and support for parents as we partner together in your child's spiritual journey.</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <a href="#" class="bg-slate-50 hover:bg-sky-50 rounded-2xl p-6 text-center group transition-colors border border-slate-100">
                    <div class="w-12 h-12 mx-auto rounded-full bg-white text-emerald-500 shadow-sm flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h4 class="font-bold text-slate-800 mb-2">Child Safety</h4>
                    <p class="text-xs text-slate-500 font-medium">Our protection policies</p>
                </a>
                
                <a href="#" class="bg-slate-50 hover:bg-sky-50 rounded-2xl p-6 text-center group transition-colors border border-slate-100">
                    <div class="w-12 h-12 mx-auto rounded-full bg-white text-sky-500 shadow-sm flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <h4 class="font-bold text-slate-800 mb-2">Sabbath School</h4>
                    <p class="text-xs text-slate-500 font-medium">Weekly lesson guides</p>
                </a>
                
                <a href="#" class="bg-slate-50 hover:bg-sky-50 rounded-2xl p-6 text-center group transition-colors border border-slate-100">
                    <div class="w-12 h-12 mx-auto rounded-full bg-white text-purple-500 shadow-sm flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    </div>
                    <h4 class="font-bold text-slate-800 mb-2">Resources</h4>
                    <p class="text-xs text-slate-500 font-medium">Downloadable materials</p>
                </a>
                
                <a href="#" class="bg-slate-50 hover:bg-sky-50 rounded-2xl p-6 text-center group transition-colors border border-slate-100">
                    <div class="w-12 h-12 mx-auto rounded-full bg-white text-amber-500 shadow-sm flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h4 class="font-bold text-slate-800 mb-2">Contact Us</h4>
                    <p class="text-xs text-slate-500 font-medium">Get in touch directly</p>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="py-24 bg-gradient-to-r from-sky-400 via-indigo-500 to-purple-500 text-center relative overflow-hidden">
    <!-- Decorative background patterns -->
    <div class="absolute inset-0 bg-white/10" style="background-image: radial-gradient(white 2px, transparent 2px); background-size: 30px 30px; opacity: 0.2;"></div>
    
    <div class="container mx-auto px-4 max-w-4xl relative z-10">
        <h2 class="text-4xl md:text-5xl lg:text-6xl font-heading font-extrabold text-white mb-8 drop-shadow-md">
            Come Learn, Grow and Have Fun With Us!
        </h2>
        <p class="text-xl text-sky-50 mb-10 font-medium max-w-2xl mx-auto drop-shadow">
            We can't wait to welcome your child into our wonderful church family this Sabbath.
        </p>
        <a href="#" class="inline-block bg-white text-indigo-600 font-bold text-xl px-10 py-5 rounded-full shadow-xl hover:shadow-2xl hover:scale-105 hover:bg-sky-50 transition-all duration-300">
            Join Children's Ministry
        </a>
    </div>
</section>

@endsection

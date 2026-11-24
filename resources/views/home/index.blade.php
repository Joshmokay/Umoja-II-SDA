@extends('layouts.front')

@section('content')
    <div class="relative w-full isolate">
        @include('partials.site-background')

        @include('partials.hero')

        {{-- ════════════════════════════════════════════════════════════
             IDENTITY SECTION — Who We Are / What We Believe / What We Do
             Dark navy background with flowing wave shapes (Adventist.org style)
             ════════════════════════════════════════════════════════════ --}}
        <section class="identity-section relative overflow-hidden" style="background: #0f1b33;">

            {{-- Flowing background wave shapes for visual movement --}}
            <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
                {{-- Large flowing wave — left side, blue/indigo --}}
                <svg class="absolute top-0 left-[-15%] w-[130%] h-full opacity-[0.07]" viewBox="0 0 1440 900" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                    <path d="M-100,600 C200,300 500,800 800,400 C1100,0 1300,500 1600,300 L1600,900 L-100,900 Z" fill="#3b82f6"/>
                    <path d="M-100,700 C300,400 600,750 900,500 C1200,250 1400,600 1600,450 L1600,900 L-100,900 Z" fill="#6366f1"/>
                </svg>
                {{-- Secondary flowing wave — right side, purple --}}
                <svg class="absolute top-[-10%] right-[-10%] w-[120%] h-[120%] opacity-[0.05]" viewBox="0 0 1440 900" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                    <path d="M1600,100 C1300,400 1000,50 700,350 C400,650 200,200 -100,500 L-100,0 L1600,0 Z" fill="#818cf8"/>
                    <path d="M1600,200 C1200,500 900,100 600,400 C300,700 100,300 -100,550 L-100,0 L1600,0 Z" fill="#4f46e5"/>
                </svg>
                {{-- Subtle radial glow for warmth --}}
                <div class="absolute top-[30%] left-[20%] w-[60vw] h-[60vw] rounded-full opacity-[0.06]"
                     style="background: radial-gradient(circle, #6366f1 0%, transparent 70%); filter: blur(80px);"></div>
            </div>

            {{-- Content --}}
            <div class="relative z-10 max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 py-24 lg:py-32">

                {{-- Three-column grid --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12 lg:gap-16 text-center">

                    {{-- ── Who We Are ──────────────────────── --}}
                    <div class="scroll-reveal delay-100">
                        <div class="mx-auto w-[180px] h-[180px] lg:w-[210px] lg:h-[210px] rounded-full overflow-hidden border-4 border-white/20 shadow-2xl mb-8 ring-4 ring-white/5">
                            <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?q=80&w=600&auto=format&fit=crop"
                                 alt="Church community fellowship"
                                 class="w-full h-full object-cover" />
                        </div>
                        <h3 class="text-2xl lg:text-3xl font-serif font-bold text-white mb-5">Who We Are</h3>
                        <p class="text-blue-100/80 leading-relaxed text-[15px] lg:text-base max-w-[340px] mx-auto mb-6">
                            We are a movement called by God to share the eternal gospel of Jesus with every nation, tribe,
                            language, and people. Our mission is preparing hearts for Jesus' soon return. We help people discover
                            the Bible's life-changing truths for themselves, finding the freedom, healing, and hope that only Jesus offers.
                        </p>
                        <a href="/about" class="inline-flex items-center justify-center bg-[#005DAA] hover:bg-[#004a8c] text-white font-sans font-bold text-[14px] tracking-wide px-7 py-3 rounded-lg transition-all duration-300 hover:-translate-y-[1px] shadow-lg hover:shadow-xl">
                            Learn More
                        </a>
                    </div>

                    {{-- ── What We Believe ─────────────────── --}}
                    <div class="scroll-reveal delay-200">
                        <div class="mx-auto w-[180px] h-[180px] lg:w-[210px] lg:h-[210px] rounded-full overflow-hidden border-4 border-white/20 shadow-2xl mb-8 ring-4 ring-white/5">
                            <img src="https://images.unsplash.com/photo-1504052434569-70ad5836ab65?q=80&w=600&auto=format&fit=crop"
                                 alt="Bible study and prayer"
                                 class="w-full h-full object-cover" />
                        </div>
                        <h3 class="text-2xl lg:text-3xl font-serif font-bold text-white mb-5">What We Believe</h3>
                        <p class="text-blue-100/80 leading-relaxed text-[15px] lg:text-base max-w-[340px] mx-auto mb-6">
                            We believe in a God whose love never fails, even in a broken world. Despite the cosmic conflict
                            that has raged since before time, God's plan of salvation continues. Jesus is coming soon to
                            restore our world to its original perfection. We await with joy the day when God will give us
                            new hearts in a new earth, where we'll live in His presence for eternity.
                        </p>
                        <a href="/about/beliefs" class="inline-flex items-center justify-center bg-[#005DAA] hover:bg-[#004a8c] text-white font-sans font-bold text-[14px] tracking-wide px-7 py-3 rounded-lg transition-all duration-300 hover:-translate-y-[1px] shadow-lg hover:shadow-xl">
                            Learn More
                        </a>
                    </div>

                    {{-- ── What We Do ──────────────────────── --}}
                    <div class="scroll-reveal delay-300">
                        <div class="mx-auto w-[180px] h-[180px] lg:w-[210px] lg:h-[210px] rounded-full overflow-hidden border-4 border-white/20 shadow-2xl mb-8 ring-4 ring-white/5">
                            <img src="https://images.unsplash.com/photo-1593113630400-ea4288922497?q=80&w=600&auto=format&fit=crop"
                                 alt="Community service and fellowship"
                                 class="w-full h-full object-cover" />
                        </div>
                        <h3 class="text-2xl lg:text-3xl font-serif font-bold text-white mb-5">What We Do</h3>
                        <p class="text-blue-100/80 leading-relaxed text-[15px] lg:text-base max-w-[340px] mx-auto mb-6">
                            Through our global network of churches, schools, hospitals, and humanitarian agencies, we strive
                            to create glimpses of God's coming kingdom in our present world. Following Jesus' example, we serve
                            others with compassion and love, finding Him in the faces of those we help. From community outreach
                            to global missions, we extend Christ's healing touch to a world in need.
                        </p>
                        <a href="/departments" class="inline-flex items-center justify-center bg-[#005DAA] hover:bg-[#004a8c] text-white font-sans font-bold text-[14px] tracking-wide px-7 py-3 rounded-lg transition-all duration-300 hover:-translate-y-[1px] shadow-lg hover:shadow-xl">
                            Learn More
                        </a>
                    </div>

                </div>
            </div>

            {{-- Bottom wave transition from dark identity → light Worship section --}}
            <div class="absolute bottom-0 left-0 right-0 leading-[0] pointer-events-none translate-y-[1px] z-10">
                <svg class="block w-full" style="height: clamp(50px, 8vh, 100px);" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                          fill="rgba(248, 250, 252, 0.3)"/>
                    <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                          fill="rgba(248, 250, 252, 0.6)"/>
                    <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                          fill="#f8fafc"/>
                </svg>
            </div>

        </section>

    {{-- Scoped styles for identity section --}}
    <style>
        .identity-section {
            position: relative;
        }
    </style>

    <!-- Worship With Us Section -->
    <section class="section-container">
        <div class="section-content">
            <div class="section-header scroll-reveal">
                <h2 class="section-title">Worship With Us</h2>
                <div class="section-accent"></div>
                <p class="section-subtitle">Join us this week for fellowship and spiritual nourishment.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="content-card p-8 text-center scroll-reveal delay-100">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-6 text-primary shadow-inner">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-800 mb-2">Sabbath School</h4>
                    <p class="text-primary font-bold tracking-wide text-sm uppercase">Saturday • 9:00 AM</p>
                </div>
                <div class="content-card p-8 text-center scroll-reveal delay-200">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-6 text-primary shadow-inner">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-800 mb-2">Divine Worship</h4>
                    <p class="text-primary font-bold tracking-wide text-sm uppercase">Saturday • 11:00 AM</p>
                </div>
                <div class="content-card p-8 text-center scroll-reveal delay-300">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-6 text-primary shadow-inner">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-800 mb-2">Prayer Meeting</h4>
                    <p class="text-primary font-bold tracking-wide text-sm uppercase">Wednesday • 6:30 PM</p>
                </div>
            </div>

            <!-- OUR SABBATH PROGRAM (Detailed Timeline & Blocks) -->
            <div class="mt-20 scroll-reveal">
                <div class="flex items-center justify-center gap-4 mb-12">
                    <div class="h-px bg-gray-200 flex-1 max-w-[100px]"></div>
                    <h3 class="text-2xl md:text-3xl font-serif font-bold text-primary tracking-wide uppercase">Our Sabbath Program</h3>
                    <div class="h-px bg-gray-200 flex-1 max-w-[100px]"></div>
                </div>

                @if(isset($sabbathPrograms) && $sabbathPrograms->count() > 0)
                
                <!-- Horizontal Timeline / Overview -->
                <div class="mb-12">
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 md:p-8">
                        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8 relative">
                            <!-- Subtle connecting line for desktop -->
                            <div class="hidden md:block absolute top-6 left-[10%] right-[10%] h-0.5 bg-gradient-to-r from-sky-100 via-sky-200 to-sky-100 -z-0"></div>
                            
                            @php
                                $periods = ['Morning', 'Midday', 'Afternoon', 'Evening'];
                            @endphp
                            
                            @foreach($periods as $period)
                                @if(isset($sabbathPrograms[$period]))
                                <div class="relative z-10 bg-white group">
                                    <div class="flex items-center gap-3 mb-2 md:mb-4">
                                        <div class="w-3 h-3 rounded-full bg-sky-500 ring-4 ring-sky-50"></div>
                                        <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest">{{ $period }}</h3>
                                    </div>
                                    
                                    <div class="pl-6 md:pl-0 border-l-2 md:border-l-0 border-sky-100 md:border-none ml-1.5 md:ml-0 pb-6 md:pb-0">
                                        @foreach($sabbathPrograms[$period] as $prog)
                                            <div class="mb-3 last:mb-0">
                                                <p class="font-bold text-slate-800 text-lg font-serif group-hover:text-sky-600 transition-colors">{{ $prog->title }}</p>
                                                <p class="text-sm text-slate-500 font-medium">
                                                    @if($prog->start_time)
                                                        {{ \Carbon\Carbon::parse($prog->start_time)->format('g:i A') }}
                                                        @if($prog->end_time) - {{ \Carbon\Carbon::parse($prog->end_time)->format('g:i A') }} @endif
                                                    @else
                                                        Time TBA
                                                    @endif
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Detailed Program Blocks -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    @foreach($sabbathPrograms as $category => $programs)
                        @foreach($programs as $program)
                        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
                            <div class="px-6 py-5 border-b border-slate-50 bg-slate-50/50 flex justify-between items-center">
                                <h3 class="text-xl font-bold text-slate-800 font-serif">{{ $program->title }}</h3>
                                <span class="text-sm font-medium text-sky-600 bg-sky-50 px-3 py-1 rounded-full whitespace-nowrap ml-4">
                                    @if($program->start_time)
                                        {{ \Carbon\Carbon::parse($program->start_time)->format('g:i A') }}
                                        @if($program->end_time) - {{ \Carbon\Carbon::parse($program->end_time)->format('g:i A') }} @endif
                                    @endif
                                </span>
                            </div>
                            
                            @if($program->description)
                            <div class="px-6 py-3 border-b border-slate-50 bg-white">
                                <p class="text-sm text-slate-500 italic">{{ $program->description }}</p>
                            </div>
                            @endif
                            
                            <div class="p-6">
                                @if($program->activities->count() > 0)
                                    <ul class="space-y-4">
                                        @foreach($program->activities as $activity)
                                        <li class="flex items-start gap-4">
                                            <div class="mt-1.5 w-1.5 h-1.5 rounded-full bg-slate-300 shrink-0"></div>
                                            <div class="flex-1">
                                                <div class="flex flex-wrap justify-between items-baseline gap-2">
                                                    <span class="font-semibold text-slate-700">{{ $activity->name }}</span>
                                                    @if($activity->start_time)
                                                        <span class="text-xs font-medium text-slate-400 whitespace-nowrap">
                                                            {{ \Carbon\Carbon::parse($activity->start_time)->format('g:i A') }}
                                                            @if($activity->end_time) - {{ \Carbon\Carbon::parse($activity->end_time)->format('g:i A') }} @endif
                                                        </span>
                                                    @endif
                                                </div>
                                                @if($activity->description)
                                                    <p class="text-sm text-slate-500 mt-0.5">{{ $activity->description }}</p>
                                                @endif
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="text-slate-400 text-sm text-center py-4">No detailed schedule available.</p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    @endforeach
                </div>
                
                @else
                    <div class="text-center py-10 bg-white rounded-2xl shadow-sm border border-slate-100">
                        <svg class="w-12 h-12 text-slate-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <p class="text-slate-500">The Sabbath schedule is currently being updated.</p>
                    </div>
                @endif
            </div>

            <!-- MID-WEEK WORSHIP -->
            @if(isset($midweekPrograms) && $midweekPrograms->count() > 0)
            <div class="mt-20 scroll-reveal">
                <div class="flex items-center justify-center gap-4 mb-10">
                    <div class="h-px bg-gray-200 flex-1 max-w-[100px]"></div>
                    <h3 class="text-2xl md:text-3xl font-serif font-bold text-primary tracking-wide uppercase">Mid-Week Worship</h3>
                    <div class="h-px bg-gray-200 flex-1 max-w-[100px]"></div>
                </div>

                <div class="max-w-4xl mx-auto grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @foreach($midweekPrograms as $mw)
                    <div class="bg-[#0A192F] text-white rounded-2xl p-8 relative overflow-hidden group shadow-lg hover:shadow-xl transition-shadow">
                        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-sky-500/10 rounded-full blur-xl group-hover:bg-sky-500/20 transition-colors"></div>
                        <div class="relative z-10 flex items-start gap-5">
                            <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold mb-1">{{ $mw->title }}</h4>
                                <div class="flex flex-wrap items-center gap-3 text-sm text-sky-200/80 font-medium">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        {{ $mw->day }}
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        @if($mw->start_time)
                                            {{ \Carbon\Carbon::parse($mw->start_time)->format('g:i A') }}
                                            @if($mw->end_time) - {{ \Carbon\Carbon::parse($mw->end_time)->format('g:i A') }} @endif
                                        @else
                                            Time varies
                                        @endif
                                    </span>
                                </div>
                                @if($mw->description)
                                    <p class="mt-3 text-sm text-slate-300">{{ $mw->description }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

        </div>
    </section>

    <!-- Featured Departments -->
    <section class="section-container">
        <div class="section-content">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 scroll-reveal">
                <div class="section-header-left mb-0">
                    <h2 class="section-title">Our Departments</h2>
                    <div class="section-accent-left"></div>
                    <p class="section-subtitle">Discover where you can serve and grow.</p>
                </div>
                <a href="/departments" class="inline-flex items-center text-primary font-semibold hover:text-secondary mb-4 md:mb-0">
                    Explore All <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Placeholders for dynamic content -->
                @for ($i = 0; $i < 4; $i++)
                <div class="content-card group relative bg-gray-100 aspect-square overflow-hidden scroll-reveal delay-{{ ($i + 1) * 100 }}">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent z-10"></div>
                    <div class="absolute inset-0 flex items-center justify-center text-gray-400">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 p-5 z-20">
                        <h3 class="text-xl font-bold text-white group-hover:text-primary transition-colors">Department {{ $i + 1 }}</h3>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- Church Leadership Section -->
    <!-- Church Leadership Section -->
    <!-- Church Leadership Section -->
    <!-- Church Leadership Section -->
    <section class="scroll-reveal" style="position: relative; background-color: #0B1527; padding-top: 160px; padding-bottom: 160px; overflow: hidden; z-index: 10;">
        
        <!-- Elegant Top Wave -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; line-height: 0; z-index: 0;">
            <svg viewBox="0 0 1440 120" preserveAspectRatio="none" style="display: block; width: 100%; height: 60px;">
                <path d="M0,60 C480,0 960,120 1440,60 L1440,0 L0,0 Z" fill="#f9fafb"></path>
            </svg>
        </div>

        <!-- Ambient Background Waves -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; pointer-events: none; opacity: 0.6;">
            <svg viewBox="0 0 1440 600" preserveAspectRatio="none" style="width: 100%; height: 100%;">
                <path d="M0,200 C480,400 960,100 1440,300 L1440,600 L0,600 Z" fill="rgba(0, 93, 170, 0.15)"></path>
                <path d="M0,300 C480,100 960,500 1440,200 L1440,600 L0,600 Z" fill="rgba(59, 130, 246, 0.1)"></path>
            </svg>
        </div>

        <div style="position: relative; z-index: 10; max-width: 1100px; margin: 0 auto; padding: 0 20px;">
            
            <!-- Section Header -->
            <div style="max-width: 700px; margin: 0 auto 60px auto; text-align: center;">
                <h2 class="font-serif" style="font-size: 42px; font-weight: bold; color: #ffffff; margin-bottom: 24px; line-height: 1.2;">
                    {{ $leadership_title ?? 'Church Leadership' }}
                </h2>
                <div style="width: 60px; height: 4px; border-radius: 4px; background-color: #3b82f6; margin: 0 auto 24px auto;"></div>
                @if($leadership_text)
                    <p style="font-size: 18px; color: #bfdbfe; font-family: sans-serif; line-height: 1.6; margin: 0;">
                        {{ $leadership_text }}
                    </p>
                @endif
            </div>

            <!-- Leader Profile Cards -->
            @if(isset($leaders) && $leaders->count() > 0)
                <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 40px;">
                    @foreach($leaders as $leader)
                        <div class="hover:-translate-y-1 transition-transform duration-300" style="background-color: #ffffff; border-radius: 20px; padding: 40px 30px; text-align: center; width: 100%; max-width: 300px; box-shadow: 0 20px 40px rgba(0,0,0,0.2);">
                            
                            <!-- Internal Portrait -->
                            <div style="width: 130px; height: 130px; border-radius: 50%; border: 4px solid #f8fafc; box-shadow: 0 4px 15px rgba(0,0,0,0.08); overflow: hidden; background-color: #f1f5f9; margin: 0 auto 25px auto;">
                                @if($leader->portrait_path)
                                    <img src="{{ asset('storage/' . $leader->portrait_path) }}" alt="{{ $leader->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                                        <svg style="width: 50px; height: 50px; color: #cbd5e1;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    </div>
                                @endif
                            </div>

                            <!-- Typography & Info -->
                            <h3 class="font-serif" style="font-size: 22px; font-weight: bold; color: #111827; margin: 0 0 8px 0;">{{ $leader->name }}</h3>
                            <p style="font-size: 12px; font-weight: bold; color: #005DAA; text-transform: uppercase; letter-spacing: 2px; margin: 0 0 16px 0;">{{ $leader->role }}</p>
                            
                            <div style="width: 40px; height: 2px; background-color: #e2e8f0; margin: 0 auto 16px auto;"></div>

                            @if($leader->description)
                                <p style="font-size: 14px; color: #64748b; line-height: 1.6; margin: 0;">{{ $leader->description }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div style="padding: 40px 0; text-align: center; position: relative; z-index: 10;">
                    <p style="color: rgba(191, 219, 254, 0.7); font-style: italic; font-size: 18px;">Leadership information is currently being updated.</p>
                </div>
            @endif
        </div>

        <!-- Elegant Bottom Wave -->
        <div style="position: absolute; bottom: 0; left: 0; width: 100%; line-height: 0; z-index: 0;">
            <svg viewBox="0 0 1440 120" preserveAspectRatio="none" style="display: block; width: 100%; height: 60px;">
                <path d="M0,60 C480,120 960,0 1440,60 L1440,120 L0,120 Z" fill="#f9fafb"></path>
            </svg>
        </div>
    </section>

    @include('partials.upcoming-events')
    @include('partials.sermons')
    
    @include('partials.health-lifestyle')
    
    <!-- Latest Articles -->
    <section class="section-container">
        <div class="section-content">
            <div class="section-header scroll-reveal">
                <h2 class="section-title">Latest Articles & News</h2>
                <div class="section-accent"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @for ($i = 0; $i < 3; $i++)
                <article class="content-card scroll-reveal delay-{{ ($i + 1) * 100 }}">
                    <div class="h-48 bg-gray-200 flex items-center justify-center text-gray-400">Image Placeholder</div>
                    <div class="content-card-body p-6">
                        <div class="text-xs font-bold tracking-[0.15em] text-primary uppercase mb-3">Church News</div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Article Title {{ $i + 1 }}</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">This is a brief excerpt from the article that gives the reader an idea of what it is about...</p>
                        <a href="#" class="text-primary font-bold hover:text-secondary text-sm flex items-center transition-colors">Read More <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></a>
                    </div>
                </article>
                @endfor
            </div>
        </div>
    </section>

    @include('partials.sabbath-school')
    
    <!-- Live Stream -->
    <section class="section-container">
        <div class="section-content">
            <div class="content-card bg-secondary p-0 shadow-2xl scroll-reveal">
                <div class="absolute top-0 right-0 p-6 z-20">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-600 text-white shadow-md">
                        <span class="w-2 h-2 bg-white rounded-full mr-2 animate-pulse"></span>
                        OFFLINE
                    </span>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <div class="p-10 lg:p-12 flex flex-col justify-center relative z-10">
                        <h2 class="text-3xl font-serif font-bold text-white mb-4 drop-shadow-sm">Watch Live</h2>
                        <div class="w-16 h-1 bg-white/30 rounded-full mb-6"></div>
                        <p class="text-blue-100 text-lg mb-8 leading-relaxed">Join our divine worship service online every Saturday at 11:00 AM. Experience the music, prayer, and message from wherever you are.</p>
                        <div>
                            <a href="https://www.youtube.com/@umojaiisdachurch2391" target="_blank" class="inline-block bg-white text-secondary font-bold px-8 py-3 rounded-full hover:bg-gray-100 transition-colors shadow-lg hover:shadow-xl transform hover:-translate-y-1">Watch on YouTube</a>
                        </div>
                    </div>
                    <div class="bg-adventist-blue flex items-center justify-center p-8 min-h-[300px] relative">
                        <div class="absolute inset-0 bg-black/10"></div>
                        <div class="text-center text-white/50 relative z-10">
                            <svg class="w-16 h-16 mx-auto mb-4 drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <p class="font-medium tracking-wide">Stream Placeholder</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.prayer-request-cta')
    @include('partials.gallery')
    @include('partials.daily-verse')
    @include('partials.newsletter')
    </div>
@endsection

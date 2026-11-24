@extends('layouts.front')

@section('title', 'Service Times - Umoja II SDA Church')

@section('content')

<!-- Hero / Introduction -->
<section class="relative pt-32 pb-16 overflow-hidden bg-[#0A192F]">
    <div class="absolute inset-0 z-0 opacity-20">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0A192F] via-[#0A192F] to-transparent z-10"></div>
        <img src="https://images.unsplash.com/photo-1438032005730-c779502df39b?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" alt="Church Service" class="w-full h-full object-cover">
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8">
            <div class="max-w-2xl">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-sky-500/10 border border-sky-500/20 text-sky-400 text-xs font-bold uppercase tracking-widest mb-4">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Sabbath Schedule
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 leading-tight font-serif">
                    Normal Sabbath Program
                </h1>
                <p class="text-lg text-slate-300 font-sans leading-relaxed max-w-xl">
                    Join us throughout the Sabbath as we worship, learn, fellowship, and grow together. A full-day worship experience from morning devotion to afternoon fellowship.
                </p>
            </div>
            
            <!-- Mid-week Highlight Box -->
            @if($midweekPrograms->count() > 0)
            <div class="bg-white/5 border border-white/10 backdrop-blur-md rounded-2xl p-6 lg:min-w-[300px]">
                <h3 class="text-xs font-bold text-sky-400 uppercase tracking-widest mb-4">Mid-Week Programs</h3>
                <div class="space-y-4">
                    @foreach($midweekPrograms as $mw)
                    <div class="flex justify-between items-start border-b border-white/5 pb-3 last:border-0 last:pb-0">
                        <div>
                            <p class="text-white font-semibold font-sans">{{ $mw->title }}</p>
                            <p class="text-sm text-slate-400">{{ $mw->day }}</p>
                        </div>
                        <div class="text-right">
                            <span class="inline-block bg-white/10 text-slate-200 text-xs px-2 py-1 rounded">
                                @if($mw->start_time)
                                    {{ \Carbon\Carbon::parse($mw->start_time)->format('g:i A') }}
                                    @if($mw->end_time) - {{ \Carbon\Carbon::parse($mw->end_time)->format('g:i A') }} @endif
                                @else
                                    Time varies
                                @endif
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

<section class="py-16 bg-slate-50 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Horizontal Timeline / Overview -->
        @if($sabbathPrograms->count() > 0)
        <div class="mb-16">
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
                        <span class="text-sm font-medium text-sky-600 bg-sky-50 px-3 py-1 rounded-full">
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
                                    <div class="mt-1 w-1.5 h-1.5 rounded-full bg-slate-300 shrink-0"></div>
                                    <div class="flex-1">
                                        <div class="flex flex-wrap justify-between items-baseline gap-2">
                                            <span class="font-semibold text-slate-700">{{ $activity->name }}</span>
                                            @if($activity->start_time)
                                                <span class="text-xs font-medium text-slate-400">
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
            <div class="text-center py-20">
                <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <h3 class="text-xl font-medium text-slate-600 mb-2">Schedule Not Available</h3>
                <p class="text-slate-500">The service times have not been configured yet. Please check back later.</p>
            </div>
        @endif
        
    </div>
</section>

@endsection

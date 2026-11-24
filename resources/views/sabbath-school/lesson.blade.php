@extends('layouts.front')

@section('content')
<div class="bg-gray-50 pb-8 min-h-screen pt-[140px]" style="padding-top: 140px;">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumbs -->
        <nav class="flex text-sm text-gray-500 mb-8 font-sans overflow-x-auto whitespace-nowrap pb-2 border-b border-gray-200" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('sabbath-school.lang', $lang) }}" class="hover:text-[#0d3b66] uppercase tracking-wider text-xs font-semibold">{{ $langName }}</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mx-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{ route('sabbath-school.quarter', ['lang' => $lang, 'quarter' => $quarterId]) }}" class="hover:text-[#0d3b66] uppercase tracking-wider text-xs font-semibold">
                            {{ $quarter['human_date'] ?? 'Overview' }}
                        </a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mx-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-[#0d3b66] font-bold uppercase tracking-wider text-xs truncate max-w-[150px] sm:max-w-none">{{ $currentWeekTitle }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        @if($isAdult && $currentWeek)
            <!-- ADULT LAYOUT -->
            
            <!-- Weekly Lesson Header -->
            <div class="mb-12">
                <div class="flex flex-col md:flex-row gap-8 lg:gap-12 items-start mb-8">
                    <!-- Cover Image -->
                    <div class="w-full md:w-1/3 lg:w-1/4 flex-shrink-0">
                        <div class="aspect-[4/3] md:aspect-auto bg-gray-100 p-4 border border-gray-200 flex items-center justify-center">
                            <img src="{{ route('sabbath-school.asset', ['lang' => $lang, 'quarter' => $quarterId, 'file' => 'cover.png']) }}" 
                                 alt="Cover" 
                                 class="w-full h-auto object-contain shadow-sm">
                        </div>
                    </div>
                    
                    <!-- Metadata -->
                    <div class="flex-1">
                        <p class="text-sm font-sans font-bold uppercase tracking-widest text-gray-500 mb-2">
                            Lesson {{ $currentWeek['id'] }}
                        </p>
                        <h1 class="text-4xl md:text-5xl font-serif text-[#0d3b66] mb-4 leading-tight">
                            {{ $currentWeek['title'] ?? 'Lesson ' . $currentWeek['id'] }}
                        </h1>
                        
                        @if(isset($currentWeek['start_date']) && isset($currentWeek['end_date']))
                            <p class="text-base text-gray-600 font-sans font-semibold mb-6 pb-6 border-b border-gray-200">
                                {{ \Carbon\Carbon::createFromFormat('d/m/Y', $currentWeek['start_date'])->format('F j') }}–{{ \Carbon\Carbon::createFromFormat('d/m/Y', $currentWeek['end_date'])->format('j, Y') }}
                            </p>
                        @endif

                        @if(!empty($currentWeek['memory_verse']))
                            <div class="mb-8 bg-gray-50 border-l-4 border-[#0d3b66] p-6 rounded-r">
                                <p class="text-sm font-sans font-bold text-gray-700 mb-2 uppercase tracking-wider">Memory Text</p>
                                <p class="text-xl font-serif text-gray-800 leading-relaxed italic">
                                    "{!! clean_html($currentWeek['memory_verse']) !!}"
                                </p>
                            </div>
                        @endif
                        
                        <!-- Resources Navigation -->
                        <div class="flex flex-wrap gap-4 mt-6">
                            @if(in_array('teacher-comments', $currentWeek['days'] ?? []))
                                <a href="{{ route('sabbath-school.lesson', ['lang' => $lang, 'quarter' => $quarterId, 'week' => $currentWeek['id'], 'day' => 'teacher-comments']) }}" 
                                   class="inline-flex items-center justify-center px-6 py-3 {{ $dayId == 'teacher-comments' ? 'bg-[#0d3b66] text-white' : 'bg-gray-100 text-gray-800 border border-gray-300 hover:bg-gray-200' }} font-sans font-bold text-sm uppercase tracking-wider transition-colors"
                                   style="border-radius: 0;">
                                    Teacher's Comments
                                </a>
                            @endif
                            
                            @if(in_array('inside-story', $currentWeek['days'] ?? []))
                                <a href="{{ route('sabbath-school.lesson', ['lang' => $lang, 'quarter' => $quarterId, 'week' => $currentWeek['id'], 'day' => 'inside-story']) }}" 
                                   class="inline-flex items-center justify-center px-6 py-3 {{ $dayId == 'inside-story' ? 'bg-[#0d3b66] text-white' : 'bg-gray-100 text-gray-800 border border-gray-300 hover:bg-gray-200' }} font-sans font-bold text-sm uppercase tracking-wider transition-colors"
                                   style="border-radius: 0;">
                                    Inside Story
                                </a>
                            @endif
                            
                            @if(in_array('hope-ss', $currentWeek['days'] ?? []))
                                <a href="{{ route('sabbath-school.lesson', ['lang' => $lang, 'quarter' => $quarterId, 'week' => $currentWeek['id'], 'day' => 'hope-ss']) }}" 
                                   class="inline-flex items-center justify-center px-6 py-3 {{ $dayId == 'hope-ss' ? 'bg-[#0d3b66] text-white' : 'bg-gray-100 text-gray-800 border border-gray-300 hover:bg-gray-200' }} font-sans font-bold text-sm uppercase tracking-wider transition-colors"
                                   style="border-radius: 0;">
                                    Hope SS
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                
                <!-- Daily Lesson Navigation -->
                @php
                    $standardDays = array_filter($currentWeek['days'] ?? [], function($d) {
                        return is_numeric($d) && (int)$d >= 1 && (int)$d <= 7;
                    });
                    $dayNames = ['01' => 'Sabbath', '02' => 'Sunday', '03' => 'Monday', '04' => 'Tuesday', '05' => 'Wednesday', '06' => 'Thursday', '07' => 'Friday'];
                @endphp
                @if(count($standardDays) > 0)
                    <div class="mt-8 border-b border-gray-300">
                        <ul class="flex flex-wrap -mb-px">
                            @foreach($standardDays as $d)
                                <li class="mr-2">
                                    <a href="{{ route('sabbath-school.lesson', ['lang' => $lang, 'quarter' => $quarterId, 'week' => $currentWeek['id'], 'day' => $d]) }}" 
                                       class="inline-block px-4 py-3 font-sans font-bold text-sm uppercase tracking-wider border-b-4 transition-colors {{ $dayId == $d ? 'text-[#0d3b66] border-[#0d3b66]' : 'text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300' }}">
                                        {{ $dayNames[$d] ?? 'Day ' . $d }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <!-- Daily Lesson Content -->
            <article class="bg-white border-t-4 border-[#0d3b66] shadow-md p-8 md:p-12 mb-12">
                <header class="mb-10 pb-6 border-b border-gray-100">
                    <h2 class="text-3xl md:text-4xl font-serif text-gray-900 mb-2">
                        {{ $lesson['frontmatter']['title'] ?? ucfirst(str_replace('-', ' ', $dayId)) }}
                    </h2>
                    @if(isset($lesson['frontmatter']['date']))
                        <p class="text-gray-500 font-sans uppercase tracking-widest text-sm font-semibold">
                            {{ $lesson['frontmatter']['date'] }}
                        </p>
                    @endif
                </header>

                <div class="prose prose-lg max-w-none prose-headings:font-serif prose-headings:text-[#0d3b66] prose-p:font-serif prose-p:text-gray-800 prose-p:leading-relaxed prose-a:text-[#0d3b66] prose-blockquote:border-l-4 prose-blockquote:border-[#0d3b66] prose-blockquote:bg-gray-50 prose-blockquote:p-6 prose-blockquote:not-italic prose-blockquote:text-gray-900 prose-li:font-serif">
                    {!! clean_html($lesson['html']) !!}
                </div>
            </article>

        @else
            <!-- NON-ADULT LAYOUT (Preserving existing functionality) -->
            <!-- Lesson Content -->
            <article class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden mb-8">
                <div class="p-8 md:p-12">
                    <header class="mb-8 border-b pb-6 flex flex-col sm:flex-row gap-6 items-start">
                        <div class="w-full sm:w-1/4 md:w-1/5 flex-shrink-0">
                            <img src="{{ route('sabbath-school.asset', ['lang' => $lang, 'quarter' => $quarterId, 'file' => 'cover.png']) }}" 
                                 alt="{{ $quarter['title'] ?? 'Cover' }}" 
                                 class="w-full h-auto rounded shadow-sm object-cover">
                        </div>
                        <div>
                            <h1 class="text-3xl md:text-4xl font-serif text-[#0d3b66] mb-2 leading-tight">
                                {{ $lesson['frontmatter']['title'] ?? ucfirst(str_replace('-', ' ', $dayId)) }}
                            </h1>
                            @if(isset($lesson['frontmatter']['date']))
                                <p class="text-sm text-gray-500 font-sans uppercase tracking-widest font-semibold mb-2">
                                    {{ $lesson['frontmatter']['date'] }}
                                </p>
                            @endif
                            <p class="text-xs text-[#0d3b66] font-bold uppercase tracking-wider bg-blue-50 inline-block px-2 py-1 rounded">
                                {{ $quarter['sub_category'] ?? $quarter['category'] ?? 'Lesson' }}
                            </p>
                        </div>
                    </header>

                    <div class="prose prose-lg max-w-none prose-headings:font-serif prose-headings:text-[#0d3b66] prose-p:font-serif prose-p:text-gray-800 prose-p:leading-relaxed prose-a:text-[#0d3b66] prose-blockquote:border-l-4 prose-blockquote:border-[#0d3b66] prose-blockquote:bg-gray-50 prose-blockquote:p-4 prose-blockquote:not-italic prose-blockquote:text-gray-900 prose-blockquote:rounded-r">
                        {!! clean_html($lesson['html']) !!}
                    </div>
                </div>
            </article>
        @endif

        <!-- Navigation -->
        <div class="flex items-center justify-between font-sans">
            @if($prevDay)
                <a href="{{ route('sabbath-school.lesson', ['lang' => $lang, 'quarter' => $quarterId, 'week' => $prevDay['week'], 'day' => $prevDay['day']]) }}" 
                   class="inline-flex items-center px-6 py-3 bg-white border border-gray-300 text-sm font-bold uppercase tracking-wider text-gray-700 hover:bg-gray-50 hover:text-[#0d3b66] transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0d3b66]"
                   style="border-radius: 0;">
                    <svg class="mr-2 -ml-1 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Previous Day
                </a>
            @else
                <div></div>
            @endif

            @if($nextDay)
                <a href="{{ route('sabbath-school.lesson', ['lang' => $lang, 'quarter' => $quarterId, 'week' => $nextDay['week'], 'day' => $nextDay['day']]) }}" 
                   class="inline-flex items-center px-6 py-3 bg-[#0d3b66] border border-transparent text-sm font-bold uppercase tracking-wider text-white hover:bg-blue-900 transition-colors shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0d3b66]"
                   style="border-radius: 0;">
                    Next Day
                    <svg class="ml-2 -mr-1 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            @else
                <a href="{{ route('sabbath-school.quarter', ['lang' => $lang, 'quarter' => $quarterId]) }}" 
                   class="inline-flex items-center px-6 py-3 bg-gray-100 border border-gray-300 text-sm font-bold uppercase tracking-wider text-gray-700 hover:bg-gray-200 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0d3b66]"
                   style="border-radius: 0;">
                    Return to Overview
                </a>
            @endif
        </div>

    </div>
</div>
@endsection

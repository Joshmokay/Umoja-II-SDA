@extends('layouts.front')

@section('content')
<div class="bg-gray-50 pb-12 min-h-screen pt-[140px]" style="padding-top: 140px;">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumbs -->
        <nav class="flex text-sm text-gray-500 mb-8 font-sans overflow-x-auto whitespace-nowrap" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('sabbath-school.index') }}" class="hover:text-[#0d3b66]">Sabbath School</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mx-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{ route('sabbath-school.lang', $lang) }}" class="hover:text-[#0d3b66]">{{ $langName }}</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mx-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700 font-medium">{{ $quarter['human_date'] ?? 'Quarter Overview' }}</span>
                    </div>
                </li>
            </ol>
        </nav>
        @if($isAdult && !empty($quarter['weeks']))
            
            <!-- Adult Featured Week -->
            @if($featuredWeek)
                @include('sabbath-school.components.featured-lesson', ['week' => $featuredWeek])
            @endif

            <!-- Previous/Other Adult Weeks -->
            @if(!empty($otherWeeks))
                <div class="mt-12">
                    <h3 class="text-2xl font-serif text-[#1E3F6C] mb-6 border-b pb-2">More Lessons This Quarter</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($otherWeeks as $week)
                            @include('sabbath-school.components.adult-lesson-card', ['week' => $week])
                        @endforeach
                    </div>
                </div>
            @endif

        @else
            <!-- Non-Adult layout (Children, Easy Reading, Media-only) -->
            <!-- Quarter Header -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-8 mb-10">
                <div class="flex flex-col md:flex-row gap-8">
                    <div class="w-full md:w-1/3 lg:w-1/4 flex-shrink-0">
                        <div class="aspect-[3/4] rounded-lg shadow-md overflow-hidden bg-gray-100">
                            <img src="{{ route('sabbath-school.asset', ['lang' => $lang, 'quarter' => $quarterId, 'file' => 'cover.png']) }}" 
                                 alt="{{ $quarter['title'] ?? 'Cover' }}" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="flex-1">
                        <h1 class="text-3xl md:text-4xl font-serif text-gray-900 mb-2">{{ $quarter['title'] ?? 'Lesson Overview' }}</h1>
                        <p class="text-sm text-gray-500 font-sans uppercase tracking-wider font-semibold mb-6">{{ $quarter['human_date'] ?? '' }}</p>
                        
                        @if(isset($quarter['description']))
                            <p class="text-gray-700 font-sans text-lg mb-6">{{ $quarter['description'] }}</p>
                        @endif

                        @if(isset($quarter['introduction']))
                            <div class="prose prose-blue max-w-none font-sans text-gray-700">
                                {!! clean_html($quarter['introduction']) !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            @if(!empty($quarter['media']))
                <!-- Media Resources (PDFs/Videos for Youth/Children) -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden mb-10">
                    <div class="p-6 border-b border-gray-100 bg-[#0d3b66]">
                        <h2 class="text-xl font-serif text-white">Available Resources</h2>
                    </div>
                    <div class="p-6 space-y-6">
                        @foreach($quarter['media'] as $mediaType => $mediaItems)
                            <div>
                                <h3 class="text-lg font-semibold font-sans text-gray-800 uppercase tracking-wider mb-3 border-b pb-2">{{ ucfirst($mediaType) }}s</h3>
                                <ul class="space-y-2">
                                    @foreach($mediaItems as $item)
                                        <li class="flex items-start">
                                            <svg class="w-5 h-5 text-[#0d3b66] mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                            @php
                                                $readerLink = $item['src'] ?? '#';
                                                $isTargetReader = false;
                                                if (isset($item['target']) && in_array(strtolower($mediaType), ['pdf', 'images', 'image'])) {
                                                    $targetId = basename($item['target']);
                                                    $readerLink = route('sabbath-school.read', ['lang' => $lang, 'quarter' => $quarterId, 'id' => $targetId]);
                                                    $isTargetReader = true;
                                                }
                                            @endphp
                                            <a href="{{ $readerLink }}" {!! !$isTargetReader ? 'target="_blank"' : '' !!} class="text-[#0d3b66] hover:text-blue-500 font-semibold font-sans transition-colors">
                                                {{ $item['title'] ?? 'Resource Link' }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Weeks List -->
            <div class="space-y-6">
                @if(!empty($quarter['weeks']))
                    @foreach($quarter['weeks'] as $week)
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                            <div class="p-6 border-b border-gray-100 bg-gray-50/50">
                                <h2 class="text-xl font-serif text-gray-900">
                                    <span class="text-[#0d3b66] font-semibold mr-2">Week {{ $week['id'] }}:</span> 
                                    {{ $week['title'] ?? '' }}
                                </h2>
                                @if(isset($week['start_date']) && isset($week['end_date']))
                                    <p class="text-sm text-gray-500 font-sans mt-1">{{ $week['start_date'] }} - {{ $week['end_date'] }}</p>
                                @endif
                            </div>
                            
                            @if(!empty($week['days']))
                                <div class="p-4 bg-white">
                                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7 gap-3">
                                        @foreach($week['days'] as $day)
                                            @php
                                                // Make human readable day names if it's 01 to 07
                                                $dayName = $day;
                                                $dayNames = ['01' => 'Sat', '02' => 'Sun', '03' => 'Mon', '04' => 'Tue', '05' => 'Wed', '06' => 'Thu', '07' => 'Fri'];
                                                if (isset($dayNames[$day])) {
                                                    $dayName = $dayNames[$day];
                                                } else {
                                                    $dayName = ucfirst(str_replace('-', ' ', $day));
                                                }
                                            @endphp
                                            <a href="{{ route('sabbath-school.lesson', ['lang' => $lang, 'quarter' => $quarterId, 'week' => $week['id'], 'day' => $day]) }}" 
                                               class="text-center py-2 px-3 rounded text-sm font-semibold font-sans transition-colors
                                                      bg-gray-100 text-gray-700 hover:bg-[#0d3b66] hover:text-white border border-gray-200 hover:border-[#0d3b66]">
                                                {{ $dayName }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @elseif(!empty($week['is_pdf_only']))
                                <div class="p-6 bg-white">
                                    <a href="{{ route('sabbath-school.read', ['lang' => $lang, 'quarter' => $quarterId, 'id' => $week['pdf_target']]) }}" class="inline-flex items-center text-white bg-[#0d3b66] hover:bg-blue-700 px-6 py-2 rounded font-semibold font-sans transition-colors shadow-sm">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                        Read PDF Lesson
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @else
                    @if(empty($quarter['media']))
                        <div class="bg-white p-8 rounded-lg shadow text-center">
                            <p class="text-gray-600 font-sans">No lessons currently available for this quarter.</p>
                        </div>
                    @endif
                @endif
            </div>
        @endif

    </div>
</div>
@endsection

@extends('layouts.front')

@section('content')
<div class="bg-gray-50 pb-12 min-h-screen pt-[140px]" style="padding-top: 140px;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumbs -->
        <nav class="flex text-sm text-gray-500 mb-8 font-sans" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('sabbath-school.index') }}" class="hover:text-[#0d3b66]">Sabbath School</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mx-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700 font-medium">{{ $langName }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <h1 class="text-3xl font-serif text-[#0d3b66] mb-10">{{ $langName }} Lessons</h1>

        <div class="space-y-12">
            @foreach($quartersByCategory as $catId => $catData)
                @if(count($catData['quarters']) > 0)
                    <section>
                        <h2 class="text-2xl font-serif text-gray-800 border-b pb-2 mb-6">{{ $catData['name'] }}</h2>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                            @foreach($catData['quarters'] as $quarter)
                                <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow flex flex-col h-full group">
                                    <a href="{{ $quarter['read_url'] ?? route('sabbath-school.quarter', ['lang' => $lang, 'quarter' => $quarter['id']]) }}" class="block relative aspect-[3/4] overflow-hidden bg-gray-100 border-b border-gray-100">
                                        <img src="{{ route('sabbath-school.asset', ['lang' => $lang, 'quarter' => $quarter['id'], 'file' => 'cover.png']) }}" 
                                             alt="{{ $quarter['title'] ?? 'Cover' }}" 
                                             class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                                        @if(isset($quarter['sub_category']) && $quarter['sub_category'])
                                            <span class="absolute top-3 left-3 bg-[#0d3b66] text-white text-xs font-bold px-2 py-1 rounded shadow">
                                                {{ $quarter['sub_category'] }}
                                            </span>
                                        @endif
                                    </a>
                                    <div class="p-5 flex-1 flex flex-col">
                                        <p class="text-xs font-semibold text-gray-500 font-sans mb-1 uppercase tracking-wider">
                                            {{ $quarter['human_date'] ?? '' }}
                                        </p>
                                        <h3 class="text-lg font-serif text-gray-900 mb-2 leading-tight">
                                            {{ $quarter['title'] ?? 'Overview' }}
                                        </h3>
                                        @if(isset($quarter['description']))
                                            <p class="text-sm text-gray-600 font-sans line-clamp-2 mb-4 flex-1">
                                                {{ $quarter['description'] }}
                                            </p>
                                        @endif
                                        <div class="mt-auto pt-4">
                                            <a href="{{ $quarter['read_url'] ?? route('sabbath-school.quarter', ['lang' => $lang, 'quarter' => $quarter['id']]) }}" class="block w-full text-center bg-gray-100 hover:bg-[#0d3b66] text-gray-800 hover:text-white font-sans font-bold py-2.5 px-4 rounded transition-colors text-sm uppercase tracking-wider">
                                                Read Lesson
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif
            @endforeach
            
            @php
                $hasAny = false;
                foreach($quartersByCategory as $catData) {
                    if (count($catData['quarters']) > 0) $hasAny = true;
                }
            @endphp
            
            @if(!$hasAny)
                <div class="bg-white p-8 rounded-lg shadow text-center">
                    <p class="text-gray-600 font-sans">No lessons currently available for this language.</p>
                </div>
            @endif
        </div>

    </div>
</div>
@endsection

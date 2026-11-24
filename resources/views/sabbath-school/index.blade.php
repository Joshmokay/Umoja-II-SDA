@extends('layouts.front')

@section('content')
<div class="bg-gray-50 pb-16 min-h-screen pt-[140px]" style="padding-top: 140px;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl font-serif text-[#0d3b66] mb-4">Sabbath School Lessons</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto font-sans">
                Explore our daily Sabbath School study guides for all ages, available in English and Kiswahili.
            </p>
        </div>

        <div class="mt-12">
            <h2 class="text-2xl font-serif text-[#0d3b66] mb-6 border-b pb-2">Select Language</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($languages as $code => $name)
                    <a href="{{ route('sabbath-school.lang', $code) }}" class="bg-white rounded-lg shadow hover:shadow-md transition-shadow p-6 border-l-4 border-[#0d3b66] group flex justify-between items-center">
                        <span class="text-xl font-serif text-gray-900">{{ $name }}</span>
                        <svg class="w-6 h-6 text-[#0d3b66] group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                @endforeach
            </div>
        </div>

        @foreach($featuredQuarters as $lang => $quarters)
            @if(count($quarters) > 0)
                <div class="mt-16">
                    <div class="flex items-baseline justify-between border-b pb-2 mb-6">
                        <h2 class="text-2xl font-serif text-[#0d3b66]">Latest in {{ $languages[$lang] ?? strtoupper($lang) }}</h2>
                        <a href="{{ route('sabbath-school.lang', $lang) }}" class="text-sm font-semibold text-[#0d3b66] hover:underline uppercase tracking-wider">View All</a>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($quarters as $quarter)
                            <a href="{{ route('sabbath-school.quarter', ['lang' => $lang, 'quarter' => $quarter['id']]) }}" class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition-shadow flex flex-col h-full">
                                <div class="p-6 flex-1 flex flex-col">
                                    <span class="text-xs font-semibold text-[#0d3b66] uppercase tracking-wider mb-2 block">
                                        {{ $quarter['category'] ?? 'Standard' }}
                                    </span>
                                    <h3 class="text-lg font-serif text-gray-900 mb-2 leading-tight">
                                        {{ $quarter['title'] ?? 'Lesson Overview' }}
                                    </h3>
                                    <p class="text-sm text-gray-500 font-sans mt-auto">
                                        {{ $quarter['human_date'] ?? '' }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
@endsection

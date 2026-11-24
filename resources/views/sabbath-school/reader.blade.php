@extends('layouts.front')

@section('title', ($resource['title'] ?? 'Lesson') . ' - Sabbath School Reader')

@section('content')
<div class="bg-gray-100 min-h-screen pb-12 flex flex-col pt-[140px] md:pt-[140px]" style="padding-top: 140px;">
    <!-- Professional Reader Header -->
    <div class="bg-white border-b border-gray-200 relative z-40 shadow-sm">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Breadcrumb / Back Navigation -->
            <div class="mb-6">
                <a href="{{ route('sabbath-school.quarter', ['lang' => $lang, 'quarter' => $quarterId]) }}" 
                   class="inline-flex items-center text-sm font-sans font-semibold text-gray-500 hover:text-[#0d3b66] transition-colors group">
                    <svg class="w-4 h-4 mr-1.5 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Overview
                </a>
            </div>

            <!-- Title Section -->
            <div class="border-t-2 border-[#0d3b66] pt-6 mb-4">
                <p class="text-xs font-bold uppercase tracking-widest text-[#0d3b66] mb-2 font-sans">
                    {{ $quarter['sub_category'] ?? $quarter['category'] ?? 'Bible Study' }}
                </p>
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-serif font-bold text-gray-900 leading-tight mb-2">
                    {{ $resource['title'] ?? 'Lesson Resource' }}
                </h1>
                <p class="text-lg text-gray-500 font-serif italic">
                    {{ $quarter['title'] ?? '' }}
                </p>
            </div>

            <!-- Metadata & Actions -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mt-8 pt-6 border-t border-gray-100">
                <div class="flex items-center text-sm text-gray-500 font-sans">
                    <span class="inline-flex items-center">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        {{ $quarter['human_date'] ?? '' }}
                    </span>
                    <span class="mx-3 text-gray-300">|</span>
                    <span class="inline-flex items-center uppercase tracking-wider text-xs font-semibold">
                        Format: {{ strtoupper($fileType) }}
                    </span>
                </div>
                
                @if(isset($resource['src']))
                <div class="flex-shrink-0">
                    <a href="{{ $resource['src'] }}" target="_blank" download 
                       class="inline-flex items-center justify-center px-6 py-2.5 border border-gray-300 shadow-sm text-sm font-bold font-sans rounded-md text-gray-700 bg-white hover:bg-gray-50 hover:text-[#0d3b66] hover:border-[#0d3b66] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0d3b66] transition-all w-full sm:w-auto uppercase tracking-wider">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Download Original
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Reader Body -->
    <div class="flex-1 max-w-5xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-8 md:py-12 flex flex-col">
        <div class="bg-white rounded-lg shadow-xl border border-gray-200 overflow-hidden flex flex-col h-[75vh] min-h-[600px] relative">
            
            @if($fileType === 'pdf')
                <!-- PDF Viewer with Loading State & Native Capabilities -->
                <div class="absolute inset-0 flex flex-col items-center justify-center bg-gray-50 -z-10" aria-hidden="true">
                    <svg class="animate-spin -ml-1 mr-3 h-10 w-10 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="#0d3b66" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <p class="mt-4 text-sm font-sans font-semibold text-gray-400 tracking-wider uppercase">Loading Document...</p>
                </div>
                
                <object data="{{ $resource['src'] ?? '' }}" type="application/pdf" width="100%" height="100%" class="flex-1 w-full h-full relative z-10 bg-transparent">
                    <iframe src="{{ $resource['src'] ?? '' }}" width="100%" height="100%" class="flex-1 border-0">
                        <div class="p-12 text-center flex flex-col items-center justify-center h-full bg-white">
                            <div class="w-20 h-20 bg-red-50 rounded-full flex items-center justify-center mb-6">
                                <svg class="w-10 h-10 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                            </div>
                            <h3 class="text-2xl font-serif text-gray-900 mb-2">Document Unavailable</h3>
                            <p class="text-gray-500 max-w-md mx-auto mb-8 font-sans">The document could not be displayed natively or the file link might have expired. Please download the original file to view it.</p>
                            <a href="{{ $resource['src'] ?? '' }}" target="_blank" class="inline-flex items-center px-6 py-3 border border-transparent text-sm font-bold font-sans rounded-md shadow-sm text-white bg-[#0d3b66] hover:bg-blue-800 transition-colors uppercase tracking-wider">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                Download PDF
                            </a>
                        </div>
                    </iframe>
                </object>
            @elseif($fileType === 'image')
                <!-- Image Viewer -->
                <div class="flex-1 overflow-auto bg-gray-100 p-4 md:p-8 flex flex-col items-center">
                    @if(is_array($resource['src']))
                        <div class="space-y-8 max-w-4xl w-full">
                            @foreach($resource['src'] as $idx => $imgSrc)
                                <div class="bg-white p-3 md:p-6 shadow-md border border-gray-200 rounded-sm">
                                    <img src="{{ $imgSrc }}" class="w-full h-auto" alt="Page {{ $idx + 1 }}" loading="lazy">
                                    <p class="text-center text-xs text-gray-400 mt-4 uppercase tracking-widest font-sans font-semibold">Page {{ $idx + 1 }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="bg-white p-3 md:p-6 shadow-md border border-gray-200 rounded-sm max-w-5xl w-full">
                            <img src="{{ $resource['src'] ?? '' }}" class="w-full h-auto" alt="{{ $resource['title'] ?? 'Image' }}" loading="lazy">
                        </div>
                    @endif
                </div>
            @else
                <!-- Unknown Format -->
                <div class="p-12 text-center flex flex-col items-center justify-center h-full bg-white">
                    <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-serif text-gray-900 mb-2">Unsupported Format</h3>
                    <p class="text-gray-500 max-w-md mx-auto mb-8 font-sans">This resource format cannot be displayed natively in the reader. You can still access it by downloading or opening it externally.</p>
                    <a href="{{ $resource['src'] ?? '#' }}" target="_blank" class="inline-flex items-center px-6 py-3 border border-gray-300 text-sm font-bold font-sans rounded-md text-gray-700 bg-white hover:bg-gray-50 transition-colors uppercase tracking-wider shadow-sm">
                        Open Externally
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

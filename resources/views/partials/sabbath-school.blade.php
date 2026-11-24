@inject('ssService', 'App\Services\SabbathSchoolService')

@php
    $currentLesson = $ssService->getCurrentLesson('en');
    $currentQuarter = $currentLesson['quarter'] ?? null;
    $currentWeek = $currentLesson['week'] ?? null;
    $memoryVerse = $currentLesson['memory_verse'] ?? null;
    $intro = $currentLesson['intro'] ?? null;
    $lessonNumber = $currentWeek ? (int)$currentWeek['id'] : null;
@endphp

<section class="section-container">
    <div class="section-content">
        <div class="content-card flex flex-col md:flex-row p-0 scroll-reveal overflow-hidden">
            <!-- Content -->
            <div class="md:w-1/2 p-10 lg:p-16 flex flex-col justify-center">
                <p class="font-sans font-bold tracking-widest uppercase text-sm mb-3 text-primary">Sabbath School</p>
                
                @if($currentLesson && $currentQuarter && $currentWeek)
                    <h2 class="text-3xl lg:text-4xl font-serif font-bold text-gray-800 mb-2">Lesson {{ $lessonNumber }}: {{ $currentWeek['title'] ?? 'Untitled' }}</h2>
                    <h3 class="text-2xl font-serif text-primary mb-4">{{ $currentQuarter['title'] ?? 'Current Quarter' }}</h3>
                    <p class="text-sm font-sans text-gray-500 mb-6">{{ $currentWeek['start_date'] ?? '' }} – {{ $currentWeek['end_date'] ?? '' }}</p>
                    
                    @if($memoryVerse)
                    <div class="mb-6">
                        <p class="text-sm font-sans font-bold text-gray-700 mb-2">Memory Verse</p>
                        <blockquote class="italic text-gray-600 font-serif border-l-4 border-secondary pl-4 py-2 bg-gray-50 rounded-r-lg">
                            {!! clean_html($memoryVerse) !!}
                        </blockquote>
                    </div>
                    @endif
                    
                    @if($intro)
                    <p class="text-gray-600 font-sans mb-8 leading-relaxed">
                        {{ $intro }}
                    </p>
                    @endif

                    <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                        <a href="{{ route('sabbath-school.lesson', ['lang' => 'en', 'quarter' => $currentQuarter['id'], 'week' => $currentWeek['id'], 'day' => $currentLesson['first_day'] ?? '01']) }}" class="inline-flex items-center justify-center bg-primary hover:bg-secondary text-white font-sans font-bold py-3 px-6 rounded-lg text-center transition-all duration-300 shadow-lg hover:shadow-xl text-sm uppercase tracking-wider">Read Online</a>
                        <a href="{{ route('sabbath-school.index') }}" class="inline-flex items-center justify-center border border-gray-300 hover:border-primary text-gray-700 hover:text-primary font-sans font-bold py-3 px-6 rounded-lg text-center transition-all duration-300 text-sm uppercase tracking-wider">Lesson Archive &rarr;</a>
                    </div>
                @else
                    <h2 class="text-3xl lg:text-4xl font-serif font-bold text-gray-800 mb-2">This Week's Lesson</h2>
                    <h3 class="text-2xl font-serif text-primary mb-4">Temporarily Unavailable</h3>
                    <p class="text-gray-600 font-sans mb-8 leading-relaxed">
                        The current lesson is being updated or is temporarily unavailable. Please browse our archives to read past lessons and study materials.
                    </p>

                    <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                        <a href="{{ route('sabbath-school.index') }}" class="inline-flex items-center justify-center bg-gray-200 hover:bg-gray-300 text-gray-600 font-sans font-bold py-3 px-6 rounded-lg text-center transition-all duration-300 shadow-md text-sm uppercase tracking-wider" onclick="alert('The current lesson is temporarily unavailable. Redirecting to archives.');">Read Online</a>
                        <a href="{{ route('sabbath-school.index') }}" class="inline-flex items-center justify-center border border-gray-300 hover:border-primary text-gray-700 hover:text-primary font-sans font-bold py-3 px-6 rounded-lg text-center transition-all duration-300 text-sm uppercase tracking-wider">Lesson Archive &rarr;</a>
                    </div>
                @endif
            </div>

            <!-- Image -->
            <div class="md:w-1/2 bg-gray-50 p-10 lg:p-16 flex flex-col justify-center border-t md:border-t-0 md:border-l border-gray-100 items-center">
                <div class="w-2/3 sm:w-1/2 rounded shadow-2xl overflow-hidden transform rotate-2 hover:rotate-0 transition-transform duration-500 border-4 border-white">
                    @if($currentLesson && $currentQuarter)
                        <img src="{{ $currentQuarter['cover_url'] ?? '' }}" alt="{{ $currentQuarter['title'] ?? 'Quarter Cover' }}" class="w-full h-auto object-cover aspect-[3/4]">
                    @else
                        <div class="w-full h-auto aspect-[3/4] bg-gray-200 flex items-center justify-center object-cover">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

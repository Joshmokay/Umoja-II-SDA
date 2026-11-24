<div class="bg-white {{ $isCurrent ? 'border-t-4 border-[#0d3b66] shadow-lg md:scale-[1.02] transform transition-transform z-20' : 'border border-gray-200 shadow-sm' }} overflow-hidden p-6 md:p-8 flex flex-col h-full relative group hover:shadow-md transition-shadow">
    
    @if($isCurrent)
        <div class="absolute top-0 right-0 bg-[#0d3b66] text-white text-xs font-bold uppercase tracking-wider px-3 py-1 shadow-sm">
            Current Week
        </div>
    @endif

    <!-- Lesson Title -->
    <div class="mb-5 pr-20"> <!-- Padding right to avoid overlapping with current label -->
        <h2 class="{{ $isCurrent ? 'text-4xl' : 'text-3xl' }} font-serif text-[#0d3b66] leading-tight">
            {{ $week['title'] ?? 'Lesson ' . $week['id'] }}
        </h2>
    </div>

    <!-- Cover Image -->
    <div class="w-full bg-gray-50 flex items-center justify-center mb-6 py-6 px-4 border border-gray-100 rounded-sm">
        <img src="{{ route('sabbath-school.asset', ['lang' => $lang, 'quarter' => $quarterId, 'file' => 'cover.png']) }}" 
             alt="Lesson {{ $week['id'] }}" 
             class="w-full max-h-[320px] object-contain shadow-sm">
    </div>

    <!-- Lesson Number & Dates -->
    <div class="mb-6 border-b border-gray-100 pb-4">
        <p class="text-xl font-sans text-gray-800 font-bold mb-1">Lesson {{ $week['id'] }}</p>
        @if(isset($week['start_date']) && isset($week['end_date']))
            <p class="text-sm text-gray-500 font-sans font-semibold">
                {{ \Carbon\Carbon::createFromFormat('d/m/Y', $week['start_date'])->format('F j') }} – {{ \Carbon\Carbon::createFromFormat('d/m/Y', $week['end_date'])->format('j, Y') }}
            </p>
        @endif
    </div>

    <!-- Memory Text -->
    @if(!empty($week['memory_verse']))
        <div class="mb-8 flex-grow">
            <p class="text-xs font-sans font-bold text-gray-500 uppercase tracking-wider mb-2">Memory Text:</p>
            <p class="text-base font-serif text-gray-800 leading-relaxed italic">
                "{!! clean_html($week['memory_verse']) !!}"
            </p>
        </div>
    @else
        <div class="flex-grow mb-8"></div>
    @endif

    <!-- Actions -->
    <div class="mt-auto pt-4 flex flex-wrap gap-3">
        @php
            $firstDay = !empty($week['days']) ? $week['days'][0] : '01';
        @endphp
        
        <!-- Primary Action -->
        <a href="{{ route('sabbath-school.lesson', ['lang' => $lang, 'quarter' => $quarterId, 'week' => $week['id'], 'day' => $firstDay]) }}" 
           class="inline-flex items-center justify-center px-5 py-2.5 bg-[#0d3b66] text-white font-sans font-bold text-xs uppercase tracking-wider hover:bg-blue-900 transition-colors w-full sm:w-auto text-center"
           style="border-radius: 0;">
            Read Lesson
        </a>
        
        <!-- Other Actions -->
        @if(in_array('teacher-comments', $week['days'] ?? []))
            <a href="{{ route('sabbath-school.lesson', ['lang' => $lang, 'quarter' => $quarterId, 'week' => $week['id'], 'day' => 'teacher-comments']) }}" 
               class="inline-flex items-center justify-center px-4 py-2.5 bg-gray-100 text-gray-800 border border-gray-300 font-sans font-bold text-[11px] sm:text-xs uppercase tracking-wider hover:bg-gray-200 transition-colors flex-1 sm:flex-none text-center"
               style="border-radius: 0;">
                Teacher's Comments
            </a>
        @endif
        
        @if(in_array('inside-story', $week['days'] ?? []))
            <a href="{{ route('sabbath-school.lesson', ['lang' => $lang, 'quarter' => $quarterId, 'week' => $week['id'], 'day' => 'inside-story']) }}" 
               class="inline-flex items-center justify-center px-4 py-2.5 bg-gray-100 text-gray-800 border border-gray-300 font-sans font-bold text-[11px] sm:text-xs uppercase tracking-wider hover:bg-gray-200 transition-colors flex-1 sm:flex-none text-center"
               style="border-radius: 0;">
                Inside Story
            </a>
        @endif
    </div>
</div>

<div class="bg-white border-t-4 border-[#0d3b66] overflow-hidden mb-12 shadow-md">
    <div class="flex flex-col md:flex-row">
        <!-- Cover Image Column -->
        <div class="w-full md:w-2/5 lg:w-1/3 flex-shrink-0 bg-gray-50 border-r border-gray-200">
            <div class="aspect-[4/3] md:aspect-auto md:h-full p-6 md:p-10 flex items-center justify-center">
                <img src="{{ route('sabbath-school.asset', ['lang' => $lang, 'quarter' => $quarterId, 'file' => 'cover.png']) }}" 
                     alt="Lesson {{ $week['id'] }}" 
                     class="max-w-full max-h-[400px] object-contain shadow-lg rounded-sm">
            </div>
        </div>

        <!-- Content Column -->
        <div class="p-8 md:p-12 flex-1 flex flex-col justify-center">
            <div class="mb-3 flex items-center justify-between">
                <span class="text-sm font-sans font-bold uppercase tracking-widest text-[#0d3b66] bg-blue-50 px-3 py-1 rounded">
                    Featured Lesson
                </span>
                <span class="text-sm font-sans font-bold uppercase tracking-widest text-gray-500">
                    Lesson {{ $week['id'] }}
                </span>
            </div>
            
            <h2 class="text-4xl md:text-5xl font-serif text-gray-900 mb-4 leading-tight">
                {{ $week['title'] ?? 'Lesson ' . $week['id'] }}
            </h2>
            
            @if(isset($week['start_date']) && isset($week['end_date']))
                <p class="text-base text-gray-600 font-sans font-semibold mb-8">
                    {{ \Carbon\Carbon::createFromFormat('d/m/Y', $week['start_date'])->format('F j') }}–{{ \Carbon\Carbon::createFromFormat('d/m/Y', $week['end_date'])->format('j, Y') }}
                </p>
            @endif

            @if(!empty($week['memory_verse']))
                <div class="mb-10 bg-gray-50 border-l-4 border-[#0d3b66] p-6 rounded-r">
                    <p class="text-sm font-sans font-bold text-gray-700 mb-2 uppercase tracking-wider">Memory Text</p>
                    <p class="text-xl font-serif text-gray-800 leading-relaxed italic">
                        "{!! clean_html($week['memory_verse']) !!}"
                    </p>
                </div>
            @endif

            <div class="mt-auto flex flex-wrap gap-4">
                @php
                    $readUrl = '#';
                    if (!empty($week['is_pdf_only']) && !empty($week['pdf_target'])) {
                        $readUrl = route('sabbath-school.read', ['lang' => $lang, 'quarter' => $quarterId, 'id' => $week['pdf_target']]);
                    } elseif (!empty($week['days'])) {
                        $readUrl = route('sabbath-school.lesson', ['lang' => $lang, 'quarter' => $quarterId, 'week' => $week['id'], 'day' => $week['days'][0]]);
                    }
                @endphp
                <a href="{{ $readUrl }}" 
                   class="inline-flex items-center justify-center px-8 py-4 bg-[#0d3b66] text-white font-sans font-bold text-base uppercase tracking-wider hover:bg-blue-900 transition-colors shadow-sm"
                   style="border-radius: 0;">
                    Read Lesson
                </a>
                
                @if(in_array('teacher-comments', $week['days'] ?? []))
                    <a href="{{ route('sabbath-school.lesson', ['lang' => $lang, 'quarter' => $quarterId, 'week' => $week['id'], 'day' => 'teacher-comments']) }}" 
                       class="inline-flex items-center justify-center px-8 py-4 bg-gray-100 text-gray-800 border border-gray-300 font-sans font-bold text-base uppercase tracking-wider hover:bg-gray-200 transition-colors"
                       style="border-radius: 0;">
                        Teacher's Comments
                    </a>
                @endif
                
                @if(in_array('inside-story', $week['days'] ?? []))
                    <a href="{{ route('sabbath-school.lesson', ['lang' => $lang, 'quarter' => $quarterId, 'week' => $week['id'], 'day' => 'inside-story']) }}" 
                       class="inline-flex items-center justify-center px-8 py-4 bg-gray-100 text-gray-800 border border-gray-300 font-sans font-bold text-base uppercase tracking-wider hover:bg-gray-200 transition-colors"
                       style="border-radius: 0;">
                        Inside Story
                    </a>
                @endif
                
                @if(in_array('hope-ss', $week['days'] ?? []))
                    <a href="{{ route('sabbath-school.lesson', ['lang' => $lang, 'quarter' => $quarterId, 'week' => $week['id'], 'day' => 'hope-ss']) }}" 
                       class="inline-flex items-center justify-center px-8 py-4 bg-gray-100 text-gray-800 border border-gray-300 font-sans font-bold text-base uppercase tracking-wider hover:bg-gray-200 transition-colors"
                       style="border-radius: 0;">
                        Hope SS
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>

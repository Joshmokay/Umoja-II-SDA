<div class="bg-white border border-gray-200 overflow-hidden mb-8 md:mb-12 shadow-sm">
    <div class="flex flex-col md:flex-row">
        <!-- Cover Image Column -->
        <div class="w-full md:w-1/3 lg:w-1/4 flex-shrink-0 bg-gray-50 border-r border-gray-200">
            <div class="aspect-[4/3] md:aspect-[3/4] p-4 md:p-6 flex items-center justify-center h-full">
                <img src="{{ route('sabbath-school.asset', ['lang' => $lang, 'quarter' => $quarterId, 'file' => 'cover.png']) }}" 
                     alt="Lesson {{ $week['id'] }}" 
                     class="max-w-full max-h-full object-contain shadow-md rounded-sm">
            </div>
        </div>

        <!-- Content Column -->
        <div class="p-6 md:p-8 flex-1 flex flex-col justify-center">
            <div class="mb-2">
                <span class="text-sm font-sans font-bold uppercase tracking-widest text-gray-500">
                    Lesson {{ $week['id'] }}
                </span>
            </div>
            
            <h2 class="text-3xl md:text-4xl font-serif text-[#0d3b66] mb-4">
                {{ $week['title'] ?? 'Lesson ' . $week['id'] }}
            </h2>
            
            @if(isset($week['start_date']) && isset($week['end_date']))
                <p class="text-sm text-gray-600 font-sans font-semibold mb-6">
                    {{ \Carbon\Carbon::createFromFormat('d/m/Y', $week['start_date'])->format('F j') }}–{{ \Carbon\Carbon::createFromFormat('d/m/Y', $week['end_date'])->format('j, Y') }}
                </p>
            @endif

            @if(!empty($week['memory_verse']))
                <div class="mb-8">
                    <p class="text-sm font-sans font-bold text-gray-700 mb-1">Memory Text:</p>
                    <p class="text-lg font-serif text-gray-800 leading-relaxed italic">
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
               class="inline-flex items-center justify-center px-6 py-3 bg-[#0d3b66] text-white font-sans font-bold text-sm uppercase tracking-wider hover:bg-blue-900 transition-colors"
               style="border-radius: 0;">
                Read Lesson
            </a>
                
                @if(in_array('teacher-comments', $week['days'] ?? []))
                    <a href="{{ route('sabbath-school.lesson', ['lang' => $lang, 'quarter' => $quarterId, 'week' => $week['id'], 'day' => 'teacher-comments']) }}" 
                       class="inline-flex items-center justify-center px-6 py-3 bg-gray-100 text-gray-800 border border-gray-300 font-sans font-bold text-sm uppercase tracking-wider hover:bg-gray-200 transition-colors"
                       style="border-radius: 0;">
                        Teacher's Comments
                    </a>
                @endif
                
                @if(in_array('inside-story', $week['days'] ?? []))
                    <a href="{{ route('sabbath-school.lesson', ['lang' => $lang, 'quarter' => $quarterId, 'week' => $week['id'], 'day' => 'inside-story']) }}" 
                       class="inline-flex items-center justify-center px-6 py-3 bg-gray-100 text-gray-800 border border-gray-300 font-sans font-bold text-sm uppercase tracking-wider hover:bg-gray-200 transition-colors"
                       style="border-radius: 0;">
                        Inside Story
                    </a>
                @endif
                
                @if(in_array('hope-ss', $week['days'] ?? []))
                    <a href="{{ route('sabbath-school.lesson', ['lang' => $lang, 'quarter' => $quarterId, 'week' => $week['id'], 'day' => 'hope-ss']) }}" 
                       class="inline-flex items-center justify-center px-6 py-3 bg-gray-100 text-gray-800 border border-gray-300 font-sans font-bold text-sm uppercase tracking-wider hover:bg-gray-200 transition-colors"
                       style="border-radius: 0;">
                        Hope SS
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>

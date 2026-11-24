@extends('layouts.children')

@section('title', $story->title . ' - Children\'s Ministry')

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-20 overflow-hidden bg-sky-50">
    <div class="absolute inset-0 z-0">
        @include('partials.site-background')
    </div>
    <div class="container mx-auto px-4 max-w-4xl relative z-10 text-center">
        <a href="{{ route('childrens-ministry.index') }}" class="inline-flex items-center text-sky-600 font-bold mb-6 hover:text-sky-700 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to Children's Ministry
        </a>
        
        <h1 class="text-4xl md:text-5xl font-heading font-bold text-slate-800 mb-6">{{ $story->title }}</h1>
        <div class="w-24 h-1.5 bg-gradient-to-r from-emerald-400 to-sky-400 mx-auto rounded-full mb-8"></div>
        
        @if($story->image_path)
            <img src="{{ asset('storage/' . $story->image_path) }}" alt="{{ $story->title }}" class="w-full max-h-[500px] object-cover rounded-3xl shadow-xl">
        @endif
    </div>
</section>

<!-- Reading & Download Section -->
<section class="py-12 bg-white relative z-20">
    <div class="container mx-auto px-4 max-w-4xl">
        
        <div class="flex justify-between items-center mb-8 pb-6 border-b border-slate-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-800">Bible Story</h3>
            </div>
            <a href="{{ route('childrens-ministry.stories.download', $story->slug) }}" class="inline-flex items-center bg-rose-500 hover:bg-rose-600 text-white font-bold py-2.5 px-5 rounded-full shadow-md hover:shadow-lg transition-all transform hover:-translate-y-1">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                Download PDF
            </a>
        </div>

        <div class="prose prose-lg md:prose-xl max-w-none text-slate-700 leading-relaxed font-medium">
            {!! clean($story->content) !!}
        </div>
    </div>
</section>

<!-- Lesson Section -->
@if($story->lesson)
<section class="py-16 bg-emerald-50">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="bg-white rounded-3xl p-8 md:p-12 shadow-sm border border-emerald-100 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-100 rounded-full mix-blend-multiply opacity-50 transform translate-x-1/2 -translate-y-1/2"></div>
            
            <div class="flex items-center gap-4 mb-6 relative z-10">
                <div class="w-12 h-12 rounded-2xl bg-emerald-500 text-white flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                </div>
                <h3 class="text-2xl md:text-3xl font-heading font-bold text-emerald-800">{{ $story->lesson->title ?: 'What Can We Learn?' }}</h3>
            </div>
            
            <div class="prose prose-lg max-w-none text-emerald-900 leading-relaxed font-medium relative z-10">
                {!! clean($story->lesson->content) !!}
            </div>
        </div>
    </div>
</section>
@endif

<!-- Quiz Section -->
@if($story->quizQuestions->count() > 0)
<section class="py-20 bg-sky-50 relative overflow-hidden" x-data="quizComponent()">
    <div class="container mx-auto px-4 max-w-3xl relative z-10">
        
        <div class="text-center mb-10">
            <span class="text-amber-500 font-bold tracking-wider uppercase text-sm mb-2 block">Test Your Knowledge</span>
            <h2 class="text-3xl md:text-4xl font-heading font-bold text-slate-800 mb-4">Interactive Quiz</h2>
        </div>

        <div class="bg-white rounded-3xl p-6 md:p-10 shadow-lg border border-sky-100 relative">
            
            <!-- Quiz Progress -->
            <div x-show="!isFinished" class="mb-8">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm font-bold text-sky-600">Question <span x-text="currentIndex + 1"></span> of <span x-text="questions.length"></span></span>
                    <span class="text-sm font-bold text-slate-400" x-text="`${Math.round(((currentIndex) / questions.length) * 100)}% Complete`"></span>
                </div>
                <div class="w-full bg-slate-100 rounded-full h-2.5">
                    <div class="bg-sky-500 h-2.5 rounded-full transition-all duration-500 ease-out" :style="`width: ${((currentIndex) / questions.length) * 100}%`"></div>
                </div>
            </div>

            <!-- Quiz Questions -->
            <div x-show="!isFinished">
                <template x-for="(question, index) in questions" :key="question.id">
                    <div x-show="currentIndex === index" x-transition.opacity.duration.300ms>
                        <h3 class="text-xl md:text-2xl font-bold text-slate-800 mb-8" x-text="question.question"></h3>
                        
                        <div class="space-y-4">
                            <!-- Option A -->
                            <button @click="selectAnswer('A')" :class="getOptionClass('A', question.correct_answer)" class="w-full text-left p-4 rounded-2xl border-2 flex items-center transition-all">
                                <span class="w-8 h-8 rounded-full flex items-center justify-center font-bold mr-4 transition-colors" :class="getBadgeClass('A', question.correct_answer)">A</span>
                                <span class="font-medium text-lg" x-text="question.option_a"></span>
                            </button>
                            <!-- Option B -->
                            <button @click="selectAnswer('B')" :class="getOptionClass('B', question.correct_answer)" class="w-full text-left p-4 rounded-2xl border-2 flex items-center transition-all">
                                <span class="w-8 h-8 rounded-full flex items-center justify-center font-bold mr-4 transition-colors" :class="getBadgeClass('B', question.correct_answer)">B</span>
                                <span class="font-medium text-lg" x-text="question.option_b"></span>
                            </button>
                            <!-- Option C -->
                            <button @click="selectAnswer('C')" :class="getOptionClass('C', question.correct_answer)" class="w-full text-left p-4 rounded-2xl border-2 flex items-center transition-all">
                                <span class="w-8 h-8 rounded-full flex items-center justify-center font-bold mr-4 transition-colors" :class="getBadgeClass('C', question.correct_answer)">C</span>
                                <span class="font-medium text-lg" x-text="question.option_c"></span>
                            </button>
                            <!-- Option D -->
                            <button @click="selectAnswer('D')" :class="getOptionClass('D', question.correct_answer)" class="w-full text-left p-4 rounded-2xl border-2 flex items-center transition-all">
                                <span class="w-8 h-8 rounded-full flex items-center justify-center font-bold mr-4 transition-colors" :class="getBadgeClass('D', question.correct_answer)">D</span>
                                <span class="font-medium text-lg" x-text="question.option_d"></span>
                            </button>
                        </div>

                        <!-- Feedback and Next Button -->
                        <div x-show="isAnswered" x-transition class="mt-8 pt-6 border-t border-slate-100 flex flex-col sm:flex-row justify-between items-center gap-4">
                            <div class="flex items-center gap-3">
                                <div x-show="isCorrect" class="w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <span x-show="isCorrect" class="text-green-600 font-bold text-lg">Excellent! That's correct!</span>
                                
                                <div x-show="!isCorrect" class="w-10 h-10 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                </div>
                                <span x-show="!isCorrect" class="text-rose-600 font-bold text-lg">Good try, but the answer was <span x-text="question.correct_answer"></span>.</span>
                            </div>
                            
                            <button @click="nextQuestion()" class="bg-sky-500 hover:bg-sky-600 text-white font-bold py-3 px-8 rounded-full shadow-md hover:shadow-lg transition-all">
                                <span x-text="currentIndex === questions.length - 1 ? 'See Results' : 'Next Question'"></span> &rarr;
                            </button>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Quiz Results -->
            <div x-show="isFinished" x-cloak class="text-center py-8">
                <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-amber-100 text-amber-500 mb-6 relative">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                    <div class="absolute -top-2 -right-2 w-8 h-8 rounded-full bg-amber-400 flex items-center justify-center animate-bounce shadow-md">
                        <span class="text-white font-bold text-xs" x-text="score"></span>
                    </div>
                </div>
                
                <h3 class="text-3xl font-heading font-bold text-slate-800 mb-4">Quiz Completed!</h3>
                <p class="text-slate-600 text-lg font-medium mb-8">You scored <span class="font-bold text-sky-600 text-xl" x-text="score"></span> out of <span class="font-bold text-sky-600 text-xl" x-text="questions.length"></span>!</p>
                
                <div class="p-6 bg-slate-50 rounded-2xl border border-slate-100 mb-8">
                    <p class="text-slate-700 font-bold text-lg" x-text="getEncouragement()"></p>
                </div>
                
                <button @click="resetQuiz()" class="inline-flex items-center text-sky-600 font-bold hover:text-sky-700 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                    Play Again
                </button>
            </div>
            
        </div>
    </div>
</section>
@endif

@endsection

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('quizComponent', () => ({
            questions: @json($story->quizQuestions),
            currentIndex: 0,
            score: 0,
            selectedAnswer: null,
            isAnswered: false,
            isFinished: false,

            get isCorrect() {
                if(!this.isAnswered) return false;
                return this.selectedAnswer === this.questions[this.currentIndex].correct_answer;
            },

            selectAnswer(option) {
                if(this.isAnswered) return; // Prevent changing answer
                this.selectedAnswer = option;
                this.isAnswered = true;
                if(this.isCorrect) {
                    this.score++;
                }
            },

            getOptionClass(option, correctAnswer) {
                if (!this.isAnswered) {
                    return this.selectedAnswer === option 
                        ? 'border-sky-500 bg-sky-50' 
                        : 'border-slate-200 hover:border-sky-300 hover:bg-slate-50 text-slate-700';
                }
                
                if (option === correctAnswer) {
                    return 'border-green-500 bg-green-50 text-green-800'; // Highlight correct answer
                }
                
                if (option === this.selectedAnswer && option !== correctAnswer) {
                    return 'border-rose-500 bg-rose-50 text-rose-800'; // Highlight wrong selected answer
                }
                
                return 'border-slate-200 opacity-50 text-slate-500'; // Fade out other options
            },

            getBadgeClass(option, correctAnswer) {
                if (!this.isAnswered) {
                    return this.selectedAnswer === option 
                        ? 'bg-sky-500 text-white' 
                        : 'bg-slate-100 text-slate-500';
                }
                
                if (option === correctAnswer) {
                    return 'bg-green-500 text-white';
                }
                
                if (option === this.selectedAnswer && option !== correctAnswer) {
                    return 'bg-rose-500 text-white';
                }
                
                return 'bg-slate-100 text-slate-400';
            },

            nextQuestion() {
                if (this.currentIndex < this.questions.length - 1) {
                    this.currentIndex++;
                    this.selectedAnswer = null;
                    this.isAnswered = false;
                } else {
                    this.isFinished = true;
                }
            },

            resetQuiz() {
                this.currentIndex = 0;
                this.score = 0;
                this.selectedAnswer = null;
                this.isAnswered = false;
                this.isFinished = false;
            },
            
            getEncouragement() {
                const percentage = this.score / this.questions.length;
                if(percentage === 1) return "Perfect! You know this story amazingly well!";
                if(percentage >= 0.75) return "Great job! You remembered a lot of wonderful details.";
                if(percentage >= 0.5) return "Good effort! Keep reading and learning about God's love.";
                return "Every story is a chance to learn! Feel free to read the story again.";
            }
        }));
    });
</script>
@endpush

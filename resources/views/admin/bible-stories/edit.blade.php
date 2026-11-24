<x-app-layout>
<div class="px-4 sm:px-6 lg:px-8 py-8" x-data="bibleStoryForm()">
    <div class="mb-8">
        <h1 class="text-xl font-semibold text-gray-900">Edit Bible Story: {{ $bibleStory->title }}</h1>
        <p class="mt-2 text-sm text-gray-700">Update the story content, lesson, and quiz.</p>
    </div>

    @if ($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-md">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.bible-stories.update', $bibleStory) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Part 1: Story Information -->
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="px-4 py-5 sm:px-6 bg-gray-50 border-b border-gray-200">
                <h3 class="text-lg leading-6 font-medium text-gray-900">1. Story Information</h3>
            </div>
            <div class="px-4 py-5 sm:p-6 space-y-6">
                
                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <div class="mt-1">
                            <input type="text" name="title" id="title" value="{{ old('title', $bibleStory->title) }}" required class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="description" class="block text-sm font-medium text-gray-700">Short Description (Excerpt)</label>
                        <div class="mt-1">
                            <textarea id="description" name="description" rows="2" class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border border-gray-300 rounded-md">{{ old('description', $bibleStory->description) }}</textarea>
                        </div>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="image" class="block text-sm font-medium text-gray-700">Cover Image</label>
                        @if($bibleStory->image_path)
                            <div class="mt-2 mb-4">
                                <img src="{{ asset('storage/' . $bibleStory->image_path) }}" alt="Current Cover" class="h-32 object-cover rounded-md border border-gray-200">
                                <p class="text-xs text-gray-500 mt-1">Upload a new image to replace the current one.</p>
                            </div>
                        @endif
                        <div class="mt-1 flex items-center">
                            <input type="file" name="image" id="image" accept="image/*" class="focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300">
                        </div>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Full Story Content</label>
                        <div class="mt-1">
                            <textarea id="content" name="content" class="rich-text-editor">{{ old('content', $bibleStory->content) }}</textarea>
                        </div>
                    </div>

                    <div class="sm:col-span-6">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="is_published" name="is_published" type="checkbox" value="1" {{ old('is_published', $bibleStory->is_published) ? 'checked' : '' }} class="focus:ring-primary h-4 w-4 text-primary border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="is_published" class="font-medium text-gray-700">Publish this story immediately</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Part 2: Lesson -->
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="px-4 py-5 sm:px-6 bg-gray-50 border-b border-gray-200">
                <h3 class="text-lg leading-6 font-medium text-gray-900">2. What Can We Learn? (Lesson)</h3>
            </div>
            <div class="px-4 py-5 sm:p-6 space-y-6">
                <div class="sm:col-span-6">
                    <label for="lesson_title" class="block text-sm font-medium text-gray-700">Lesson Title (Optional)</label>
                    <div class="mt-1 mb-4">
                        <input type="text" name="lesson_title" id="lesson_title" value="{{ old('lesson_title', $bibleStory->lesson->title ?? 'What Can We Learn?') }}" class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <label for="lesson_content" class="block text-sm font-medium text-gray-700 mb-2">Lesson Content</label>
                    <div class="mt-1">
                        <textarea id="lesson_content" name="lesson_content" class="rich-text-editor">{{ old('lesson_content', $bibleStory->lesson->content ?? '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Part 3: Quiz -->
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="px-4 py-5 sm:px-6 bg-gray-50 border-b border-gray-200 flex justify-between items-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">3. Interactive Quiz</h3>
                <button type="button" @click="addQuestion()" class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded text-primary bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                    <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Add Question
                </button>
            </div>
            <div class="px-4 py-5 sm:p-6">
                
                <template x-if="questions.length === 0">
                    <div class="text-center py-6 text-gray-500 text-sm">
                        No questions added yet. Click "Add Question" to build the quiz.
                    </div>
                </template>

                <div class="space-y-6">
                    <template x-for="(question, index) in questions" :key="question.id">
                        <div class="border border-gray-200 rounded-md p-4 bg-gray-50 relative">
                            <button type="button" @click="removeQuestion(index)" class="absolute top-4 right-4 text-red-500 hover:text-red-700">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>

                            <h4 class="text-sm font-bold text-gray-700 mb-4" x-text="`Question ${index + 1}`"></h4>

                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Question Text</label>
                                    <input type="text" x-model="question.question" :name="`questions[${index}][question]`" required class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-primary focus:border-primary">
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Option A</label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm font-bold">A</span>
                                            <input type="text" x-model="question.option_a" :name="`questions[${index}][option_a]`" required class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md sm:text-sm border-gray-300 focus:ring-primary focus:border-primary">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Option B</label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm font-bold">B</span>
                                            <input type="text" x-model="question.option_b" :name="`questions[${index}][option_b]`" required class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md sm:text-sm border-gray-300 focus:ring-primary focus:border-primary">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Option C</label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm font-bold">C</span>
                                            <input type="text" x-model="question.option_c" :name="`questions[${index}][option_c]`" required class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md sm:text-sm border-gray-300 focus:ring-primary focus:border-primary">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Option D</label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm font-bold">D</span>
                                            <input type="text" x-model="question.option_d" :name="`questions[${index}][option_d]`" required class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md sm:text-sm border-gray-300 focus:ring-primary focus:border-primary">
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Correct Answer</label>
                                    <select x-model="question.correct_answer" :name="`questions[${index}][correct_answer]`" required class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm rounded-md">
                                        <option value="">Select Correct Option...</option>
                                        <option value="A">Option A</option>
                                        <option value="B">Option B</option>
                                        <option value="C">Option C</option>
                                        <option value="D">Option D</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('admin.bible-stories.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                Cancel
            </a>
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                Save Changes
            </button>
        </div>
    </form>
</div>

<x-slot name="scripts">
<!-- TinyMCE -->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '.rich-text-editor',
        height: 400,
        plugins: 'advlist autolink lists link image charmap preview anchor pagebreak',
        toolbar_mode: 'floating',
        toolbar: 'undo redo | formatselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image blockquote',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
    });

    document.addEventListener('alpine:init', () => {
        Alpine.data('bibleStoryForm', () => ({
            questions: [],
            questionIdCounter: 1,

            init() {
                // Check if old questions exist from validation error, otherwise load from DB
                let oldQuestions = @json(old('questions'));
                let dbQuestions = @json($bibleStory->quizQuestions);
                
                if (oldQuestions && Object.keys(oldQuestions).length > 0) {
                    this.questions = Object.values(oldQuestions).map(q => ({
                        id: this.questionIdCounter++,
                        question: q.question || '',
                        option_a: q.option_a || '',
                        option_b: q.option_b || '',
                        option_c: q.option_c || '',
                        option_d: q.option_d || '',
                        correct_answer: q.correct_answer || ''
                    }));
                } else if (dbQuestions && dbQuestions.length > 0) {
                    this.questions = dbQuestions.map(q => ({
                        id: this.questionIdCounter++,
                        question: q.question || '',
                        option_a: q.option_a || '',
                        option_b: q.option_b || '',
                        option_c: q.option_c || '',
                        option_d: q.option_d || '',
                        correct_answer: q.correct_answer || ''
                    }));
                }
            },

            addQuestion() {
                this.questions.push({
                    id: this.questionIdCounter++,
                    question: '',
                    option_a: '',
                    option_b: '',
                    option_c: '',
                    option_d: '',
                    correct_answer: ''
                });
            },

            removeQuestion(index) {
                if(confirm('Remove this question?')) {
                    this.questions.splice(index, 1);
                }
            }
        }));
    });
</script>
</x-slot>
</x-app-layout>

<x-app-layout>
    @php
        $isEdit = isset($study_guide);
    @endphp

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $isEdit ? __('Edit Study Guide') : __('Create Study Guide') }}
        </h2>
    </x-slot>

    <x-slot name="styles">
        <!-- Any additional styles needed for the editor will go here if necessary -->
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <a href="{{ route('admin.study-guides.index') }}" class="text-sm text-gray-500 hover:text-primary">&larr; Back to Study Guides</a>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden max-w-4xl mx-auto">
                <form action="{{ $isEdit ? route('admin.study-guides.update', $study_guide->id) : route('admin.study-guides.store') }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8 space-y-6">
                    @csrf
                    @if($isEdit)
                        @method('PUT')
                    @endif

                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Title <span class="text-red-500">*</span></label>
                                <input type="text" name="title" value="{{ old('title', $study_guide->title ?? '') }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/20 text-lg py-3">
                                @error('title') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Author / Source</label>
                                <input type="text" name="author" value="{{ old('author', $study_guide->author ?? '') }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/20">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Category / Topic</label>
                                <input type="text" name="category" value="{{ old('category', $study_guide->category ?? '') }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/20">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Description / Overview</label>
                            <textarea name="description" rows="3" class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/20" placeholder="A short summary of the guide...">{{ old('description', $study_guide->description ?? '') }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Full Guide Content</label>
                            <textarea id="editor" name="content" rows="20" class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/20">{{ old('content', $study_guide->content ?? '') }}</textarea>
                            @error('content') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            <p class="text-xs text-gray-500 mt-2">Use the editor above to paste or write the full study guide. Formatting will be preserved.</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Cover Image</label>
                                @if($isEdit && $study_guide->cover_image)
                                    <div class="mb-3">
                                        <img src="{{ Storage::url($study_guide->cover_image) }}" alt="Cover" class="h-24 object-contain rounded border">
                                    </div>
                                @endif
                                <input type="file" name="cover_image" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
                                <p class="text-xs text-gray-500 mt-1">Recommended size: 800x600px (JPG, PNG, WEBP)</p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Downloadable File (Optional PDF)</label>
                                @if($isEdit && $study_guide->file_path)
                                    <div class="mb-3 flex items-center text-sm text-green-600 bg-green-50 p-2 rounded border border-green-100">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        Current file: {{ basename($study_guide->file_path) }}
                                    </div>
                                @endif
                                <input type="file" name="file_path" accept=".pdf" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                                <p class="text-xs text-gray-500 mt-1">Upload a PDF version for visitors to download (Max: 10MB)</p>
                                @error('file_path') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="flex items-center pt-2">
                            <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', $study_guide->is_published ?? true) ? 'checked' : '' }} class="rounded border-gray-300 text-primary focus:ring-primary">
                            <label for="is_published" class="ml-2 block text-sm text-gray-700">Publish this study guide to the public website</label>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-gray-100 flex justify-end">
                        <button type="submit" class="px-8 py-3 bg-primary text-white rounded-lg hover:bg-primary/90 font-medium text-lg shadow-sm transition-colors">
                            {{ $isEdit ? 'Update Study Guide' : 'Publish Study Guide' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <!-- TinyMCE JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.3/tinymce.min.js"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                tinymce.init({
                    selector: '#editor',
                    min_height: 600,
                    menubar: true,
                    plugins: [
                        'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                        'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                        'insertdatetime', 'media', 'table', 'help', 'wordcount'
                    ],
                    toolbar: 'undo redo | blocks fontfamily fontsize | ' +
                    'bold italic underline strikethrough | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'forecolor backcolor | link image table | removeformat | help',
                    font_family_formats: 
                        "RECOMMENDED -----------------=serif;" +
                        "Garamond=Garamond, serif;" +
                        "Georgia=Georgia, serif;" +
                        "Merriweather='Merriweather', serif;" +
                        "Lora='Lora', serif;" +
                        "Libre Baskerville='Libre Baskerville', serif;" +
                        "EB Garamond='EB Garamond', serif;" +
                        "Playfair Display='Playfair Display', serif;" +
                        "Cinzel='Cinzel', serif;" +
                        "SERIF -----------------------=serif;" +
                        "Times New Roman='Times New Roman', Times, serif;" +
                        "Crimson Text='Crimson Text', serif;" +
                        "Crimson Pro='Crimson Pro', serif;" +
                        "Source Serif Pro='Source Serif 4', serif;" +
                        "Noto Serif='Noto Serif', serif;" +
                        "PT Serif='PT Serif', serif;" +
                        "Spectral='Spectral', serif;" +
                        "Alegreya='Alegreya', serif;" +
                        "Cardo='Cardo', serif;" +
                        "Cormorant Garamond='Cormorant Garamond', serif;" +
                        "Palatino=Palatino, 'Palatino Linotype', 'Book Antiqua', serif;" +
                        "Book Antiqua='Book Antiqua', Palatino, serif;" +
                        "Cambria=Cambria, Georgia, serif;" +
                        "Charter=Charter, 'Bitstream Charter', serif;" +
                        "Libre Caslon Text='Libre Caslon Text', serif;" +
                        "Bitter='Bitter', serif;" +
                        "SANS SERIF ------------------=sans-serif;" +
                        "Arial=Arial, Helvetica, sans-serif;" +
                        "Helvetica=Helvetica, Arial, sans-serif;" +
                        "Calibri=Calibri, 'Helvetica Neue', Helvetica, sans-serif;" +
                        "Aptos=Aptos, Calibri, sans-serif;" +
                        "Verdana=Verdana, Geneva, sans-serif;" +
                        "Tahoma=Tahoma, Geneva, sans-serif;" +
                        "Trebuchet MS='Trebuchet MS', Helvetica, sans-serif;" +
                        "Open Sans='Open Sans', sans-serif;" +
                        "Roboto='Roboto', sans-serif;" +
                        "Inter='Inter', sans-serif;" +
                        "Lato='Lato', sans-serif;" +
                        "Montserrat='Montserrat', sans-serif;" +
                        "Poppins='Poppins', sans-serif;" +
                        "Nunito='Nunito', sans-serif;" +
                        "Raleway='Raleway', sans-serif;" +
                        "Source Sans 3='Source Sans 3', sans-serif;" +
                        "Work Sans='Work Sans', sans-serif;" +
                        "DM Sans='DM Sans', sans-serif;" +
                        "Manrope='Manrope', sans-serif;" +
                        "Figtree='Figtree', sans-serif;" +
                        "Noto Sans='Noto Sans', sans-serif;" +
                        "Ubuntu='Ubuntu', sans-serif;" +
                        "Rubik='Rubik', sans-serif;" +
                        "Archivo='Archivo', sans-serif;" +
                        "Mulish='Mulish', sans-serif;" +
                        "Quicksand='Quicksand', sans-serif;" +
                        "HEADINGS & DISPLAY ----------=display;" +
                        "Abril Fatface='Abril Fatface', display;" +
                        "Cormorant='Cormorant', serif;" +
                        "Oswald='Oswald', sans-serif;" +
                        "Bebas Neue='Bebas Neue', display;" +
                        "Libre Franklin='Libre Franklin', sans-serif;" +
                        "Merriweather Sans='Merriweather Sans', sans-serif;" +
                        "DM Serif Display='DM Serif Display', serif;" +
                        "Prata='Prata', serif;" +
                        "MONOSPACE -------------------=monospace;" +
                        "Courier New='Courier New', Courier, monospace;" +
                        "Consolas=Consolas, 'Courier New', monospace;" +
                        "Monaco=Monaco, Consolas, monospace;" +
                        "Source Code Pro='Source Code Pro', monospace;" +
                        "JetBrains Mono='JetBrains Mono', monospace;" +
                        "Fira Code='Fira Code', monospace;" +
                        "IBM Plex Mono='IBM Plex Mono', monospace;",
                    content_style: 
                        "@import url('https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,700;1,400;1,700&family=Merriweather:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Lora:ital,wght@0,400;0,700;1,400;1,700&family=Crimson+Text:ital,wght@0,400;0,700;1,400;1,700&family=Crimson+Pro:ital,wght@0,400;0,700;1,400;1,700&family=Source+Serif+4:ital,wght@0,400;0,700;1,400;1,700&family=Noto+Serif:ital,wght@0,400;0,700;1,400;1,700&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap');" +
                        "@import url('https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,400;0,700;1,400;1,700&family=Alegreya:ital,wght@0,400;0,700;1,400;1,700&family=Cardo:ital,wght@0,400;0,700;1,400&family=Cormorant+Garamond:ital,wght@0,400;0,700;1,400;1,700&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&family=Libre+Caslon+Text:ital,wght@0,400;0,700;1,400&family=Bitter:ital,wght@0,400;0,700;1,400;1,700&display=swap');" +
                        "@import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Roboto:ital,wght@0,400;0,700;1,400;1,700&family=Inter:ital,wght@0,400;0,700;1,400;1,700&family=Lato:ital,wght@0,400;0,700;1,400;1,700&family=Montserrat:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:ital,wght@0,400;0,700;1,400;1,700&family=Nunito:ital,wght@0,400;0,700;1,400;1,700&display=swap');" +
                        "@import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,700;1,400;1,700&family=Work+Sans:ital,wght@0,400;0,700;1,400;1,700&family=DM+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Manrope:ital,wght@0,400;0,700;1,400;1,700&family=Figtree:ital,wght@0,400;0,700;1,400;1,700&family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Ubuntu:ital,wght@0,400;0,700;1,400;1,700&display=swap');" +
                        "@import url('https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,700;1,400;1,700&family=Archivo:ital,wght@0,400;0,700;1,400;1,700&family=Mulish:ital,wght@0,400;0,700;1,400;1,700&family=Quicksand:ital,wght@0,400;0,700;1,400;1,700&family=Cinzel:ital,wght@0,400;0,700;1,400;1,700&family=Cormorant:ital,wght@0,400;0,700;1,400;1,700&family=Abril+Fatface&family=Oswald:wght@400;700&display=swap');" +
                        "@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Libre+Franklin:ital,wght@0,400;0,700;1,400;1,700&family=Merriweather+Sans:ital,wght@0,400;0,700;1,400;1,700&family=DM+Serif+Display:ital@0;1&family=Prata&family=Source+Code+Pro:ital,wght@0,400;0,700;1,400;1,700&family=JetBrains+Mono:ital,wght@0,400;0,700;1,400;1,700&family=Fira+Code:wght@400;700&family=IBM+Plex+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap');" +
                        "body { font-family:Garamond, serif; font-size:18px; line-height:1.6; color:#374151; }",
                    branding: false,
                    promotion: false
                });
            });
        </script>
    </x-slot>
</x-app-layout>

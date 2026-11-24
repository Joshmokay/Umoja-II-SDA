<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            
                            <div class="md:col-span-2 space-y-6">
                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                    <input type="text" name="title" id="title" value="{{ old('title') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                                
                                <div>
                                    <label for="excerpt" class="block text-sm font-medium text-gray-700">Excerpt</label>
                                    <textarea name="excerpt" id="excerpt" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('excerpt') }}</textarea>
                                    @error('excerpt') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                                
                                <div>
                                    <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                                    <textarea name="content" id="content" rows="15" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('content') }}</textarea>
                                    @error('content') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            
                            <div class="space-y-6">
                                <div>
                                    <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                                      <select name="category_id" id="category_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          <option value="">Select a category</option>
                                          @foreach($categories as $category)
                                              <option value="{{ $category->id }}" {{ old('category_id', isset($preselected_category) ? $preselected_category->id : null) == $category->id ? 'selected' : '' }}>
                                                  {{ $category->name }}
                                              </option>
                                          @endforeach
                                      </select>
                                    @error('category_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                                
                                <div>
                                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                    <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="published" {{ old('status', 'published') == 'published' ? 'selected' : '' }}>Published</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="featured_image" class="block text-sm font-medium text-gray-700">Featured Image</label>
                                    <input type="file" name="featured_image" id="featured_image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                    @error('featured_image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                                
                                <div>
                                    <label for="author" class="block text-sm font-medium text-gray-700">Author (Optional)</label>
                                    <input type="text" name="author" id="author" value="{{ old('author') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                                
                                <div class="flex items-center">
                                    <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                    <label for="is_featured" class="ml-2 block text-sm text-gray-900">Featured Article</label>
                                </div>
                                
                                <div class="pt-4 border-t border-gray-200">
                                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition">
                                        Save Article
                                    </button>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

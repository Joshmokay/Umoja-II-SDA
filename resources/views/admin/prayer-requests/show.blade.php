<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('View Prayer Request') }} #{{ $prayerRequest->id }}
            </h2>
            <a href="{{ route('admin.prayer-requests.index') }}" class="text-gray-600 hover:text-gray-900">&larr; Back to List</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        
                        <!-- Main Content (Decrypted Request) -->
                        <div class="md:col-span-2 space-y-6">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Prayer Request Details</h3>
                                <div class="mt-4 bg-gray-50 p-6 rounded-lg border border-gray-100 flex items-center justify-center">
                                    <p class="text-gray-500 italic text-center">
                                        <svg class="w-8 h-8 mx-auto mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                        Content is encrypted and hidden for privacy.
                                    </p>
                                </div>
                            </div>
                            
                            <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded text-sm text-blue-700">
                                <p class="font-bold mb-1">Confidentiality Notice</p>
                                <p>Prayer requests are completely private. You can track the status of this request, but the contents cannot be read.</p>
                            </div>
                        </div>

                        <!-- Metadata Sidebar -->
                        <div class="space-y-6 bg-gray-50 p-5 rounded-lg border border-gray-200">
                            
                            <div>
                                <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Submitted By</h4>
                                <p class="text-gray-500 italic">Protected</p>
                            </div>
                            
                            <div>
                                <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Category</h4>
                                <p class="text-gray-900">{{ $prayerRequest->category }}</p>
                            </div>

                            <div>
                                <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Date Submitted</h4>
                                <p class="text-gray-900">{{ $prayerRequest->submitted_at->format('M d, Y h:i A') }}</p>
                            </div>

                            <hr class="border-gray-300">

                            <div>
                                <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Update Status</h4>
                                <form action="{{ route('admin.prayer-requests.update', $prayerRequest) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    
                                    <select name="status" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-sm mb-3">
                                        <option value="New" {{ $prayerRequest->status === 'New' ? 'selected' : '' }}>New</option>
                                        <option value="Being Prayed For" {{ $prayerRequest->status === 'Being Prayed For' ? 'selected' : '' }}>Being Prayed For</option>
                                        <option value="Ongoing" {{ $prayerRequest->status === 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                                        <option value="Completed" {{ $prayerRequest->status === 'Completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="Archived" {{ $prayerRequest->status === 'Archived' ? 'selected' : '' }}>Archived</option>
                                    </select>
                                    
                                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded text-sm transition">
                                        Save Status
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

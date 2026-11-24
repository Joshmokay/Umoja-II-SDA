<x-app-layout>
    <x-slot name="header">
        Dashboard
    </x-slot>

    <!-- Welcome Section -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 sm:p-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6 bg-gradient-to-r from-primary/5 to-transparent">
            <div>
                <h1 class="text-2xl font-serif font-bold text-gray-900">Welcome back, {{ Auth::user()->name }}</h1>
                <p class="text-gray-500 mt-1">Manage Umoja II SDA Church content, events, ministries, and spiritual resources from one place.</p>
            </div>
            <div class="text-left sm:text-right shrink-0">
                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">{{ now()->format('l') }}</p>
                <p class="text-lg font-bold text-gray-900">{{ now()->format('M d, Y') }}</p>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div>
        <h2 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-4">Quick Actions</h2>
        <div class="flex flex-wrap gap-4">
            <a href="{{ route('admin.events.create') }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary-dark transition-colors shadow-sm">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                <span>Add Event</span>
            </a>
            <a href="{{ route('admin.articles.create') }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-secondary text-white text-sm font-medium rounded-lg hover:bg-secondary-dark transition-colors shadow-sm">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                <span>Create Article</span>
            </a>
            <a href="{{ route('admin.prayer-requests.index') }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-white border border-gray-200 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors shadow-sm">
                <svg class="w-5 h-5 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                <span>View Prayer Requests</span>
            </a>
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">
        <!-- Events -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex flex-col justify-center items-start gap-4 h-full">
            <div class="flex items-center gap-4 w-full">
                <div class="p-3 rounded-full bg-blue-50 text-blue-600 shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-900 leading-none">{{ $stats['total_events'] }}</p>
                    <p class="text-sm font-medium text-gray-500 mt-1">Total Events</p>
                </div>
            </div>
        </div>
        <!-- Articles -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex flex-col justify-center items-start gap-4 h-full">
            <div class="flex items-center gap-4 w-full">
                <div class="p-3 rounded-full bg-indigo-50 text-indigo-600 shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-900 leading-none">{{ $stats['total_articles'] }}</p>
                    <p class="text-sm font-medium text-gray-500 mt-1">Total Articles</p>
                </div>
            </div>
        </div>
        <!-- Sermons -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex flex-col justify-center items-start gap-4 h-full">
            <div class="flex items-center gap-4 w-full">
                <div class="p-3 rounded-full bg-purple-50 text-purple-600 shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path></svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-900 leading-none">{{ $stats['total_sermons'] }}</p>
                    <p class="text-sm font-medium text-gray-500 mt-1">Total Sermons</p>
                </div>
            </div>
        </div>
        <!-- Gallery -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex flex-col justify-center items-start gap-4 h-full">
            <div class="flex items-center gap-4 w-full">
                <div class="p-3 rounded-full bg-green-50 text-green-600 shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-900 leading-none">{{ $stats['total_gallery_items'] }}</p>
                    <p class="text-sm font-medium text-gray-500 mt-1">Gallery Items</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Split -->
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-8 items-start">
        
        <!-- Left Column: Content & Events -->
        <div class="space-y-8">
            <!-- Upcoming Events -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden h-full flex flex-col">
                <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center shrink-0">
                    <h3 class="font-bold text-gray-900">Upcoming Events</h3>
                    <a href="{{ route('admin.events.index') }}" class="text-sm font-medium text-primary hover:text-primary-dark">View All</a>
                </div>
                <div class="divide-y divide-gray-50 flex-1 flex flex-col">
                    @forelse($upcomingEvents as $event)
                        <div class="p-6 flex gap-4 items-start hover:bg-gray-50 transition-colors">
                            @if($event->image_path)
                                <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->title }}" class="w-24 h-24 object-cover rounded shadow-sm shrink-0">
                            @else
                                <div class="w-24 h-24 bg-gray-50 rounded flex items-center justify-center shrink-0 border border-gray-100">
                                    <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                            <div class="flex-1 min-w-0 flex flex-col gap-1">
                                <h4 class="font-bold text-gray-900 truncate">{{ $event->title }}</h4>
                                <div class="flex flex-col text-sm text-gray-500 gap-1.5 mt-1">
                                    <span class="flex items-center gap-1.5"><svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> {{ $event->start_date->format('M d, Y g:i A') }}</span>
                                    @if($event->location)
                                        <span class="flex items-center gap-1.5 truncate"><svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg> {{ $event->location }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="shrink-0">
                                <a href="{{ route('admin.events.edit', $event) }}" class="px-3 py-1.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded hover:bg-gray-50 transition-colors inline-block text-center">Edit</a>
                            </div>
                        </div>
                    @empty
                        <div class="p-6 text-center text-gray-500 text-sm flex-1 flex items-center justify-center">No upcoming events found.</div>
                    @endforelse
                </div>
            </div>

            <!-- Recent Content (Articles) -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="font-bold text-gray-900">Recently Added Articles</h3>
                    <a href="{{ route('admin.articles.index') }}" class="text-sm font-medium text-primary hover:text-primary-dark">View All</a>
                </div>
                <div class="divide-y divide-gray-50">
                    @forelse($recentArticles as $article)
                        <div class="p-4 px-6 flex justify-between items-center hover:bg-gray-50 transition-colors">
                            <div>
                                <h4 class="font-bold text-gray-900 text-sm">{{ $article->title }}</h4>
                                <div class="flex items-center text-xs text-gray-500 mt-1 gap-3">
                                    <span class="bg-gray-100 px-2 py-0.5 rounded">{{ $article->category->name ?? 'Uncategorized' }}</span>
                                    <span>Added: {{ $article->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                            <a href="{{ route('admin.articles.edit', $article) }}" class="text-gray-400 hover:text-primary">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                        </div>
                    @empty
                        <div class="p-6 text-center text-gray-500 text-sm">No recent articles found.</div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Right Column: Summaries & Activity -->
        <div class="space-y-8">
            
            <!-- Prayer Requests Summary -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden h-full flex flex-col">
                <div class="px-6 py-4 border-b border-gray-100 shrink-0">
                    <h3 class="font-bold text-gray-900">Prayer Requests</h3>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="bg-red-50 p-4 rounded-lg text-center">
                                <span class="block text-3xl font-bold text-red-600 leading-none">{{ $prayerSummary['new_this_week'] }}</span>
                                <span class="block text-xs font-semibold text-red-800 uppercase mt-2">New This Week</span>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg text-center">
                                <span class="block text-3xl font-bold text-gray-700 leading-none">{{ $prayerSummary['total'] }}</span>
                                <span class="block text-xs font-semibold text-gray-500 uppercase mt-2">Total Requests</span>
                            </div>
                        </div>
                        <p class="text-sm text-gray-500 mb-6 text-center">Content is hidden for privacy. Please manage via the secure portal.</p>
                    </div>
                    <a href="{{ route('admin.prayer-requests.index') }}" class="block w-full text-center px-4 py-3 bg-white border border-gray-200 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors shadow-sm">
                        Manage Prayer Requests
                    </a>
                </div>
            </div>

            <!-- Recent Activity Skeleton -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100">
                    <h3 class="font-bold text-gray-900">Recent System Activity</h3>
                </div>
                <div class="p-6">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center shrink-0 mt-1">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-900">Admin Dashboard modernized successfully.</p>
                            <p class="text-xs text-gray-500 mt-0.5">Just now</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center shrink-0 mt-1">
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-900">System initialized.</p>
                            <p class="text-xs text-gray-500 mt-0.5">System</p>
                        </div>
                    </div>
                    
                    <p class="text-xs text-center text-gray-400 mt-6 italic">Activity logging module pending integration.</p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

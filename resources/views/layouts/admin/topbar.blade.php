<header class="bg-white border-b border-gray-100 shadow-sm z-40 flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8 shrink-0 relative">
    <div class="flex items-center gap-4 sm:gap-6">
        <!-- Brand & Mobile Toggle -->
        <div class="flex items-center gap-3">
            <button class="text-gray-500 hover:text-gray-900 lg:hidden" @click.stop="sidebarOpen = !sidebarOpen">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
            
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2 text-gray-900 font-serif font-bold text-lg">
                <x-application-logo class="w-8 h-8 fill-current text-primary" />
                <span class="hidden sm:block">Umoja II CMS</span>
            </a>
        </div>
        
        <div class="h-6 w-px bg-gray-200 hidden sm:block"></div>
        
        <!-- Page Title/Breadcrumb -->
        <h2 class="font-serif font-semibold text-xl text-gray-800 leading-tight">
            {{ $header ?? 'Dashboard' }}
        </h2>
    </div>

    <!-- Topbar Actions -->
    <div class="flex items-center gap-4">
        <!-- Settings Dropdown -->
        <div class="relative" x-data="{ dropdownOpen: false }">
            <button @click="dropdownOpen = !dropdownOpen" @click.outside="dropdownOpen = false" class="flex items-center gap-3 focus:outline-none">
                <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold border border-primary/20 shrink-0">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div class="text-left hidden sm:block">
                    <p class="text-sm font-medium text-gray-900 leading-tight">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-500 leading-tight">Administrator</p>
                </div>
                <svg class="w-4 h-4 text-gray-400 shrink-0 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>

            <!-- Dropdown Menu -->
            <div x-show="dropdownOpen" x-transition class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 border border-gray-100 ring-1 ring-black ring-opacity-5" style="display: none;">
                <div class="px-4 py-2 border-b border-gray-100 sm:hidden">
                    <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-500">Administrator</p>
                </div>
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Log Out</button>
                </form>
            </div>
        </div>
    </div>
</header>

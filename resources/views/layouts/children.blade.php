<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Children's Ministry - Umoja II SDA Church</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/Seventh-day Adventist Church Child Ministry Of Corporate Affairs Minister PNG.jfif') }}" type="image/jpeg">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Quicksand:wght@500;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles & Scripts -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8fafc;
        }
        h1, h2, h3, h4, h5, h6, .font-heading {
            font-family: 'Quicksand', sans-serif;
        }
        .bg-kids-pattern {
            background-color: #ffffff;
            background-image: radial-gradient(#e2e8f0 2px, transparent 2px);
            background-size: 30px 30px;
        }
    </style>
</head>
<body class="antialiased text-gray-800 flex flex-col min-h-screen">

    <!-- Children's Ministry Navigation -->
    <nav class="bg-white sticky top-0 z-50 shadow-sm border-b-4 border-sky-400">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('childrens-ministry.index') }}" class="flex items-center gap-3 group">
                        <img class="h-16 w-auto rounded-full shadow-sm group-hover:scale-105 transition-transform duration-300" src="{{ asset('assets/Seventh-day Adventist Church Child Ministry Of Corporate Affairs Minister PNG.jfif') }}" alt="Children's Ministry Logo">
                        <div class="hidden sm:block">
                            <span class="block text-xl font-heading font-bold text-sky-600 leading-tight">Umoja II SDA</span>
                            <span class="block text-sm font-bold text-amber-500 uppercase tracking-wider">Children's Ministry</span>
                        </div>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex md:items-center md:space-x-6 lg:space-x-8">
                    <a href="#" class="text-gray-600 hover:text-sky-500 font-bold px-3 py-2 rounded-md transition-colors">Home</a>
                    <a href="#" class="text-gray-600 hover:text-amber-500 font-bold px-3 py-2 rounded-md transition-colors">About Us</a>
                    <a href="#" class="text-gray-600 hover:text-emerald-500 font-bold px-3 py-2 rounded-md transition-colors">Bible Stories</a>
                    <a href="#" class="text-gray-600 hover:text-rose-500 font-bold px-3 py-2 rounded-md transition-colors">Activities</a>
                    <a href="#" class="text-gray-600 hover:text-purple-500 font-bold px-3 py-2 rounded-md transition-colors">Gallery</a>
                    <a href="#" class="text-gray-600 hover:text-indigo-500 font-bold px-3 py-2 rounded-md transition-colors">Parents</a>
                    
                    <a href="#" class="bg-gradient-to-r from-sky-400 to-indigo-500 text-white font-bold px-6 py-2.5 rounded-full hover:shadow-lg hover:scale-105 transition-all duration-300">
                        Join Us
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="flex items-center md:hidden">
                    <button type="button" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="inline-flex items-center justify-center p-2 rounded-md text-sky-500 hover:text-sky-600 hover:bg-sky-50 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-sky-500" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="hidden md:hidden border-t border-gray-100" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white shadow-lg">
                <a href="#" class="block px-3 py-2 rounded-md text-base font-bold text-sky-600 hover:bg-sky-50">Home</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-bold text-amber-600 hover:bg-amber-50">About Us</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-bold text-emerald-600 hover:bg-emerald-50">Bible Stories</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-bold text-rose-600 hover:bg-rose-50">Activities</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-bold text-purple-600 hover:bg-purple-50">Gallery</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-bold text-indigo-600 hover:bg-indigo-50">Parents Corner</a>
                <a href="#" class="block mt-4 px-3 py-3 rounded-md text-base font-bold text-white bg-sky-500 text-center mx-2">Join Us</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Children's Ministry Footer -->
    <footer class="bg-slate-800 text-white pt-12 pb-8 border-t-8 border-amber-400">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12 mb-8 text-center md:text-left">
                <!-- Branding -->
                <div class="flex flex-col items-center md:items-start">
                    <img class="h-16 w-auto rounded-full bg-white p-1 mb-4" src="{{ asset('assets/Seventh-day Adventist Church Child Ministry Of Corporate Affairs Minister PNG.jfif') }}" alt="Children's Ministry Logo">
                    <h3 class="text-xl font-heading font-bold text-white mb-2">Umoja II Children's Ministry</h3>
                    <p class="text-slate-300 text-sm leading-relaxed max-w-xs">
                        Providing a safe, joyful, and faith-filled environment where children can learn about God, build friendships, and grow spiritually.
                    </p>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-heading font-bold text-sky-400 mb-4 uppercase tracking-wider">Quick Links</h4>
                    <ul class="space-y-2 text-sm text-slate-300 font-medium">
                        <li><a href="#" class="hover:text-amber-400 transition-colors">About Us</a></li>
                        <li><a href="#" class="hover:text-amber-400 transition-colors">Sabbath School</a></li>
                        <li><a href="#" class="hover:text-amber-400 transition-colors">Fun Activities</a></li>
                        <li><a href="#" class="hover:text-amber-400 transition-colors">Parents' Corner</a></li>
                        <li><a href="#" class="hover:text-amber-400 transition-colors">Child Safety Policy</a></li>
                    </ul>
                </div>
                
                <!-- Contact -->
                <div>
                    <h4 class="text-lg font-heading font-bold text-emerald-400 mb-4 uppercase tracking-wider">Contact Us</h4>
                    <ul class="space-y-3 text-sm text-slate-300">
                        <li class="flex items-center justify-center md:justify-start gap-3">
                            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            Umoja II SDA Church, Nairobi
                        </li>
                        <li class="flex items-center justify-center md:justify-start gap-3">
                            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            children@umoja2sdachurch.org
                        </li>
                        <li class="flex items-center justify-center md:justify-start gap-3 pt-2">
                            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-white bg-slate-700 hover:bg-slate-600 px-4 py-2 rounded-full transition-colors text-xs font-bold">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                                Back to Main Church Website
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-slate-700 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-xs text-slate-400">
                    &copy; {{ date('Y') }} Umoja II SDA Church Children's Ministry. All rights reserved.
                </p>
                <div class="flex gap-4">
                    <!-- Social icons placeholders -->
                    <a href="#" class="text-slate-400 hover:text-white transition-colors">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Script for smooth animations if needed -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>

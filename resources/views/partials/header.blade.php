<header x-data="{ isSticky: false, mobileMenuOpen: false, brandVisible: false }"
        x-init="setTimeout(() => brandVisible = true, 50)"
        x-effect="document.body.style.overflow = mobileMenuOpen ? 'hidden' : ''"
        @scroll.window="isSticky = (window.pageYOffset > 50)"
        :class="[
            mobileMenuOpen ? 'bg-transparent' : '',
            isSticky ? 'bg-[#151515]/95 backdrop-blur-md shadow-lg border-b border-white/10' : 'bg-gradient-to-b from-black/80 to-transparent border-transparent'
        ]"
        class="absolute top-0 left-0 right-0 z-50 transition-all duration-300">
        
    <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12 transition-opacity duration-300" :class="{ 'opacity-0 pointer-events-none': mobileMenuOpen }">
        <div class="flex justify-between items-start py-6 min-h-[140px]">
            
            <!-- LEFT: Branding -->
            <div class="flex-shrink-0 flex items-center" x-show="brandVisible"
                 x-transition:enter="transition-opacity ease-out duration-1000"
                 x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" style="display: none;">
                <a href="{{ route('home') }}" class="group flex items-center transition-transform duration-300 hover:scale-[1.02]">
                    <img src="{{ asset('assets/adventist-symbol--white.svg') }}" alt="SDA Logo" class="h-[60px] md:h-[80px] w-auto relative z-10 drop-shadow-md">
                    <div class="flex flex-col ml-4 md:ml-5 text-white drop-shadow-md">
                        <span class="font-serif font-bold text-[16px] md:text-[20px] leading-tight">Umoja II</span>
                        <span class="font-serif text-[15px] md:text-[18px] leading-tight mb-1">Seventh-day Adventist Church</span>
                    </div>
                </a>
            </div>

            <!-- RIGHT: Navigation -->
            <div class="hidden xl:flex flex-col items-end h-full justify-between mt-1">
                
                <!-- Top Utility Nav -->
                <div class="flex items-center space-x-8 text-[12px] font-sans font-bold uppercase tracking-[0.15em] text-white/90 whitespace-nowrap">
                    <a href="#" class="hover:text-white transition-colors hover:scale-105 transform py-1 block">News</a>
                    <a href="#" class="hover:text-white transition-colors hover:scale-105 transform text-red-400 py-1 block">Live Stream</a>
                    <button @click="mobileMenuOpen = true" class="flex items-center hover:text-white transition-colors hover:scale-105 transform py-1 focus:outline-none">
                        Menu <svg class="w-4 h-4 ml-1.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                    <a href="{{ route('search') }}" class="flex items-center hover:text-white transition-colors hover:scale-105 transform py-1">
                        Search <svg class="w-4 h-4 ml-1.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </a>
                </div>

                <!-- Main Nav -->
                <div class="flex items-center gap-8 2xl:gap-10 mt-7 font-serif text-[17px] text-white tracking-wide">
                    
                    <a href="{{ route('home') }}" class="hover:text-gray-300 transition-colors py-2">Home</a>

                    <!-- About Us Dropdown -->
                    <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" @click.outside="open = false">
                        <button class="hover:text-gray-300 transition-colors flex items-center focus:outline-none py-2">
                            About Us <svg class="w-4 h-4 ml-1.5 opacity-70" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <div x-show="open" x-transition.opacity.duration.200ms class="absolute top-[110%] left-0 mt-2 w-[260px] bg-white rounded-lg shadow-2xl py-3 z-50 border border-gray-100" style="display: none;">
                            <a href="#" class="block px-6 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary transition-colors">Welcome Message</a>
                            <a href="#" class="block px-6 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary transition-colors">Our History</a>
                            <a href="#" class="block px-6 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary transition-colors">Mission</a>
                            <a href="#" class="block px-6 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary transition-colors">Vision</a>
                            <a href="{{ route('about.beliefs') }}" class="block px-6 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary transition-colors">Fundamental Beliefs</a>
                            <a href="#" class="block px-6 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary transition-colors">Church Leadership</a>
                            <a href="{{ route('programs.index') }}" class="block px-6 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary transition-colors">Service Times</a>
                            <a href="#" class="block px-6 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary transition-colors">Contact Information</a>
                        </div>
                    </div>

                    <!-- Worship Dropdown -->
                    <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" @click.outside="open = false">
                        <button class="hover:text-gray-300 transition-colors flex items-center focus:outline-none py-2">
                            Worship <svg class="w-4 h-4 ml-1.5 opacity-70" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <div x-show="open" x-transition.opacity.duration.200ms class="absolute top-[110%] left-0 mt-2 w-[260px] bg-white rounded-lg shadow-2xl py-3 z-50 border border-gray-100" style="display: none;">
                            <a href="#" class="block px-6 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary transition-colors">Sabbath Services</a>
                            <a href="#" class="block px-6 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary transition-colors">Divine Worship</a>
                            <a href="#" class="block px-6 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary transition-colors">Prayer Meeting</a>
                            <a href="#" class="block px-6 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary transition-colors">Communion</a>
                            <a href="#" class="block px-6 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary transition-colors">Baptism</a>
                            <a href="#" class="block px-6 py-2.5 text-[15px] font-sans text-red-600 hover:bg-red-50 hover:text-red-700 transition-colors font-medium">Livestream</a>
                        </div>
                    </div>

                    <!-- Departments Mega Menu -->
                    <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" @click.outside="open = false">
                        <button class="hover:text-gray-300 transition-colors flex items-center focus:outline-none py-2">
                            Departments <svg class="w-4 h-4 ml-1.5 opacity-70" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <div x-show="open" x-transition.opacity.duration.200ms class="absolute top-[110%] left-1/2 -translate-x-1/2 mt-2 w-[880px] bg-white rounded-lg shadow-2xl p-8 z-50 border border-gray-100" style="display: none;">
                            <div class="grid grid-cols-3 gap-10">
                                
                                <!-- Column 1 -->
                                <div class="space-y-1">
                                    <a href="{{ route('childrens-ministry.index') }}" class="block px-4 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary rounded-md transition-colors">Children's Ministries</a>
                                    
                                    <div class="mt-2 mb-2">
                                        <a href="#" class="block px-4 py-2.5 text-[15px] font-sans font-bold text-primary bg-blue-50/50 hover:bg-blue-50 rounded-md transition-colors">Youth Ministries</a>
                                        <div class="pl-5 mt-1 space-y-1 border-l-2 border-gray-100 ml-6">
                                            <a href="#" class="block px-3 py-2 text-[14px] font-sans text-gray-600 hover:bg-gray-50 hover:text-primary rounded-md transition-colors">Adventurers</a>
                                            <a href="#" class="block px-3 py-2 text-[14px] font-sans text-gray-600 hover:bg-gray-50 hover:text-primary rounded-md transition-colors">Pathfinders</a>
                                            <a href="#" class="block px-3 py-2 text-[14px] font-sans text-gray-600 hover:bg-gray-50 hover:text-primary rounded-md transition-colors">Ambassadors</a>
                                            <a href="#" class="block px-3 py-2 text-[14px] font-sans text-gray-600 hover:bg-gray-50 hover:text-primary rounded-md transition-colors">Young Adults</a>
                                            <a href="#" class="block px-3 py-2 text-[14px] font-sans text-gray-600 hover:bg-gray-50 hover:text-primary rounded-md transition-colors">Public Campus (PCM)</a>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Column 2 -->
                                <div class="space-y-1">
                                    <a href="#" class="block px-4 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary rounded-md transition-colors">Education</a>
                                    <a href="#" class="block px-4 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary rounded-md transition-colors">Health Ministries</a>
                                    <a href="#" class="block px-4 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary rounded-md transition-colors">Family Life Ministries</a>
                                    <a href="#" class="block px-4 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary rounded-md transition-colors">Women's Ministries</a>
                                    <a href="#" class="block px-4 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary rounded-md transition-colors">Adventist Men's Ministries</a>
                                    <a href="{{ route('sabbath-school.index') }}" class="block px-4 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary rounded-md transition-colors">Sabbath School</a>
                                </div>

                                <!-- Column 3 -->
                                <div class="space-y-1">
                                    <a href="#" class="block px-4 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary rounded-md transition-colors">Personal Ministries</a>
                                    <a href="#" class="block px-4 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary rounded-md transition-colors">Ministerial Association</a>
                                    <a href="#" class="block px-4 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary rounded-md transition-colors">Public Affairs & Religious Liberty</a>
                                    <a href="#" class="block px-4 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary rounded-md transition-colors">Stewardship Ministries</a>
                                    <a href="#" class="block px-4 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary rounded-md transition-colors">Communication</a>
                                    <a href="#" class="block px-4 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary rounded-md transition-colors">Adventist Chaplaincy Ministries</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <a href="#" class="hover:text-gray-300 transition-colors py-2">Sermons</a>

                    <!-- Articles Dropdown -->
                    <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" @click.outside="open = false">
                        <button class="{{ request()->routeIs('study-guides.*') || request()->routeIs('articles.*') ? 'text-blue-300 font-bold' : 'hover:text-gray-300' }} transition-colors flex items-center focus:outline-none py-2">
                            Articles <svg class="w-4 h-4 ml-1.5 opacity-70" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <div x-show="open" x-transition.opacity.duration.200ms class="absolute top-[110%] left-0 mt-2 w-[260px] bg-white rounded-lg shadow-2xl py-3 z-50 border border-gray-100" style="display: none;">
                            <a href="#" class="block px-6 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary transition-colors">Church News</a>
                            <a href="#" class="block px-6 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary transition-colors">Devotionals</a>
                            <a href="{{ route('study-guides.index') }}" class="block px-6 py-2.5 text-[15px] font-sans {{ request()->routeIs('study-guides.*') ? 'text-primary bg-primary/5 font-bold border-l-2 border-primary' : 'text-gray-800 hover:bg-gray-50 hover:text-primary' }} transition-all">Study Guides</a>
                            <a href="#" class="block px-6 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary transition-colors">Health Articles</a>
                            <a href="#" class="block px-6 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary transition-colors">Family Life</a>
                            <a href="#" class="block px-6 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary transition-colors">Youth Articles</a>
                            <a href="#" class="block px-6 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary transition-colors">Mission Stories</a>
                            <a href="#" class="block px-6 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary transition-colors">Inspirational Messages</a>
                            <a href="{{ route('articles.category', 'end-time-messages') }}" class="block px-6 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary transition-colors">End-Time Messages</a>
                        </div>
                    </div>

                    <!-- More Dropdown -->
                    <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" @click.outside="open = false">
                        <button class="hover:text-gray-300 transition-colors flex items-center focus:outline-none py-2">
                            More <svg class="w-4 h-4 ml-1.5 opacity-70" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <div x-show="open" x-transition.opacity.duration.200ms class="absolute top-[110%] left-0 mt-2 w-[260px] bg-white rounded-lg shadow-2xl py-3 z-50 border border-gray-100" style="display: none;">
                            <a href="{{ route('sabbath-school.index') }}" class="block px-6 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary transition-colors">Sabbath School</a>
                            <a href="#" class="block px-6 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary transition-colors">Events</a>
                            <a href="#" class="block px-6 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary transition-colors">Gallery</a>
                            <div class="px-4 py-2 mt-1">
                                <a href="#" class="block px-4 py-2.5 text-[15px] font-sans text-gray-800 hover:bg-gray-50 hover:text-primary transition-colors border-t border-gray-100 text-center">Contact</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Let's Pray CTA -->
                    <button @click="$dispatch('open-prayer-modal')" class="bg-transparent border border-white/30 hover:bg-white/10 text-white font-sans font-bold text-[14px] tracking-wide px-7 py-2.5 rounded-full transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 ml-4 focus:outline-none">
                        Let's Pray
                    </button>
                    <!-- Give CTA -->
                    <a href="#" class="bg-[#2B548B] hover:bg-[#1E3F6C] text-white font-sans font-bold text-[14px] tracking-wide px-7 py-2.5 rounded-full transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 ml-3">
                        Give
                    </a>
                </div>
            </div>

            <!-- Mobile Menu Toggle -->
            <div class="xl:hidden flex items-center mt-6">
                <button @click="mobileMenuOpen = true" class="text-white hover:text-gray-200 focus:outline-none flex items-center text-sm font-bold tracking-widest uppercase">
                    Menu
                    <svg class="h-6 w-6 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            
        </div>
    </div>

    <!-- Off-canvas Sidebar & Overlay (Mobile Menu) -->
    <div x-show="mobileMenuOpen" style="display: none;" class="fixed inset-0 z-[100] flex justify-end" aria-modal="true" role="dialog" aria-label="Mobile Navigation" id="mobile-sidebar" x-effect="if(mobileMenuOpen) setTimeout(() => $refs.closeBtn && $refs.closeBtn.focus(), 300)">
        <!-- Overlay -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="mobileMenuOpen = false"
             class="fixed inset-0 bg-gray-900/70 backdrop-blur-sm" aria-hidden="true"></div>

        <!-- Sidebar -->
        <div x-show="mobileMenuOpen"
             @click.stop
             x-transition:enter="transition ease-in-out duration-300 transform"
             x-transition:enter-start="translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition ease-in-out duration-300 transform"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="translate-x-full"
             @keydown.escape.window="mobileMenuOpen = false"
             class="relative flex w-[85%] md:min-w-[400px] max-w-[500px] flex-col bg-[#111827] shadow-2xl h-full z-50 text-white">
             
            <!-- Sidebar Header -->
            <div class="relative flex items-center justify-between pt-6 pb-6 px-6 border-b border-white/10 shrink-0">
                <a href="{{ route('home') }}" class="flex items-center transition-transform duration-300">
                    <img src="{{ asset('assets/adventist-symbol--white.svg') }}" alt="Adventist Logo" class="w-[45px] h-auto object-contain drop-shadow-sm">
                    <div class="flex flex-col ml-3">
                        <span class="font-serif font-bold text-white text-[15px] leading-tight">Umoja II</span>
                        <span class="font-serif text-white/90 text-[13px] leading-tight mt-0.5">SDA Church</span>
                    </div>
                </a>
                <button x-ref="closeBtn" @click="mobileMenuOpen = false" class="text-white/80 hover:text-white transition-colors focus:outline-none p-2 rounded-md hover:bg-white/10" aria-label="Close menu">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Sidebar Content (Accordions) -->
            <div class="px-6 pt-4 pb-10 space-y-1 grow overflow-y-auto" @click="if($event.target.closest('a:not([x-on\\\\:click])')) mobileMenuOpen = false">
                
                <a href="{{ route('home') }}" class="block px-4 py-4 text-lg font-serif text-white hover:bg-white/5 rounded-md transition-colors border-b border-white/5">Home</a>

                <!-- About Us Accordion -->
                <div x-data="{ open: false }" class="border-b border-white/5">
                    <button @click="open = !open" class="w-full text-left flex items-center justify-between px-4 py-4 text-lg font-serif text-white hover:bg-white/5 rounded-md transition-colors">
                        <span>About Us</span>
                        <svg class="w-4 h-4 text-white/50 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open" class="pl-8 pr-4 pb-3 space-y-2 text-sm font-sans" x-cloak>
                        <a href="#" class="block py-2 text-white/70 hover:text-white">Welcome Message</a>
                        <a href="#" class="block py-2 text-white/70 hover:text-white">Our History</a>
                        <a href="#" class="block py-2 text-white/70 hover:text-white">Mission</a>
                        <a href="#" class="block py-2 text-white/70 hover:text-white">Vision</a>
                        <a href="{{ route('about.beliefs') }}" class="block py-2 text-white/70 hover:text-white">Fundamental Beliefs</a>
                        <a href="#" class="block py-2 text-white/70 hover:text-white">Church Leadership</a>
                        <a href="{{ route('programs.index') }}" class="block py-2 text-white/70 hover:text-white">Service Times</a>
                        <a href="#" class="block py-2 text-white/70 hover:text-white">Contact Information</a>
                    </div>
                </div>

                <!-- Worship Accordion -->
                <div x-data="{ open: false }" class="border-b border-white/5">
                    <button @click="open = !open" class="w-full text-left flex items-center justify-between px-4 py-4 text-lg font-serif text-white hover:bg-white/5 rounded-md transition-colors">
                        <span>Worship</span>
                        <svg class="w-4 h-4 text-white/50 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open" class="pl-8 pr-4 pb-3 space-y-2 text-sm font-sans" x-cloak>
                        <a href="#" class="block py-2 text-white/70 hover:text-white">Sabbath Services</a>
                        <a href="#" class="block py-2 text-white/70 hover:text-white">Divine Worship</a>
                        <a href="#" class="block py-2 text-white/70 hover:text-white">Prayer Meeting</a>
                        <a href="#" class="block py-2 text-white/70 hover:text-white">Communion</a>
                        <a href="#" class="block py-2 text-white/70 hover:text-white">Baptism</a>
                        <a href="#" class="block py-2 text-red-400 hover:text-red-300">Livestream</a>
                    </div>
                </div>

                <!-- Departments Accordion -->
                <div x-data="{ open: false }" class="border-b border-white/5">
                    <button @click="open = !open" class="w-full text-left flex items-center justify-between px-4 py-4 text-lg font-serif text-white hover:bg-white/5 rounded-md transition-colors">
                        <span>Departments</span>
                        <svg class="w-4 h-4 text-white/50 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open" class="pl-8 pr-4 pb-3 space-y-2 text-sm font-sans" x-cloak>
                        <a href="{{ route('childrens-ministry.index') }}" class="block py-2 text-white/70 hover:text-white">Children's Ministries</a>
                        
                        <!-- Nested Youth Ministries -->
                        <div x-data="{ youthOpen: false }" class="my-1">
                            <button @click="youthOpen = !youthOpen" class="w-full text-left flex items-center justify-between py-2 text-white/90 hover:text-white">
                                <span>Youth Ministries</span>
                                <svg class="w-3.5 h-3.5 text-white/50 transition-transform duration-200" :class="{ 'rotate-180': youthOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="youthOpen" class="pl-4 border-l border-white/10 ml-2 my-1 space-y-1" x-cloak>
                                <a href="#" class="block py-1.5 text-white/50 hover:text-white">Adventurers</a>
                                <a href="#" class="block py-1.5 text-white/50 hover:text-white">Pathfinders</a>
                                <a href="#" class="block py-1.5 text-white/50 hover:text-white">Ambassadors</a>
                                <a href="#" class="block py-1.5 text-white/50 hover:text-white">Young Adults</a>
                                <a href="#" class="block py-1.5 text-white/50 hover:text-white">Public Campus Ministries</a>
                            </div>
                        </div>

                        <a href="#" class="block py-2 text-white/70 hover:text-white">Education</a>
                        <a href="#" class="block py-2 text-white/70 hover:text-white">Health Ministries</a>
                        <a href="#" class="block py-2 text-white/70 hover:text-white">Family Life Ministries</a>
                        <a href="#" class="block py-2 text-white/70 hover:text-white">Women's Ministries</a>
                        <a href="#" class="block py-2 text-white/70 hover:text-white">Adventist Men's Ministries</a>
                        <a href="{{ route('sabbath-school.index') }}" class="block py-2 text-white/70 hover:text-white">Sabbath School</a>
                        <a href="#" class="block py-2 text-white/70 hover:text-white">Personal Ministries</a>
                        <a href="#" class="block py-2 text-white/70 hover:text-white">Ministerial Association</a>
                        <a href="#" class="block py-2 text-white/70 hover:text-white">Public Affairs & Religious Liberty</a>
                        <a href="#" class="block py-2 text-white/70 hover:text-white">Stewardship Ministries</a>
                        <a href="#" class="block py-2 text-white/70 hover:text-white">Communication</a>
                        <a href="#" class="block py-2 text-white/70 hover:text-white">Adventist Chaplaincy</a>
                    </div>
                </div>

                <a href="#" class="block px-4 py-4 text-lg font-serif text-white hover:bg-white/5 rounded-md transition-colors border-b border-white/5">Sermons</a>

                <!-- Articles Accordion -->
                <div x-data="{ open: {{ request()->routeIs('study-guides.*') || request()->routeIs('articles.*') ? 'true' : 'false' }} }" class="border-b border-white/5">
                    <button @click="open = !open" class="w-full text-left flex items-center justify-between px-4 py-4 text-lg font-serif {{ request()->routeIs('study-guides.*') || request()->routeIs('articles.*') ? 'text-blue-300 font-bold' : 'text-white hover:bg-white/5' }} rounded-md transition-colors">
                        <span>Articles</span>
                        <svg class="w-4 h-4 text-white/50 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open" class="pl-8 pr-4 pb-3 space-y-2 text-sm font-sans" {{ request()->routeIs('study-guides.*') || request()->routeIs('articles.*') ? '' : 'x-cloak' }}>
                        <a href="#" class="block py-2 text-white/70 hover:text-white">Church News</a>
                        <a href="#" class="block py-2 text-white/70 hover:text-white">Devotionals</a>
                        <a href="{{ route('study-guides.index') }}" class="block py-2 {{ request()->routeIs('study-guides.*') ? 'text-white font-bold' : 'text-white/70 hover:text-white' }}">Study Guides</a>
                        <a href="#" class="block py-2 text-white/70 hover:text-white">Health Articles</a>
                        <a href="#" class="block py-2 text-white/70 hover:text-white">Family Life</a>
                        <a href="#" class="block py-2 text-white/70 hover:text-white">Youth Articles</a>
                        <a href="#" class="block py-2 text-white/70 hover:text-white">Mission Stories</a>
                        <a href="#" class="block py-2 text-white/70 hover:text-white">Inspirational Messages</a>
                        <a href="{{ route('articles.category', 'end-time-messages') }}" class="block py-2 text-white/70 hover:text-white">End-Time Messages</a>
                    </div>
                </div>

                <a href="{{ route('sabbath-school.index') }}" class="block px-4 py-4 text-lg font-serif text-white hover:bg-white/5 rounded-md transition-colors border-b border-white/5">Sabbath School</a>
                <a href="#" class="block px-4 py-4 text-lg font-serif text-white hover:bg-white/5 rounded-md transition-colors border-b border-white/5">Events</a>
                <a href="#" class="block px-4 py-4 text-lg font-serif text-white hover:bg-white/5 rounded-md transition-colors border-b border-white/5">Gallery</a>
                <a href="#" class="block px-4 py-4 text-lg font-serif text-white hover:bg-white/5 rounded-md transition-colors border-b border-white/5">Live Stream</a>
                <a href="#" class="block px-4 py-4 text-lg font-serif text-white hover:bg-white/5 rounded-md transition-colors border-b border-white/5">Downloads</a>
                <a href="#" class="block px-4 py-4 text-lg font-serif text-white hover:bg-white/5 rounded-md transition-colors border-b border-white/5">Contact</a>
                
                <!-- Utilities -->
                <div class="mt-6 pt-4 border-t border-white/10 space-y-2">
                    <a href="{{ route('search') }}" class="block px-4 py-3 text-sm font-sans font-bold uppercase tracking-widest text-white/50 hover:text-white hover:bg-white/5 rounded-md transition-colors">Search</a>
                </div>
                
                <!-- CTA -->
                <div class="mt-6 px-4 space-y-3">
                    <button @click="$dispatch('open-prayer-modal')" class="block w-full text-center bg-transparent border border-white/30 hover:bg-white/10 text-white font-sans font-bold text-[15px] tracking-wide px-8 py-3.5 rounded-full transition-all duration-300 focus:outline-none">
                        Let's Pray
                    </button>
                    <a href="#" class="block w-full text-center bg-[#2B548B] hover:bg-[#1E3F6C] text-white font-sans font-bold text-[15px] tracking-wide px-8 py-3.5 rounded-full transition-all duration-300 shadow-lg">
                        Give
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

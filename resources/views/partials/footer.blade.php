<footer class="bg-accent text-white pt-16 pb-8 border-t-[8px] border-primary mt-12">
    <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-10 lg:gap-8 xl:gap-12">
            
            <!-- Column 1: Church Branding -->
            <div class="lg:col-span-1">
                <a href="{{ route('home') }}" class="flex items-center mb-6">
                    <img src="{{ asset('assets/adventist-symbol--white.svg') }}" alt="SDA Logo" class="h-10 w-auto">
                    <div class="flex flex-col ml-3 text-white">
                        <span class="font-serif font-bold text-[14px] leading-tight">Umoja II</span>
                        <span class="font-serif text-[12px] leading-tight">SDA Church</span>
                    </div>
                </a>
                <p class="text-blue-100/70 text-sm leading-relaxed mb-6 font-sans pr-4">
                    A vibrant, Bible-believing community of faith dedicated to serving God and our neighbors in preparation for His soon return.
                </p>
                <ul class="space-y-3 font-sans text-sm text-blue-100/80 mb-6">
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-blue-400 mr-3 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span>Umoja II SDA Church<br>Nairobi, Kenya</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="h-5 w-5 text-blue-400 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        <a href="tel:+254700000000" class="hover:text-white transition-colors">+254 700 000 000</a>
                    </li>
                    <li class="flex items-center">
                        <svg class="h-5 w-5 text-blue-400 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <a href="mailto:info@umoja2sda.org" class="hover:text-white transition-colors">info@umoja2sda.org</a>
                    </li>
                </ul>
                <!-- Social Icons -->
                <div class="flex space-x-4">
                    <a href="#" class="text-white/60 hover:text-white transition-colors">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                    </a>
                    <a href="#" class="text-white/60 hover:text-white transition-colors">
                        <span class="sr-only">YouTube</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z" clip-rule="evenodd" /></svg>
                    </a>
                </div>
            </div>

            <!-- Column 2: About Us -->
            <div>
                <h3 class="text-sm font-bold mb-5 text-white uppercase tracking-widest border-b border-white/10 pb-3">About Us</h3>
                <ul class="space-y-2.5 font-sans text-sm text-blue-100/70">
                    <li><a href="#" class="hover:text-blue-300 hover:translate-x-1 inline-block transition-all duration-200">Welcome Message</a></li>
                    <li><a href="#" class="hover:text-blue-300 hover:translate-x-1 inline-block transition-all duration-200">Our History</a></li>
                    <li><a href="#" class="hover:text-blue-300 hover:translate-x-1 inline-block transition-all duration-200">Mission</a></li>
                    <li><a href="#" class="hover:text-blue-300 hover:translate-x-1 inline-block transition-all duration-200">Vision</a></li>
                    <li><a href="{{ route('about.beliefs') }}" class="hover:text-blue-300 hover:translate-x-1 inline-block transition-all duration-200">Fundamental Beliefs</a></li>
                    <li><a href="#" class="hover:text-blue-300 hover:translate-x-1 inline-block transition-all duration-200">Church Leadership</a></li>
                    <li><a href="{{ route('programs.index') }}" class="hover:text-blue-300 hover:translate-x-1 inline-block transition-all duration-200">Service Times</a></li>
                    <li><a href="#" class="hover:text-blue-300 hover:translate-x-1 inline-block transition-all duration-200">Contact Information</a></li>
                </ul>
            </div>

            <!-- Column 3: Ministries & Departments -->
            <div>
                <h3 class="text-sm font-bold mb-5 text-white uppercase tracking-widest border-b border-white/10 pb-3">Departments</h3>
                <ul class="space-y-2.5 font-sans text-sm text-blue-100/70">
                    <li><a href="{{ route('childrens-ministry.index') }}" class="hover:text-blue-300 hover:translate-x-1 inline-block transition-all duration-200">Children's Ministries</a></li>
                    <li><a href="#" class="hover:text-blue-300 hover:translate-x-1 inline-block transition-all duration-200 font-bold text-white/90">Youth Ministries</a></li>
                    <li><a href="#" class="hover:text-blue-300 hover:translate-x-1 inline-block transition-all duration-200">Education</a></li>
                    <li><a href="#" class="hover:text-blue-300 hover:translate-x-1 inline-block transition-all duration-200">Health Ministries</a></li>
                    <li><a href="#" class="hover:text-blue-300 hover:translate-x-1 inline-block transition-all duration-200">Family Life Ministries</a></li>
                    <li><a href="#" class="hover:text-blue-300 hover:translate-x-1 inline-block transition-all duration-200">Women's Ministries</a></li>
                    <li><a href="#" class="hover:text-blue-300 hover:translate-x-1 inline-block transition-all duration-200">Adventist Men's Ministries</a></li>
                    <li><a href="#" class="hover:text-blue-300 hover:translate-x-1 inline-block transition-all duration-200">Sabbath School</a></li>
                    <li><a href="#" class="hover:text-blue-300 hover:translate-x-1 inline-block transition-all duration-200">Personal Ministries</a></li>
                </ul>
            </div>

            <!-- Column 4: Resources -->
            <div>
                <h3 class="text-sm font-bold mb-5 text-white uppercase tracking-widest border-b border-white/10 pb-3">Resources</h3>
                <ul class="space-y-2.5 font-sans text-sm text-blue-100/70">
                    <li><a href="#" class="hover:text-blue-300 hover:translate-x-1 inline-block transition-all duration-200">Sermons</a></li>
                    <li><a href="#" class="hover:text-blue-300 hover:translate-x-1 inline-block transition-all duration-200">Articles</a></li>
                    <li><a href="#" class="hover:text-blue-300 hover:translate-x-1 inline-block transition-all duration-200">Sabbath School</a></li>
                    <li><a href="#" class="hover:text-blue-300 hover:translate-x-1 inline-block transition-all duration-200">Events</a></li>
                    <li><a href="#" class="hover:text-blue-300 hover:translate-x-1 inline-block transition-all duration-200">Gallery</a></li>
                    <li><a href="#" class="hover:text-blue-300 hover:translate-x-1 inline-block transition-all duration-200 text-red-400">Live Stream</a></li>
                    <li><a href="#" class="hover:text-blue-300 hover:translate-x-1 inline-block transition-all duration-200">Downloads</a></li>
                </ul>
            </div>

            <!-- Column 5: Quick Links -->
            <div>
                <h3 class="text-sm font-bold mb-5 text-white uppercase tracking-widest border-b border-white/10 pb-3">Quick Links</h3>
                <ul class="space-y-2.5 font-sans text-sm text-blue-100/70 mb-8">
                    <li><a href="#" class="text-white hover:bg-[#004a8c] hover:translate-x-1 inline-flex items-center transition-all duration-200 font-bold bg-[#005DAA] px-3 py-2 rounded-lg w-full shadow-md">Give <svg class="w-3.5 h-3.5 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a></li>
                    <li><a href="#" class="hover:text-blue-300 hover:translate-x-1 inline-block transition-all duration-200">Contact Us</a></li>
                    <li><a href="#" class="hover:text-blue-300 hover:translate-x-1 inline-block transition-all duration-200">Prayer Request</a></li>
                    <li><a href="#" class="hover:text-blue-300 hover:translate-x-1 inline-block transition-all duration-200">Find a Church</a></li>
                    <li><a href="#" class="hover:text-blue-300 hover:translate-x-1 inline-block transition-all duration-200">Church News</a></li>
                    <li><a href="#" class="hover:text-blue-300 hover:translate-x-1 inline-block transition-all duration-200">Plan Your Visit</a></li>
                </ul>
            </div>

        </div>

        <!-- Copyright -->
        <div class="border-t border-white/10 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center text-xs text-white/50 font-sans">
            <p>&copy; {{ date('Y') }} Umoja II Seventh-day Adventist Church. All Rights Reserved.</p>
            <div class="mt-4 md:mt-0 flex space-x-6">
                <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-white transition-colors">Terms of Use</a>
            </div>
        </div>
    </div>
</footer>

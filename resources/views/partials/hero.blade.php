{{-- ============================================================
     MAIN HOMEPAGE HERO SECTION
     Header is position:absolute, min-h-[140px], z-50.
     Hero provides its own top padding to clear it.
     ============================================================ --}}
<section class="hero-section relative w-full overflow-hidden">

    {{-- ── Background Image ─────────────────────────────────────── --}}
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1511649475669-e288648b2339?q=80&w=2232&auto=format&fit=crop"
             alt="Church community in worship"
             class="w-full h-full object-cover"
             style="object-position: 60% center;" />
    </div>

    {{-- ── Vibrant Overlay System ───────────────────────────────── --}}
    <div class="absolute inset-0 z-[1] bg-[#0F4C81]/40 mix-blend-multiply"></div>

    <div class="absolute inset-0 z-[2]"
         style="background: linear-gradient(to right,
                rgba(0, 40, 85, 0.88) 0%,
                rgba(15, 76, 129, 0.65) 40%,
                rgba(15, 76, 129, 0.25) 65%,
                transparent 100%);"></div>

    <div class="absolute inset-0 z-[2]"
         style="background: linear-gradient(135deg,
                rgba(0, 50, 100, 0.3) 0%,
                transparent 50%,
                rgba(59, 130, 246, 0.08) 100%);"></div>

    <div class="absolute top-0 left-0 right-0 h-40 z-[3]"
         style="background: linear-gradient(to bottom,
                rgba(0, 30, 65, 0.5) 0%,
                transparent 100%);"></div>

    {{-- Subtle glow behind content --}}
    <div class="absolute z-[3] pointer-events-none"
         style="top: 30%; left: 5%; width: 50vw; height: 50vw;
                background: radial-gradient(circle,
                    rgba(59, 130, 246, 0.12) 0%,
                    rgba(15, 76, 129, 0.06) 40%,
                    transparent 70%);
                filter: blur(60px);"></div>

    {{-- ── Content Area ─────────────────────────────────────────── --}}
    <div class="hero-content relative z-10 w-full max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">

        <div class="max-w-[700px]">

            {{-- Eyebrow --}}
            <p class="hero-eyebrow flex items-center gap-3 mb-8">
                <span class="inline-block w-10 h-[2px] bg-[#60a5fa]"></span>
                <span class="text-[#93c5fd] font-sans font-bold text-[13px] tracking-[0.22em] uppercase">
                    Welcome To
                </span>
            </p>

            {{-- Main Heading --}}
            <h1 class="mb-8">
                <span class="hero-title-primary block font-serif font-bold text-white leading-[1.05] tracking-[-0.015em] drop-shadow-lg">
                    Umoja II
                </span>
                <span class="hero-title-secondary block font-serif font-medium text-blue-100 leading-[1.2] mt-3">
                    Seventh-day Adventist Church
                </span>
            </h1>

            {{-- Accent divider --}}
            <div class="w-20 h-[2px] mb-8"
                 style="background: linear-gradient(to right, #60a5fa, #3b82f6, transparent);"></div>

            {{-- Description --}}
            <p class="hero-description font-sans text-blue-100/90 leading-[1.85] mb-8 max-w-[560px]">
                We are a vibrant, Bible-believing community of faith dedicated
                to serving God and our neighbors. Whether you are seeking
                spiritual growth, a warm community, or answers to life's
                biggest questions, you belong here.
            </p>

            {{-- Supporting tagline --}}
            <p class="flex items-center gap-2.5 mb-12 text-[#93c5fd] text-[14px] font-sans italic">
                <span class="inline-block w-1.5 h-1.5 rounded-full bg-[#60a5fa]"></span>
                A place to worship, grow, and serve.
            </p>

            {{-- CTA Buttons --}}
            <div class="flex flex-col sm:flex-row gap-4 sm:gap-5">
                <a href="#worship"
                   class="hero-btn-primary inline-flex items-center justify-center text-white font-sans font-bold text-[16px] tracking-wide px-10 py-[16px] rounded-lg transition-all duration-300 hover:-translate-y-[2px]"
                   style="background: linear-gradient(135deg, #005DAA 0%, #0F4C81 50%, #1a6fbb 100%);
                          box-shadow: 0 4px 15px rgba(0, 93, 170, 0.4);">
                    Worship With Us
                    <svg class="w-4 h-4 ml-2.5 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>

                <a href="/about"
                   class="hero-btn-secondary inline-flex items-center justify-center text-white font-sans font-bold text-[16px] tracking-wide px-10 py-[16px] rounded-lg transition-all duration-300 border border-white/30 hover:border-white/60 hover:bg-white/10 hover:-translate-y-[2px]">
                    Learn More
                </a>
            </div>

        </div>
    </div>

    {{-- ── Bottom Wave Transition (into dark identity section) ──── --}}
    <div class="absolute bottom-0 left-0 right-0 z-10 leading-[0] pointer-events-none translate-y-[1px]">
        <svg class="hero-wave block w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V120H0Z"
                  fill="rgba(15, 27, 51, 0.3)"/>
            <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5V120H0Z"
                  fill="rgba(15, 27, 51, 0.6)"/>
            <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V120H0Z"
                  fill="#0f1b33"/>
        </svg>
    </div>

</section>

{{-- ── Scoped Hero Styles ─────────────────────────────────────── --}}
<style>
    /* Hero takes up nearly the full viewport on desktop */
    .hero-section {
        min-height: clamp(780px, 96vh, 1100px);
        display: flex;
        flex-direction: column;
    }

    /* Content centered vertically in remaining space after
       clearing the 140px navbar, with generous bottom breathing */
    .hero-content {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding-top: 200px;
        padding-bottom: 140px;
    }

    /* "Umoja II" — dominant but not absurd */
    .hero-title-primary {
        font-size: clamp(3rem, 6vw, 5rem);  /* 48px → 80px */
    }

    /* "Seventh-day Adventist Church" — clear secondary */
    .hero-title-secondary {
        font-size: clamp(1.5rem, 3vw, 2.5rem);  /* 24px → 40px */
    }

    .hero-description {
        font-size: clamp(1.05rem, 1.3vw, 1.25rem);  /* 17px → 20px */
    }

    .hero-wave {
        height: clamp(45px, 8vh, 100px);
    }

    .hero-btn-primary:hover {
        box-shadow: 0 8px 28px rgba(0, 93, 170, 0.55) !important;
    }

    /* Tablet */
    @media (max-width: 1024px) {
        .hero-section {
            min-height: clamp(700px, 90vh, 950px);
        }
        .hero-content {
            padding-top: 170px;
            padding-bottom: 120px;
        }
    }

    /* Mobile */
    @media (max-width: 640px) {
        .hero-section {
            min-height: clamp(620px, 88vh, 850px);
        }
        .hero-content {
            padding-top: 150px;
            padding-bottom: 90px;
        }
        .hero-eyebrow {
            margin-bottom: 1.5rem;
        }
    }
</style>

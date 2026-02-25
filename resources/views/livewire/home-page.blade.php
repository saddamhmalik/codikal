<div
    class="homepage-mousefx min-h-screen bg-slate-950 text-slate-100"
    x-data="{
        mx: 50,
        my: 50,
        loading: true,
        progress: 0,
        initLoader() {
            const started = performance.now();
            const duration = 2000;
            const tick = () => {
                const elapsed = performance.now() - started;
                this.progress = Math.min(100, Math.round((elapsed / duration) * 100));
                if (elapsed < duration) {
                    requestAnimationFrame(tick);
                } else {
                    this.loading = false;
                }
            };
            requestAnimationFrame(tick);
        }
    }"
    x-init="initLoader()"
    @mousemove.window="mx = (event.clientX / window.innerWidth) * 100; my = (event.clientY / window.innerHeight) * 100"
    :style="`--mouse-x:${mx}%; --mouse-y:${my}%`"
>
    <div
        x-show="loading"
        x-transition.opacity.duration.400ms
        class="page-loader fixed inset-0 z-[10000] bg-slate-950"
        style="position: fixed; inset: 0;"
        aria-live="polite"
        aria-label="Loading homepage"
    >
        <div class="absolute left-1/2 top-1/2 w-max max-w-[80vw] -translate-x-1/2 -translate-y-1/2 text-center">
            <img
                src="{{ asset('images/codikal-brand.svg') }}"
                alt="Codikal logo"
                class="mx-auto mb-5 h-28 w-auto md:h-24"
                loading="eager"
            >
            <p class="mt-3 text-sm font-medium text-slate-300">
                We build what you imagine
            </p>
            <p class="mt-4 text-xs uppercase tracking-[0.22em] text-slate-400">
                Loading <span x-text="progress"></span>%
            </p>
           
        </div>
    </div>

    @push('meta')
        <script type="application/ld+json">
            {!! json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'WebSite',
                'name' => 'Codikal ',
                'url' => url('/'),
                'description' => $seoDescription,
                'publisher' => [
                    '@type' => 'Organization',
                    'name' => 'Codikal ',
                ],
            ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
        </script>

        <script type="application/ld+json">
            {!! json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'FAQPage',
                'mainEntity' => collect($faqs)->map(fn ($faq) => [
                    '@type' => 'Question',
                    'name' => $faq['question'],
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => $faq['answer'],
                    ],
                ])->values(),
            ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
        </script>
    @endpush

    <div x-show="!loading" x-cloak>
    @include('partials.header', ['headerPage' => 'home'])

    {{-- Premium full-viewport hero with mouse-follow 3D tilt --}}
    <section
        class="hero-ambient relative flex min-h-[90vh] flex-col justify-center overflow-hidden px-6 py-24 md:min-h-[85vh] md:py-32"
        x-data="{ tiltX: 0, tiltY: 0, mx: 0.5, my: 0.5 }"
        @mousemove="const r = $el.getBoundingClientRect(); const x = (event.clientX - r.left) / r.width; const y = (event.clientY - r.top) / r.height; tiltY = (x - 0.5) * -8; tiltX = (y - 0.5) * 8; mx = x; my = y"
        @mouseleave="tiltX = 0; tiltY = 0"
    >
        <div
            class="reveal-up mx-auto w-full max-w-3xl text-left transition-transform duration-300 ease-out"
            :style="`transform: perspective(1200px) rotateX(${tiltX}deg) rotateY(${tiltY}deg) scale3d(1, 1, 1); will-change: transform;`"
        >
           
            <div class="mt-6">
                <img
                    src="{{ asset('images/codikal-brand.svg') }}"
                    alt="Codikal"
                    class="hero-logo-motion h-28 w-auto md:h-36"
                    loading="eager"
                >
            </div>
            <p class="text-xs font-medium uppercase tracking-[0.25em] text-cyan-400/90">
                Software Development Services
            </p>
            <p class="mt-6 max-w-lg text-lg leading-relaxed text-slate-400">
                We design, build, and scale high-quality software solutions across web, mobile, SaaS, and APIs for startups and enterprises. Our focus is on delivering secure, high-performance systems with clean architecture and future-ready scalability. From idea to launch and beyond, we engineer products built to grow, adapt, and perform reliably at scale.
            </p>
            <div class="mt-12 flex flex-wrap gap-4">
                <a
                    href="{{ route('contact') }}"
                    class="inline-flex items-center rounded-md bg-cyan-500 px-6 py-3.5 text-sm font-semibold tracking-wide text-slate-950 transition hover:bg-cyan-400"
                >
                    Start Your Project
                </a>
                <a
                    href="#services"
                    class="inline-flex items-center rounded-md border border-slate-600 px-6 py-3.5 text-sm font-semibold tracking-wide text-slate-200 transition hover:border-slate-500 hover:text-white"
                >
                    Our Services
                </a>
            </div>
        </div>
        {{-- Mouse-follow gradient glow --}}
        <div
            class="pointer-events-none absolute inset-0 -z-10 opacity-40 transition-opacity duration-500"
            aria-hidden="true"
            :style="`background: radial-gradient(900px circle at ${mx * 100}% ${my * 100}%, rgba(6, 182, 212, 0.15), transparent 45%);`"
        ></div>
        <div class="pointer-events-none absolute inset-0 -z-10 bg-gradient-to-b from-slate-950 via-slate-950/95 to-slate-950" aria-hidden="true"></div>
    </section>

    {{-- Why choose us - compact strip --}}
    <section class="border-y border-slate-800/80 bg-slate-900/30 py-16">
        <div class="mx-auto max-w-6xl px-6">
            <p class="text-center text-xs font-medium uppercase tracking-[0.2em] text-cyan-400/80">Why work with us</p>
            <div class="stagger-children mt-10 grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
                <div class="premium-hover-lift flex flex-col items-center text-center">
                    <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-cyan-500/10 text-cyan-400" aria-hidden="true">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </span>
                    <h3 class="mt-4 text-sm font-semibold uppercase tracking-wider text-white">Product-focused</h3>
                    <p class="mt-2 text-sm text-slate-400">Senior engineers who understand business goals and long-term vision.</p>
                </div>
                <div class="premium-hover-lift flex flex-col items-center text-center">
                    <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-cyan-500/10 text-cyan-400" aria-hidden="true">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                    </span>
                    <h3 class="mt-4 text-sm font-semibold uppercase tracking-wider text-white">Agile delivery</h3>
                    <p class="mt-2 text-sm text-slate-400">Transparent milestones and iterative execution. You stay in the loop.</p>
                </div>
                <div class="premium-hover-lift flex flex-col items-center text-center">
                    <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-cyan-500/10 text-cyan-400" aria-hidden="true">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </span>
                    <h3 class="mt-4 text-sm font-semibold uppercase tracking-wider text-white">Secure & scalable</h3>
                    <p class="mt-2 text-sm text-slate-400">Architecture built for performance and future growth from day one.</p>
                </div>
                <div class="premium-hover-lift flex flex-col items-center text-center">
                    <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-cyan-500/10 text-cyan-400" aria-hidden="true">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    </span>
                    <h3 class="mt-4 text-sm font-semibold uppercase tracking-wider text-white">Long-term support</h3>
                    <p class="mt-2 text-sm text-slate-400">Monitoring, enhancements, and optimization after launch.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="mx-auto max-w-6xl px-6 py-24 md:py-28">
        <div class="text-center max-w-2xl mx-auto">
            <p class="text-xs font-medium uppercase tracking-[0.2em] text-cyan-400/90">What we build</p>
            <h2 class="mt-4 text-3xl font-bold tracking-tight text-white md:text-4xl">Services</h2>
            <p class="mt-4 text-slate-400">
                End-to-end engineering tailored to your goals. Discovery, design, launch, and support.
            </p>
        </div>
        <div class="stagger-children mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-3" style="perspective: 1200px;">
            @foreach ($services as $service)
                <article
                    class="group interactive-card premium-hover-lift rounded-2xl border border-slate-800 bg-slate-900/60 p-6 transition-[border-color,background-color,transform] duration-300 ease-out hover:border-slate-700 hover:bg-slate-900/80"
                    x-data="{ tiltX: 0, tiltY: 0, mx: 50, my: 50 }"
                    @mousemove="const r = $el.getBoundingClientRect(); const x = (event.clientX - r.left) / r.width; const y = (event.clientY - r.top) / r.height; tiltY = (x - 0.5) * 6; tiltX = (y - 0.5) * -6; mx = x * 100; my = y * 100"
                    @mouseleave="tiltX = 0; tiltY = 0; mx = 50; my = 50"
                    :style="`transform: perspective(1200px) rotateX(${tiltX}deg) rotateY(${tiltY}deg) translateZ(0); --mx:${mx}%; --my:${my}%;`"
                >
                    <div class="flex items-start gap-4">
                        <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-cyan-500/15 text-cyan-400" aria-hidden="true">
                            @if(($service['icon'] ?? '') === 'web')
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                            @elseif(($service['icon'] ?? '') === 'mobile')
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                            @elseif(($service['icon'] ?? '') === 'saas')
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/></svg>
                            @elseif(($service['icon'] ?? '') === 'ai')
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                            @elseif(($service['icon'] ?? '') === 'design')
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343L12.657 5.686a2 2 0 012.828 2.828L11 13v-5.657z"/></svg>
                            @elseif(($service['icon'] ?? '') === 'solutions')
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            @else
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                            @endif
                        </span>
                        <div class="min-w-0 flex-1">
                            <p class="text-xs font-semibold uppercase tracking-wider text-cyan-400">{{ $service['tagline'] ?? '' }}</p>
                            <h3 class="mt-1 text-xl font-semibold text-white">{{ $service['title'] }}</h3>
                            <p class="mt-3 text-slate-300">{{ $service['description'] }}</p>
                            @if(!empty($service['features']))
                                <ul class="mt-4 space-y-2">
                                    @foreach ($service['features'] as $feature)
                                        <li class="flex items-start gap-2 text-sm text-slate-300">
                                            <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-cyan-400/80" aria-hidden="true"></span>
                                            <span>{{ $feature }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            <a href="{{ route('contact') }}?service={{ urlencode($service['title']) }}" class="mt-5 inline-block text-sm font-semibold text-cyan-400 hover:text-cyan-300">
                                Discuss this service →
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
        <p class="mt-14 text-center">
            <a href="{{ route('contact') }}" class="inline-flex rounded-md bg-cyan-500 px-6 py-3.5 text-sm font-semibold tracking-wide text-slate-950 hover:bg-cyan-400">
                Get a custom proposal
            </a>
        </p>
    </section>

    <section id="process" class="mx-auto max-w-6xl px-6 py-24 md:py-28">
        <p class="text-xs font-medium uppercase tracking-[0.2em] text-cyan-400/90">Our process</p>
        <h2 class="mt-4 text-3xl font-bold tracking-tight text-white md:text-4xl">How We Build Products</h2>
        <p class="mt-4 max-w-3xl text-slate-400">
            From discovery to long-term support, our workflow keeps delivery structured, transparent, and focused on measurable business outcomes.
        </p>

        <div class="process-map relative mt-14 grid gap-6 md:grid-cols-2 lg:block lg:h-[640px]">
            <svg class="process-curves pointer-events-none absolute inset-0 hidden h-full w-full lg:block" viewBox="0 0 1200 640" fill="none" aria-hidden="true">
                <path d="M20 390C210 255 395 170 610 180C830 190 1010 150 1180 85" />
                <path d="M180 560C380 445 565 355 780 325C950 300 1065 270 1180 215" />
            </svg>

            @foreach ($processSteps as $index => $step)
                <article class="process-step process-step-{{ $index + 1 }} premium-hover-lift rounded-2xl border border-slate-800 bg-slate-900/75 p-5 shadow-lg shadow-slate-950/30 ring-1 ring-slate-800/70 backdrop-blur lg:absolute">
                    <div class="flex items-start gap-4">
                        <span class="process-step-icon relative flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-cyan-500/15 text-cyan-300 ring-1 ring-cyan-500/30">
                            @if(($step['icon'] ?? '') === 'search')
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M10.5 18a7.5 7.5 0 100-15 7.5 7.5 0 000 15z"/></svg>
                            @elseif(($step['icon'] ?? '') === 'analysis')
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6m3 6V7m3 10v-3m4 7H5a2 2 0 01-2-2V5a2 2 0 012-2h14a2 2 0 012 2v14a2 2 0 01-2 2z"/></svg>
                            @elseif(($step['icon'] ?? '') === 'design')
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343L12.657 5.686a2 2 0 012.828 2.828L11 13v-5.657z"/></svg>
                            @elseif(($step['icon'] ?? '') === 'code')
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l-4 3 4 3m8-6l4 3-4 3M14 4l-4 16"/></svg>
                            @elseif(($step['icon'] ?? '') === 'qa')
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            @elseif(($step['icon'] ?? '') === 'deploy')
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V8m0 0l-3 3m3-3l3 3m7 5a2 2 0 002-2V6a2 2 0 00-2-2h-5a2 2 0 00-2 2v8a2 2 0 002 2h5z"/></svg>
                            @else
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636a9 9 0 11-12.728 0 9 9 0 0112.728 0zM9 12l2 2 4-4"/></svg>
                            @endif
                            <span class="process-step-number absolute -bottom-2 -right-2 flex h-8 w-8 items-center justify-center rounded-full text-xs font-black text-slate-950">{{ $index + 1 }}</span>
                        </span>
                        <div class="min-w-0">
                            <h3 class="text-base font-semibold text-white">{{ $step['title'] }}</h3>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section id="projects" class="mx-auto max-w-6xl px-6 py-24 md:py-28">
        <p class="text-xs font-medium uppercase tracking-[0.2em] text-cyan-400/90">Portfolio</p>
        <h2 class="mt-4 text-3xl font-bold tracking-tight text-white md:text-4xl">Projects We've Delivered</h2>
        <p class="mt-4 max-w-2xl text-slate-400">
            Selected work across travel, finance, and healthcare.
        </p>
        <div class="stagger-children mt-14 grid gap-8 md:grid-cols-2 lg:grid-cols-3" style="perspective: 1200px;">
            @foreach ($projects as $project)
                <article
                    class="group interactive-card premium-hover-lift relative overflow-hidden rounded-2xl border border-slate-700/80 bg-gradient-to-b from-slate-900/90 to-slate-900/60 p-0 shadow-xl shadow-slate-950/50 ring-1 ring-slate-800/80 transition-all duration-300 ease-out hover:border-cyan-500/30 hover:shadow-cyan-500/5 hover:ring-cyan-500/20"
                    x-data="{ tiltX: 0, tiltY: 0, mx: 50, my: 50 }"
                    @mousemove="const r = $el.getBoundingClientRect(); const x = (event.clientX - r.left) / r.width; const y = (event.clientY - r.top) / r.height; tiltY = (x - 0.5) * 6; tiltX = (y - 0.5) * -6; mx = x * 100; my = y * 100"
                    @mouseleave="tiltX = 0; tiltY = 0; mx = 50; my = 50"
                    :style="`transform: perspective(1200px) rotateX(${tiltX}deg) rotateY(${tiltY}deg) translateZ(0); --mx:${mx}%; --my:${my}%;`"
                >
                    {{-- Accent strip --}}
                    <div class="h-1 w-full bg-gradient-to-r from-cyan-500 via-cyan-400/80 to-slate-600"></div>
                    @if(!empty($project['image']))
                        <div class="relative aspect-video overflow-hidden border-b border-slate-800/80 bg-slate-900">
                            <img
                                src="{{ asset(ltrim($project['image'], '/')) }}"
                                alt="{{ $project['name'] }} preview"
                                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                loading="lazy"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                            >
                            <div class="absolute inset-0 hidden items-center justify-center bg-gradient-to-br from-slate-800 to-slate-900 text-sm font-semibold tracking-wide text-slate-300">
                                {{ $project['name'] }} Preview
                            </div>
                        </div>
                    @endif
                    <div class="p-6">
                        <h3 class="text-xl font-bold tracking-tight text-white">{{ $project['name'] }}</h3>
                        <p class="mt-4 text-sm leading-relaxed text-slate-400">{{ $project['description'] }}</p>
                        @if($project['tagline'] ?? null)
                            <div class="mt-4">
                                <span class="inline-flex rounded-full bg-cyan-500/15 px-3 py-1.5 text-xs font-semibold uppercase tracking-wider text-cyan-400 ring-1 ring-cyan-500/20">{{ $project['tagline'] }}</span>
                            </div>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section id="testimonials" class="mx-auto max-w-6xl px-6 py-24 md:py-28">
        <p class="text-xs font-medium uppercase tracking-[0.2em] text-cyan-400/90">Testimonials</p>
        <h2 class="mt-4 text-3xl font-bold tracking-tight text-white md:text-4xl">What Clients Say</h2>
        <p class="mt-4 max-w-2xl text-slate-400">
            Feedback from founders and teams we've worked with.
        </p>
        <div class="stagger-children mt-14 grid gap-8 md:grid-cols-3">
            @foreach ($testimonials as $testimonial)
                <blockquote class="premium-hover-lift rounded-xl border border-slate-800 bg-slate-900/60 p-6 shadow-lg shadow-slate-950/30">
                    <div class="flex items-center gap-3">
                        <img
                            src="{{ !empty($testimonial['avatar']) && str_starts_with($testimonial['avatar'], 'http') ? $testimonial['avatar'] : asset($testimonial['avatar'] ?? 'images/testimonial-illustration-1.png') }}"
                            alt="{{ $testimonial['name'] }} avatar"
                            class="h-12 w-12 rounded-full border border-slate-700 object-cover"
                            loading="lazy"
                        >
                        <div>
                            <p class="font-semibold text-white">{{ $testimonial['name'] }}</p>
                            <p class="text-sm text-slate-400">{{ $testimonial['role'] }}, {{ $testimonial['company'] }}</p>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center gap-1 text-yellow-400" aria-label="5 star rating">
                        @for ($i = 0; $i < 5; $i++)
                            <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20" aria-hidden="true">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.13 3.478a1 1 0 00.95.69h3.656c.969 0 1.371 1.24.588 1.81l-2.958 2.149a1 1 0 00-.364 1.118l1.13 3.478c.3.922-.755 1.688-1.54 1.118l-2.958-2.149a1 1 0 00-1.176 0l-2.958 2.149c-.784.57-1.838-.196-1.539-1.118l1.13-3.478a1 1 0 00-.364-1.118L2.725 8.905c-.783-.57-.38-1.81.588-1.81h3.656a1 1 0 00.951-.69l1.129-3.478z"/>
                            </svg>
                        @endfor
                    </div>
                    <p class="mt-5 text-slate-200">&ldquo;{{ $testimonial['quote'] }}&rdquo;</p>
                    <footer class="mt-5 border-t border-slate-800 pt-4">
                        <p class="text-xs font-semibold uppercase tracking-[0.16em] text-cyan-400/80">Verified client feedback</p>
                    </footer>
                </blockquote>
            @endforeach
        </div>
    </section>

    <section class="mx-auto max-w-6xl px-6 py-24 md:py-28">
        <p class="text-xs font-medium uppercase tracking-[0.2em] text-cyan-400/90">Technology</p>
        <h2 class="mt-4 text-3xl font-bold tracking-tight text-white md:text-4xl">Our Tech Stack</h2>
        <p class="mt-4 max-w-2xl text-slate-400">
            Proven technologies for secure, scalable systems.
        </p>
        <div class="mt-12 tech-marquee-mask">
            <div class="tech-marquee-track">
                @foreach ($techStack as $item)
                    @php $iconUrl = \App\Livewire\HomePage::techIconUrl($item); @endphp
                    <span class="tech-chip inline-flex shrink-0 items-center gap-2.5 rounded-xl border border-slate-700/80 bg-slate-900/80 px-4 py-3 text-sm font-medium text-slate-200 transition-colors hover:border-slate-600 hover:bg-slate-800/80">
                        @if($iconUrl)
                            <img
                                src="{{ $iconUrl }}"
                                alt="{{ $item }}"
                                class="h-6 w-6 shrink-0 object-contain"
                                loading="lazy"
                                width="24"
                                height="24"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                            >
                            <span class="hidden h-6 w-6 shrink-0 items-center justify-center rounded-lg bg-slate-700/80 text-xs font-bold text-slate-400">{{ strtoupper(mb_substr($item, 0, 1)) }}</span>
                        @else
                            <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg bg-slate-700/80 text-xs font-bold text-slate-400">{{ strtoupper(mb_substr($item, 0, 1)) }}</span>
                        @endif
                        <span>{{ $item }}</span>
                    </span>
                @endforeach

                @foreach ($techStack as $item)
                    @php $iconUrl = \App\Livewire\HomePage::techIconUrl($item); @endphp
                    <span class="tech-chip inline-flex shrink-0 items-center gap-2.5 rounded-xl border border-slate-700/80 bg-slate-900/80 px-4 py-3 text-sm font-medium text-slate-200 transition-colors hover:border-slate-600 hover:bg-slate-800/80">
                        @if($iconUrl)
                            <img
                                src="{{ $iconUrl }}"
                                alt="{{ $item }}"
                                class="h-6 w-6 shrink-0 object-contain"
                                loading="lazy"
                                width="24"
                                height="24"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                            >
                            <span class="hidden h-6 w-6 shrink-0 items-center justify-center rounded-lg bg-slate-700/80 text-xs font-bold text-slate-400">{{ strtoupper(mb_substr($item, 0, 1)) }}</span>
                        @else
                            <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg bg-slate-700/80 text-xs font-bold text-slate-400">{{ strtoupper(mb_substr($item, 0, 1)) }}</span>
                        @endif
                        <span>{{ $item }}</span>
                    </span>
                @endforeach
            </div>
        </div>
    </section>

    <section id="contact" class="mx-auto max-w-6xl px-6 py-24 md:py-28">
        <div class="rounded-2xl border border-slate-800 bg-slate-900/40 p-10 md:p-14">
            <p class="text-xs font-medium uppercase tracking-[0.2em] text-cyan-400/90">Get in touch</p>
            <h2 class="mt-4 text-3xl font-bold tracking-tight text-white md:text-4xl">
                Let's Build Something Great
            </h2>
            <p class="mt-5 max-w-2xl text-slate-400">
                Tell us what you're building. We'll help you turn your idea into a high-quality product.
            </p>
            <div class="mt-10">
                <a
                    href="{{ route('contact') }}"
                    class="inline-flex rounded-md bg-cyan-500 px-6 py-3.5 text-sm font-semibold tracking-wide text-slate-950 hover:bg-cyan-400"
                >
                    Contact Us
                </a>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-6xl px-6 py-24 md:py-28">
        <p class="text-xs font-medium uppercase tracking-[0.2em] text-cyan-400/90">FAQ</p>
        <h2 class="mt-4 text-3xl font-bold tracking-tight text-white md:text-4xl">Frequently Asked Questions</h2>
        <div class="stagger-children mt-12 space-y-6">
            @foreach ($faqs as $faq)
                <article class="premium-hover-lift rounded-xl border border-slate-800 bg-slate-900/60 p-6">
                    <h3 class="text-xl font-semibold text-white">{{ $faq['question'] }}</h3>
                    <p class="mt-3 text-slate-300">{{ $faq['answer'] }}</p>
                </article>
            @endforeach
        </div>
    </section>

    @include('partials.footer')
    </div>
</div>

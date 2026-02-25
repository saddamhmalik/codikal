@php
    $headerTone = $headerTone ?? 'dark';

    $defaultLogoPath = 'images/codikal-brand.svg';
    $darkToneLogoPath = file_exists(public_path('images/codikal-brand-light.png'))
        ? 'images/codikal-brand-light.png'
        : $defaultLogoPath;
    $lightToneLogoPath = file_exists(public_path('images/codikal-brand-dark.svg'))
        ? 'images/codikal-brand-dark.svg'
        : $defaultLogoPath;
@endphp

<header class="fixed inset-x-0 top-0 z-[9999] w-full border-b border-slate-800/80 bg-slate-950 shadow-lg shadow-slate-950/60" style="position: fixed; top: 0; left: 0; right: 0; z-index: 9999;">
    <div class="mx-auto flex max-w-6xl items-center justify-between gap-6 px-6 py-4">
        <a href="{{ url('/') }}" class="flex shrink-0 items-center" aria-label="Codikal homepage">
            <img
                src="{{ asset($headerTone === 'light' ? $lightToneLogoPath : $darkToneLogoPath) }}"
                alt="Codikal"
                class="logo-transparent-fix h-14 w-auto md:h-16"
                loading="eager"
            >
        </a>
        
        <nav class="hidden items-center gap-1 md:flex" aria-label="Main navigation">
            <a
                href="{{ url('/') }}"
                class="rounded-md px-3 py-2 text-sm font-medium {{ (isset($headerPage) && $headerPage === 'home') ? 'bg-slate-800 text-white' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white' }}"
            >
                Home
            </a>
            <a
                href="{{ url('/') }}#services"
                class="rounded-md px-3 py-2 text-sm font-medium text-slate-300 hover:bg-slate-800/80 hover:text-white"
            >
                Services
            </a>
            <a
                href="{{ url('/') }}#process"
                class="rounded-md px-3 py-2 text-sm font-medium text-slate-300 hover:bg-slate-800/80 hover:text-white"
            >
                Process
            </a>
            <a
                href="{{ url('/') }}#projects"
                class="rounded-md px-3 py-2 text-sm font-medium text-slate-300 hover:bg-slate-800/80 hover:text-white"
            >
                Projects
            </a>
            <a
                href="{{ url('/') }}#testimonials"
                class="rounded-md px-3 py-2 text-sm font-medium text-slate-300 hover:bg-slate-800/80 hover:text-white"
            >
                Testimonials
            </a>
            <a
                href="{{ route('contact') }}"
                class="rounded-md px-3 py-2 text-sm font-medium {{ (isset($headerPage) && $headerPage === 'contact') ? 'bg-slate-800 text-white' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white' }}"
            >
                Contact
            </a>
        </nav>

        <a
            href="{{ route('contact') }}"
            class="shrink-0 rounded-md bg-cyan-500 px-4 py-2 text-sm font-semibold text-slate-950 hover:bg-cyan-400"
        >
            Get a Quote
        </a>
    </div>

    {{-- Mobile nav: simple dropdown or hamburger could be added later --}}
    <div class="border-t border-slate-800/80 px-6 py-3 md:hidden">
        <div class="flex flex-wrap gap-2">
            <a href="{{ url('/') }}" class="rounded-md px-3 py-1.5 text-sm text-slate-300 hover:bg-slate-800">Home</a>
            <a href="{{ url('/') }}#services" class="rounded-md px-3 py-1.5 text-sm text-slate-300 hover:bg-slate-800">Services</a>
            <a href="{{ url('/') }}#process" class="rounded-md px-3 py-1.5 text-sm text-slate-300 hover:bg-slate-800">Process</a>
            <a href="{{ url('/') }}#projects" class="rounded-md px-3 py-1.5 text-sm text-slate-300 hover:bg-slate-800">Projects</a>
            <a href="{{ url('/') }}#testimonials" class="rounded-md px-3 py-1.5 text-sm text-slate-300 hover:bg-slate-800">Testimonials</a>
            <a href="{{ route('contact') }}" class="rounded-md px-3 py-1.5 text-sm text-slate-300 hover:bg-slate-800">Contact</a>
        </div>
    </div>
</header>
<div class="h-28 md:h-24" aria-hidden="true"></div>

<footer class="border-t border-slate-800/80 bg-slate-950/70 py-14">
    <div class="mx-auto max-w-6xl px-6">
        <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-4">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-cyan-400/90">Codikal</p>
                <p class="mt-4 max-w-xs text-sm leading-relaxed text-slate-400">
                    We build high-quality web, mobile, SaaS, and AI products for startups and growing businesses.
                </p>
            </div>

            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wider text-slate-200">Company</h3>
                <ul class="mt-4 space-y-2 text-sm text-slate-400">
                    <li><a href="{{ url('/') }}" class="hover:text-cyan-300">Home</a></li>
                    <li><a href="{{ url('/') }}#process" class="hover:text-cyan-300">Our Process</a></li>
                    <li><a href="{{ url('/') }}#projects" class="hover:text-cyan-300">Portfolio</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-cyan-300">Contact</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wider text-slate-200">Services</h3>
                <ul class="mt-4 space-y-2 text-sm text-slate-400">
                    <li><a href="{{ url('/') }}#services" class="hover:text-cyan-300">Custom Websites</a></li>
                    <li><a href="{{ url('/') }}#services" class="hover:text-cyan-300">Mobile Apps</a></li>
                    <li><a href="{{ url('/') }}#services" class="hover:text-cyan-300">Web Apps / SaaS</a></li>
                    <li><a href="{{ url('/') }}#services" class="hover:text-cyan-300">AI Assistants</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wider text-slate-200">Contact Details</h3>
                <ul class="mt-4 space-y-2 text-sm text-slate-400">
                    <li><span class="text-slate-300">Email:</span> <a href="mailto:contact-us@codikal.com" class="hover:text-cyan-300">hello@codikal.com</a></li>
                    <li><span class="text-slate-300">Phone:</span> <a href="tel:+919999999999" class="hover:text-cyan-300">+91 91350 09315</a></li>
                    <li>
                        <span class="text-slate-300">Address:</span>
                        <div class="mt-1 leading-relaxed">
                           Janipur Colony, Jammu <br>
                           Jammu &amp; Kashmir, IN - 180007
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mt-10 flex flex-col gap-3 border-t border-slate-800/80 pt-6 text-sm text-slate-500 md:flex-row md:items-center md:justify-between">
            <p>&copy; {{ now()->year }} Codikal, a unit of Jai Sachidanand Travels Pvt. Ltd. All rights reserved.</p>
        </div>
    </div>
</footer>

<div class="min-h-screen bg-slate-950 text-slate-100">
    @include('partials.header', ['headerPage' => 'contact'])

    <section class="mx-auto max-w-6xl px-6 py-16 md:py-20">
        <h1 class="text-4xl font-bold text-white md:text-5xl">Contact Us</h1>
        <p class="mt-4 max-w-2xl text-slate-300">
            Tell us about your project and goals. Our team will respond as soon as possible.
        </p>
        <p class="mt-3 text-slate-300">
            Business email: <a class="font-semibold text-cyan-400 hover:text-cyan-300" href="mailto:hello@codikal.com">hello@codikal.com</a>
        </p>
    </section>

    <section class="mx-auto max-w-6xl px-6 pb-20">
        <div class="grid gap-8 lg:grid-cols-3">
            <div class="rounded-2xl border border-slate-800 bg-slate-900/50 p-6 lg:col-span-2">
                <h2 class="text-2xl font-semibold text-white">Project Inquiry Form</h2>
                <p class="mt-2 text-slate-300">Please provide details so we can recommend the right approach.</p>

                @if ($submitted)
                    <div class="mt-6 rounded-lg border border-emerald-700 bg-emerald-900/30 px-4 py-3 text-emerald-200">
                        Thanks! Your message was sent successfully. We will contact you shortly.
                    </div>
                @endif

                @error('form')
                    <div class="mt-6 rounded-lg border border-rose-700 bg-rose-900/30 px-4 py-3 text-rose-200">
                        {{ $message }}
                    </div>
                @enderror

                <form wire:submit="submit" class="mt-6 space-y-5">
                    <div class="grid gap-5 md:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-200">Full Name *</label>
                            <input
                                type="text"
                                wire:model.blur="name"
                                class="w-full rounded-md border border-slate-700 bg-slate-950 px-4 py-3 text-slate-100 outline-none ring-cyan-400 placeholder:text-slate-500 focus:ring-2"
                                placeholder="John Smith"
                            >
                            @error('name') <p class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-200">Email *</label>
                            <input
                                type="email"
                                wire:model.blur="email"
                                class="w-full rounded-md border border-slate-700 bg-slate-950 px-4 py-3 text-slate-100 outline-none ring-cyan-400 placeholder:text-slate-500 focus:ring-2"
                                placeholder="you@mail.com"
                            >
                            @error('email') <p class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-200">Phone</label>
                            <input
                                type="text"
                                wire:model.blur="phone"
                                class="w-full rounded-md border border-slate-700 bg-slate-950 px-4 py-3 text-slate-100 outline-none ring-cyan-400 placeholder:text-slate-500 focus:ring-2"
                                placeholder="+1 234 567 890"
                            >
                            @error('phone') <p class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-200">Company</label>
                            <input
                                type="text"
                                wire:model.blur="company"
                                class="w-full rounded-md border border-slate-700 bg-slate-950 px-4 py-3 text-slate-100 outline-none ring-cyan-400 placeholder:text-slate-500 focus:ring-2"
                                placeholder="Company name"
                            >
                            @error('company') <p class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-200">Service Needed *</label>
                        <select
                            wire:model.blur="service"
                            class="w-full rounded-md border border-slate-700 bg-slate-950 px-4 py-3 text-slate-100 outline-none ring-cyan-400 focus:ring-2"
                        >
                            <option value="">Select a service</option>
                            <option value="Web Development">Web Development</option>
                            <option value="Mobile App Development">Mobile App Development</option>
                            <option value="SaaS Solutions">SaaS Solutions</option>
                            <option value="API and Integrations">API and Integrations</option>
                        </select>
                        @error('service') <p class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-200">Message *</label>
                        <textarea
                            wire:model.blur="message"
                            rows="6"
                            class="w-full rounded-md border border-slate-700 bg-slate-950 px-4 py-3 text-slate-100 outline-none ring-cyan-400 placeholder:text-slate-500 focus:ring-2"
                            placeholder="Describe your project goals, timeline, and key requirements."
                        ></textarea>
                        @error('message') <p class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
                    </div>

                    <button
                        type="submit"
                        class="rounded-md bg-cyan-500 px-6 py-3 font-semibold text-slate-950 hover:bg-cyan-400"
                    >
                        Send Inquiry
                    </button>
                </form>
            </div>

            <aside class="rounded-2xl border border-slate-800 bg-slate-900/50 p-6">
                <h2 class="text-xl font-semibold text-white">Direct Contact</h2>
                <p class="mt-3 text-slate-300">For urgent project discussions, email us directly.</p>
                <a
                    href="mailto:hello@codikal.com"
                    class="mt-4 inline-block font-semibold text-cyan-400 hover:text-cyan-300"
                >
                    hello@codikal.com
                </a>
                <div class="mt-8 border-t border-slate-800 pt-6">
                    <h3 class="text-sm font-semibold uppercase tracking-wider text-slate-300">Response Time</h3>
                    <p class="mt-2 text-slate-400">Typically within 1 business day.</p>
                </div>
            </aside>
        </div>
    </section>

    @include('partials.footer')
</div>

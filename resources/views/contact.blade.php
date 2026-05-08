@extends('layouts.app')

@section('title', 'Get in Touch')

@section('content')
    <section class="relative py-24 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20">
                <!-- Contact Info -->
                <div>
                    <span class="text-gold-500 font-bold uppercase tracking-widest text-xs mb-4 block">Connect With Us</span>
                    <h1 class="text-4xl md:text-6xl font-bold mb-8 text-white">Let's Start a <br/> <span class="text-gold-400">Conversation</span></h1>
                    <p class="text-slate-400 text-lg leading-relaxed mb-12">
                        Whether you have a complex translation project or just a simple inquiry, our dedicated concierge team is ready to provide the expertise you deserve.
                    </p>

                    <div class="space-y-8">
                        <div class="flex items-start gap-6">
                            <div class="w-12 h-12 rounded-xl bg-gold-500/10 flex items-center justify-center text-gold-500 shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white font-bold mb-1">Global Headquarters</h4>
                                <p class="text-slate-400 text-sm">One Luxury Plaza, Level 42, London, UK</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-6">
                            <div class="w-12 h-12 rounded-xl bg-gold-500/10 flex items-center justify-center text-gold-500 shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white font-bold mb-1">Digital Concierge</h4>
                                <p class="text-slate-400 text-sm">hello@linguaverse.com</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-6">
                            <div class="w-12 h-12 rounded-xl bg-gold-500/10 flex items-center justify-center text-gold-500 shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white font-bold mb-1">Priority Support</h4>
                                <p class="text-slate-400 text-sm">+44 (0) 20 7123 4567</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form Component -->
                <div class="glass-card p-8 md:p-12">
                    <livewire:⚡contact-form />
                </div>
            </div>
        </div>
    </section>
@endsection

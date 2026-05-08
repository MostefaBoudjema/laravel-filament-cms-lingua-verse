@extends('layouts.app')

@section('title', 'Request a Premium Quote')

@section('content')
    <section class="relative py-24 min-h-screen">
        <!-- Background elements -->
        <div class="absolute top-0 left-0 w-full h-full pointer-events-none opacity-50">
            <div class="absolute top-1/4 -left-20 w-96 h-96 bg-gold-600/5 blur-[120px] rounded-full"></div>
            <div class="absolute bottom-1/4 -right-20 w-96 h-96 bg-gold-400/5 blur-[120px] rounded-full"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <span class="text-gold-500 font-bold uppercase tracking-widest text-xs mb-4 block">Concierge Service</span>
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Quote Calculator</h1>
                <p class="text-slate-400 max-w-2xl mx-auto leading-relaxed">
                    Receive a tailored estimate for your project. Our experts analyze each request to ensure the highest standard of accuracy and value.
                </p>
            </div>

            <!-- Livewire Quote Calculator Component -->
            <livewire:⚡quote-calculator />
            
        </div>
    </section>
@endsection

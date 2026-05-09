@extends('layouts.app')

@section('title', __('Our Story & Excellence'))

@section('content')
    <!-- Brand Story Hero -->
    <section class="relative py-32 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div class="relative z-10">
                    <span class="text-gold-500 font-bold uppercase tracking-widest text-xs mb-4 block">{{ __('The LinguaVerse Legacy') }}</span>
                    <h1 class="text-4xl md:text-7xl font-bold mb-8 text-white leading-tight">
                        {{ __('Where Precision') }} <br/> {{ __('Meets') }} <span class="text-gold-400">{{ __('Culture') }}</span>
                    </h1>
                    <p class="text-slate-400 text-lg leading-relaxed mb-8">
                        {{ __("Founded on the principle that language is more than just communication—it's the foundation of global trust. We've spent a decade refining the art of translation for the world's most demanding industries.") }}
                    </p>
                    <div class="grid grid-cols-2 gap-8 py-8 border-y border-gold-500/10">
                        <div>
                            <div class="text-3xl font-bold text-white mb-1">10+</div>
                            <div class="text-xs uppercase tracking-widest text-gold-500">{{ __('Years of Mastery') }}</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-white mb-1">500+</div>
                            <div class="text-xs uppercase tracking-widest text-gold-500">{{ __('Master Linguists') }}</div>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="aspect-square rounded-2xl overflow-hidden glass-card p-2 border-gold-500/20">
                        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&q=80&w=1000" alt="Office" class="w-full h-full object-cover rounded-xl opacity-80">
                    </div>
                    <!-- Floating Badge -->
                    <div class="absolute -bottom-10 -left-10 glass-card p-8 border-gold-500/30 hidden md:block">
                        <div class="text-gold-400 font-bold text-xl mb-1">ISO 9001:2015</div>
                        <div class="text-xs text-slate-400 uppercase tracking-widest">{{ __('Certified Excellence') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="py-24 bg-navy-900/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="text-3xl md:text-5xl font-bold mb-6">{{ __('Our Core Pillars') }}</h2>
                <div class="w-24 h-1 bg-gold-500 mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div class="text-center group">
                    <div class="w-16 h-16 rounded-full bg-gold-500/10 flex items-center justify-center text-gold-500 mx-auto mb-8 group-hover:bg-gold-500 group-hover:text-navy-950 transition-all duration-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">{{ __('Absolute Accuracy') }}</h3>
                    <p class="text-slate-400 leading-relaxed">
                        {{ __('We employ a rigorous triple-verify protocol to ensure zero-error outcomes in critical documentation.') }}
                    </p>
                </div>
                <div class="text-center group">
                    <div class="w-16 h-16 rounded-full bg-gold-500/10 flex items-center justify-center text-gold-500 mx-auto mb-8 group-hover:bg-gold-500 group-hover:text-navy-950 transition-all duration-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">{{ __('Cultural Intelligence') }}</h3>
                    <p class="text-slate-400 leading-relaxed">
                        {{ __('Beyond linguistics, we translate nuances. Our experts ensure your message resonates with local sensibilities.') }}
                    </p>
                </div>
                <div class="text-center group">
                    <div class="w-16 h-16 rounded-full bg-gold-500/10 flex items-center justify-center text-gold-500 mx-auto mb-8 group-hover:bg-gold-500 group-hover:text-navy-950 transition-all duration-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-1.94A11.003 11.003 0 0012 21a11.003 11.003 0 009.193-4.97m-1.244-2.06A8.1 8.1 0 0012 13c-4.418 0-8 3.582-8 8m9-11v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5m4 0h4"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">{{ __('Unmatched Speed') }}</h3>
                    <p class="text-slate-400 leading-relaxed">
                        {{ __('Global business never sleeps. Our follow-the-sun workflow ensures your projects move forward 24/7.') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Global Presence -->
    <section class="py-24 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-5xl font-bold mb-16">{{ __('Global Network') }}</h2>
            <div class="relative glass-card p-12 bg-navy-900/50">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    @foreach(['London', 'Dubai', 'Riyadh', 'New York', 'Paris', 'Singapore', 'Berlin', 'Tokyo'] as $city)
                        <div class="flex items-center justify-center gap-2 group">
                            <span class="w-2 h-2 rounded-full bg-gold-500 animate-pulse"></span>
                            <span class="text-sm font-medium text-slate-300 group-hover:text-gold-400 transition-colors">{{ __($city) }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('title', __('Our Specialized Services'))

@section('content')
    <!-- Hero Section -->
    <section class="relative py-24 overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-gold-600/5 blur-[120px] rounded-full"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-3xl">
                <span class="text-gold-500 font-bold uppercase tracking-[0.2em] text-xs mb-4 inline-block">{{ __('Bespoke Solutions') }}</span>
                <h1 class="text-4xl md:text-6xl font-bold mb-6 text-white leading-tight">
                    {{ __('Specialized Expertise for') }} <br/>
                    <span class="text-gold-400">{{ __('Global Excellence') }}</span>
                </h1>
                <p class="text-slate-400 text-lg leading-relaxed">
                    {{ __("At LinguaVerse, we don't just translate words; we translate meaning, culture, and technical intent. Our specialized divisions ensure your content is handled by subject-matter experts.") }}
                </p>
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="py-12 pb-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($services as $service)
                    <div class="glass-card overflow-hidden group">
                        <div class="grid grid-cols-1 lg:grid-cols-5 h-full">
                            <div class="lg:col-span-2 relative overflow-hidden h-64 lg:h-auto">
                                @if($service->image)
                                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->getTranslation('title', app()->getLocale()) }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="absolute inset-0 bg-navy-800 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-gold-500/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-navy-950 to-transparent lg:hidden"></div>
                            </div>
                            <div class="lg:col-span-3 p-8 md:p-12 flex flex-col justify-center">
                                <div class="flex items-center gap-4 mb-6">
                                    <div class="w-10 h-10 rounded-lg bg-gold-500/10 flex items-center justify-center text-gold-500">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <h2 class="text-2xl font-bold text-white">{{ $service->getTranslation('title', app()->getLocale()) }}</h2>
                                </div>
                                <div class="text-slate-400 leading-relaxed mb-8">
                                    {!! $service->getTranslation('description', app()->getLocale()) !!}
                                </div>
                                
                                @if($service->getTranslation('features', app()->getLocale()))
                                    <div class="grid grid-cols-2 gap-4 mb-8">
                                        @foreach($service->getTranslation('features', app()->getLocale()) as $feature)
                                            <div class="flex items-center gap-2 text-xs font-medium text-slate-300">
                                                <span class="w-1.5 h-1.5 rounded-full bg-gold-500"></span>
                                                {{ $feature }}
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                                <a href="{{ url('/quote?service=' . $service->slug) }}" class="inline-flex items-center text-sm font-bold text-gold-400 hover:text-white transition-colors group">
                                    {{ __('Request this service') }}
                                    <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="glass-card p-12 md:p-20 text-center relative overflow-hidden border-gold-500/30">
                <div class="absolute top-0 right-0 w-64 h-64 bg-gold-500/10 blur-3xl rounded-full"></div>
                <h2 class="text-3xl md:text-5xl font-bold mb-8 relative z-10">{{ __('Ready to expand your reach?') }}</h2>
                <p class="text-slate-400 text-lg max-w-2xl mx-auto mb-12 relative z-10">
                    {{ __('Join hundreds of global organizations that trust LinguaVerse for their mission-critical communications.') }}
                </p>
                <div class="relative z-10">
                    <a href="{{ url('/quote') }}" class="btn-luxury px-12 py-5 rounded-full text-lg font-bold shadow-2xl">
                        {{ __('Request a Personalized Quote') }}
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

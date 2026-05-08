@extends('layouts.app')

@section('title', 'Excellence in Translation')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Background Glows -->
        <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
            <div class="absolute top-1/4 -left-20 w-96 h-96 bg-gold-600/10 blur-[120px] rounded-full"></div>
            <div class="absolute bottom-1/4 -right-20 w-96 h-96 bg-gold-400/10 blur-[120px] rounded-full"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <div class="hero-content">
                <span class="inline-block text-gold-500 font-bold tracking-[0.3em] uppercase text-xs mb-6 opacity-0 translate-y-4">{{ __('Defining Global Standards') }}</span>
                <h1 class="text-5xl md:text-8xl font-bold tracking-tight text-white mb-8 opacity-0 translate-y-8 leading-tight">
                    {{ __('Your Bridge to') }} <br/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-gold-300 via-gold-500 to-gold-200">{{ __('World Markets') }}</span>
                </h1>
                <p class="text-lg md:text-xl text-slate-400 max-w-2xl mx-auto mb-10 opacity-0 translate-y-8 leading-relaxed">
                    {{ __('Premium language services for the world\'s most ambitious brands.') }} 
                    {{ __('Merging technical precision with cultural elegance.') }}
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 opacity-0 translate-y-8">
                    <a href="{{ url('/quote') }}" class="btn-luxury px-10 py-4 rounded-full text-sm font-bold shadow-2xl shadow-gold-900/20">
                        {{ __('Start Your Project') }}
                    </a>
                    <a href="{{ url('/services') }}" class="px-10 py-4 rounded-full text-sm font-bold text-white border border-white/10 hover:bg-white/5 transition-all">
                        {{ __('View Services') }}
                    </a>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-slate-500">
            <span class="text-[10px] uppercase tracking-widest">{{ __('Explore') }}</span>
            <div class="w-[1px] h-12 bg-gradient-to-b from-gold-500/50 to-transparent"></div>
        </div>
    </section>

    <!-- Services Highlights -->
    <section class="py-24 bg-navy-900/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-8">
                <div>
                    <span class="text-gold-500 font-bold uppercase tracking-widest text-xs">{{ __('Specialized Solutions') }}</span>
                    <h2 class="text-4xl md:text-5xl font-bold mt-4">{{ __('Elevating Communication') }}</h2>
                </div>
                <p class="text-slate-400 max-w-md leading-relaxed">
                    {{ __('Our team of master linguists provides bespoke services tailored to the specific needs of your industry.') }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($services as $service)
                    <div class="glass-card p-8 group hover:-translate-y-2 transition-all duration-500">
                        <div class="w-12 h-12 rounded-xl bg-gold-500/10 flex items-center justify-center mb-6 text-gold-500 group-hover:bg-gold-500 group-hover:text-navy-950 transition-all duration-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold mb-4">{{ $service->getTranslation('title', app()->getLocale()) }}</h3>
                        <p class="text-slate-400 text-sm leading-relaxed mb-6">
                            {{ Str::limit(strip_tags($service->getTranslation('description', app()->getLocale())), 100) }}
                        </p>
                        <a href="{{ url('/services') }}" class="text-xs font-bold uppercase tracking-widest text-gold-500 group-hover:text-white flex items-center gap-2">
                            {{ __('Learn More') }} <span class="group-hover:translate-x-1 transition-transform">→</span>
                        </a>
                    </div>
                @empty
                    <!-- Fallback items if database is empty -->
                    @for($i = 0; $i < 4; $i++)
                        <div class="glass-card p-8">
                            <div class="w-12 h-12 rounded-xl bg-gold-500/10 mb-6"></div>
                            <div class="h-6 w-3/4 bg-slate-800 rounded mb-4"></div>
                            <div class="h-20 w-full bg-slate-800/50 rounded"></div>
                        </div>
                    @endfor
                @endforelse
            </div>
        </div>
    </section>

    <!-- Trust / Stats Section -->
    <section class="py-24 border-y border-gold-500/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-12">
                <div>
                    <div class="text-4xl md:text-5xl font-bold text-white mb-2">150+</div>
                    <div class="text-xs uppercase tracking-widest text-gold-500">{{ __('Languages') }}</div>
                </div>
                <div>
                    <div class="text-4xl md:text-5xl font-bold text-white mb-2">10k+</div>
                    <div class="text-xs uppercase tracking-widest text-gold-500">{{ __('Projects Done') }}</div>
                </div>
                <div>
                    <div class="text-4xl md:text-5xl font-bold text-white mb-2">99.9%</div>
                    <div class="text-xs uppercase tracking-widest text-gold-500">{{ __('Accuracy') }}</div>
                </div>
                <div>
                    <div class="text-4xl md:text-5xl font-bold text-white mb-2">24/7</div>
                    <div class="text-xs uppercase tracking-widest text-gold-500">{{ __('Support') }}</div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const tl = gsap.timeline();
        
        tl.to('.hero-content span', { opacity: 1, y: 0, duration: 0.8, ease: 'power4.out' })
          .to('.hero-content h1', { opacity: 1, y: 0, duration: 1, ease: 'power4.out' }, '-=0.4')
          .to('.hero-content p', { opacity: 1, y: 0, duration: 1, ease: 'power4.out' }, '-=0.6')
          .to('.hero-content div', { opacity: 1, y: 0, duration: 1, ease: 'power4.out' }, '-=0.8');
    });
</script>
@endpush

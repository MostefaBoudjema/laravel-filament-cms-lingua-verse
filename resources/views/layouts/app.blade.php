<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'LinguaVerse') | Premium Translation Services</title>
    <meta name="description" content="@yield('meta_description', 'Professional and luxury translation services for global brands.')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Scripts and Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

    @stack('styles')
</head>
<body class="bg-navy-950 text-slate-200 font-inter antialiased overflow-x-hidden">
    
    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 bg-navy-950/80 backdrop-blur-md border-b border-gold-500/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="{{ url('/') }}" class="flex-shrink-0 flex items-center gap-2">
                        <span class="text-2xl font-bold tracking-tighter text-gold-400">LINGUAVERSE</span>
                    </a>
                </div>
                
                <div class="hidden md:flex items-center space-x-8 rtl:space-x-reverse">
                    <a href="{{ url('/') }}" class="text-sm font-medium hover:text-gold-400 transition-colors">Home</a>
                    <a href="{{ url('/about') }}" class="text-sm font-medium hover:text-gold-400 transition-colors">About</a>
                    <a href="{{ url('/services') }}" class="text-sm font-medium hover:text-gold-400 transition-colors">Services</a>
                    <a href="{{ url('/blog') }}" class="text-sm font-medium hover:text-gold-400 transition-colors">Insights</a>
                    <a href="{{ url('/contact') }}" class="text-sm font-medium hover:text-gold-400 transition-colors">Contact</a>
                    
                    <!-- Language Switcher -->
                    <div class="flex items-center gap-2 border-l border-white/10 pl-8 rtl:border-l-0 rtl:pl-0 rtl:border-r rtl:pr-8">
                        @if(app()->getLocale() == 'en')
                            <a href="{{ url('/locale/ar') }}" class="text-xs font-bold text-gold-500 hover:text-white transition-all uppercase tracking-widest">العربية</a>
                        @else
                            <a href="{{ url('/locale/en') }}" class="text-xs font-bold text-gold-500 hover:text-white transition-all uppercase tracking-widest">English</a>
                        @endif
                    </div>

                    <a href="{{ url('/quote') }}" class="btn-luxury px-6 py-2 rounded-full text-sm font-bold">
                        Get a Quote
                    </a>
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button class="text-slate-200 hover:text-gold-400">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-20">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-black border-t border-gold-500/10 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div class="col-span-1 md:col-span-2">
                    <span class="text-3xl font-bold text-gold-400">LINGUAVERSE</span>
                    <p class="mt-4 text-slate-400 max-w-sm leading-relaxed">
                        Redefining global communication through premium translation services. 
                        Precision, luxury, and cultural excellence in every word.
                    </p>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-6">Quick Links</h4>
                    <ul class="space-y-4 text-sm text-slate-400">
                        <li><a href="#" class="hover:text-gold-400 transition-colors">Our Story</a></li>
                        <li><a href="#" class="hover:text-gold-400 transition-colors">Specialized Services</a></li>
                        <li><a href="#" class="hover:text-gold-400 transition-colors">Global Network</a></li>
                        <li><a href="#" class="hover:text-gold-400 transition-colors">Terms of Service</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-6">Contact Us</h4>
                    <ul class="space-y-4 text-sm text-slate-400">
                        <li>London, UK | Dubai, UAE</li>
                        <li>concierge@linguaverse.com</li>
                        <li>+44 (0) 20 7123 4567</li>
                    </ul>
                </div>
            </div>
            <div class="mt-16 pt-8 border-t border-white/5 text-center text-xs text-slate-500 uppercase tracking-widest">
                &copy; {{ date('Y') }} LinguaVerse Excellence. All Rights Reserved.
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>

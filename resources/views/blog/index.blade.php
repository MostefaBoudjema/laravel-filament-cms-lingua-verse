@extends('layouts.app')

@section('title', 'Global Insights & Linguistic Excellence')

@section('content')
    <section class="relative py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mb-16">
                <span class="text-gold-500 font-bold uppercase tracking-widest text-xs mb-4 block">LinguaVerse Insights</span>
                <h1 class="text-4xl md:text-6xl font-bold mb-6 text-white">Thought <span class="text-gold-400">Leadership</span></h1>
                <p class="text-slate-400 text-lg leading-relaxed">
                    Exploring the intersection of language, technology, and global business. Discover our latest perspectives on cultural intelligence and technical precision.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts as $post)
                    <article class="glass-card group overflow-hidden flex flex-col h-full">
                        <div class="aspect-video relative overflow-hidden">
                            @if($post->featured_image)
                                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->getTranslation('title', app()->getLocale()) }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="absolute inset-0 bg-navy-800 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-gold-500/10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                                </div>
                            @endif
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-gold-500 text-navy-950 text-[10px] font-bold uppercase tracking-widest rounded-full">
                                    {{ $post->category->getTranslation('name', app()->getLocale()) }}
                                </span>
                            </div>
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <div class="text-[10px] uppercase tracking-[0.2em] text-gold-500 font-bold mb-3">
                                {{ $post->published_at->format('M d, Y') }}
                            </div>
                            <h3 class="text-xl font-bold mb-4 text-white group-hover:text-gold-400 transition-colors">
                                <a href="{{ route('blog.post', $post->slug) }}">{{ $post->getTranslation('title', app()->getLocale()) }}</a>
                            </h3>
                            <p class="text-slate-400 text-sm leading-relaxed mb-8 flex-grow">
                                {{ Str::limit(strip_tags($post->getTranslation('body', app()->getLocale())), 120) }}
                            </p>
                            <a href="{{ route('blog.post', $post->slug) }}" class="inline-flex items-center text-xs font-bold uppercase tracking-widest text-gold-500 group-hover:text-white transition-all">
                                Read Insight <span class="ml-2 group-hover:translate-x-1 transition-transform">→</span>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-20">
                {{ $posts->links() }}
            </div>
        </div>
    </section>
@endsection

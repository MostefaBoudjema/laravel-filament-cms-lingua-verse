@extends('layouts.app')

@section('title', $post->getTranslation('title', app()->getLocale()))

@section('content')
    <article class="relative py-24">
        <!-- Post Header -->
        <header class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-16">
            <div class="flex items-center justify-center gap-4 mb-6">
                <span class="px-4 py-1 border border-gold-500/30 text-gold-500 text-[10px] font-bold uppercase tracking-widest rounded-full">
                    {{ $post->category->getTranslation('name', app()->getLocale()) }}
                </span>
                <span class="text-slate-500 text-[10px] uppercase tracking-widest">
                    {{ $post->published_at->format('M d, Y') }}
                </span>
            </div>
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-8 leading-tight">
                {{ $post->getTranslation('title', app()->getLocale()) }}
            </h1>
            <div class="flex items-center justify-center gap-4">
                <div class="w-10 h-10 rounded-full bg-gold-500/10 flex items-center justify-center text-gold-500 font-bold text-xs">
                    {{ substr($post->author->name, 0, 1) }}
                </div>
                <div class="text-left">
                    <div class="text-white font-bold text-sm">{{ $post->author->name }}</div>
                    <div class="text-slate-500 text-[10px] uppercase tracking-widest">Global Insights Editor</div>
                </div>
            </div>
        </header>

        <!-- Featured Image -->
        @if($post->featured_image)
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
                <div class="aspect-[21/9] rounded-3xl overflow-hidden glass-card p-2 border-gold-500/10">
                    <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->getTranslation('title', app()->getLocale()) }}" class="w-full h-full object-cover rounded-2xl">
                </div>
            </div>
        @endif

        <!-- Post Content -->
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="prose prose-invert prose-gold max-w-none prose-lg leading-relaxed text-slate-300">
                {!! $post->getTranslation('body', app()->getLocale()) !!}
            </div>

            <!-- Tags -->
            @if($post->tags->count() > 0)
                <div class="mt-16 pt-8 border-t border-white/5">
                    <div class="flex flex-wrap gap-2">
                        @foreach($post->tags as $tag)
                            <span class="px-3 py-1 bg-navy-900 border border-white/10 rounded-lg text-xs text-slate-400">
                                #{{ $tag->getTranslation('name', app()->getLocale()) }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Back to Blog -->
            <div class="mt-16 text-center">
                <a href="{{ route('blog') }}" class="inline-flex items-center text-xs font-bold uppercase tracking-widest text-gold-500 hover:text-white transition-all">
                    ← Back to all insights
                </a>
            </div>
        </div>
    </article>

    <!-- Recommended Posts -->
    <section class="py-24 bg-navy-900/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold mb-12">Continue Reading</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-left">
                <!-- We could query similar posts here -->
            </div>
        </div>
    </section>
@endsection

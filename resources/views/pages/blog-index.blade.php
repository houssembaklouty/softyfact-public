@extends('app')

@section('meta')
<title>{{ __('blog') }} — {{ $productName }} | {{ __('blogMetaTitle') }}</title>
<meta name="description" content="{{ __('blogMetaDesc') }}" />
<meta name="keywords" content="blog facturation tunisie, conseils comptabilité tunisie, logiciel facturation, TVA FODEC TEJ tunisie" />
<link rel="canonical" href="https://softyfact.tn/blog" />
<meta name="robots" content="index, follow" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{ __('blog') }} — {{ $productName }}" />
<meta property="og:description" content="{{ __('blogMetaDesc') }}" />
<meta property="og:url" content="https://softyfact.tn/blog" />
<meta property="og:site_name" content="{{ $productName }}" />
<meta property="og:locale" content="fr_TN" />
@endsection

@section('jsonld')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Blog',
    'name' => __('blog') . ' — ' . $productName,
    'description' => __('blogMetaDesc'),
    'url' => 'https://softyfact.tn/blog',
    'publisher' => [
        '@type' => 'Organization',
        'name' => $productName,
        'url' => 'https://softyfact.tn',
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
@endsection

@section('body')
<div class="min-h-screen bg-cm-surface font-sans text-cm-on-surface antialiased">
    @include('partials._navbar-main')

    {{-- Hero --}}
    <section class="bg-gradient-to-br from-cm-primary/5 via-white to-blue-50 py-16 md:py-20">
        <div class="max-w-7xl mx-auto px-6 md:px-8 text-center">
            <div class="inline-flex items-center gap-2 bg-cm-primary/10 px-4 py-1.5 rounded-full mb-4">
                <svg class="w-4 h-4 text-cm-primary" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.331 0 4.472.89 6.072 2.354M12 6.042a8.967 8.967 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.354M12 6.042V20.354"/></svg>
                <span class="text-xs font-bold text-cm-primary tracking-widest uppercase">{{ __('blog') }}</span>
            </div>
            <h1 class="font-headline font-extrabold text-3xl md:text-5xl text-cm-on-background mb-3">{{ __('blogTitle') }}</h1>
            <p class="text-lg text-cm-secondary max-w-2xl mx-auto">{{ __('blogSubtitle') }}</p>
        </div>
    </section>

    {{-- Posts Grid --}}
    <section class="max-w-7xl mx-auto px-6 md:px-8 py-12 md:py-16">
        @if($posts->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
            <article class="group bg-white rounded-2xl shadow-sm border border-cm-outline-variant/10 overflow-hidden hover:shadow-lg transition-shadow duration-300">
                {{-- Cover --}}
                @php $meta = $post->getCoverMeta(); @endphp
                <a href="/blog/{{ $post->slug }}" class="block overflow-hidden aspect-[16/9]">
                    <div class="w-full h-full flex flex-col items-center justify-center p-6 text-white relative group-hover:scale-[1.02] transition-transform duration-300"
                         style="background: linear-gradient(135deg, {{ $meta['from'] }}, {{ $meta['to'] }});">
                        <span class="material-symbols-rounded text-7xl opacity-15 absolute top-3 right-3">{{ $meta['icon'] }}</span>
                        <span class="material-symbols-rounded text-4xl mb-3 drop-shadow-md">{{ $meta['icon'] }}</span>
                        <p class="font-headline font-bold text-center text-sm md:text-base leading-snug line-clamp-3 px-3 drop-shadow-sm">{{ $post->getTitle() }}</p>
                        <span class="absolute bottom-3 left-4 text-[10px] opacity-50 font-semibold tracking-wider uppercase">SoftyFact</span>
                    </div>
                </a>

                <div class="p-5 md:p-6">
                    {{-- Meta --}}
                    <div class="flex items-center gap-3 text-xs text-cm-secondary mb-3">
                        <time datetime="{{ $post->published_at->toDateString() }}">
                            {{ $post->published_at->translatedFormat('d M Y') }}
                        </time>
                        <span class="w-1 h-1 rounded-full bg-cm-outline"></span>
                        <span>{{ $post->reading_time }} {{ __('minRead') }}</span>
                    </div>

                    {{-- Title --}}
                    <h2 class="font-headline font-bold text-lg text-cm-on-background mb-2 group-hover:text-cm-primary transition-colors">
                        <a href="/blog/{{ $post->slug }}">{{ $post->getTitle() }}</a>
                    </h2>

                    {{-- Excerpt --}}
                    <p class="text-sm text-cm-secondary leading-relaxed mb-4 line-clamp-3">{{ $post->getExcerpt() }}</p>

                    {{-- Read more --}}
                    <a href="/blog/{{ $post->slug }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-cm-primary hover:gap-2.5 transition-all">
                        {{ __('readMore') }}
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                    </a>
                </div>
            </article>
            @endforeach
        </div>

        {{-- Pagination --}}
        @if($posts->hasPages())
        <div class="mt-12 flex justify-center">
            {{ $posts->links() }}
        </div>
        @endif
        @else
        <p class="text-center text-cm-secondary py-12">{{ __('noPosts') }}</p>
        @endif
    </section>

    {{-- CTA Banner --}}
    <section class="max-w-7xl mx-auto px-6 md:px-8 pb-16">
        <div class="bg-cm-inverse-surface rounded-3xl p-8 md:p-12 text-center relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(circle_at_30%_50%,rgba(0,107,89,0.15),transparent)]"></div>
            <div class="relative z-10">
                <h2 class="font-headline font-extrabold text-2xl md:text-3xl text-white mb-3">{{ __('readyTitle') }}</h2>
                <p class="text-cm-inverse-on-surface/70 mb-6 max-w-xl mx-auto">{{ __('readySubtitle') }}</p>
                <a href="/product/offline" class="inline-block px-8 py-3 bg-white text-cm-primary font-bold rounded-xl hover:scale-[1.02] active:scale-95 transition-all shadow-lg">
                    {{ __('orderNow') }}
                </a>
            </div>
        </div>
    </section>

    @include('partials._footer-full')
</div>
@endsection

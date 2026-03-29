@extends('app')

@section('meta')
<title>{{ $post->getTitle() }} — {{ $productName }}</title>
<meta name="description" content="{{ $post->getMetaDescription() }}" />
@if($post->meta_keywords)
<meta name="keywords" content="{{ $post->meta_keywords }}" />
@endif
<link rel="canonical" href="https://softyfact.tn/blog/{{ $post->slug }}" />
<meta name="robots" content="index, follow" />
<meta name="author" content="{{ $productName }}" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $post->getTitle() }}" />
<meta property="og:description" content="{{ $post->getMetaDescription() }}" />
<meta property="og:url" content="https://softyfact.tn/blog/{{ $post->slug }}" />
<meta property="og:site_name" content="{{ $productName }}" />
<meta property="og:locale" content="fr_TN" />
@if($post->cover_image)
<meta property="og:image" content="https://softyfact.tn{{ $post->cover_image }}" />
@endif
<meta property="article:published_time" content="{{ $post->published_at->toIso8601String() }}" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $post->getTitle() }}" />
<meta name="twitter:description" content="{{ $post->getMetaDescription() }}" />
@if($post->cover_image)
<meta name="twitter:image" content="https://softyfact.tn{{ $post->cover_image }}" />
@else
<meta name="twitter:image" content="https://softyfact.tn/softy-fact%20(solution%20de%20facturation%20en%20tunisie).png" />
@endif
@endsection

@section('jsonld')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Article',
    'headline' => $post->getTitle(),
    'description' => $post->getMetaDescription(),
    'url' => 'https://softyfact.tn/blog/' . $post->slug,
    'datePublished' => $post->published_at->toIso8601String(),
    'dateModified' => $post->updated_at->toIso8601String(),
    'author' => [
        '@type' => 'Organization',
        'name' => $productName,
        'url' => 'https://softyfact.tn',
    ],
    'publisher' => [
        '@type' => 'Organization',
        'name' => $productName,
        'url' => 'https://softyfact.tn',
        'logo' => [
            '@type' => 'ImageObject',
            'url' => 'https://softyfact.tn/logo.png',
        ],
    ],
    'mainEntityOfPage' => [
        '@type' => 'WebPage',
        '@id' => 'https://softyfact.tn/blog/' . $post->slug,
    ],
    'image' => $post->cover_image ? 'https://softyfact.tn' . $post->cover_image : null,
    'wordCount' => str_word_count(strip_tags($post->getBody())),
    'articleSection' => 'Facturation & Gestion',
    'inLanguage' => app()->getLocale() === 'ar' ? 'ar' : 'fr',
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
@endsection

@section('body')
<div class="min-h-screen bg-white font-sans text-cm-on-surface antialiased">
    @include('partials._navbar-simple')
    <div class="h-16"></div>

    {{-- Breadcrumb --}}
    <nav class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pt-6" aria-label="Breadcrumb">
        <ol class="flex items-center gap-2 text-sm text-cm-secondary">
            <li><a href="/" class="hover:text-cm-primary transition">{{ __('home') }}</a></li>
            <li><svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z"/></svg></li>
            <li><a href="/blog" class="hover:text-cm-primary transition">{{ __('blog') }}</a></li>
            <li><svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z"/></svg></li>
            <li class="text-cm-on-background font-medium truncate max-w-xs">{{ $post->getTitle() }}</li>
        </ol>
    </nav>

    <article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">

        {{-- Header --}}
        <header class="mb-8 md:mb-10">
            <h1 class="font-headline font-extrabold text-2xl sm:text-3xl md:text-4xl text-cm-on-background leading-tight mb-4">
                {{ $post->getTitle() }}
            </h1>
            <div class="flex flex-wrap items-center gap-4 text-sm text-cm-secondary">
                <div class="flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/></svg>
                    <time datetime="{{ $post->published_at->toDateString() }}">{{ $post->published_at->translatedFormat('d F Y') }}</time>
                </div>
                <div class="flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>{{ $post->reading_time }} {{ __('minRead') }}</span>
                </div>
                <div class="flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                    <span>{{ $productName }}</span>
                </div>
                {{-- Language toggle --}}
                @php $otherLocale = app()->getLocale() === 'fr' ? 'ar' : 'fr'; @endphp
                <a href="{{ route('locale.switch', ['locale' => $otherLocale]) }}"
                   class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-cm-primary/10 text-cm-primary font-semibold text-xs hover:bg-cm-primary/20 transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m10.5 21 5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 0 1 6-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 0 1-3.827-5.802"/></svg>
                    {{ $otherLocale === 'ar' ? 'اقرأ بالعربية' : 'Lire en français' }}
                </a>
            </div>
        </header>

        {{-- Cover --}}
        @php $meta = $post->getCoverMeta(); @endphp
        <div class="rounded-2xl overflow-hidden shadow-lg mb-8 md:mb-10">
            @if($post->cover_image)
            <img src="{{ $post->cover_image }}" alt="{{ $post->getTitle() }}" class="w-full aspect-[21/9] object-cover" fetchpriority="high">
            @else
            <div class="w-full aspect-[21/9] flex items-center justify-center text-white relative"
                 style="background: linear-gradient(135deg, {{ $meta['from'] }}, {{ $meta['to'] }});">
                <span class="material-symbols-rounded text-[120px] md:text-[160px] opacity-10 absolute">{{ $meta['icon'] }}</span>
                <span class="material-symbols-rounded text-5xl md:text-6xl drop-shadow-lg relative z-10">{{ $meta['icon'] }}</span>
                <span class="absolute bottom-4 right-5 text-xs opacity-40 font-semibold tracking-wider uppercase">SoftyFact</span>
            </div>
            @endif
        </div>

        {{-- Article body --}}
        <div dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}" class="
            prose prose-lg max-w-none
            prose-headings:font-headline prose-headings:font-bold prose-headings:text-cm-on-background
            prose-h2:text-xl prose-h2:sm:text-2xl prose-h2:mt-10 prose-h2:mb-4 prose-h2:pb-2 prose-h2:border-b prose-h2:border-cm-outline-variant/20
            prose-h3:text-lg prose-h3:sm:text-xl prose-h3:mt-8 prose-h3:mb-3
            prose-p:text-cm-on-surface/85 prose-p:leading-[1.85] prose-p:text-base prose-p:sm:text-lg prose-p:mb-5
            prose-a:text-cm-primary prose-a:font-semibold prose-a:underline prose-a:underline-offset-2 prose-a:decoration-cm-primary/30 hover:prose-a:decoration-cm-primary
            prose-strong:text-cm-on-background prose-strong:font-bold
            prose-li:text-cm-on-surface/85 prose-li:leading-relaxed prose-li:my-1.5
            prose-ul:my-5 prose-ul:space-y-1
            prose-ol:my-5 prose-ol:space-y-1
            prose-img:rounded-2xl prose-img:shadow-lg
            prose-table:border-collapse prose-table:w-full
            prose-th:bg-cm-surface-container prose-th:px-4 prose-th:py-3 prose-th:text-sm prose-th:font-bold prose-th:text-cm-on-background
            prose-td:px-4 prose-td:py-3 prose-td:text-sm prose-td:border-b prose-td:border-cm-outline-variant/20
        ">
            {!! $post->getBody() !!}
        </div>

        {{-- CTA in article --}}
        <div class="mt-12 bg-gradient-to-r from-cm-primary/5 to-blue-50 border border-cm-primary/10 rounded-2xl p-6 md:p-8">
            <div class="flex flex-col md:flex-row items-center gap-6">
                <div class="flex-1">
                    <h3 class="font-headline font-bold text-lg text-cm-on-background mb-2">{{ __('blogCta') }}</h3>
                    <p class="text-sm text-cm-secondary">{{ __('blogCtaSub') }}</p>
                </div>
                <a href="/product/offline" class="shrink-0 px-6 py-3 bg-cm-primary text-cm-on-primary font-bold rounded-xl hover:scale-[1.02] active:scale-95 transition-all shadow-lg shadow-[#006B59]/20">
                    {{ __('orderNow') }}
                </a>
            </div>
        </div>

        {{-- Back to blog --}}
        <div class="mt-8">
            <a href="/blog" class="inline-flex items-center gap-2 text-sm font-semibold text-cm-primary hover:gap-3 transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg>
                {{ __('backToBlog') }}
            </a>
        </div>
    </article>

    {{-- Related Posts --}}
    @if($related->count())
    <section class="bg-slate-50 py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-6 md:px-8">
            <h2 class="font-headline font-bold text-xl md:text-2xl text-cm-on-background mb-8 text-center">{{ __('relatedPosts') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($related as $rel)
                <article class="group bg-white rounded-2xl shadow-sm border border-cm-outline-variant/10 overflow-hidden hover:shadow-lg transition-shadow">
                    @php $relMeta = $rel->getCoverMeta(); @endphp
                    <a href="/blog/{{ $rel->slug }}" class="block overflow-hidden aspect-[16/9]">
                        @if($rel->cover_image)
                        <img src="{{ $rel->cover_image }}" alt="{{ $rel->getTitle() }}" class="w-full h-full object-cover group-hover:scale-[1.02] transition-transform duration-300" loading="lazy">
                        @else
                        <div class="w-full h-full flex flex-col items-center justify-center p-5 text-white relative group-hover:scale-[1.02] transition-transform duration-300"
                             style="background: linear-gradient(135deg, {{ $relMeta['from'] }}, {{ $relMeta['to'] }});">
                            <span class="material-symbols-rounded text-6xl opacity-15 absolute top-2 right-2">{{ $relMeta['icon'] }}</span>
                            <span class="material-symbols-rounded text-3xl mb-2 drop-shadow-md">{{ $relMeta['icon'] }}</span>
                            <p class="font-headline font-bold text-center text-xs leading-snug line-clamp-2 px-2 drop-shadow-sm">{{ $rel->getTitle() }}</p>
                        </div>
                        @endif
                    </a>
                    <div class="p-5">
                        <div class="flex items-center gap-3 text-xs text-cm-secondary mb-2">
                            <time datetime="{{ $rel->published_at->toDateString() }}">{{ $rel->published_at->translatedFormat('d M Y') }}</time>
                            <span class="w-1 h-1 rounded-full bg-cm-outline"></span>
                            <span>{{ $rel->reading_time }} {{ __('minRead') }}</span>
                        </div>
                        <h3 class="font-bold text-base text-cm-on-background group-hover:text-cm-primary transition-colors">
                            <a href="/blog/{{ $rel->slug }}">{{ $rel->getTitle() }}</a>
                        </h3>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @include('partials._footer-full')
</div>
@endsection

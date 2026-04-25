@extends('app')

@section('meta')
                <title>{{ $productName }} — {{ __('heroHighlight') }} | {{ __('heroSubtitle') }}</title>
    <meta name="description" content="Logiciel de facturation et gestion commerciale en ligne conçu pour le marché tunisien. Gérez vos ventes, stocks et fiscalité tunisienne. Accessible partout, sans installation." />
    <meta name="keywords" content="logiciel facturation tunisie, gestion commerciale tunisie, facture tunisie, devis, gestion stock tunisie, trésorerie, FODEC, TVA, TEJ, retenue à la source, ERP tunisien, facturation cloud" />
    <link rel="canonical" href="https://softyfact.tn" />
    <meta name="robots" content="index, follow" />
    <meta name="author" content="{{ $productName }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $productName }} — Simplifiez votre Facturation" />
    <meta property="og:description" content="Gérez vos ventes, stocks et fiscalité tunisienne sans abonnement. Le choix de 100+ PME en Tunisie." />
    <meta property="og:url" content="https://softyfact.tn" />
    <meta property="og:site_name" content="{{ $productName }}" />
    <meta property="og:locale" content="fr_TN" />
    <meta property="og:image" content="https://softyfact.tn/softy-fact%20(solution%20de%20facturation%20en%20tunisie).png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $productName }} — Simplifiez votre Facturation" />
    <meta name="twitter:description" content="Gérez vos ventes, stocks et fiscalité tunisienne sans abonnement. Le choix de 100+ PME en Tunisie." />
    <meta name="twitter:image" content="https://softyfact.tn/softy-fact%20(solution%20de%20facturation%20en%20tunisie).png" />
@endsection

@section('jsonld')
<script type="application/ld+json">
[{
    "@context": "https://schema.org",
    "@type": "SoftwareApplication",
    "name": "{{ $productName }}",
    "applicationCategory": "BusinessApplication",
    "operatingSystem": "Windows, macOS, Linux, Web",
    "description": "Logiciel de facturation et de gestion commerciale conçu pour le marché tunisien.",
    "offers": { "@type": "Offer", "price": "{{ $pagePrice }}", "priceCurrency": "TND", "availability": "https://schema.org/InStock" },
    "aggregateRating": { "@type": "AggregateRating", "ratingValue": "4.9", "ratingCount": "500" }
},{
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "{{ $productName }}",
    "url": "https://softyfact.tn",
    "logo": "https://softyfact.tn/favicon/apple-touch-icon.png",
    "contactPoint": { "@type": "ContactPoint", "telephone": "+216-{{ $supportPhone }}", "contactType": "sales", "availableLanguage": ["French","Arabic"], "areaServed": "TN" },
    "sameAs": []
},{
    "@context": "https://schema.org",
    "@type": "WebSite",
    "name": "{{ $productName }}",
    "url": "https://softyfact.tn",
    "inLanguage": ["fr", "ar"],
    "potentialAction": {
        "@type": "SearchAction",
        "target": "https://softyfact.tn/blog?q={search_term_string}",
        "query-input": "required name=search_term_string"
    }
}]
</script>
@endsection

@section('body')
<div class="min-h-screen bg-cm-surface font-sans text-cm-on-surface antialiased" x-data="{ showOrderModal: false }">

    @include('partials._navbar-main')

    <main>
        {{-- ═══════════════ HERO SECTION ═══════════════ --}}
        <section class="relative px-6 md:px-8 py-12 md:py-24 max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-12 md:gap-16">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(0,193,163,0.08)_0%,transparent_70%)]" aria-hidden="true"></div>

            <div class="flex-1 w-full order-2 md:order-1 relative z-10">
                <div class="relative group">
                    <div class="absolute -inset-4 bg-cm-primary/10 rounded-full blur-3xl opacity-50" aria-hidden="true"></div>
                    <picture>
                        <source srcset="/softy-fact%20(solution%20de%20facturation%20en%20tunisie).webp" type="image/webp">
                        <img alt="{{ $productName }} — capture produit" class="relative w-full h-auto drop-shadow-2xl transition-transform duration-500 group-hover:scale-[1.02] rounded-2xl" src="/softy-fact%20(solution%20de%20facturation%20en%20tunisie).png" width="480" height="520" fetchpriority="high" />
                    </picture>
                </div>
            </div>

            <div class="flex-1 space-y-6 md:space-y-8 order-1 md:order-2 relative z-10">
                @if(($abVariant ?? 'A') === 'B')
                <div class="inline-flex items-center gap-2 bg-cm-primary/10 text-cm-primary px-4 py-2 rounded-full border border-cm-primary/20">
                    <span class="text-xs font-black uppercase tracking-widest">{{ __('limitedOfferB') }}</span>
                </div>
                @else
                <div class="inline-flex items-center gap-2 bg-cm-error-container text-cm-error px-4 py-2 rounded-full border border-cm-error/10">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 000-1.5h-3.75V6z" clip-rule="evenodd"/></svg>
                    <span class="text-xs font-black uppercase tracking-widest">{{ __('limitedOffer') }}</span>
                </div>
                @endif

                <h1 class="font-headline font-extrabold text-4xl md:text-5xl lg:text-7xl leading-[1.1] tracking-tight text-cm-on-background">
                    @if(($abVariant ?? 'A') === 'B')
                        {!! __('heroTitleB', ['highlight' => '<span class="bg-gradient-to-r from-cm-primary to-cm-primary-container bg-clip-text text-transparent">' . e(__('heroHighlightB')) . '</span>']) !!}
                    @else
                        {!! __('heroTitle', ['highlight' => '<span class="bg-gradient-to-r from-cm-primary to-cm-primary-container bg-clip-text text-transparent">' . e(__('heroHighlight')) . '</span>']) !!}
                    @endif
                </h1>

                <p class="text-lg md:text-xl text-cm-secondary leading-relaxed font-medium">
                    {{ ($abVariant ?? 'A') === 'B' ? __('heroSubtitleB') : __('heroSubtitle') }}
                </p>

                {{-- Pricing card --}}
                <div class="bg-white p-6 md:p-8 rounded-3xl shadow-xl border border-cm-outline-variant/10 space-y-6">
                    <div>
                        <div class="flex items-baseline gap-3">
                            <span class="text-5xl md:text-6xl font-black text-cm-primary">{{ $pagePrice }}</span>
                            <span class="text-xl md:text-2xl font-bold text-cm-secondary">DT</span>
                        </div>
                        <p class="text-xs text-cm-secondary mt-1">{{ __('oneTimePayment') }}</p>
                    </div>

                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @foreach([__('desktopOrCloud'), __('localSupport'), __('proUpdates'), __('fullCompliance')] as $item)
                        <li class="flex items-center gap-2 text-sm font-bold text-cm-on-surface-variant">
                            <svg class="w-5 h-5 text-cm-primary shrink-0" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd"/></svg>
                            {{ $item }}
                        </li>
                        @endforeach
                    </ul>

                    <a href="/product/buyonepay" class="btn-cta-shine block w-full text-center bg-cm-primary text-cm-on-primary py-4 md:py-5 rounded-2xl font-black text-lg md:text-xl hover:scale-[1.02] active:scale-95 transition-all shadow-xl shadow-[#006B59]/30 uppercase tracking-tight cursor-pointer">
                        {{ ($abVariant ?? 'A') === 'B' ? __('orderNowB') : __('orderNow') }}
                    </a>

                    <p class="text-center text-xs font-bold text-cm-outline uppercase tracking-tighter italic">
                        {{ $pagePrice }} DT — {{ __('oneTimePayment') }}
                    </p>
                </div>
            </div>
        </section>

        {{-- ═══════════════ TRUST BAR ═══════════════ --}}
        <section class="bg-cm-surface-container-low py-10 md:py-14" aria-label="{{ __('trustLabel') }}">
            <div class="max-w-7xl mx-auto px-6 md:px-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8 text-center">
                    <div class="space-y-1"><p class="text-3xl md:text-4xl font-black text-cm-primary">+100</p><p class="text-sm md:text-base font-semibold text-cm-on-background/70">{{ __('trustSME') }}</p></div>
                    <div class="space-y-1"><p class="text-3xl md:text-4xl font-black text-cm-primary">+1000</p><p class="text-sm md:text-base font-semibold text-cm-on-background/70">{{ __('trustInvoices') }}</p></div>
                    <div class="space-y-1"><p class="text-3xl md:text-4xl font-black text-cm-primary">99.9%</p><p class="text-sm md:text-base font-semibold text-cm-on-background/70">{{ __('trustUptime') }}</p></div>
                    <div class="space-y-1"><p class="text-3xl md:text-4xl font-black text-cm-primary">24/7</p><p class="text-sm md:text-base font-semibold text-cm-on-background/70">{{ __('trustSupport') }}</p></div>
                </div>
            </div>
        </section>

        {{-- ═══════════════ PROBLEM / SOLUTION ═══════════════ --}}
        <section class="py-16 md:py-24 px-6 md:px-8 max-w-7xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 md:gap-16 items-center">
                <div class="space-y-6 md:space-y-8">
                    <h2 class="font-headline font-extrabold text-3xl md:text-4xl lg:text-5xl text-cm-on-background leading-tight">{{ __('problemTitle') }}</h2>
                    <div class="space-y-6">
                        <div class="flex gap-4 md:gap-6 p-5 md:p-6 rounded-2xl bg-cm-error/5 border border-cm-error/10">
                            <svg class="w-8 h-8 md:w-10 md:h-10 text-cm-error shrink-0" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M6.72 5.66l11.62 11.62A8.25 8.25 0 006.72 5.66zm12.68 10.56L7.78 4.6A8.25 8.25 0 0119.4 16.22zM12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25z" clip-rule="evenodd"/></svg>
                            <div>
                                <h4 class="font-bold text-lg md:text-xl mb-1 text-cm-on-background">{{ __('oldMethod') }}</h4>
                                <p class="text-cm-secondary text-sm md:text-base">{{ __('oldMethodDesc') }}</p>
                            </div>
                        </div>
                        <div class="flex gap-4 md:gap-6 p-5 md:p-6 rounded-2xl bg-cm-primary/5 border border-cm-primary/20">
                            <svg class="w-8 h-8 md:w-10 md:h-10 text-cm-primary shrink-0" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M9 4.5a.75.75 0 01.721.544l.813 2.846a3.75 3.75 0 002.576 2.576l2.846.813a.75.75 0 010 1.442l-2.846.813a3.75 3.75 0 00-2.576 2.576l-.813 2.846a.75.75 0 01-1.442 0l-.813-2.846a3.75 3.75 0 00-2.576-2.576l-2.846-.813a.75.75 0 010-1.442l2.846-.813A3.75 3.75 0 007.466 7.89l.813-2.846A.75.75 0 019 4.5zM18 1.5a.75.75 0 01.728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 010 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 01-1.456 0l-.258-1.036a2.625 2.625 0 00-1.91-1.91l-1.036-.258a.75.75 0 010-1.456l1.036-.258a2.625 2.625 0 001.91-1.91l.258-1.036A.75.75 0 0118 1.5z" clip-rule="evenodd"/></svg>
                            <div>
                                <h4 class="font-bold text-lg md:text-xl mb-1 text-cm-on-background">{{ __('solutionTitle', ['name' => $productName]) }}</h4>
                                <p class="text-cm-secondary text-sm md:text-base">{{ __('solutionDesc') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Invoice mockup --}}
                <div class="relative">
                    <div class="bg-cm-primary/10 absolute inset-0 blur-3xl rounded-full" aria-hidden="true"></div>
                    <div class="relative bg-white rounded-3xl shadow-2xl border border-cm-outline-variant/20 p-6 md:p-8 space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-cm-primary flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                                </div>
                                <div><p class="font-bold text-cm-on-background text-sm">Facture #2026-0142</p><p class="text-xs text-cm-outline">23 Mars 2026</p></div>
                            </div>
                            <span class="bg-cm-primary-container/20 text-cm-primary text-xs font-bold px-3 py-1 rounded-full">{{ __('invoicePaid') }}</span>
                        </div>
                        <div class="border-t border-cm-outline-variant/20 pt-4 space-y-2">
                            <div class="flex justify-between text-sm"><span class="text-cm-secondary">Produit A × 5</span><span class="font-medium text-cm-on-surface">250.000 TND</span></div>
                            <div class="flex justify-between text-sm"><span class="text-cm-secondary">Produit B × 3</span><span class="font-medium text-cm-on-surface">180.000 TND</span></div>
                            <div class="flex justify-between text-sm"><span class="text-cm-secondary">Service C</span><span class="font-medium text-cm-on-surface">120.000 TND</span></div>
                        </div>
                        <div class="border-t border-cm-outline-variant/20 pt-4 space-y-1">
                            <div class="flex justify-between text-sm"><span class="text-cm-secondary">{{ __('subtotalHT') }}</span><span class="font-medium">550.000 TND</span></div>
                            <div class="flex justify-between text-sm"><span class="text-cm-secondary">TVA 19%</span><span class="font-medium">104.500 TND</span></div>
                            <div class="flex justify-between text-sm"><span class="text-cm-secondary">FODEC 1%</span><span class="font-medium">5.500 TND</span></div>
                            <div class="flex justify-between text-sm"><span class="text-cm-secondary">{{ __('stampDuty') }}</span><span class="font-medium">1.000 TND</span></div>
                            <div class="flex justify-between text-base font-bold pt-2 border-t border-cm-outline-variant/20"><span class="text-cm-on-background">{{ __('totalTTC') }}</span><span class="text-cm-primary">661.000 TND</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ═══════════════ FISCAL FEATURES (DARK) ═══════════════ --}}
        <section id="features" class="py-16 md:py-24 bg-cm-inverse-surface text-cm-on-primary px-6 md:px-8 overflow-hidden" aria-labelledby="features-heading">
            <div class="max-w-7xl mx-auto space-y-12 md:space-y-16">
                <div class="text-center space-y-4">
                    <h2 id="features-heading" class="font-headline font-extrabold text-3xl md:text-4xl lg:text-6xl">{{ __('fiscalTitle') }}</h2>
                    <p class="text-cm-inverse-on-surface/70 text-lg md:text-xl max-w-2xl mx-auto">{{ __('fiscalSubtitle') }}</p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 md:gap-8">
                    @foreach([['tvaFodec','tvaFodecDesc','wallet'],['tejDeclaration','tejDeclarationDesc','doc'],['elFatoora','elFatooraDesc','cloud'],['withholdingTax','withholdingTaxDesc','key']] as $feat)
                    <div class="bg-white/5 p-6 md:p-8 rounded-3xl border border-white/10 hover:bg-white/10 transition-all text-center">
                        <div class="w-14 h-14 md:w-16 md:h-16 bg-cm-primary-container/20 rounded-2xl flex items-center justify-center mx-auto mb-4 md:mb-6">
                            @if($feat[2]==='wallet')<svg class="w-8 h-8 text-cm-primary-container" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 00-2.25-2.25H15a3 3 0 110-6h5.25A2.25 2.25 0 0121 6v6zm0 0v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18V6a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 6"/></svg>
                            @elseif($feat[2]==='doc')<svg class="w-8 h-8 text-cm-primary-container" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                            @elseif($feat[2]==='cloud')<svg class="w-8 h-8 text-cm-primary-container" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.338-2.32 3.75 3.75 0 013.572 5.345A3.75 3.75 0 0117.25 19.5H6.75z"/></svg>
                            @else<svg class="w-8 h-8 text-cm-primary-container" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z"/></svg>
                            @endif
                        </div>
                        <h3 class="font-bold text-xl md:text-2xl mb-3 md:mb-4">{{ __($feat[0]) }}</h3>
                        <p class="text-sm opacity-70">{{ __($feat[1]) }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ═══════════════ HOW IT WORKS ═══════════════ --}}
        <section id="how-it-works" class="py-20 md:py-32 px-6 md:px-8 max-w-7xl mx-auto space-y-16 md:space-y-24" aria-labelledby="how-heading">
            <div class="text-center">
                <h2 id="how-heading" class="font-headline font-extrabold text-3xl md:text-5xl mb-4 md:mb-6">{{ __('howTitle') }}</h2>
                <p class="text-cm-secondary text-lg md:text-xl">{{ __('howSubtitle') }}</p>
            </div>

            {{-- Step 1 --}}
            <div class="flex flex-col md:flex-row items-center gap-10 md:gap-16">
                <div class="flex-1 space-y-4 md:space-y-6">
                    <div class="w-10 h-10 md:w-12 md:h-12 bg-cm-primary text-cm-on-primary rounded-full flex items-center justify-center font-black text-lg md:text-xl">1</div>
                    <h3 class="text-2xl md:text-3xl font-extrabold text-cm-on-background">{{ __('step1Title') }}</h3>
                    <p class="text-base md:text-lg text-cm-secondary leading-relaxed">{{ __('step1Desc') }}</p>
                </div>
                <div class="flex-1">
                    <div class="rounded-2xl shadow-2xl border border-cm-outline-variant/30 bg-white p-4 md:p-6">
                        <div class="flex items-center gap-2 mb-4"><div class="w-3 h-3 rounded-full bg-red-400"></div><div class="w-3 h-3 rounded-full bg-yellow-400"></div><div class="w-3 h-3 rounded-full bg-green-400"></div><span class="ml-2 text-xs text-cm-outline font-medium">{{ __('dashboardLabel') }}</span></div>
                        <div class="grid grid-cols-3 gap-3 mb-4">
                            <div class="bg-cm-surface-container-low rounded-xl p-3"><p class="text-[10px] text-cm-outline uppercase font-bold">{{ __('revenue') }}</p><p class="text-lg font-black text-cm-primary">24.5K</p><p class="text-[10px] text-green-600 font-bold">↑ +12%</p></div>
                            <div class="bg-cm-surface-container-low rounded-xl p-3"><p class="text-[10px] text-cm-outline uppercase font-bold">{{ __('invoices') }}</p><p class="text-lg font-black text-cm-on-background">142</p><p class="text-[10px] text-green-600 font-bold">↑ +8%</p></div>
                            <div class="bg-cm-surface-container-low rounded-xl p-3"><p class="text-[10px] text-cm-outline uppercase font-bold">{{ __('unpaid') }}</p><p class="text-lg font-black text-cm-error">3.2K</p><p class="text-[10px] text-cm-error font-bold">{{ __('unpaidCount') }}</p></div>
                        </div>
                        <div class="bg-cm-surface-container-low rounded-xl p-4">
                            <p class="text-xs text-cm-outline font-bold mb-3">{{ __('monthlyRevenue') }}</p>
                            <div class="flex items-end gap-2 h-20">
                                @foreach([35,50,65,45,80,100,90] as $h)<div class="flex-1 bg-cm-primary/{{ min(20 + $h/2, 100) }} rounded-t" style="height: {{ $h }}%"></div>@endforeach
                            </div>
                            <div class="flex justify-between text-[10px] text-cm-outline mt-2"><span>Jan</span><span>Fév</span><span>Mar</span><span>Avr</span><span>Mai</span><span>Jun</span><span>Jul</span></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Step 2 --}}
            <div class="flex flex-col md:flex-row-reverse items-center gap-10 md:gap-16">
                <div class="flex-1 space-y-4 md:space-y-6">
                    <div class="w-10 h-10 md:w-12 md:h-12 bg-cm-primary text-cm-on-primary rounded-full flex items-center justify-center font-black text-lg md:text-xl">2</div>
                    <h3 class="text-2xl md:text-3xl font-extrabold text-cm-on-background">{{ __('step2Title') }}</h3>
                    <p class="text-base md:text-lg text-cm-secondary leading-relaxed">{{ __('step2Desc') }}</p>
                </div>
                <div class="flex-1">
                    <div class="rounded-2xl shadow-2xl border border-cm-outline-variant/30 bg-white p-4 md:p-6">
                        <div class="flex items-center gap-2 mb-4"><div class="w-3 h-3 rounded-full bg-red-400"></div><div class="w-3 h-3 rounded-full bg-yellow-400"></div><div class="w-3 h-3 rounded-full bg-green-400"></div><span class="ml-2 text-xs text-cm-outline font-medium">{{ __('newInvoice') }}</span></div>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <div><p class="font-bold text-cm-on-background">{{ __('invoice') }}</p><p class="text-xs text-cm-outline">N° FA-2026-0143</p></div>
                                <div class="text-right"><p class="text-xs text-cm-outline">Date: 23/03/2026</p><p class="text-xs text-cm-outline">Échéance: 22/04/2026</p></div>
                            </div>
                            <div class="border-t border-cm-outline-variant/20"></div>
                            <div class="grid grid-cols-4 gap-2 text-[10px] font-bold text-cm-outline uppercase"><span class="col-span-2">{{ __('designation') }}</span><span class="text-right">{{ __('qty') }}</span><span class="text-right">{{ __('totalHT') }}</span></div>
                            <div class="grid grid-cols-4 gap-2 text-xs"><span class="col-span-2 text-cm-on-surface">Imprimante laser A4</span><span class="text-right text-cm-secondary">2</span><span class="text-right font-medium">1,200.000</span></div>
                            <div class="grid grid-cols-4 gap-2 text-xs"><span class="col-span-2 text-cm-on-surface">Cartouche encre noire</span><span class="text-right text-cm-secondary">10</span><span class="text-right font-medium">450.000</span></div>
                            <div class="grid grid-cols-4 gap-2 text-xs"><span class="col-span-2 text-cm-on-surface">Ramettes papier A4</span><span class="text-right text-cm-secondary">5</span><span class="text-right font-medium">75.000</span></div>
                            <div class="border-t border-cm-outline-variant/20 pt-2 space-y-1">
                                <div class="flex justify-between text-xs"><span class="text-cm-secondary">{{ __('totalHT') }}</span><span class="font-medium">1,725.000</span></div>
                                <div class="flex justify-between text-xs"><span class="text-cm-secondary">TVA 19%</span><span>327.750</span></div>
                                <div class="flex justify-between text-xs"><span class="text-cm-secondary">{{ __('stampDuty') }}</span><span>1.000</span></div>
                                <div class="flex justify-between text-sm font-bold pt-1 border-t border-cm-outline-variant/20"><span>{{ __('totalTTC') }}</span><span class="text-cm-primary">2,053.750 TND</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ═══════════════ WHY SOFTYFACT ═══════════════ --}}
        <section class="py-16 md:py-24 bg-white px-6 md:px-8" aria-labelledby="why-heading">
            <div class="max-w-7xl mx-auto space-y-12 md:space-y-16">
                <div class="text-center max-w-2xl mx-auto">
                    <h2 id="why-heading" class="font-headline font-extrabold text-3xl md:text-4xl text-cm-on-background mb-4">{{ __('whyTitle') }}</h2>
                    <p class="text-base md:text-lg text-cm-secondary leading-relaxed">{{ __('whySubtitle') }}</p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 md:gap-8">
                    {{-- Feature 1: 100% Conforme --}}
                    <div class="bg-cm-surface-container-low rounded-3xl p-6 md:p-8 border border-cm-outline-variant/10 space-y-4">
                        <div class="w-12 h-12 bg-cm-primary/10 rounded-2xl flex items-center justify-center">
                            <span class="material-symbols-outlined text-cm-primary text-2xl">verified</span>
                        </div>
                        <h3 class="text-xl font-bold text-cm-on-background">{{ __('whyFeature1Title') }}</h3>
                        <p class="text-sm text-cm-secondary leading-relaxed">{{ __('whyFeature1Desc') }}</p>
                    </div>
                    {{-- Feature 2: Simple & Rapide --}}
                    <div class="bg-cm-surface-container-low rounded-3xl p-6 md:p-8 border border-cm-outline-variant/10 space-y-4">
                        <div class="w-12 h-12 bg-cm-primary/10 rounded-2xl flex items-center justify-center">
                            <span class="material-symbols-outlined text-cm-primary text-2xl">bolt</span>
                        </div>
                        <h3 class="text-xl font-bold text-cm-on-background">{{ __('whyFeature2Title') }}</h3>
                        <p class="text-sm text-cm-secondary leading-relaxed">{{ __('whyFeature2Desc') }}</p>
                    </div>
                    {{-- Feature 3: Support Local --}}
                    <div class="bg-cm-surface-container-low rounded-3xl p-6 md:p-8 border border-cm-outline-variant/10 space-y-4">
                        <div class="w-12 h-12 bg-cm-primary/10 rounded-2xl flex items-center justify-center">
                            <span class="material-symbols-outlined text-cm-primary text-2xl">support_agent</span>
                        </div>
                        <h3 class="text-xl font-bold text-cm-on-background">{{ __('whyFeature3Title') }}</h3>
                        <p class="text-sm text-cm-secondary leading-relaxed">{{ __('whyFeature3Desc') }}</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- ═══════════════ TESTIMONIALS ═══════════════ --}}
        <section class="py-16 md:py-24 bg-cm-surface-container-low px-6 md:px-8" aria-labelledby="testimonials-heading">
            <div class="max-w-7xl mx-auto space-y-12 md:space-y-16">
                <div class="text-center">
                    <h2 id="testimonials-heading" class="font-headline font-extrabold text-3xl md:text-4xl mb-4">{{ __('testimonialsTitle') }}</h2>
                    <div class="flex justify-center gap-1 mb-2">
                        @for($i=0;$i<5;$i++)<svg class="w-5 h-5 text-cm-primary" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd"/></svg>@endfor
                    </div>
                    <p class="text-cm-secondary font-bold">{{ __('testimonialsRating') }}</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                    @foreach([['testimonial1','testimonial1Name','testimonial1Role'],['testimonial2','testimonial2Name','testimonial2Role'],['testimonial3','testimonial3Name','testimonial3Role']] as $t)
                    <div class="bg-white p-6 md:p-8 rounded-3xl shadow-sm border border-cm-outline-variant/10 space-y-6">
                        <p class="text-cm-on-surface-variant italic leading-relaxed">{{ __($t[0]) }}</p>
                        <div class="flex items-center gap-4 border-t border-cm-outline-variant/10 pt-6">
                            <div class="w-12 h-12 bg-cm-primary-container rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd"/></svg>
                            </div>
                            <div><p class="font-bold text-cm-on-background">{{ __($t[1]) }}</p><p class="text-xs text-cm-outline font-bold uppercase tracking-wider">{{ __($t[2]) }}</p></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ═══════════════ FINAL CTA ═══════════════ --}}
        <section class="py-16 md:py-24 px-6 md:px-8 max-w-7xl mx-auto">
            <div class="bg-cm-primary rounded-[2rem] md:rounded-[3rem] p-8 md:p-12 lg:p-24 text-cm-on-primary text-center space-y-8 md:space-y-12 relative overflow-hidden shadow-2xl shadow-[#006B59]/40">
                <div class="absolute top-0 right-0 w-60 md:w-96 h-60 md:h-96 bg-white/10 rounded-full blur-[100px] -mr-32 md:-mr-48 -mt-32 md:-mt-48" aria-hidden="true"></div>
                <div class="absolute bottom-0 left-0 w-60 md:w-96 h-60 md:h-96 bg-black/10 rounded-full blur-[100px] -ml-32 md:-ml-48 -mb-32 md:-mb-48" aria-hidden="true"></div>
                <div class="relative z-10 space-y-6">
                    <h2 class="font-headline font-extrabold text-3xl md:text-5xl lg:text-7xl">{{ __('readyTitle') }}</h2>
                    <p class="text-lg md:text-2xl opacity-90 max-w-2xl mx-auto">{{ __('readySubtitle') }}</p>
                    <div class="flex flex-col items-center gap-6 pt-6 md:pt-8">
                        <div class="text-center"><span class="text-4xl md:text-5xl font-black">{{ $pagePrice }}</span><span class="text-lg font-bold ml-1">DT</span></div>
                        <a href="/product/buyonepay" class="btn-cta-shine bg-white text-cm-primary px-8 md:px-12 py-4 md:py-6 rounded-2xl font-black text-xl md:text-2xl hover:scale-105 transition-all shadow-xl shadow-black/20 uppercase tracking-tight cursor-pointer">{{ ($abVariant ?? 'A') === 'B' ? __('orderNowB') : __('orderNow') }}</a>
                    </div>
                    <p class="text-sm opacity-80 font-medium">{{ __('freeInstall') }}</p>
                </div>
            </div>
        </section>

        {{-- ═══════════════ CONTACT FORM ═══════════════ --}}
        <section id="contact" class="py-16 md:py-24 px-6 md:px-8 max-w-5xl mx-auto" aria-labelledby="contact-heading"
            x-data="{ submitted: false, submitting: false, errors: {} }"
        >
            <div class="bg-white rounded-[2rem] shadow-2xl overflow-hidden border border-cm-outline-variant/10">
                <div class="p-8 md:p-12 lg:p-20 space-y-8 md:space-y-10">
                    <div class="text-center space-y-4">
                        <h3 id="contact-heading" class="font-headline font-extrabold text-3xl md:text-4xl">{{ __('contactTitle') }}</h3>
                        <p class="text-cm-secondary">{{ __('contactSubtitle') }}</p>
                    </div>

                    {{-- Success --}}
                    <div x-show="submitted" x-cloak class="flex flex-col items-center justify-center text-center space-y-4 py-8">
                        <div class="w-16 h-16 bg-cm-primary/10 rounded-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-cm-primary" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd"/></svg>
                        </div>
                        <h3 class="font-headline font-bold text-2xl text-cm-on-background">{{ __('thankYou') }}</h3>
                        <p class="text-cm-secondary">{{ __('requestSent') }}</p>
                        <button @click="submitted = false" class="text-cm-primary font-semibold hover:underline mt-4">{{ __('sendAnother') }}</button>
                    </div>

                    {{-- Form --}}
                    <form x-show="!submitted" @submit.prevent="
                        submitting = true; errors = {};
                        fetch('/leads', { method: 'POST', headers: {'Content-Type':'application/json','X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content, 'Accept':'application/json'}, body: JSON.stringify({ name: $refs.lname.value, company: $refs.lcompany.value, phone: $refs.lphone.value, message: $refs.lmessage.value }) })
                        .then(r => { if(!r.ok) return r.json().then(d => { errors = d.errors || {}; throw new Error(); }); return r.json(); })
                        .then(() => { submitted = true; if (typeof gtag === 'function') gtag('event', 'generate_lead', { currency: 'TND', value: 0 }); if (typeof fbq === 'function') fbq('track', 'Lead'); })
                        .catch(() => {})
                        .finally(() => { submitting = false; })
                    " class="space-y-6" novalidate>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="contact-name" class="text-xs font-black text-cm-outline uppercase tracking-widest">{{ __('fullName') }}</label>
                                <input x-ref="lname" id="contact-name" type="text" placeholder="{{ __('fullNamePlaceholder') }}" class="w-full bg-cm-surface-container-low px-5 md:px-6 py-3 md:py-4 rounded-xl border-none ring-1 ring-cm-outline-variant/30 focus:ring-2 focus:ring-cm-primary transition-all text-base md:text-lg font-medium" required />
                            </div>
                            <div class="space-y-2">
                                <label for="contact-phone" class="text-xs font-black text-cm-outline uppercase tracking-widest">{{ __('phone') }}</label>
                                <input x-ref="lphone" id="contact-phone" type="tel" placeholder="{{ __('phonePlaceholder') }}" class="w-full bg-cm-surface-container-low px-5 md:px-6 py-3 md:py-4 rounded-xl border-none ring-1 ring-cm-outline-variant/30 focus:ring-2 focus:ring-cm-primary transition-all text-base md:text-lg font-medium" required />
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label for="contact-company" class="text-xs font-black text-cm-outline uppercase tracking-widest">{{ __('companyName') }}</label>
                            <input x-ref="lcompany" id="contact-company" type="text" placeholder="{{ __('companyNamePlaceholder') }}" class="w-full bg-cm-surface-container-low px-5 md:px-6 py-3 md:py-4 rounded-xl border-none ring-1 ring-cm-outline-variant/30 focus:ring-2 focus:ring-cm-primary transition-all text-base md:text-lg font-medium" />
                        </div>
                        <div class="space-y-2">
                            <label for="contact-message" class="text-xs font-black text-cm-outline uppercase tracking-widest">{{ __('messageOptional') }}</label>
                            <textarea x-ref="lmessage" id="contact-message" placeholder="{{ __('messagePlaceholder') }}" rows="3" class="w-full bg-cm-surface-container-low px-5 md:px-6 py-3 md:py-4 rounded-xl border-none ring-1 ring-cm-outline-variant/30 focus:ring-2 focus:ring-cm-primary transition-all text-base md:text-lg font-medium resize-none"></textarea>
                        </div>
                        <button type="submit" :disabled="submitting" class="w-full bg-cm-on-background text-white py-5 md:py-6 rounded-xl font-black text-lg md:text-xl hover:opacity-90 transition-all shadow-lg disabled:opacity-50 disabled:cursor-not-allowed">
                            <span x-show="!submitting">{{ __('validateOrder') }}</span>
                            <span x-show="submitting" x-cloak>{{ __('sending') }}</span>
                        </button>
                        <p class="text-center text-xs text-cm-outline font-medium">{{ __('securePayment') }}</p>
                    </form>
                </div>
            </div>
        </section>
    </main>

    {{-- ═══════════════ FOOTER ═══════════════ --}}
    <footer class="bg-slate-50 border-t border-slate-200 mt-20" role="contentinfo">
        <div class="px-6 md:px-8 py-12 md:py-16 max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-8">
            <picture>
                <source srcset="/logo.webp" type="image/webp">
                <img src="/logo.png" alt="{{ $productName }}" class="h-8 md:h-10 w-auto" width="40" height="43" loading="lazy" />
            </picture>
            <p class="text-sm text-slate-500 text-center font-medium">© {{ date('Y') }} {{ $productName }}. {{ __('footerDesc') }}</p>
            <div class="flex gap-6 md:gap-8">
                <a href="/confidentialite" class="text-xs font-bold text-slate-400 hover:text-cm-primary transition-colors uppercase tracking-widest">{{ __('privacy') }}</a>
                <a href="/conditions" class="text-xs font-bold text-slate-400 hover:text-cm-primary transition-colors uppercase tracking-widest">{{ __('terms') }}</a>
            </div>
        </div>
    </footer>

    {{-- ═══════════════ MOBILE FAB ═══════════════ --}}
    <div class="fixed bottom-6 right-6 z-40 md:hidden">
        <a href="tel:+21671000000" class="w-14 h-14 bg-cm-primary text-cm-on-primary rounded-full shadow-2xl flex items-center justify-center active:scale-90 transition-transform" aria-label="Appeler maintenant">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z" clip-rule="evenodd"/></svg>
        </a>
    </div>

    {{-- ═══════════════ ORDER TYPE MODAL ═══════════════ --}}
    @include('partials._order-modal')
</div>
@endsection

@extends('app')

@section('meta')
<title>{{ $productName }} Version Cloud — Logiciel de facturation en ligne | {{ $monthlyPrice }} DT/mois</title>
<meta name="description" content="Commandez {{ $productName }} Version Cloud : logiciel de facturation en ligne pour les entreprises tunisiennes. Accessible partout, accès immédiat. {{ $monthlyPrice }} DT/mois ({{ $pagePrice }} DT/an)." />
<meta name="keywords" content="logiciel facturation en ligne tunisie, {{ $productName }} cloud, logiciel gestion commerciale en ligne, facturation cloud tunisie, saas facturation" />
<link rel="canonical" href="https://softyfact.tn/product/online" />
<meta name="robots" content="index, follow" />
<meta name="author" content="{{ $productName }}" />
<meta property="og:type" content="product" />
<meta property="og:title" content="{{ $productName }} Version Cloud — Facturation en ligne | {{ $pagePrice }} DT" />
<meta property="og:description" content="Version cloud du logiciel de facturation pour les entreprises tunisiennes. Accessible partout, sans installation." />
<meta property="og:url" content="https://softyfact.tn/product/online" />
<meta property="og:site_name" content="{{ $productName }}" />
<meta property="og:locale" content="fr_TN" />
<meta property="product:price:amount" content="{{ $pagePrice }}" />
<meta property="product:price:currency" content="TND" />
<meta property="og:image" content="https://softyfact.tn/softyfact-features-details-en-ligne.png" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $productName }} Version Cloud | {{ $pagePrice }} DT" />
<meta name="twitter:description" content="Logiciel de facturation en ligne pour le marché tunisien. Accessible depuis tout navigateur." />
<meta name="twitter:image" content="https://softyfact.tn/softyfact-features-details-en-ligne.png" />
@endsection

@section('jsonld')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Product',
    'name' => $productName . ' — Version Cloud — Logiciel de facturation en ligne',
    'description' => 'Version cloud du logiciel de facturation et gestion commerciale pour les entreprises tunisiennes. Accessible partout, sans installation.',
    'brand' => ['@type' => 'Brand', 'name' => $productName],
    'offers' => [
        '@type' => 'Offer',
        'url' => 'https://softyfact.tn/product/online',
        'price' => (string) $pagePrice,
        'priceCurrency' => 'TND',
        'availability' => 'https://schema.org/InStock',
        'priceValidUntil' => '2026-12-31',
        'seller' => ['@type' => 'Organization', 'name' => $productName],
    ],
    'aggregateRating' => [
        '@type' => 'AggregateRating',
        'ratingValue' => '4.8',
        'ratingCount' => '1000',
        'bestRating' => '5',
    ],
    'category' => 'Business Software',
    'operatingSystem' => 'Web',
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => __('home'), 'item' => 'https://softyfact.tn'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => $productName . ' Version Cloud'],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
@endsection

@php
$priceFormatted = number_format($pagePrice, 3, '.', '');
$totalFormatted = number_format($pagePrice + 6, 3, '.', '');
$faqs = [
    ['q' => __('faq_online_q1'), 'a' => __('faq_online_a1')],
    ['q' => __('faq_online_q2'), 'a' => __('faq_online_a2')],
    ['q' => __('faq_online_q3'), 'a' => __('faq_online_a3')],
    ['q' => __('faq_online_q4'), 'a' => __('faq_online_a4')],
    ['q' => __('faq_online_q5'), 'a' => __('faq_online_a5')],
    ['q' => __('faq_online_q6'), 'a' => __('faq_online_a6')],
];
@endphp

@section('body')
<div class="min-h-screen bg-cm-surface font-sans text-cm-on-surface antialiased"
     x-data="{
        form: { nom: '', telephone: '', email: '', adresse: '' },
        submitted: false,
        submitting: false,
        errorMessage: '',
        phoneError: '',
        emailError: '',
        openFaq: null,
        get isFormValid() {
            const digits = this.form.telephone.replace(/\s/g, '');
            const email = this.form.email.trim();
            return /^[0-9]{8}$/.test(digits) && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        },
        validatePhone() {
            const digits = this.form.telephone.replace(/\s/g, '');
            if (!digits) this.phoneError = '{!! addslashes(__('phoneRequired_err')) !!}';
            else if (!/^[0-9]{8}$/.test(digits)) this.phoneError = '{!! addslashes(__('phoneDigits_err')) !!}';
            else this.phoneError = '';
        },
        validateEmail() {
            const email = this.form.email.trim();
            if (!email) this.emailError = '{!! addslashes(__('emailRequired_err')) !!}';
            else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) this.emailError = '{!! addslashes(__('emailInvalid_err')) !!}';
            else this.emailError = '';
        },
        scrollToForm() {
            document.getElementById('order-form')?.scrollIntoView({ behavior: 'smooth', block: 'center' });
        },
        async submitOrder() {
            this.validatePhone();
            this.validateEmail();
            if (this.phoneError || this.emailError) return;
            this.submitting = true;
            this.errorMessage = '';
            try {
                const resp = await axios.post('/orders', {
                    name: this.form.nom,
                    phone: this.form.telephone,
                    email: this.form.email,
                    address: this.form.adresse,
                    type: 'online',
                });
                this.submitting = false;
                // Track conversion
                if (typeof gtag === 'function') gtag('event', 'purchase', { currency: 'TND', value: {{ $pagePrice }}, items: [{ item_name: 'SoftyFact Cloud', quantity: 1 }] });
                if (typeof fbq === 'function') fbq('track', 'Purchase', { currency: 'TND', value: {{ $pagePrice }}, content_name: 'SoftyFact Cloud' });
                if (resp.data.redirect) window.location.href = resp.data.redirect;
                else this.submitted = true;
            } catch (err) {
                this.submitting = false;
                const errors = err.response?.data?.errors;
                if (errors) { const first = Object.values(errors)[0]; this.errorMessage = Array.isArray(first) ? first[0] : first; }
                else this.errorMessage = err.response?.data?.message || '{!! addslashes(__('genericError')) !!}';
            }
        }
     }">

    @include('partials._navbar-product')
    <div class="h-[72px]"></div>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 pb-28 lg:pb-12">

        {{-- PRODUCT HEADER --}}
        <div class="text-center mb-6 sm:mb-12">
            <div class="inline-flex items-center gap-2 bg-blue-500/10 px-4 py-1.5 rounded-full mb-4">
                <span class="material-symbols-outlined text-blue-500 text-base" style="font-variation-settings: 'FILL' 1;">cloud</span>
                <span class="text-xs font-bold text-blue-500 tracking-widest uppercase">{{ __('onlineBadge') }} — {{ $monthlyPrice }} DT/{{ __('month') }}</span>
            </div>
            <h1 class="font-headline font-extrabold text-2xl sm:text-4xl lg:text-5xl text-cm-on-background">{{ $productName }}</h1>
            <p class="sm:block text-lg text-cm-secondary mt-2">{{ __('onlineSubtitle') }}</p>
        </div>

        {{-- TWO COLUMN: Product + Form --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-start">

            {{-- Left: Product showcase --}}
            <div class="order-1 lg:order-1">
                <div class="relative">
                    <picture>
                        <source srcset="/softy-fact%20(solution%20de%20facturation%20en%20tunisie).webp" type="image/webp">
                        <img src="/softy-fact%20(solution%20de%20facturation%20en%20tunisie).png" alt="{{ $productName }} product screenshot" width="480" height="520" />
                    </picture>
                </div>
                {{-- Pricing badge --}}
                <div class="flex items-center justify-center gap-4 mt-4 sm:mt-6">
                    <div class="text-center">
                        <p class="text-xs sm:text-sm text-cm-outline line-through">299 DT/{{ __('year') }}</p>
                        <p class="text-3xl sm:text-4xl font-black text-blue-500">{{ $monthlyPrice }} <span class="text-sm sm:text-base font-bold text-cm-secondary">DT/{{ __('month') }}</span></p>
                        <p class="text-xs text-cm-secondary mt-1">{{ __('ie') }} {{ $pagePrice }} DT HT/{{ __('year') }}</p>
                    </div>
                    <div class="bg-blue-500 text-white text-sm font-bold px-4 py-2 rounded-full animate-pulse">-67%</div>
                </div>
            </div>

            {{-- Right: Order form --}}
            <div class="order-2 lg:order-2">
                <div id="order-form" class="bg-white rounded-3xl shadow-2xl border border-cm-outline-variant/10 p-4 sm:p-8 sticky top-24">

                    {{-- Success state --}}
                    <div x-show="submitted" x-cloak class="text-center py-8">
                        <div class="w-16 h-16 bg-blue-500/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="material-symbols-outlined text-blue-500 text-4xl" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                        </div>
                        <h3 class="font-headline font-bold text-xl text-cm-on-background mb-2">{{ __('orderSent') }}</h3>
                        <p class="text-cm-secondary">{{ __('onlineOrderConfirm') }}</p>
                        <a href="/" class="mt-6 inline-block text-blue-500 hover:underline font-medium">← {{ __('backToHome') }}</a>
                    </div>

                    {{-- Order form --}}
                    <div x-show="!submitted">
                        {{-- Mobile price strip --}}
                        <div class="flex items-center justify-between lg:hidden mb-4 bg-blue-500/10 rounded-xl px-4 py-3">
                            <div>
                                <p class="text-xs text-cm-outline line-through">299 DT/{{ __('year') }}</p>
                                <p class="text-2xl font-black text-blue-500">{{ $monthlyPrice }} <span class="text-sm font-bold text-cm-secondary">DT/{{ __('month') }}</span></p>
                                <p class="text-[10px] text-cm-secondary">{{ $pagePrice }} DT/{{ __('year') }}</p>
                            </div>
                            <div class="text-right">
                                <div class="inline-flex bg-blue-500 text-white text-sm font-bold px-3 py-1 rounded-full mb-1">-67%</div>
                                <p class="text-xs text-cm-secondary">{{ __('instantAccessBadge') }}</p>
                            </div>
                        </div>

                        {{-- Instant access badge --}}
                        <div class="flex items-center gap-2 bg-green-50 text-green-700 px-4 py-2.5 rounded-xl mb-4 border border-green-200">
                            <span class="material-symbols-outlined text-lg" style="font-variation-settings: 'FILL' 1;">bolt</span>
                            <span class="text-sm font-semibold">{{ __('instantAccessBadge') }}</span>
                        </div>

                        <h2 class="font-headline font-bold text-xl text-cm-on-background mb-2">{{ __('orderCloud', ['name' => $productName]) }}</h2>
                        <p class="text-sm text-cm-secondary mb-4 sm:mb-6">{{ __('fillInfoEmail') }}</p>

                        <form @submit.prevent="submitOrder" class="space-y-4">
                            <div>
                                <label class="text-xs font-bold text-cm-on-background uppercase">{{ __('name') }}</label>
                                <input x-model="form.nom" type="text" placeholder="{{ __('namePlaceholder') }}" class="mt-1 w-full bg-cm-surface px-4 py-3 rounded-xl border-none ring-1 ring-cm-on-background/30 focus:ring-2 focus:ring-blue-500 transition-all" />
                            </div>

                            <div>
                                <label class="text-xs font-bold text-cm-on-background uppercase">{{ __('email') }} <span class="text-cm-error">*</span></label>
                                <input x-model="form.email" type="email" required placeholder="{{ __('emailPlaceholder') }}"
                                    @blur="validateEmail" @input="emailError = ''"
                                    :class="['mt-1 w-full px-4 py-3 rounded-xl bg-cm-surface border-none ring-1 focus:ring-2 transition-all', emailError ? 'ring-cm-error focus:ring-cm-error' : 'ring-cm-on-background/30 focus:ring-blue-500']" />
                                <p x-show="emailError" x-text="emailError" class="mt-1 text-xs text-cm-error flex items-center gap-1"></p>
                            </div>

                            <div>
                                <label class="text-xs font-bold text-cm-on-background uppercase">{{ __('phoneRequired') }} <span class="text-cm-error">*</span></label>
                                <input x-model="form.telephone" type="tel" inputmode="numeric" required placeholder="XX XXX XXX" maxlength="11"
                                    @blur="validatePhone" @input="phoneError = ''"
                                    :class="['mt-1 w-full px-4 py-3 rounded-xl bg-cm-surface border-none ring-1 focus:ring-2 transition-all', phoneError ? 'ring-cm-error focus:ring-cm-error' : 'ring-cm-on-background/30 focus:ring-blue-500']" />
                                <p x-show="phoneError" x-text="phoneError" class="mt-1 text-xs text-cm-error flex items-center gap-1"></p>
                            </div>

                            <div>
                                <label class="text-xs font-bold text-cm-on-background uppercase">{{ __('address') }}</label>
                                <textarea x-model="form.adresse" rows="3" placeholder="{{ __('addressPlaceholder') }}" class="mt-1 w-full bg-cm-surface px-4 py-3 rounded-xl border-none ring-1 ring-cm-on-background/30 focus:ring-2 focus:ring-blue-500 transition-all resize-none"></textarea>
                            </div>

                            <div x-show="errorMessage" x-cloak class="bg-cm-error-container text-cm-error text-sm rounded-xl p-3 flex items-center gap-2">
                                <span class="material-symbols-outlined text-lg">error</span>
                                <span x-text="errorMessage"></span>
                            </div>

                            <button type="submit" :disabled="submitting || !isFormValid"
                                class="btn-buy w-full py-4 bg-blue-500 hover:scale-[1.02] disabled:opacity-50 disabled:cursor-not-allowed text-white font-bold text-base sm:text-lg rounded-xl shadow-lg shadow-blue-500/20 transition-all flex items-center justify-center gap-2">
                                <span x-show="submitting" class="material-symbols-outlined animate-spin text-xl">progress_activity</span>
                                <span x-show="!submitting">{{ __('commandInstant') }}</span>
                                <span x-show="!submitting" class="material-symbols-outlined">arrow_forward</span>
                                <span x-show="submitting">{{ __('sending') }}</span>
                            </button>
                        </form>

                        {{-- Order summary --}}
                        <div class="mt-6 bg-cm-surface-container-low rounded-xl p-4 space-y-3">
                            <div class="flex justify-between text-sm text-cm-secondary">
                                <span>{{ __('cloudAnnual') }}</span>
                                <span class="font-medium text-cm-on-surface">{{ $priceFormatted }} DT/{{ __('year') }}</span>
                            </div>
                            <div class="flex justify-between text-sm text-cm-secondary">
                                <span>{{ __('perMonth') }}</span>
                                <span class="font-medium text-cm-on-surface">{{ $monthlyPrice }} DT/{{ __('month') }}</span>
                            </div>
                            <div class="flex justify-between text-sm text-cm-secondary">
                                <span>{{ __('deliveryInstall') }}</span>
                                <span class="font-medium text-cm-on-surface">6.000 DT</span>
                            </div>
                            <div class="border-t border-cm-outline-variant/20 pt-3 flex justify-between">
                                <span class="font-bold text-cm-on-background">{{ __('total') }}</span>
                                <span class="font-bold text-blue-500 text-lg">{{ $totalFormatted }} DT</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <picture>
            <source srcset="/softyfact-features-details-en-ligne.webp" type="image/webp">
            <img src="/softyfact-features-details-en-ligne.png" alt="{{ $productName }}" class="hidden lg:block w-full h-auto rounded-2xl shadow-lg mt-12" width="619" height="789" loading="lazy" />
        </picture>
        <video autoplay muted playsinline class="w-full h-auto rounded-2xl shadow-lg lg:hidden mt-3" loading="lazy">
            <source src="/softyfact--features-details.mp4" type="video/mp4" />
        </video>

        @include('partials._features-tabs')

        <picture>
            <source srcset="/nous-gratuites.webp" type="image/webp">
            <img src="/nous-gratuites.png" alt="{{ $productName }}" class="hidden lg:block w-full h-auto rounded-2xl shadow-lg mt-12" width="830" height="300" loading="lazy" />
        </picture>

        {{-- BOTTOM CTA --}}
        <div class="mt-12 sm:mt-20 bg-gradient-to-br from-blue-600 to-blue-500 rounded-3xl p-6 sm:p-12 text-center relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(circle_at_30%_50%,rgba(255,255,255,0.1),transparent)]"></div>
            <div class="relative z-10">
                <h2 class="font-headline font-extrabold text-2xl sm:text-3xl text-white mb-3">{{ __('readyOnline') }}</h2>
                <p class="text-white/70 mb-8 max-w-xl mx-auto">{{ __('readyOnlineSub') }}</p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="#" @click.prevent="scrollToForm" class="w-full sm:w-auto px-6 sm:px-8 py-3 bg-white text-blue-500 font-bold rounded-xl hover:scale-[1.02] active:scale-95 transition-all shadow-lg">
                        {{ __('commandPrice') }} — {{ $monthlyPrice }} DT/{{ __('month') }}
                    </a>
                    <a href="tel:{{ preg_replace('/\s/', '', $supportPhone) }}" class="w-full sm:w-auto px-6 sm:px-8 py-3 border-2 border-white/30 text-white font-semibold rounded-xl hover:bg-white/10 transition flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-lg">phone_in_talk</span>
                        <span dir="ltr">{{ $supportPhone }}</span>
                    </a>
                </div>
            </div>
        </div>
    </main>

    {{-- MOBILE STICKY CTA --}}
    <div x-show="!submitted" class="fixed bottom-0 left-0 right-0 z-50 lg:hidden bg-white/95 backdrop-blur-xl border-t border-cm-outline-variant/20 shadow-2xl px-4 py-3">
        <button @click="scrollToForm" class="btn-buy w-full py-3 sm:py-4 bg-blue-500 text-white font-bold text-sm sm:text-base rounded-xl shadow-lg shadow-blue-500/30 transition-all flex items-center justify-center gap-2 active:scale-95">
            <span>{{ __('commandCloud') }}</span>
            <span class="material-symbols-outlined text-lg">arrow_forward</span>
            <span class="text-white/70 text-sm font-normal">{{ $monthlyPrice }} DT/{{ __('month') }}</span>
        </button>
    </div>

    {{-- FAQ --}}
    <section class="py-16 md:py-20 px-6 md:px-8 max-w-3xl mx-auto">
        <h2 class="font-headline font-extrabold text-2xl md:text-3xl text-cm-on-background text-center mb-10">{{ __('faqTitle') }}</h2>
        <div class="space-y-3">
            @foreach($faqs as $i => $faq)
            <div class="border border-cm-outline-variant/30 rounded-xl overflow-hidden">
                <button @click="openFaq = openFaq === {{ $i }} ? null : {{ $i }}"
                    class="w-full flex items-center justify-between gap-4 px-5 py-4 text-left font-semibold text-cm-on-background hover:bg-cm-surface-container-low transition-colors"
                    :aria-expanded="openFaq === {{ $i }}">
                    <span>{{ $faq['q'] }}</span>
                    <span class="material-symbols-outlined text-xl shrink-0 transition-transform duration-200" :class="{ 'rotate-180': openFaq === {{ $i }} }">expand_more</span>
                </button>
                <div x-show="openFaq === {{ $i }}" x-collapse class="px-5 pb-4 text-sm text-cm-on-background/70 leading-relaxed">
                    {{ $faq['a'] }}
                </div>
            </div>
            @endforeach
        </div>
    </section>

    @include('partials._footer-full')
</div>

<style>
@keyframes shimmer { 0% { transform: translateX(-120%) skewX(-20deg); } 100% { transform: translateX(220%) skewX(-20deg); } }
.btn-buy { position: relative; overflow: hidden; }
.btn-buy:not(:disabled)::after { content: ''; position: absolute; inset: 0; background: linear-gradient(90deg, transparent 0%, rgba(255,255,255,0.22) 50%, transparent 100%); animation: shimmer 2.4s ease-in-out infinite; pointer-events: none; }
</style>
@endsection

@extends('app')

@section('meta')
<title>{{ $productName }} Version Bureau — Logiciel de facturation hors ligne | {{ $pagePrice }} DT</title>
<meta name="description" content="Commandez {{ $productName }} Version Bureau : logiciel de facturation hors ligne pour les entreprises tunisiennes. Installation locale, fonctionne sans internet. {{ $pagePrice }} DT — Licence à vie." />
<meta name="keywords" content="logiciel facturation hors ligne tunisie, {{ $productName }} bureau, logiciel gestion commerciale offline, facturation sans internet tunisie" />
<link rel="canonical" href="https://softyfact.tn/product/offline" />
<meta name="robots" content="index, follow" />
<meta name="author" content="{{ $productName }}" />
<meta property="og:type" content="product" />
<meta property="og:title" content="{{ $productName }} Version Bureau — Logiciel de facturation | {{ $pagePrice }} DT" />
<meta property="og:description" content="Version bureau du logiciel de facturation pour les entreprises tunisiennes. Installation locale, licence à vie." />
<meta property="og:url" content="https://softyfact.tn/product/offline" />
<meta property="og:site_name" content="{{ $productName }}" />
<meta property="og:locale" content="fr_TN" />
<meta property="product:price:amount" content="{{ $pagePrice }}" />
<meta property="product:price:currency" content="TND" />
<meta property="og:image" content="https://softyfact.tn/softyfact-features-details-offline.png" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $productName }} Version Bureau | {{ $pagePrice }} DT" />
<meta name="twitter:description" content="Logiciel de facturation hors ligne pour le marché tunisien. Installation locale, fonctionne sans internet." />
<meta name="twitter:image" content="https://softyfact.tn/softyfact-features-details-offline.png" />
@endsection

@section('jsonld')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Product',
    'name' => $productName . ' — Version Bureau — Logiciel de facturation',
    'description' => 'Version bureau du logiciel de facturation et gestion commerciale pour les entreprises tunisiennes. Installation locale, fonctionne sans internet.',
    'brand' => ['@type' => 'Brand', 'name' => $productName],
    'offers' => [
        '@type' => 'Offer',
        'url' => 'https://softyfact.tn/product/offline',
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
    'operatingSystem' => 'Windows, macOS, Linux',
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
@endsection

@php
$priceFormatted = number_format($pagePrice, 3, '.', '');
$totalFormatted = number_format($pagePrice + 6, 3, '.', '');
$tunisCities = ['Ariana','Béja','Ben Arous','Bizerte','Gabès','Gafsa','Jendouba','Kairouan','Kasserine','Kébili','Kef','Mahdia','Manouba','Médenine','Monastir','Nabeul','Sfax','Sidi Bouzid','Siliana','Sousse','Tataouine','Tozeur','Tunis','Zaghouan'];
$screenshots = [
    ['title' => __('screen_dashboard'), 'image' => '/screen/Tableau de bord.png', 'description' => __('screen_dashboard_desc')],
    ['title' => __('screen_invoices'), 'image' => '/screen/Gestion des factures.png', 'description' => __('screen_invoices_desc')],
    ['title' => __('screen_product'), 'image' => '/screen/ajout-produit.png', 'description' => __('screen_product_desc')],
    ['title' => __('screen_documents'), 'image' => '/screen/gestion-des-documents(exemple Devis).png', 'description' => __('screen_documents_desc')],
    ['title' => __('screen_clients'), 'image' => '/screen/gestion des clients.png', 'description' => __('screen_clients_desc')],
    ['title' => __('screen_fournisseurs'), 'image' => '/screen/gestion des Fournisseurs.png', 'description' => __('screen_fournisseurs_desc')],
    ['title' => __('screen_stock'), 'image' => '/screen/Gestion de stock.png', 'description' => __('screen_stock_desc')],
    ['title' => __('screen_payments'), 'image' => '/screen/gestion Paiements (encaissements et décaissements).png', 'description' => __('screen_payments_desc')],
    ['title' => __('screen_warehouses'), 'image' => '/screen/gestion des Entrepôts .png', 'description' => __('screen_warehouses_desc')],
    ['title' => __('screen_tej'), 'image' => '/screen/Certificats TEJ.png', 'description' => __('screen_tej_desc')],
];
$faqs = [
    ['q' => __('faq_offline_q1'), 'a' => __('faq_offline_a1')],
    ['q' => __('faq_offline_q2'), 'a' => __('faq_offline_a2')],
    ['q' => __('faq_offline_q3'), 'a' => __('faq_offline_a3')],
    ['q' => __('faq_offline_q4'), 'a' => __('faq_offline_a4')],
    ['q' => __('faq_offline_q5'), 'a' => __('faq_offline_a5')],
    ['q' => __('faq_offline_q6'), 'a' => __('faq_offline_a6')],
];
@endphp

@section('body')
<div class="min-h-screen bg-cm-surface font-sans text-cm-on-surface antialiased"
     x-data="{
        form: { nom: '', telephone: '', ville: '', adresse: '' },
        submitted: false,
        submitting: false,
        errorMessage: '',
        phoneError: '',
        openFaq: null,
        cityDropdownOpen: false,
        citySearch: '',
        cities: @js($tunisCities),
        get filteredCities() {
            const q = this.citySearch.trim().toLowerCase();
            return q ? this.cities.filter(c => c.toLowerCase().includes(q)) : this.cities;
        },
        get isFormValid() {
            const digits = this.form.telephone.replace(/\s/g, '');
            return /^[0-9]{8}$/.test(digits) && this.form.ville;
        },
        validatePhone() {
            const digits = this.form.telephone.replace(/\s/g, '');
            if (!digits) this.phoneError = '{!! addslashes(__('phoneRequired_err')) !!}';
            else if (!/^[0-9]{8}$/.test(digits)) this.phoneError = '{!! addslashes(__('phoneDigits_err')) !!}';
            else this.phoneError = '';
        },
        selectCity(city) {
            this.form.ville = city;
            this.cityDropdownOpen = false;
            this.citySearch = '';
        },
        scrollToForm() {
            document.getElementById('order-form')?.scrollIntoView({ behavior: 'smooth', block: 'center' });
        },
        async submitOrder() {
            this.validatePhone();
            if (this.phoneError || !this.form.ville) return;
            this.submitting = true;
            this.errorMessage = '';
            try {
                const resp = await axios.post('/orders', {
                    name: this.form.nom,
                    phone: this.form.telephone,
                    address: this.form.adresse,
                    city: this.form.ville,
                    type: 'offline',
                });
                this.submitting = false;
                // Track conversion
                if (typeof gtag === 'function') gtag('event', 'purchase', { currency: 'TND', value: {{ $pagePrice }}, items: [{ item_name: 'SoftyFact Desktop', quantity: 1 }] });
                if (typeof fbq === 'function') fbq('track', 'Purchase', { currency: 'TND', value: {{ $pagePrice }}, content_name: 'SoftyFact Desktop' });
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
            <div class="inline-flex items-center gap-2 bg-cm-primary/10 px-4 py-1.5 rounded-full mb-4">
                <span class="material-symbols-outlined text-cm-primary text-base" style="font-variation-settings: 'FILL' 1;">desktop_windows</span>
                <span class="text-xs font-bold text-cm-primary tracking-widest uppercase">{{ __('offlineBadge') }}</span>
            </div>
            <h1 class="font-headline font-extrabold text-2xl sm:text-4xl lg:text-5xl text-cm-on-background">{{ $productName }}</h1>
            <p class="sm:block text-lg text-cm-secondary mt-2">{{ __('offlineSubtitle') }}</p>
        </div>

        {{-- TWO COLUMN: Product + Form --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-start">

            {{-- Left: Product showcase --}}
            <div class="order-1 lg:order-1">
                <div class="relative">
                    <img src="/softy-fact%20(solution%20de%20facturation%20en%20tunisie).png" alt="{{ $productName }} product screenshot" />
                </div>
            </div>

            {{-- Right: Order form --}}
            <div class="order-2 lg:order-2">
                <div id="order-form" class="bg-white rounded-3xl shadow-2xl border border-cm-outline-variant/10 p-4 sm:p-8 sticky top-24">

                    {{-- Success state --}}
                    <div x-show="submitted" x-cloak class="text-center py-8">
                        <div class="w-16 h-16 bg-cm-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="material-symbols-outlined text-cm-primary text-4xl" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                        </div>
                        <h3 class="font-headline font-bold text-xl text-cm-on-background mb-2">{{ __('orderSent') }}</h3>
                        <p class="text-cm-secondary">{{ __('offlineOrderConfirm') }}</p>
                        <a href="/" class="mt-6 inline-block text-cm-primary hover:underline font-medium">{{ __('backToHome') }}</a>
                    </div>

                    {{-- Order form --}}
                    <div x-show="!submitted">
                        {{-- Mobile price strip --}}
                        <div class="flex items-center justify-between lg:hidden mb-4 bg-cm-primary-container/10 rounded-xl px-4 py-3">
                            <div>
                                <p class="text-xs text-cm-outline line-through">500 DT</p>
                                <p class="text-2xl font-black text-cm-primary">{{ $pagePrice }} <span class="text-sm font-bold text-cm-secondary">DT</span></p>
                            </div>
                            <div class="text-right">
                                <div class="inline-flex bg-cm-error text-cm-on-primary text-sm font-bold px-3 py-1 rounded-full mb-1">-70%</div>
                                <p class="text-xs text-cm-secondary">Licence à vie</p>
                            </div>
                        </div>

                        <h2 class="font-headline font-bold text-xl text-cm-on-background mb-2">{{ __('orderDesktop', ['name' => $productName]) }}</h2>
                        <p class="text-sm text-cm-secondary mb-4 sm:mb-6">
                            {{ __('fillInfoOrCall') }} <a href="tel:{{ preg_replace('/\s/', '', $supportPhone) }}" dir="ltr" class="text-cm-primary font-semibold hover:underline inline-block">{{ $supportPhone }}</a>
                        </p>

                        <form @submit.prevent="submitOrder" class="space-y-4">
                            <div>
                                <label class="text-xs font-bold text-cm-on-background uppercase">{{ __('name') }}</label>
                                <input x-model="form.nom" type="text" placeholder="{{ __('namePlaceholder') }}" class="mt-1 w-full bg-cm-surface px-4 py-3 rounded-xl border-none ring-1 ring-cm-on-background/30 focus:ring-2 focus:ring-cm-primary transition-all" />
                            </div>

                            <div>
                                <label class="text-xs font-bold text-cm-on-background uppercase">{{ __('phoneRequired') }} <span class="text-cm-error">*</span></label>
                                <input x-model="form.telephone" type="tel" inputmode="numeric" required placeholder="{{ __('phonePlaceholderShort') }}" maxlength="11"
                                    @blur="validatePhone" @input="phoneError = ''"
                                    :class="['mt-1 w-full px-4 py-3 rounded-xl bg-cm-surface border-none ring-1 focus:ring-2 transition-all', phoneError ? 'ring-cm-error focus:ring-cm-error' : 'ring-cm-on-background/30 focus:ring-cm-primary']" />
                                <p x-show="phoneError" x-text="phoneError" class="mt-1 text-xs text-cm-error flex items-center gap-1"></p>
                            </div>

                            {{-- Searchable city dropdown --}}
                            <div class="relative" @click.away="cityDropdownOpen = false">
                                <label class="text-xs font-bold text-cm-on-background uppercase">{{ __('city') }} <span class="text-cm-error">*</span></label>
                                <button type="button" @click="cityDropdownOpen = !cityDropdownOpen; citySearch = ''"
                                    :class="['mt-1 w-full px-4 py-3 rounded-xl bg-cm-surface border-none ring-1 text-left transition-all flex items-center justify-between',
                                        !form.ville ? 'text-cm-outline' : 'text-cm-on-surface',
                                        cityDropdownOpen ? 'ring-2 ring-cm-primary' : 'ring-cm-on-background/30']">
                                    <span x-text="form.ville || '{{ __('cityPlaceholder') }}'"></span>
                                    <span class="material-symbols-outlined text-cm-outline text-lg transition-transform" :class="cityDropdownOpen ? 'rotate-180' : ''">expand_more</span>
                                </button>
                                <div x-show="cityDropdownOpen" x-cloak x-transition class="absolute z-50 mt-1 w-full bg-white border border-cm-outline-variant/20 rounded-xl shadow-xl overflow-hidden">
                                    <div class="p-2 border-b border-cm-outline-variant/10">
                                        <div class="relative">
                                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-cm-outline text-lg">search</span>
                                            <input x-model="citySearch" type="text" placeholder="{{ __('searchCity') }}" class="w-full pl-9 pr-3 py-2 text-sm rounded-lg bg-cm-surface border-none ring-1 ring-cm-on-background/30 focus:ring-2 focus:ring-cm-primary outline-none" @click.stop />
                                        </div>
                                    </div>
                                    <ul class="max-h-48 overflow-y-auto py-1">
                                        <template x-for="city in filteredCities" :key="city">
                                            <li @click="selectCity(city)" class="px-4 py-2.5 text-sm cursor-pointer transition hover:bg-cm-surface-container-low flex items-center justify-between" :class="form.ville === city ? 'bg-cm-primary-container/10 text-cm-primary font-medium' : 'text-cm-on-surface'">
                                                <span x-text="city"></span>
                                                <span x-show="form.ville === city" class="material-symbols-outlined text-cm-primary text-lg">check</span>
                                            </li>
                                        </template>
                                        <li x-show="filteredCities.length === 0" class="px-4 py-3 text-sm text-cm-outline text-center">{{ __('noCityFound') }}</li>
                                    </ul>
                                </div>
                            </div>

                            <div>
                                <label class="text-xs font-bold text-cm-on-background uppercase">{{ __('address') }}</label>
                                <textarea x-model="form.adresse" rows="3" placeholder="{{ __('addressPlaceholder') }}" class="mt-1 w-full bg-cm-surface px-4 py-3 rounded-xl border-none ring-1 ring-cm-on-background/30 focus:ring-2 focus:ring-cm-primary transition-all resize-none"></textarea>
                            </div>

                            <div x-show="errorMessage" x-cloak class="bg-cm-error-container text-cm-error text-sm rounded-xl p-3 flex items-center gap-2">
                                <span class="material-symbols-outlined text-lg">error</span>
                                <span x-text="errorMessage"></span>
                            </div>

                            <button type="submit" :disabled="submitting || !isFormValid"
                                class="btn-buy w-full py-4 bg-cm-primary hover:scale-[1.02] disabled:opacity-50 disabled:cursor-not-allowed text-cm-on-primary font-bold text-base sm:text-lg rounded-xl shadow-lg shadow-[#006B59]/20 transition-all flex items-center justify-center gap-2">
                                <span x-show="submitting" class="material-symbols-outlined animate-spin text-xl">progress_activity</span>
                                <span x-show="!submitting">{{ __('orderNow') }}</span>
                                <span x-show="!submitting" class="material-symbols-outlined">arrow_forward</span>
                                <span x-show="submitting">{{ __('sending') }}</span>
                            </button>
                        </form>

                        {{-- Order summary --}}
                        <div class="mt-6 bg-cm-surface-container-low rounded-xl p-4 space-y-3">
                            <div class="flex justify-between text-sm text-cm-secondary">
                                <span>{{ __('subtotal') }}</span>
                                <span class="font-medium text-cm-on-surface">{{ $priceFormatted }} DT</span>
                            </div>
                            <div class="flex justify-between text-sm text-cm-secondary">
                                <span>{{ __('deliveryInstall') }}</span>
                                <span class="font-medium text-cm-on-surface">6.000 DT</span>
                            </div>
                            <div class="border-t border-cm-outline-variant/20 pt-3 flex justify-between">
                                <span class="font-bold text-cm-on-background">{{ __('total') }}</span>
                                <span class="font-bold text-cm-primary text-lg">{{ $totalFormatted }} DT</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <img src="/softyfact-features-details-offline.png" alt="{{ $productName }}" class="hidden lg:block w-full h-auto rounded-2xl shadow-lg mt-12" loading="lazy" />
        <video autoplay muted playsinline class="w-full h-auto rounded-2xl shadow-lg lg:hidden mt-3" loading="lazy">
            <source src="/softyfact--features-details.mp4" type="video/mp4" />
        </video>

        {{-- SCREENSHOTS --}}
        <div class="mt-12 sm:mt-20">
            <h3 class="font-headline font-bold text-lg text-cm-on-background mb-6 text-center">{{ __('appPreview') }}</h3>
            <div class="grid grid-cols-1 gap-6">
                @foreach($screenshots as $s)
                <div class="bg-white rounded-3xl shadow-sm border border-cm-outline-variant/10 overflow-hidden">
                    <div class="bg-cm-surface-container-low px-3 py-2 flex items-center gap-1.5">
                        <div class="w-2 h-2 rounded-full bg-cm-error/60"></div>
                        <div class="w-2 h-2 rounded-full bg-cm-primary-container/60"></div>
                        <div class="w-2 h-2 rounded-full bg-cm-primary/60"></div>
                        <span class="ml-2 text-[10px] text-cm-outline">{{ $s['title'] }}</span>
                    </div>
                    <div class="bg-gradient-to-br from-cm-primary-container/10 to-cm-surface-container-low">
                        <img src="{{ $s['image'] }}" alt="{{ $s['title'] }}" class="w-full h-auto object-cover border border-cm-outline-variant/30" loading="lazy" />
                    </div>
                    <div class="p-4"><p class="text-sm text-cm-secondary">{{ $s['description'] }}</p></div>
                </div>
                @endforeach
            </div>
        </div>

        <img src="/nous-gratuites.png" alt="{{ $productName }}" class="hidden lg:block w-full h-auto mt-4" loading="lazy" />

        {{-- BOTTOM CTA --}}
        <div class="mt-12 sm:mt-20 bg-cm-inverse-surface rounded-3xl p-6 sm:p-12 text-center relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(circle_at_30%_50%,rgba(0,107,89,0.15),transparent)]"></div>
            <div class="relative z-10">
                <h2 class="font-headline font-extrabold text-2xl sm:text-3xl text-white mb-3">{{ __('readyTransform') }}</h2>
                <p class="text-cm-inverse-on-surface/70 mb-8 max-w-xl mx-auto">{{ __('readyTransformSub') }}</p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="#" @click.prevent="scrollToForm" class="w-full sm:w-auto px-6 sm:px-8 py-3 bg-white text-cm-primary font-bold rounded-xl hover:scale-[1.02] active:scale-95 transition-all shadow-lg">
                        {{ __('orderNowPrice', ['price' => $pagePrice]) }}
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
        <button @click="scrollToForm" class="btn-buy w-full py-3 sm:py-4 bg-cm-primary text-cm-on-primary font-bold text-sm sm:text-base rounded-xl shadow-lg shadow-[#006B59]/30 transition-all flex items-center justify-center gap-2 active:scale-95">
            <span>{{ __('commandDesktop') }}</span>
            <span class="material-symbols-outlined text-lg">arrow_forward</span>
            <span class="text-cm-on-primary/70 text-sm font-normal">{{ $pagePrice }} DT</span>
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

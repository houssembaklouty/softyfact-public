<script setup>
import { Link, Head, usePage, useForm } from '@inertiajs/vue3'
import { computed, ref } from 'vue'
import {
    CheckCircleIcon,
    ClockIcon,
    NoSymbolIcon,
    SparklesIcon,
    StarIcon,
    UserIcon,
    PhoneIcon,
    Bars3Icon,
    XMarkIcon,
    HomeIcon,
} from '@heroicons/vue/24/solid'
import {
    Cog6ToothIcon,
    QuestionMarkCircleIcon,
    EnvelopeIcon,
    WalletIcon,
    DocumentTextIcon,
    CloudArrowUpIcon,
    KeyIcon,
} from '@heroicons/vue/24/outline'
import OrderTypeModal from '@/Components/Common/OrderTypeModal.vue'
import LanguageSwitcher from '@/Components/Common/LanguageSwitcher.vue'
import { useI18n } from 'vue-i18n'

const { t } = useI18n()
const page = usePage()
const coreAppUrl = computed(() => page.props.coreAppUrl || 'https://app.softyfact.tn')
const productName = computed(() => page.props.productName || import.meta.env.VITE_APP_NAME || 'SoftyFact')

const offlinePrice = computed(() => page.props.orderAmount ?? 149)
const onlinePrice = computed(() => page.props.orderAmountOnline ?? 99)
const monthlyPrice = computed(() => (onlinePrice.value / 12).toFixed(2))

const mobileMenuOpen = ref(false)
const formSubmitted = ref(false)
const showOrderModal = ref(false)

const form = useForm({
    name: '',
    company: '',
    phone: '',
    message: '',
})

function submitLead() {
    form.post('/leads', {
        preserveScroll: true,
        onSuccess: () => {
            formSubmitted.value = true
            form.reset()
        },
    })
}

const jsonLd = JSON.stringify([
    {
        '@context': 'https://schema.org',
        '@type': 'SoftwareApplication',
        name: productName.value,
        applicationCategory: 'BusinessApplication',
        operatingSystem: 'Windows, macOS, Linux, Web',
        description: 'Logiciel de facturation et de gestion commerciale conçu pour le marché tunisien. Devis, factures, stock, trésorerie — tout en un seul endroit.',
        offers: {
            '@type': 'Offer',
            price: String(offlinePrice.value),
            priceCurrency: 'TND',
            availability: 'https://schema.org/InStock',
        },
        aggregateRating: {
            '@type': 'AggregateRating',
            ratingValue: '4.9',
            ratingCount: '500',
        },
    },
    {
        '@context': 'https://schema.org',
        '@type': 'Organization',
        name: productName.value,
        url: 'https://softyfact.tn',
        contactPoint: {
            '@type': 'ContactPoint',
            telephone: '+216-71-000-000',
            contactType: 'sales',
            availableLanguage: ['French', 'Arabic'],
            areaServed: 'TN',
        },
    },
])
</script>

<template>
    <Head>
        <title>{{ productName }} — Simplifiez votre Facturation dès aujourd'hui</title>
        <meta name="description" content="Logiciel de facturation et gestion commerciale conçu pour le marché tunisien. Gérez vos ventes, stocks et fiscalité tunisienne sans abonnement. Le choix de 100+ PME en Tunisie." />
        <meta name="keywords" content="logiciel facturation tunisie, gestion commerciale tunisie, facture tunisie, devis, gestion stock tunisie, trésorerie, FODEC, TVA, TEJ, retenue à la source, ERP tunisien, facturation sans abonnement" />
        <link rel="canonical" href="https://softyfact.tn" />
        <meta name="robots" content="index, follow" />
        <meta name="author" :content="productName" />
        <!-- Open Graph -->
        <meta property="og:type" content="website" />
        <meta property="og:title" :content="`${productName} — Simplifiez votre Facturation`" />
        <meta property="og:description" content="Gérez vos ventes, stocks et fiscalité tunisienne sans abonnement. Le choix de 100+ PME en Tunisie." />
        <meta property="og:url" content="https://softyfact.tn" />
        <meta property="og:site_name" :content="productName" />
        <meta property="og:locale" content="fr_TN" />
        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" :content="`${productName} — Simplifiez votre Facturation`" />
        <meta name="twitter:description" content="Gérez vos ventes, stocks et fiscalité tunisienne sans abonnement. Le choix de 100+ PME en Tunisie." />
        <!-- Preload fonts -->
        <link rel="preload" href="/fonts/plus-jakarta-sans/plus-jakarta-sans-latin.woff2" as="font" type="font/woff2" crossorigin />
        <link rel="preload" href="/fonts/inter/inter-latin.woff2" as="font" type="font/woff2" crossorigin />
    </Head>

    <Teleport to="head">
        <component is="script" type="application/ld+json" v-html="jsonLd" />
    </Teleport>

    <div class="min-h-screen bg-cm-surface font-sans text-cm-on-surface antialiased">

        <!-- ═══════════════ HEADER ═══════════════ -->
        <header>
            <nav class="fixed top-0 w-full z-50 bg-white/70 backdrop-blur-xl shadow-sm" :aria-label="t('navLabel')">
                <div class="flex justify-between items-center px-6 md:px-8 py-4 max-w-7xl mx-auto">
                    <Link href="/" :aria-label="`${productName} — ${t('home')}`">
                        <img src="/logo.png" :alt="productName" class="h-8 md:h-10 w-auto" />
                    </Link>

                    <!-- Desktop Nav -->
                    <div class="hidden md:flex items-center gap-6">
                        <a href="#" class="flex items-center gap-1.5 text-cm-secondary font-medium text-sm tracking-tight hover:text-cm-primary transition-colors">
                            <HomeIcon class="w-4 h-4" />
                            {{ t('home') }}
                        </a>
                        <a href="#features" class="flex items-center gap-1.5 text-cm-secondary font-medium text-sm tracking-tight hover:text-cm-primary transition-colors">
                            <Cog6ToothIcon class="w-4 h-4" />
                            {{ t('features') }}
                        </a>
                        <a href="#how-it-works" class="flex items-center gap-1.5 text-cm-secondary font-medium text-sm tracking-tight hover:text-cm-primary transition-colors">
                            <QuestionMarkCircleIcon class="w-4 h-4" />
                            {{ t('howItWorks') }}
                        </a>
                        <a href="#contact" class="flex items-center gap-1.5 text-cm-secondary font-medium text-sm tracking-tight hover:text-cm-primary transition-colors">
                            <EnvelopeIcon class="w-4 h-4" />
                            {{ t('contact') }}
                        </a>
                    </div>

                    <div class="flex items-center gap-3">
                        <LanguageSwitcher />
                        <div class="hidden sm:flex items-center gap-2">
                            <span class="flex h-2 w-2 rounded-full bg-cm-primary animate-pulse"></span>
                            <span class="text-xs font-bold text-cm-primary tracking-widest uppercase">{{ t('leaderTunisia') }}</span>
                        </div>
                        <a :href="coreAppUrl + '/login'" class="hidden md:block text-sm font-semibold text-cm-secondary px-4 py-2 hover:opacity-80 transition-all">{{ t('login') }}</a>
                        <!-- Mobile hamburger -->
                        <button class="md:hidden text-cm-secondary p-1" @click="mobileMenuOpen = !mobileMenuOpen" aria-label="Menu">
                            <XMarkIcon v-if="mobileMenuOpen" class="w-6 h-6" />
                            <Bars3Icon v-else class="w-6 h-6" />
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div v-if="mobileMenuOpen" class="md:hidden bg-white/95 backdrop-blur-xl border-t border-cm-outline-variant/20 px-6 pb-6 space-y-4">
                    <a href="#" class="flex items-center gap-2 text-cm-secondary font-medium py-2" @click="mobileMenuOpen = false">
                        <HomeIcon class="w-5 h-5" /> {{ t('home') }}
                    </a>
                    <a href="#features" class="flex items-center gap-2 text-cm-secondary font-medium py-2" @click="mobileMenuOpen = false">
                        <Cog6ToothIcon class="w-5 h-5" /> {{ t('features') }}
                    </a>
                    <a href="#how-it-works" class="flex items-center gap-2 text-cm-secondary font-medium py-2" @click="mobileMenuOpen = false">
                        <QuestionMarkCircleIcon class="w-5 h-5" /> {{ t('howItWorks') }}
                    </a>
                    <a href="#contact" class="flex items-center gap-2 text-cm-secondary font-medium py-2" @click="mobileMenuOpen = false">
                        <EnvelopeIcon class="w-5 h-5" /> {{ t('contact') }}
                    </a>
                    <LanguageSwitcher />
                    <a :href="coreAppUrl + '/login'" class="block text-cm-primary font-semibold py-2">{{ t('login') }}</a>
                </div>
            </nav>
        </header>

        <!-- Navbar spacer -->
        <div class="h-[72px]"></div>

        <main>
            <!-- ═══════════════ HERO SECTION ═══════════════ -->
            <section class="relative px-6 md:px-8 py-12 md:py-24 max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-12 md:gap-16">
                <!-- Glow backdrop -->
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(0,193,163,0.08)_0%,transparent_70%)]" aria-hidden="true"></div>

                <!-- Product image (local) -->
                <div class="flex-1 w-full order-2 md:order-1 relative z-10">
                    <div class="relative group">
                        <div class="absolute -inset-4 bg-cm-primary/10 rounded-full blur-3xl opacity-50" aria-hidden="true"></div>
                        <img
                            alt="SoftyFact SoftyFact — capture produit"
                            class="relative w-full h-auto drop-shadow-2xl transition-transform duration-500 group-hover:scale-[1.02] rounded-2xl"
                            src="/softy-fact%20(solution%20de%20facturation%20en%20tunisie).png"
                            width="600"
                            height="600"
                            fetchpriority="high"
                        />
                    </div>
                </div>

                <!-- Hero text + pricing card -->
                <div class="flex-1 space-y-6 md:space-y-8 order-1 md:order-2 relative z-10">
                    <div class="inline-flex items-center gap-2 bg-cm-error-container text-cm-error px-4 py-2 rounded-full border border-cm-error/10">
                        <ClockIcon class="w-4 h-4" />
                        <span class="text-xs font-black uppercase tracking-widest">{{ t('limitedOffer') }}</span>
                    </div>

                    <h1 class="font-headline font-extrabold text-4xl md:text-5xl lg:text-7xl leading-[1.1] tracking-tight text-cm-on-background">
                        {{ t('heroTitle', { highlight: '' }) }}<span class="bg-gradient-to-r from-cm-primary to-cm-primary-container bg-clip-text text-transparent">{{ t('heroHighlight') }}</span>
                    </h1>

                    <p class="text-lg md:text-xl text-cm-secondary leading-relaxed font-medium">
                        {{ t('heroSubtitle') }}
                    </p>

                    <!-- Pricing card -->
                    <div class="bg-white p-6 md:p-8 rounded-3xl shadow-xl border border-cm-outline-variant/10 space-y-6">
                        <div>
                            <p class="text-xs font-bold text-cm-outline uppercase tracking-widest mb-2">{{ t('startingFrom') }}</p>
                            <div class="flex items-baseline gap-3">
                                <span class="text-5xl md:text-6xl font-black text-cm-primary">{{ monthlyPrice.split('.')[0] }}<span class="text-3xl md:text-4xl">.{{ monthlyPrice.split('.')[1] }}</span></span>
                                <span class="text-xl md:text-2xl font-bold text-cm-secondary">{{ t('dtMonth') }}</span>
                            </div>
                            <p class="text-xs text-cm-secondary mt-1">{{ t('dtYear', { price: onlinePrice }) }}</p>
                        </div>

                        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <li class="flex items-center gap-2 text-sm font-bold text-cm-on-surface-variant">
                                <CheckCircleIcon class="w-5 h-5 text-cm-primary shrink-0" />
                                {{ t('desktopOrCloud') }}
                            </li>
                            <li class="flex items-center gap-2 text-sm font-bold text-cm-on-surface-variant">
                                <CheckCircleIcon class="w-5 h-5 text-cm-primary shrink-0" />
                                {{ t('localSupport') }}
                            </li>
                            <li class="flex items-center gap-2 text-sm font-bold text-cm-on-surface-variant">
                                <CheckCircleIcon class="w-5 h-5 text-cm-primary shrink-0" />
                                {{ t('proUpdates') }}
                            </li>
                            <li class="flex items-center gap-2 text-sm font-bold text-cm-on-surface-variant">
                                <CheckCircleIcon class="w-5 h-5 text-cm-primary shrink-0" />
                                {{ t('fullCompliance') }}
                            </li>
                        </ul>

                        <button
                            @click="showOrderModal = true"
                            class="btn-cta-shine block w-full text-center bg-cm-primary text-cm-on-primary py-4 md:py-5 rounded-2xl font-black text-lg md:text-xl hover:scale-[1.02] active:scale-95 transition-all shadow-xl shadow-[#006B59]/30 uppercase tracking-tight cursor-pointer"
                        >
                            {{ t('orderNow') }}
                        </button>

                        <p class="text-center text-xs font-bold text-cm-outline uppercase tracking-tighter italic">
                            {{ t('desktopPrice', { price: offlinePrice }) }} &bull; {{ t('cloudPrice', { price: monthlyPrice }) }}
                        </p>
                    </div>
                </div>
            </section>

            <!-- ═══════════════ TRUST BAR ═══════════════ -->
            <section class="bg-cm-surface-container-low py-10 md:py-14" :aria-label="t('trustLabel')">
                <div class="max-w-7xl mx-auto px-6 md:px-8">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8 text-center">
                        <div class="space-y-1">
                            <p class="text-3xl md:text-4xl font-black text-cm-primary">+100</p>
                            <p class="text-sm md:text-base font-semibold text-cm-on-background/70">{{ t('trustSME') }}</p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-3xl md:text-4xl font-black text-cm-primary">+1000</p>
                            <p class="text-sm md:text-base font-semibold text-cm-on-background/70">{{ t('trustInvoices') }}</p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-3xl md:text-4xl font-black text-cm-primary">99.9%</p>
                            <p class="text-sm md:text-base font-semibold text-cm-on-background/70">{{ t('trustUptime') }}</p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-3xl md:text-4xl font-black text-cm-primary">24/7</p>
                            <p class="text-sm md:text-base font-semibold text-cm-on-background/70">{{ t('trustSupport') }}</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ═══════════════ PROBLEM / SOLUTION ═══════════════ -->
            <section class="py-16 md:py-24 px-6 md:px-8 max-w-7xl mx-auto">
                <div class="grid md:grid-cols-2 gap-12 md:gap-16 items-center">
                    <div class="space-y-6 md:space-y-8">
                        <h2 class="font-headline font-extrabold text-3xl md:text-4xl lg:text-5xl text-cm-on-background leading-tight">
                            {{ t('problemTitle') }}
                        </h2>
                        <div class="space-y-6">
                            <!-- Old method -->
                            <div class="flex gap-4 md:gap-6 p-5 md:p-6 rounded-2xl bg-cm-error/5 border border-cm-error/10">
                                <NoSymbolIcon class="w-8 h-8 md:w-10 md:h-10 text-cm-error shrink-0" />
                                <div>
                                    <h4 class="font-bold text-lg md:text-xl mb-1 text-cm-on-background">{{ t('oldMethod') }}</h4>
                                    <p class="text-cm-secondary text-sm md:text-base">{{ t('oldMethodDesc') }}</p>
                                </div>
                            </div>
                            <!-- SoftyFact solution -->
                            <div class="flex gap-4 md:gap-6 p-5 md:p-6 rounded-2xl bg-cm-primary/5 border border-cm-primary/20">
                                <SparklesIcon class="w-8 h-8 md:w-10 md:h-10 text-cm-primary shrink-0" />
                                <div>
                                    <h4 class="font-bold text-lg md:text-xl mb-1 text-cm-on-background">{{ t('solutionTitle', { name: productName }) }}</h4>
                                    <p class="text-cm-secondary text-sm md:text-base">{{ t('solutionDesc') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Invoice mockup (replaces external image) -->
                    <div class="relative">
                        <div class="bg-cm-primary/10 absolute inset-0 blur-3xl rounded-full" aria-hidden="true"></div>
                        <div class="relative bg-white rounded-3xl shadow-2xl border border-cm-outline-variant/20 p-6 md:p-8 space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-cm-primary flex items-center justify-center">
                                        <DocumentTextIcon class="w-5 h-5 text-white" />
                                    </div>
                                    <div>
                                        <p class="font-bold text-cm-on-background text-sm">Facture #2026-0142</p>
                                        <p class="text-xs text-cm-outline">23 Mars 2026</p>
                                    </div>
                                </div>
                                <span class="bg-cm-primary-container/20 text-cm-primary text-xs font-bold px-3 py-1 rounded-full">{{ t('invoicePaid') }}</span>
                            </div>
                            <div class="border-t border-cm-outline-variant/20 pt-4 space-y-2">
                                <div class="flex justify-between text-sm"><span class="text-cm-secondary">Produit A × 5</span><span class="font-medium text-cm-on-surface">250.000 TND</span></div>
                                <div class="flex justify-between text-sm"><span class="text-cm-secondary">Produit B × 3</span><span class="font-medium text-cm-on-surface">180.000 TND</span></div>
                                <div class="flex justify-between text-sm"><span class="text-cm-secondary">Service C</span><span class="font-medium text-cm-on-surface">120.000 TND</span></div>
                            </div>
                            <div class="border-t border-cm-outline-variant/20 pt-4 space-y-1">
                                <div class="flex justify-between text-sm"><span class="text-cm-secondary">{{ t('subtotalHT') }}</span><span class="font-medium">550.000 TND</span></div>
                                <div class="flex justify-between text-sm"><span class="text-cm-secondary">TVA 19%</span><span class="font-medium">104.500 TND</span></div>
                                <div class="flex justify-between text-sm"><span class="text-cm-secondary">FODEC 1%</span><span class="font-medium">5.500 TND</span></div>
                                <div class="flex justify-between text-sm"><span class="text-cm-secondary">{{ t('stampDuty') }}</span><span class="font-medium">1.000 TND</span></div>
                                <div class="flex justify-between text-base font-bold pt-2 border-t border-cm-outline-variant/20"><span class="text-cm-on-background">{{ t('totalTTC') }}</span><span class="text-cm-primary">661.000 TND</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ═══════════════ FISCAL FEATURES (DARK SECTION) ═══════════════ -->
            <section id="features" class="py-16 md:py-24 bg-cm-inverse-surface text-cm-on-primary px-6 md:px-8 overflow-hidden" aria-labelledby="features-heading">
                <div class="max-w-7xl mx-auto space-y-12 md:space-y-16">
                    <div class="text-center space-y-4">
                        <h2 id="features-heading" class="font-headline font-extrabold text-3xl md:text-4xl lg:text-6xl">{{ t('fiscalTitle') }}</h2>
                        <p class="text-cm-inverse-on-surface/70 text-lg md:text-xl max-w-2xl mx-auto">{{ t('fiscalSubtitle') }}</p>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 md:gap-8">
                        <div class="bg-white/5 p-6 md:p-8 rounded-3xl border border-white/10 hover:bg-white/10 transition-all text-center">
                            <div class="w-14 h-14 md:w-16 md:h-16 bg-cm-primary-container/20 rounded-2xl flex items-center justify-center mx-auto mb-4 md:mb-6">
                                <WalletIcon class="w-8 h-8 text-cm-primary-container" />
                            </div>
                            <h3 class="font-bold text-xl md:text-2xl mb-3 md:mb-4">{{ t('tvaFodec') }}</h3>
                            <p class="text-sm opacity-70">{{ t('tvaFodecDesc') }}</p>
                        </div>
                        <div class="bg-white/5 p-6 md:p-8 rounded-3xl border border-white/10 hover:bg-white/10 transition-all text-center">
                            <div class="w-14 h-14 md:w-16 md:h-16 bg-cm-primary-container/20 rounded-2xl flex items-center justify-center mx-auto mb-4 md:mb-6">
                                <DocumentTextIcon class="w-8 h-8 text-cm-primary-container" />
                            </div>
                            <h3 class="font-bold text-xl md:text-2xl mb-3 md:mb-4">{{ t('tejDeclaration') }}</h3>
                            <p class="text-sm opacity-70">{{ t('tejDeclarationDesc') }}</p>
                        </div>
                        <div class="bg-white/5 p-6 md:p-8 rounded-3xl border border-white/10 hover:bg-white/10 transition-all text-center">
                            <div class="w-14 h-14 md:w-16 md:h-16 bg-cm-primary-container/20 rounded-2xl flex items-center justify-center mx-auto mb-4 md:mb-6">
                                <CloudArrowUpIcon class="w-8 h-8 text-cm-primary-container" />
                            </div>
                            <h3 class="font-bold text-xl md:text-2xl mb-3 md:mb-4">{{ t('elFatoora') }}</h3>
                            <p class="text-sm opacity-70">{{ t('elFatooraDesc') }}</p>
                        </div>
                        <div class="bg-white/5 p-6 md:p-8 rounded-3xl border border-white/10 hover:bg-white/10 transition-all text-center">
                            <div class="w-14 h-14 md:w-16 md:h-16 bg-cm-primary-container/20 rounded-2xl flex items-center justify-center mx-auto mb-4 md:mb-6">
                                <KeyIcon class="w-8 h-8 text-cm-primary-container" />
                            </div>
                            <h3 class="font-bold text-xl md:text-2xl mb-3 md:mb-4">{{ t('withholdingTax') }}</h3>
                            <p class="text-sm opacity-70">{{ t('withholdingTaxDesc') }}</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ═══════════════ HOW IT WORKS ═══════════════ -->
            <section id="how-it-works" class="py-20 md:py-32 px-6 md:px-8 max-w-7xl mx-auto space-y-16 md:space-y-24" aria-labelledby="how-heading">
                <div class="text-center">
                    <h2 id="how-heading" class="font-headline font-extrabold text-3xl md:text-5xl mb-4 md:mb-6">{{ t('howTitle') }}</h2>
                    <p class="text-cm-secondary text-lg md:text-xl">{{ t('howSubtitle') }}</p>
                </div>

                <!-- Step 1 -->
                <div class="flex flex-col md:flex-row items-center gap-10 md:gap-16">
                    <div class="flex-1 space-y-4 md:space-y-6">
                        <div class="w-10 h-10 md:w-12 md:h-12 bg-cm-primary text-cm-on-primary rounded-full flex items-center justify-center font-black text-lg md:text-xl">1</div>
                        <h3 class="text-2xl md:text-3xl font-extrabold text-cm-on-background">{{ t('step1Title') }}</h3>
                        <p class="text-base md:text-lg text-cm-secondary leading-relaxed">{{ t('step1Desc') }}</p>
                    </div>
                    <div class="flex-1">
                        <!-- Dashboard mockup -->
                        <div class="rounded-2xl shadow-2xl border border-cm-outline-variant/30 bg-white p-4 md:p-6">
                            <div class="flex items-center gap-2 mb-4">
                                <div class="w-3 h-3 rounded-full bg-red-400"></div>
                                <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                                <div class="w-3 h-3 rounded-full bg-green-400"></div>
                                <span class="ml-2 text-xs text-cm-outline font-medium">{{ t('dashboardLabel') }}</span>
                            </div>
                            <div class="grid grid-cols-3 gap-3 mb-4">
                                <div class="bg-cm-surface-container-low rounded-xl p-3">
                                    <p class="text-[10px] text-cm-outline uppercase font-bold">{{ t('revenue') }}</p>
                                    <p class="text-lg font-black text-cm-primary">24.5K</p>
                                    <p class="text-[10px] text-green-600 font-bold">↑ +12%</p>
                                </div>
                                <div class="bg-cm-surface-container-low rounded-xl p-3">
                                    <p class="text-[10px] text-cm-outline uppercase font-bold">{{ t('invoices') }}</p>
                                    <p class="text-lg font-black text-cm-on-background">142</p>
                                    <p class="text-[10px] text-green-600 font-bold">↑ +8%</p>
                                </div>
                                <div class="bg-cm-surface-container-low rounded-xl p-3">
                                    <p class="text-[10px] text-cm-outline uppercase font-bold">{{ t('unpaid') }}</p>
                                    <p class="text-lg font-black text-cm-error">3.2K</p>
                                    <p class="text-[10px] text-cm-error font-bold">{{ t('unpaidCount') }}</p>
                                </div>
                            </div>
                            <div class="bg-cm-surface-container-low rounded-xl p-4">
                                <p class="text-xs text-cm-outline font-bold mb-3">{{ t('monthlyRevenue') }}</p>
                                <div class="flex items-end gap-2 h-20">
                                    <div class="flex-1 bg-cm-primary/20 rounded-t" style="height: 35%"></div>
                                    <div class="flex-1 bg-cm-primary/30 rounded-t" style="height: 50%"></div>
                                    <div class="flex-1 bg-cm-primary/50 rounded-t" style="height: 65%"></div>
                                    <div class="flex-1 bg-cm-primary/60 rounded-t" style="height: 45%"></div>
                                    <div class="flex-1 bg-cm-primary/70 rounded-t" style="height: 80%"></div>
                                    <div class="flex-1 bg-cm-primary rounded-t" style="height: 100%"></div>
                                    <div class="flex-1 bg-cm-primary-container rounded-t" style="height: 90%"></div>
                                </div>
                                <div class="flex justify-between text-[10px] text-cm-outline mt-2">
                                    <span>Jan</span><span>Fév</span><span>Mar</span><span>Avr</span><span>Mai</span><span>Jun</span><span>Jul</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="flex flex-col md:flex-row-reverse items-center gap-10 md:gap-16">
                    <div class="flex-1 space-y-4 md:space-y-6">
                        <div class="w-10 h-10 md:w-12 md:h-12 bg-cm-primary text-cm-on-primary rounded-full flex items-center justify-center font-black text-lg md:text-xl">2</div>
                        <h3 class="text-2xl md:text-3xl font-extrabold text-cm-on-background">{{ t('step2Title') }}</h3>
                        <p class="text-base md:text-lg text-cm-secondary leading-relaxed">{{ t('step2Desc') }}</p>
                    </div>
                    <div class="flex-1">
                        <!-- Invoice mockup -->
                        <div class="rounded-2xl shadow-2xl border border-cm-outline-variant/30 bg-white p-4 md:p-6">
                            <div class="flex items-center gap-2 mb-4">
                                <div class="w-3 h-3 rounded-full bg-red-400"></div>
                                <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                                <div class="w-3 h-3 rounded-full bg-green-400"></div>
                                <span class="ml-2 text-xs text-cm-outline font-medium">{{ t('newInvoice') }}</span>
                            </div>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="font-bold text-cm-on-background">{{ t('invoice') }}</p>
                                        <p class="text-xs text-cm-outline">N° FA-2026-0143</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-xs text-cm-outline">Date: 23/03/2026</p>
                                        <p class="text-xs text-cm-outline">Échéance: 22/04/2026</p>
                                    </div>
                                </div>
                                <div class="border-t border-cm-outline-variant/20"></div>
                                <div class="grid grid-cols-4 gap-2 text-[10px] font-bold text-cm-outline uppercase">
                                    <span class="col-span-2">{{ t('designation') }}</span><span class="text-right">{{ t('qty') }}</span><span class="text-right">{{ t('totalHT') }}</span>
                                </div>
                                <div class="grid grid-cols-4 gap-2 text-xs">
                                    <span class="col-span-2 text-cm-on-surface">Imprimante laser A4</span><span class="text-right text-cm-secondary">2</span><span class="text-right font-medium">1,200.000</span>
                                </div>
                                <div class="grid grid-cols-4 gap-2 text-xs">
                                    <span class="col-span-2 text-cm-on-surface">Cartouche encre noire</span><span class="text-right text-cm-secondary">10</span><span class="text-right font-medium">450.000</span>
                                </div>
                                <div class="grid grid-cols-4 gap-2 text-xs">
                                    <span class="col-span-2 text-cm-on-surface">Ramettes papier A4</span><span class="text-right text-cm-secondary">5</span><span class="text-right font-medium">75.000</span>
                                </div>
                                <div class="border-t border-cm-outline-variant/20 pt-2 space-y-1">
                                    <div class="flex justify-between text-xs"><span class="text-cm-secondary">{{ t('totalHT') }}</span><span class="font-medium">1,725.000</span></div>
                                    <div class="flex justify-between text-xs"><span class="text-cm-secondary">TVA 19%</span><span>327.750</span></div>
                                    <div class="flex justify-between text-xs"><span class="text-cm-secondary">{{ t('stampDuty') }}</span><span>1.000</span></div>
                                    <div class="flex justify-between text-sm font-bold pt-1 border-t border-cm-outline-variant/20"><span>{{ t('totalTTC') }}</span><span class="text-cm-primary">2,053.750 TND</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ═══════════════ TESTIMONIALS ═══════════════ -->
            <section class="py-16 md:py-24 bg-cm-surface-container-low px-6 md:px-8" aria-labelledby="testimonials-heading">
                <div class="max-w-7xl mx-auto space-y-12 md:space-y-16">
                    <div class="text-center">
                        <h2 id="testimonials-heading" class="font-headline font-extrabold text-3xl md:text-4xl mb-4">{{ t('testimonialsTitle') }}</h2>
                        <div class="flex justify-center gap-1 mb-2">
                            <StarIcon v-for="n in 5" :key="n" class="w-5 h-5 text-cm-primary" />
                        </div>
                        <p class="text-cm-secondary font-bold">{{ t('testimonialsRating') }}</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                        <!-- Testimonial 1 -->
                        <div class="bg-white p-6 md:p-8 rounded-3xl shadow-sm border border-cm-outline-variant/10 space-y-6">
                            <p class="text-cm-on-surface-variant italic leading-relaxed">{{ t('testimonial1') }}</p>
                            <div class="flex items-center gap-4 border-t border-cm-outline-variant/10 pt-6">
                                <div class="w-12 h-12 bg-cm-primary-container rounded-full flex items-center justify-center">
                                    <UserIcon class="w-5 h-5 text-white" />
                                </div>
                                <div>
                                    <p class="font-bold text-cm-on-background">{{ t('testimonial1Name') }}</p>
                                    <p class="text-xs text-cm-outline font-bold uppercase tracking-wider">{{ t('testimonial1Role') }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Testimonial 2 -->
                        <div class="bg-white p-6 md:p-8 rounded-3xl shadow-sm border border-cm-outline-variant/10 space-y-6">
                            <p class="text-cm-on-surface-variant italic leading-relaxed">{{ t('testimonial2') }}</p>
                            <div class="flex items-center gap-4 border-t border-cm-outline-variant/10 pt-6">
                                <div class="w-12 h-12 bg-cm-primary-container rounded-full flex items-center justify-center">
                                    <UserIcon class="w-5 h-5 text-white" />
                                </div>
                                <div>
                                    <p class="font-bold text-cm-on-background">{{ t('testimonial2Name') }}</p>
                                    <p class="text-xs text-cm-outline font-bold uppercase tracking-wider">{{ t('testimonial2Role') }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Testimonial 3 -->
                        <div class="bg-white p-6 md:p-8 rounded-3xl shadow-sm border border-cm-outline-variant/10 space-y-6">
                            <p class="text-cm-on-surface-variant italic leading-relaxed">{{ t('testimonial3') }}</p>
                            <div class="flex items-center gap-4 border-t border-cm-outline-variant/10 pt-6">
                                <div class="w-12 h-12 bg-cm-primary-container rounded-full flex items-center justify-center">
                                    <UserIcon class="w-5 h-5 text-white" />
                                </div>
                                <div>
                                    <p class="font-bold text-cm-on-background">{{ t('testimonial3Name') }}</p>
                                    <p class="text-xs text-cm-outline font-bold uppercase tracking-wider">{{ t('testimonial3Role') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ═══════════════ FINAL CTA (GREEN BANNER) ═══════════════ -->
            <section class="py-16 md:py-24 px-6 md:px-8 max-w-7xl mx-auto">
                <div class="bg-cm-primary rounded-[2rem] md:rounded-[3rem] p-8 md:p-12 lg:p-24 text-cm-on-primary text-center space-y-8 md:space-y-12 relative overflow-hidden shadow-2xl shadow-[#006B59]/40">
                    <div class="absolute top-0 right-0 w-60 md:w-96 h-60 md:h-96 bg-white/10 rounded-full blur-[100px] -mr-32 md:-mr-48 -mt-32 md:-mt-48" aria-hidden="true"></div>
                    <div class="absolute bottom-0 left-0 w-60 md:w-96 h-60 md:h-96 bg-black/10 rounded-full blur-[100px] -ml-32 md:-ml-48 -mb-32 md:-mb-48" aria-hidden="true"></div>
                    <div class="relative z-10 space-y-6">
                        <h2 class="font-headline font-extrabold text-3xl md:text-5xl lg:text-7xl">{{ t('readyTitle') }}</h2>
                        <p class="text-lg md:text-2xl opacity-90 max-w-2xl mx-auto">{{ t('readySubtitle') }}</p>
                        <div class="flex flex-col items-center gap-6 pt-6 md:pt-8">
                            <div class="flex items-center gap-6">
                                <div class="text-center">
                                    <p class="text-xs opacity-70 font-bold uppercase tracking-widest mb-1">{{ t('desktop') }}</p>
                                    <span class="text-4xl md:text-5xl font-black">{{ offlinePrice }}</span>
                                    <span class="text-lg font-bold ml-1">DT</span>
                                </div>
                                <div class="text-3xl opacity-50 font-light">|</div>
                                <div class="text-center">
                                    <p class="text-xs opacity-70 font-bold uppercase tracking-widest mb-1">{{ t('cloud') }}</p>
                                    <span class="text-4xl md:text-5xl font-black">{{ monthlyPrice }}</span>
                                    <span class="text-lg font-bold ml-1">{{ t('dtMonth') }}</span>
                                    <p class="text-[10px] opacity-60 font-bold">{{ onlinePrice }} DT/an</p>
                                </div>
                            </div>
                            <button
                                @click="showOrderModal = true"
                                class="btn-cta-shine bg-white text-cm-primary px-8 md:px-12 py-4 md:py-6 rounded-2xl font-black text-xl md:text-2xl hover:scale-105 transition-all shadow-xl shadow-black/20 uppercase tracking-tight cursor-pointer"
                            >
                                {{ t('orderNow') }}
                            </button>
                        </div>
                        <p class="text-sm opacity-80 font-medium">{{ t('freeInstall') }}</p>
                    </div>
                </div>
            </section>

            <!-- ═══════════════ CONTACT FORM ═══════════════ -->
            <section id="contact" class="py-16 md:py-24 px-6 md:px-8 max-w-5xl mx-auto" aria-labelledby="contact-heading">
                <div class="bg-white rounded-[2rem] shadow-2xl overflow-hidden border border-cm-outline-variant/10">
                    <div class="p-8 md:p-12 lg:p-20 space-y-8 md:space-y-10">
                        <div class="text-center space-y-4">
                            <h3 id="contact-heading" class="font-headline font-extrabold text-3xl md:text-4xl">{{ t('contactTitle') }}</h3>
                            <p class="text-cm-secondary">{{ t('contactSubtitle') }}</p>
                        </div>

                        <!-- Success State -->
                        <div v-if="formSubmitted" class="flex flex-col items-center justify-center text-center space-y-4 py-8">
                            <div class="w-16 h-16 bg-cm-primary/10 rounded-full flex items-center justify-center">
                                <CheckCircleIcon class="w-10 h-10 text-cm-primary" />
                            </div>
                            <h3 class="font-headline font-bold text-2xl text-cm-on-background">{{ t('thankYou') }}</h3>
                            <p class="text-cm-secondary">{{ t('requestSent') }}</p>
                            <button @click="formSubmitted = false" class="text-cm-primary font-semibold hover:underline mt-4">{{ t('sendAnother') }}</button>
                        </div>

                        <!-- Form -->
                        <form v-else @submit.prevent="submitLead" class="space-y-6" novalidate>
                            <div class="grid md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label for="contact-name" class="text-xs font-black text-cm-outline uppercase tracking-widest">{{ t('fullName') }}</label>
                                    <input
                                        id="contact-name"
                                        v-model="form.name"
                                        type="text"
                                        :placeholder="t('fullNamePlaceholder')"
                                        class="w-full bg-cm-surface-container-low px-5 md:px-6 py-3 md:py-4 rounded-xl border-none ring-1 ring-cm-outline-variant/30 focus:ring-2 focus:ring-cm-primary transition-all text-base md:text-lg font-medium"
                                        required
                                    />
                                    <p v-if="form.errors.name" class="text-xs text-cm-error mt-1">{{ form.errors.name }}</p>
                                </div>
                                <div class="space-y-2">
                                    <label for="contact-phone" class="text-xs font-black text-cm-outline uppercase tracking-widest">{{ t('phone') }}</label>
                                    <input
                                        id="contact-phone"
                                        v-model="form.phone"
                                        type="tel"
                                        :placeholder="t('phonePlaceholder')"
                                        class="w-full bg-cm-surface-container-low px-5 md:px-6 py-3 md:py-4 rounded-xl border-none ring-1 ring-cm-outline-variant/30 focus:ring-2 focus:ring-cm-primary transition-all text-base md:text-lg font-medium"
                                        required
                                    />
                                    <p v-if="form.errors.phone" class="text-xs text-cm-error mt-1">{{ form.errors.phone }}</p>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label for="contact-company" class="text-xs font-black text-cm-outline uppercase tracking-widest">{{ t('companyName') }}</label>
                                <input
                                    id="contact-company"
                                    v-model="form.company"
                                    type="text"
                                    :placeholder="t('companyNamePlaceholder')"
                                    class="w-full bg-cm-surface-container-low px-5 md:px-6 py-3 md:py-4 rounded-xl border-none ring-1 ring-cm-outline-variant/30 focus:ring-2 focus:ring-cm-primary transition-all text-base md:text-lg font-medium"
                                />
                                <p v-if="form.errors.company" class="text-xs text-cm-error mt-1">{{ form.errors.company }}</p>
                            </div>
                            <div class="space-y-2">
                                <label for="contact-message" class="text-xs font-black text-cm-outline uppercase tracking-widest">{{ t('messageOptional') }}</label>
                                <textarea
                                    id="contact-message"
                                    v-model="form.message"
                                    :placeholder="t('messagePlaceholder')"
                                    rows="3"
                                    class="w-full bg-cm-surface-container-low px-5 md:px-6 py-3 md:py-4 rounded-xl border-none ring-1 ring-cm-outline-variant/30 focus:ring-2 focus:ring-cm-primary transition-all text-base md:text-lg font-medium resize-none"
                                ></textarea>
                                <p v-if="form.errors.message" class="text-xs text-cm-error mt-1">{{ form.errors.message }}</p>
                            </div>
                            <button
                                type="submit"
                                :disabled="form.processing"
                                class="w-full bg-cm-on-background text-white py-5 md:py-6 rounded-xl font-black text-lg md:text-xl hover:opacity-90 transition-all shadow-lg disabled:opacity-50 disabled:cursor-not-allowed"
                            >
                                <span v-if="form.processing">{{ t('sending') }}</span>
                                <span v-else>{{ t('validateOrder') }}</span>
                            </button>
                            <p class="text-center text-xs text-cm-outline font-medium">{{ t('securePayment') }}</p>
                        </form>
                    </div>
                </div>
            </section>
        </main>

        <!-- ═══════════════ FOOTER ═══════════════ -->
        <footer class="bg-slate-50 border-t border-slate-200 mt-20" role="contentinfo">
            <div class="px-6 md:px-8 py-12 md:py-16 max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-8">
                <img src="/logo.png" :alt="productName" class="h-8 md:h-10 w-auto" />
                <p class="text-sm text-slate-500 text-center font-medium">{{ t('allRightsReserved', { year: new Date().getFullYear(), name: productName }) }}</p>
                <div class="flex gap-6 md:gap-8">
                    <Link href="/confidentialite" class="text-xs font-bold text-slate-400 hover:text-cm-primary transition-colors uppercase tracking-widest">{{ t('privacy') }}</Link>
                    <Link href="/conditions" class="text-xs font-bold text-slate-400 hover:text-cm-primary transition-colors uppercase tracking-widest">{{ t('terms') }}</Link>
                </div>
            </div>
        </footer>

        <!-- ═══════════════ MOBILE FAB ═══════════════ -->
        <div class="fixed bottom-6 right-6 z-40 md:hidden">
            <a href="tel:+21671000000" class="w-14 h-14 bg-cm-primary text-cm-on-primary rounded-full shadow-2xl flex items-center justify-center active:scale-90 transition-transform" aria-label="Appeler maintenant">
                <PhoneIcon class="w-6 h-6" />
            </a>
        </div>

        <!-- ═══════════════ ORDER TYPE MODAL ═══════════════ -->
        <OrderTypeModal :show="showOrderModal" @close="showOrderModal = false" />
    </div>
</template>

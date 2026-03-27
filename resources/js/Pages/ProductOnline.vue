<script setup>
import { Link, Head } from '@inertiajs/vue3'
import { ref, computed } from 'vue'
import { usePage } from '@inertiajs/vue3'
import axios from 'axios'
import { useI18n } from 'vue-i18n'
import LanguageSwitcher from '@/Components/Common/LanguageSwitcher.vue'

const { t } = useI18n()
const $page = usePage()

const productName = computed(() => $page.props.productName || $page.props.appName || 'SoftyFact')
const coreAppUrl = computed(() => $page.props.coreAppUrl || 'https://app.softyfact.tn')
const pagePrice = computed(() => $page.props.orderAmount ?? 99)
const priceFormatted = computed(() => pagePrice.value.toFixed(3))
const monthlyPrice = computed(() => (pagePrice.value / 12).toFixed(2))
const totalFormatted = computed(() => (pagePrice.value + 6).toFixed(3))

const form = ref({
  nom: '',
  telephone: '',
  email: '',
  adresse: '',
})

const openFaq = ref(null)
function toggleFaq(index) {
  openFaq.value = openFaq.value === index ? null : index
}
const faqs = computed(() => [
  { q: t('faq_online_q1'), a: t('faq_online_a1') },
  { q: t('faq_online_q2'), a: t('faq_online_a2') },
  { q: t('faq_online_q3'), a: t('faq_online_a3') },
  { q: t('faq_online_q4'), a: t('faq_online_a4') },
  { q: t('faq_online_q5'), a: t('faq_online_a5') },
  { q: t('faq_online_q6'), a: t('faq_online_a6') },
])

const submitted = ref(false)
const submitting = ref(false)
const errorMessage = ref('')
const phoneError = ref('')
const emailError = ref('')

const validatePhone = () => {
  const digits = form.value.telephone.replace(/\s/g, '')
  if (!digits) {
    phoneError.value = t('phoneRequired_err')
  } else if (!/^[0-9]{8}$/.test(digits)) {
    phoneError.value = t('phoneDigits_err')
  } else {
    phoneError.value = ''
  }
}

const validateEmail = () => {
  const email = form.value.email.trim()
  if (!email) {
    emailError.value = t('emailRequired_err')
  } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
    emailError.value = t('emailInvalid_err')
  } else {
    emailError.value = ''
  }
}

const isFormValid = computed(() => {
  const digits = form.value.telephone.replace(/\s/g, '')
  const email = form.value.email.trim()
  return /^[0-9]{8}$/.test(digits) && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)
})

const scrollToForm = () => {
  document.getElementById('order-form')?.scrollIntoView({ behavior: 'smooth', block: 'center' })
}

const submitOrder = async () => {
  validatePhone()
  validateEmail()
  if (phoneError.value || emailError.value) return
  submitting.value = true
  errorMessage.value = ''
  try {
    const response = await axios.post('/orders', {
      name: form.value.nom,
      phone: form.value.telephone,
      email: form.value.email,
      address: form.value.adresse,
      type: 'online',
    })
    submitting.value = false
    if (response.data.redirect) {
      window.location.href = response.data.redirect
    } else {
      submitted.value = true
    }
  } catch (err) {
    submitting.value = false
    const errors = err.response?.data?.errors
    if (errors) {
      const first = Object.values(errors)[0]
      errorMessage.value = Array.isArray(first) ? first[0] : first
    } else {
      errorMessage.value = err.response?.data?.message || t('genericError')
    }
  }
}

const jsonLd = computed(() => JSON.stringify({
  '@context': 'https://schema.org',
  '@type': 'Product',
  name: `${productName.value} — Version Cloud — Logiciel de facturation en ligne`,
  description: 'Version cloud du logiciel de facturation et gestion commerciale pour les entreprises tunisiennes. Accessible partout, sans installation.',
  brand: { '@type': 'Brand', name: productName.value },
  offers: {
    '@type': 'Offer',
    url: 'https://softyfact.tn/product/online',
    price: String(pagePrice.value),
    priceCurrency: 'TND',
    availability: 'https://schema.org/InStock',
    priceValidUntil: '2026-12-31',
    seller: { '@type': 'Organization', name: productName.value },
  },
  aggregateRating: {
    '@type': 'AggregateRating',
    ratingValue: '4.8',
    ratingCount: '1000',
    bestRating: '5',
  },
  category: 'Business Software',
  operatingSystem: 'Web',
}))

const screenshots = computed(() => [
  { title: t('screen_dashboard'), image: '/screen/Tableau de bord.png', description: t('screen_dashboard_desc') },
  { title: t('screen_invoices'), image: '/screen/Gestion des factures.png', description: t('screen_invoices_desc') },
  { title: t('screen_product'), image: '/screen/ajout-produit.png', description: t('screen_product_desc') },
  { title: t('screen_documents'), image: '/screen/gestion-des-documents(exemple Devis).png', description: t('screen_documents_desc') },
  { title: t('screen_clients'), image: '/screen/gestion des clients.png', description: t('screen_clients_desc') },
  { title: t('screen_fournisseurs'), image: '/screen/gestion des Fournisseurs.png', description: t('screen_fournisseurs_desc') },
  { title: t('screen_stock'), image: '/screen/Gestion de stock.png', description: t('screen_stock_desc') },
  { title: t('screen_payments'), image: '/screen/gestion Paiements (encaissements et décaissements).png', description: t('screen_payments_desc') },
  { title: t('screen_warehouses'), image: '/screen/gestion des Entrepôts .png', description: t('screen_warehouses_desc') },
  { title: t('screen_tej'), image: '/screen/Certificats TEJ.png', description: t('screen_tej_desc') },
])

const features = computed(() => [
  t('feat_online_invoicing'),
  t('feat_online_stock'),
  t('feat_online_fiscal'),
  t('feat_online_tej'),
  t('feat_online_pdf'),
  t('feat_online_contacts'),
  t('feat_online_payments'),
  t('feat_online_cloud_backup'),
  t('feat_online_access'),
  t('feat_online_updates'),
])
</script>

<template>
  <Head>
    <title>{{ productName }} Version Cloud — Logiciel de facturation en ligne | {{ monthlyPrice }} DT/mois</title>
    <meta name="description" :content="`Commandez ${productName} Version Cloud : logiciel de facturation en ligne pour les entreprises tunisiennes. Accessible partout, accès immédiat. ${monthlyPrice} DT/mois (${pagePrice} DT/an).`" />
    <meta name="keywords" :content="`logiciel facturation en ligne tunisie, ${productName} cloud, logiciel gestion commerciale en ligne, facturation cloud tunisie, saas facturation`" />
    <link rel="canonical" href="https://softyfact.tn/product/online" />
    <meta name="robots" content="index, follow" />
    <meta name="author" :content="productName" />
    <meta property="og:type" content="product" />
    <meta property="og:title" :content="`${productName} Version Cloud — Facturation en ligne | ${pagePrice} DT`" />
    <meta property="og:description" content="Version cloud du logiciel de facturation pour les entreprises tunisiennes. Accessible partout, sans installation." />
    <meta property="og:url" content="https://softyfact.tn/product/online" />
    <meta property="og:site_name" :content="productName" />
    <meta property="og:locale" content="fr_TN" />
    <meta property="product:price:amount" :content="String(pagePrice)" />
    <meta property="product:price:currency" content="TND" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" :content="`${productName} Version Cloud | ${pagePrice} DT`" />
    <meta name="twitter:description" content="Logiciel de facturation en ligne pour le marché tunisien. Accessible depuis tout navigateur." />
    <link rel="preload" href="/fonts/plus-jakarta-sans/plus-jakarta-sans-latin.woff2" as="font" type="font/woff2" crossorigin />
    <link rel="preload" href="/fonts/inter/inter-latin.woff2" as="font" type="font/woff2" crossorigin />
  </Head>

  <Teleport to="head">
      <component is="script" type="application/ld+json" v-html="jsonLd" />
  </Teleport>

  <div class="min-h-screen bg-cm-surface font-sans text-cm-on-surface antialiased">
    <!-- ═══════════════ NAVBAR ═══════════════ -->
    <nav class="fixed top-0 w-full z-50 bg-white/70 backdrop-blur-xl shadow-sm" :aria-label="t('navLabel')">
      <div class="flex justify-between items-center px-6 md:px-8 py-4 max-w-7xl mx-auto">
        <Link href="/" :aria-label="`${productName} — ${t('home')}`">
          <img src="/logo.png" :alt="productName" class="h-8 md:h-10 w-auto" />
        </Link>
        <div class="hidden md:flex items-center gap-6">
          <Link href="/" class="flex items-center gap-1.5 text-cm-secondary font-medium text-sm tracking-tight hover:text-cm-primary transition-colors">
            <span class="material-symbols-outlined text-base">home</span>
            {{ t('home') }}
          </Link>
          <a href="/#features" class="flex items-center gap-1.5 text-cm-secondary font-medium text-sm tracking-tight hover:text-cm-primary transition-colors">
            <span class="material-symbols-outlined text-base">settings</span>
            {{ t('features') }}
          </a>
          <a href="/#how-it-works" class="flex items-center gap-1.5 text-cm-secondary font-medium text-sm tracking-tight hover:text-cm-primary transition-colors">
            <span class="material-symbols-outlined text-base">help</span>
            {{ t('howItWorks') }}
          </a>
          <a href="/#contact" class="flex items-center gap-1.5 text-cm-secondary font-medium text-sm tracking-tight hover:text-cm-primary transition-colors">
            <span class="material-symbols-outlined text-base">mail</span>
            {{ t('contact') }}
          </a>
        </div>
        <div class="flex items-center gap-3">
          <LanguageSwitcher />
          <a :href="coreAppUrl + '/login'" class="hidden sm:block text-sm font-semibold text-cm-secondary px-4 py-2 hover:opacity-80 transition-all">{{ t('login') }}</a>
          <Link href="/" class="bg-cm-primary text-cm-on-primary px-5 py-2.5 rounded-xl font-bold text-sm tracking-tight transition-transform active:scale-95 shadow-lg shadow-[#006B59]/20">
            {{ t('home') }}
          </Link>
        </div>
      </div>
    </nav>

    <div class="h-[72px]"></div>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 pb-28 lg:pb-12">

      <!-- ═══════════════ PRODUCT HEADER ═══════════════ -->
      <div class="text-center mb-6 sm:mb-12">
        <!-- Version badge -->
        <div class="inline-flex items-center gap-2 bg-blue-500/10 px-4 py-1.5 rounded-full mb-4">
          <span class="material-symbols-outlined text-blue-500 text-base" style="font-variation-settings: 'FILL' 1;">cloud</span>
          <span class="text-xs font-bold text-blue-500 tracking-widest uppercase">{{ t('onlineBadge') }} — {{ monthlyPrice }} DT/{{ t('month') }}</span>
        </div>
        <h1 class="font-headline font-extrabold text-2xl sm:text-4xl lg:text-5xl text-cm-on-background">
          {{ productName }}
        </h1>
        <p class="sm:block text-lg text-cm-secondary mt-2">
          {{ t('onlineSubtitle') }}
        </p>
        <!-- Switch to offline -->
        <div class="mt-3 hidden">
          <Link href="/product/offline" class="inline-flex items-center gap-1.5 text-sm text-cm-primary font-medium hover:underline">
            <span class="material-symbols-outlined text-base" style="font-variation-settings: 'FILL' 1;">desktop_windows</span>
            {{ t('preferDesktop') }}
          </Link>
        </div>
      </div>

      <!-- ═══════════════ TWO COLUMN: Product + Form ═══════════════ -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-start">

        <!-- Left: Product showcase -->
        <div class="order-1 lg:order-1">
          <div class="relative">
            <img src="/softy-fact%20(solution%20de%20facturation%20en%20tunisie).png" :alt="`${productName} product screenshot`" class=" " />
          </div>

          <!-- Pricing badge -->
          <div class="flex items-center justify-center gap-4 mt-4 sm:mt-6">
            <div class="text-center">
              <p class="text-xs sm:text-sm text-cm-outline line-through">299 DT/{{ t('year') }}</p>
              <p class="text-3xl sm:text-4xl font-black text-blue-500">{{ monthlyPrice }} <span class="text-sm sm:text-base font-bold text-cm-secondary">DT/{{ t('month') }}</span></p>
              <p class="text-xs text-cm-secondary mt-1">{{ t('ie') }} {{ pagePrice }} DT HT/{{ t('year') }}</p>
            </div>
            <div class="bg-blue-500 text-white text-sm font-bold px-4 py-2 rounded-full animate-pulse">
              -67%
            </div>
          </div>
        </div>

        <!-- Right: Order form -->
        <div class="order-2 lg:order-2">
          <div id="order-form" class="bg-white rounded-3xl shadow-2xl border border-cm-outline-variant/10 p-4 sm:p-8 sticky top-24">

            <!-- Success state -->
            <div v-if="submitted" class="text-center py-8">
              <div class="w-16 h-16 bg-blue-500/10 rounded-full flex items-center justify-center mx-auto mb-4">
                <span class="material-symbols-outlined text-blue-500 text-4xl" style="font-variation-settings: 'FILL' 1;">check_circle</span>
              </div>
              <h3 class="font-headline font-bold text-xl text-cm-on-background mb-2">{{ t('orderSent') }}</h3>
              <p class="text-cm-secondary">{{ t('onlineOrderConfirm') }}</p>
              <Link href="/" class="mt-6 inline-block text-blue-500 hover:underline font-medium">
                ← {{ t('backToHome') }}
              </Link>
            </div>

            <!-- Order form -->
            <div v-else>
              <!-- Mobile price strip -->
              <div class="flex items-center justify-between lg:hidden mb-4 bg-blue-500/10 rounded-xl px-4 py-3">
                <div>
                  <p class="text-xs text-cm-outline line-through">299 DT/{{ t('year') }}</p>
                  <p class="text-2xl font-black text-blue-500">{{ monthlyPrice }} <span class="text-sm font-bold text-cm-secondary">DT/{{ t('month') }}</span></p>
                  <p class="text-[10px] text-cm-secondary">{{ pagePrice }} DT/{{ t('year') }}</p>
                </div>
                <div class="text-right">
                  <div class="inline-flex bg-blue-500 text-white text-sm font-bold px-3 py-1 rounded-full mb-1">-67%</div>
                  <p class="text-xs text-cm-secondary">{{ t('instantAccessBadge') }}</p>
                </div>
              </div>

              <!-- Instant access badge -->
              <div class="flex items-center gap-2 bg-green-50 text-green-700 px-4 py-2.5 rounded-xl mb-4 border border-green-200">
                <span class="material-symbols-outlined text-lg" style="font-variation-settings: 'FILL' 1;">bolt</span>
                <span class="text-sm font-semibold">{{ t('instantAccessBadge') }}</span>
              </div>

              <h2 class="font-headline font-bold text-xl text-cm-on-background mb-2">
                {{ t('orderCloud', { name: productName }) }}
              </h2>
              <p class="text-sm text-cm-secondary mb-4 sm:mb-6">
                {{ t('fillInfoEmail') }}
              </p>

              <form @submit.prevent="submitOrder" class="space-y-4">
                <div>
                  <label class="text-xs font-bold text-cm-on-background uppercase">{{ t('name') }}</label>
                  <input
                    v-model="form.nom"
                    type="text"
                    :placeholder="t('namePlaceholder')"
                    class="mt-1 w-full bg-cm-surface px-4 py-3 rounded-xl border-none ring-1 ring-cm-on-background/30 focus:ring-2 focus:ring-blue-500 transition-all"
                </div>

                <!-- Version toggle switch -->
                <div v-if="$page.props.showVersionSwitch" class="flex items-center justify-center bg-gray-100 rounded-xl p-1">
                  <Link href="/product/offline" class="flex-1 flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-lg text-sm font-bold text-gray-500 hover:text-cm-primary transition-all">
                    <span class="material-symbols-outlined text-base" style="font-variation-settings: 'FILL' 1;">desktop_windows</span>
                    {{ t('desktopVersion') }}
                  </Link>
                  <span class="flex-1 flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-lg text-sm font-bold bg-blue-500 text-white shadow-sm transition-all">
                    <span class="material-symbols-outlined text-base">cloud</span>
                    {{ t('cloudVersion') }}
                  </span>
                </div>

                <div>
                  <label class="text-xs font-bold text-cm-on-background uppercase">
                    {{ t('email') }} <span class="text-cm-error">*</span>
                  </label>
                  <input
                    v-model="form.email"
                    type="email"
                    required
                    :placeholder="t('emailPlaceholder')"
                    @blur="validateEmail"
                    @input="emailError = ''"
                    :class="['mt-1 w-full px-4 py-3 rounded-xl bg-cm-surface border-none ring-1 focus:ring-2 transition-all',
                      emailError ? 'ring-cm-error focus:ring-cm-error' : 'ring-cm-on-background/30 focus:ring-blue-500']"
                  />
                  <p v-if="emailError" class="mt-1 text-xs text-cm-error flex items-center gap-1">
                    <span class="material-symbols-outlined text-sm">error</span>
                    {{ emailError }}
                  </p>
                </div>

                <div>
                  <label class="text-xs font-bold text-cm-on-background uppercase">
                    {{ t('phoneRequired') }} <span class="text-cm-error">*</span>
                  </label>
                  <input
                    v-model="form.telephone"
                    type="tel"
                    inputmode="numeric"
                    required
                    placeholder="XX XXX XXX"
                    maxlength="11"
                    @blur="validatePhone"
                    @input="phoneError = ''"
                    :class="['mt-1 w-full px-4 py-3 rounded-xl bg-cm-surface border-none ring-1 focus:ring-2 transition-all',
                      phoneError ? 'ring-cm-error focus:ring-cm-error' : 'ring-cm-on-background/30 focus:ring-blue-500']"
                  />
                  <p v-if="phoneError" class="mt-1 text-xs text-cm-error flex items-center gap-1">
                    <span class="material-symbols-outlined text-sm">error</span>
                    {{ phoneError }}
                  </p>
                </div>

                <div>
                  <label class="text-xs font-bold text-cm-on-background uppercase">{{ t('address') }}</label>
                  <textarea
                    v-model="form.adresse"
                    rows="3"
                    :placeholder="t('addressPlaceholder')"
                    class="mt-1 w-full bg-cm-surface px-4 py-3 rounded-xl border-none ring-1 ring-cm-on-background/30 focus:ring-2 focus:ring-blue-500 transition-all resize-none"
                  ></textarea>
                </div>

                <div v-if="errorMessage" class="bg-cm-error-container text-cm-error text-sm rounded-xl p-3 flex items-center gap-2">
                  <span class="material-symbols-outlined text-lg">error</span>
                  {{ errorMessage }}
                </div>

                <button
                  type="submit"
                  :disabled="submitting || !isFormValid"
                  class="btn-cta-shine btn-buy w-full py-4 bg-blue-500 hover:scale-[1.02] disabled:opacity-50 disabled:cursor-not-allowed text-white font-bold text-base sm:text-lg rounded-xl shadow-lg shadow-blue-500/20 transition-all flex items-center justify-center gap-2"
                >
                  <span v-if="submitting" class="material-symbols-outlined animate-spin text-xl">progress_activity</span>
                  <span v-if="!submitting">{{ t('commandInstant') }}</span>
                  <span v-if="!submitting" class="material-symbols-outlined">arrow_forward</span>
                  <span v-else>{{ t('sending') }}</span>
                </button>
              </form>

              <!-- Order summary -->
              <div class="mt-6 bg-cm-surface-container-low rounded-xl p-4 space-y-3">
                <div class="flex justify-between text-sm text-cm-secondary">
                  <span>{{ t('cloudAnnual') }}</span>
                  <span class="font-medium text-cm-on-surface">{{ priceFormatted }} DT/{{ t('year') }}</span>
                </div>
                <div class="flex justify-between text-sm text-cm-secondary">
                  <span>{{ t('perMonth') }}</span>
                  <span class="font-medium text-cm-on-surface">{{ monthlyPrice }} DT/{{ t('month') }}</span>
                </div>
                <div class="flex justify-between text-sm text-cm-secondary">
                  <span>{{ t('deliveryInstall') }}</span>
                  <span class="font-medium text-cm-on-surface">6.000 DT</span>
                </div>
                <div class="border-t border-cm-outline-variant/20 pt-3 flex justify-between">
                  <span class="font-bold text-cm-on-background">{{ t('total') }}</span>
                  <span class="font-bold text-blue-500 text-lg">{{ totalFormatted }} DT</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <img src="/softyfact-features-details-en-ligne.png" :alt="productName" class="hidden lg:block w-full h-auto rounded-2xl shadow-lg mt-12 " loading="lazy" />

      <video autoplay muted playsinline class="w-full h-auto rounded-2xl shadow-lg lg:hidden mt-3" loading="lazy">
        <source src="/softyfact--features-details.mp4" type="video/mp4" />
        {{ t('videoNotSupported') }}
      </video>

      <!-- ═══════════════ FEATURES CHECKLIST ═══════════════ -->
      <div class="mt-12 sm:mt-20">
        <div class="hidden">
          <h2 class="font-headline font-extrabold text-2xl text-cm-on-background mb-2 text-center">{{ t('description') }}</h2>
          <p class="text-center text-cm-secondary mb-10 max-w-2xl mx-auto">
            {{ t('onlineDescription', { name: productName }) }}
          </p>
  
          <div class="bg-white rounded-3xl shadow-sm border border-cm-outline-variant/10 p-4 sm:p-8 max-w-3xl mx-auto mb-12">
            <h3 class="font-headline font-bold text-lg text-cm-on-background mb-6">{{ t('includedFeatures') }}</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
              <div v-for="feature in features" :key="feature" class="flex items-start gap-2">
                <span class="material-symbols-outlined text-blue-500 text-lg mt-0.5 flex-shrink-0" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                <span class="text-sm text-cm-on-surface">{{ feature }}</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Screenshots grid -->
        <h3 class="font-headline font-bold text-lg text-cm-on-background mb-6 text-center">{{ t('appPreview') }}</h3>
        <div class="grid grid-cols-1 gap-6">
          <div v-for="s in screenshots" :key="s.title" class="bg-white rounded-3xl shadow-sm border border-cm-outline-variant/10 overflow-hidden">
            <div class="bg-cm-surface-container-low px-3 py-2 flex items-center gap-1.5">
              <div class="w-2 h-2 rounded-full bg-cm-error/60"></div>
              <div class="w-2 h-2 rounded-full bg-cm-primary-container/60"></div>
              <div class="w-2 h-2 rounded-full bg-cm-primary/60"></div>
              <span class="ml-2 text-[10px] text-cm-outline">{{ s.title }}</span>
            </div>
            <div class="bg-gradient-to-br from-blue-500/10 to-cm-surface-container-low">
              <img :src="s.image" :alt="s.title" class="w-full h-auto object-cover border border-cm-outline-variant/30" loading="lazy" />
            </div>
            <div class="p-4">
              <p class="text-sm text-cm-secondary">{{ s.description }}</p>
            </div>
          </div>
        </div>
      </div>

      <img src="/nous-gratuites.png" :alt="productName" class="hidden lg:block w-full h-auto rounded-2xl shadow-lg mt-12 " loading="lazy" />

      <!-- ═══════════════ BOTTOM CTA ═══════════════ -->
      <div class="mt-12 sm:mt-20 bg-gradient-to-br from-blue-600 to-blue-500 rounded-3xl p-6 sm:p-12 text-center relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(circle_at_30%_50%,rgba(255,255,255,0.1),transparent)]"></div>
        <div class="relative z-10">
          <h2 class="font-headline font-extrabold text-2xl sm:text-3xl text-white mb-3">{{ t('readyOnline') }}</h2>
          <p class="text-white/70 mb-8 max-w-xl mx-auto">
            {{ t('readyOnlineSub') }}
          </p>
          <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="#" @click.prevent="scrollToForm" class="w-full sm:w-auto px-6 sm:px-8 py-3 bg-white text-blue-500 font-bold rounded-xl hover:scale-[1.02] active:scale-95 transition-all shadow-lg">
              {{ t('commandPrice') }} — {{ monthlyPrice }} DT/{{ t('month') }}
            </a>
            <a :href="'tel:' + ($page.props.supportPhone || '').replace(/\s/g, '')" class="w-full sm:w-auto px-6 sm:px-8 py-3 border-2 border-white/30 text-white font-semibold rounded-xl hover:bg-white/10 transition flex items-center justify-center gap-2">
              <span class="material-symbols-outlined text-lg">phone_in_talk</span>
              <span dir="ltr">{{ $page.props.supportPhone }}</span>
            </a>
          </div>
        </div>
      </div>
    </main>

    <!-- ═══════════════ MOBILE STICKY CTA ═══════════════ -->
    <div v-if="!submitted" class="fixed bottom-0 left-0 right-0 z-50 lg:hidden bg-white/95 backdrop-blur-xl border-t border-cm-outline-variant/20 shadow-2xl px-4 py-3">
      <button
        @click="scrollToForm"
        class="btn-buy w-full py-3 sm:py-4 bg-blue-500 text-white font-bold text-sm sm:text-base rounded-xl shadow-lg shadow-blue-500/30 transition-all flex items-center justify-center gap-2 active:scale-95"
      >
        <span>{{ t('commandCloud') }}</span>
        <span class="material-symbols-outlined text-lg">arrow_forward</span>
        <span class="text-white/70 text-sm font-normal">{{ monthlyPrice }} DT/{{ t('month') }}</span>
      </button>
    </div>

    <!-- ═══════════════ FAQ ═══════════════ -->
    <section class="py-16 md:py-20 px-6 md:px-8 max-w-3xl mx-auto">
      <h2 class="font-headline font-extrabold text-2xl md:text-3xl text-cm-on-background text-center mb-10">
        {{ t('faqTitle') }}
      </h2>
      <div class="space-y-3">
        <div v-for="(faq, i) in faqs" :key="i" class="border border-cm-outline-variant/30 rounded-xl overflow-hidden">
          <button
            @click="toggleFaq(i)"
            class="w-full flex items-center justify-between gap-4 px-5 py-4 text-left font-semibold text-cm-on-background hover:bg-cm-surface-container-low transition-colors"
            :aria-expanded="openFaq === i"
          >
            <span>{{ faq.q }}</span>
            <span class="material-symbols-outlined text-xl shrink-0 transition-transform duration-200" :class="{ 'rotate-180': openFaq === i }">expand_more</span>
          </button>
          <div v-show="openFaq === i" class="px-5 pb-4 text-sm text-cm-on-background/70 leading-relaxed">
            {{ faq.a }}
          </div>
        </div>
      </div>
    </section>

    <!-- ═══════════════ FOOTER ═══════════════ -->
    <footer class="bg-slate-50 mt-20" role="contentinfo">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-10 md:gap-12 px-6 md:px-8 py-12 md:py-16 max-w-7xl mx-auto">
        <div class="col-span-1">
          <img src="/logo.png" :alt="productName" class="h-8 md:h-10 w-auto mb-4 md:mb-6" />
          <p class="text-sm text-slate-500 leading-relaxed">{{ t('footerDesc') }}</p>
        </div>
        <div>
          <h5 class="font-bold text-slate-900 mb-4 md:mb-6">{{ t('product') }}</h5>
          <ul class="space-y-3 md:space-y-4">
            <li><Link href="/product/offline" class="text-sm text-slate-500 hover:text-cm-primary transition-all underline decoration-[#006B59]/30 underline-offset-4">{{ t('desktopVersion') }}</Link></li>
            <li><Link href="/product/online" class="text-sm text-slate-500 hover:text-blue-500 transition-all underline decoration-blue-500/30 underline-offset-4">{{ t('cloudVersion') }}</Link></li>
            <li><Link href="/#features" class="text-sm text-slate-500 hover:text-cm-primary transition-all underline decoration-[#006B59]/30 underline-offset-4">{{ t('features') }}</Link></li>
          </ul>
        </div>
        <div>
          <h5 class="font-bold text-slate-900 mb-4 md:mb-6">{{ t('support') }}</h5>
          <ul class="space-y-3 md:space-y-4">
            <li><Link href="/contact" class="text-sm text-slate-500 hover:text-cm-primary transition-all underline decoration-[#006B59]/30 underline-offset-4">{{ t('localSupportLink') }}</Link></li>
            <li><a href="#" class="text-sm text-slate-500 hover:text-cm-primary transition-all underline decoration-[#006B59]/30 underline-offset-4">{{ t('userGuide') }}</a></li>
          </ul>
        </div>
        <div>
          <h5 class="font-bold text-slate-900 mb-4 md:mb-6">{{ t('legal') }}</h5>
          <ul class="space-y-3 md:space-y-4">
            <li><Link href="/conditions" class="text-sm text-slate-500 hover:text-cm-primary transition-all underline decoration-[#006B59]/30 underline-offset-4">{{ t('termsOfUse') }}</Link></li>
            <li><Link href="/confidentialite" class="text-sm text-slate-500 hover:text-cm-primary transition-all underline decoration-[#006B59]/30 underline-offset-4">{{ t('privacyPolicy') }}</Link></li>
          </ul>
        </div>
      </div>
      <div class="px-6 md:px-8 py-6 md:py-8 max-w-7xl mx-auto border-t border-slate-200">
        <p class="text-sm text-slate-500 text-center">{{ t('allRightsReservedOnline', { year: new Date().getFullYear(), name: productName }) }}</p>
      </div>
    </footer>
  </div>
</template>

<style scoped>
@keyframes shimmer {
  0%   { transform: translateX(-120%) skewX(-20deg); }
  100% { transform: translateX(220%) skewX(-20deg); }
}
.btn-buy {
  position: relative;
  overflow: hidden;
}
.btn-buy:not(:disabled)::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(
    90deg,
    transparent 0%,
    rgba(255,255,255,0.22) 50%,
    transparent 100%
  );
  animation: shimmer 2.4s ease-in-out infinite;
  pointer-events: none;
}
</style>

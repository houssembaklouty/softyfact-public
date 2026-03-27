<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

const props = defineProps({
  order: Object,
})

const page = usePage()
const coreAppUrl = computed(() => page.props.coreAppUrl || 'https://app.softyfact.tn')
</script>

<template>
  <Head title="Commande confirmée" />

  <div class="min-h-screen bg-gradient-to-br from-cm-surface via-white to-cm-surface dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 flex items-center justify-center p-6">
    <div class="w-full max-w-lg">
      <!-- Logo -->
      <div class="text-center mb-8">
        <img src="/logo.png" alt="SoftyFact" class="w-16 h-16 mx-auto mb-3 rounded-xl shadow-lg" />
      </div>

      <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 p-8">
        <!-- Success icon -->
        <div class="text-center mb-6">
          <div class="w-20 h-20 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
          </div>
          <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Commande envoyée !</h1>
          <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
            Merci pour votre confiance. Votre commande a été enregistrée avec succès.
          </p>
        </div>

        <!-- Order details -->
        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-5 mb-6 space-y-3">
          <div v-if="order.name" class="flex justify-between text-sm">
            <span class="text-gray-500 dark:text-gray-400">Nom</span>
            <span class="font-medium text-gray-900 dark:text-white">{{ order.name }}</span>
          </div>
          <div class="flex justify-between text-sm">
            <span class="text-gray-500 dark:text-gray-400">Téléphone</span>
            <span class="font-medium text-gray-900 dark:text-white">{{ order.phone }}</span>
          </div>
          <div v-if="order.address" class="flex justify-between text-sm">
            <span class="text-gray-500 dark:text-gray-400">Adresse</span>
            <span class="font-medium text-gray-900 dark:text-white">{{ order.address }}</span>
          </div>
          <div class="border-t border-gray-200 dark:border-gray-600 pt-3 flex justify-between">
            <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">Montant</span>
            <span class="text-lg font-bold text-cm-primary">{{ Number($page.props.orderAmount ?? 149).toFixed(3) }} DT</span>
          </div>
        </div>

        <!-- Next steps -->
        <div class="bg-cm-primary/5 dark:bg-cm-primary/10 rounded-xl p-5 mb-6">
          <h3 class="text-sm font-bold text-cm-primary dark:text-cm-inverse-primary mb-3 flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Prochaines étapes
          </h3>
          <ol class="space-y-2 text-sm text-cm-primary dark:text-cm-inverse-primary">
            <li class="flex items-start gap-2">
              <span class="flex-shrink-0 w-5 h-5 bg-cm-primary text-white rounded-full flex items-center justify-center text-xs font-bold">1</span>
              <span>Notre équipe va traiter votre commande</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="flex-shrink-0 w-5 h-5 bg-cm-primary text-white rounded-full flex items-center justify-center text-xs font-bold">2</span>
              <span>Vous recevrez votre code d'activation par colis</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="flex-shrink-0 w-5 h-5 bg-cm-primary text-white rounded-full flex items-center justify-center text-xs font-bold">3</span>
              <span><a :href="coreAppUrl + '/activate'" class="underline font-semibold">Activez votre licence</a> et commencez à utiliser SoftyFact</span>
            </li>
          </ol>
        </div>

        <!-- Actions -->
        <div class="flex flex-col gap-3">
          <Link
            href="/"
            class="w-full py-3 bg-cm-primary hover:bg-cm-primary/90 text-white font-semibold text-center rounded-xl shadow-lg shadow-cm-primary/25 transition"
          >
            Retour à l'accueil
          </Link>
          <a
            :href="'tel:' + $page.props.supportPhone.replace(/\s/g, '')"
            class="w-full py-3 border-2 border-gray-200 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-medium text-center rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition flex items-center justify-center gap-2"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
            Nous contacter — {{ $page.props.supportPhone }}
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

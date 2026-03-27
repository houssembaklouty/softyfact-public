<script setup>
import { Link, Head, usePage } from '@inertiajs/vue3'
import { ref } from 'vue'

const page = usePage()
const phone = page.props.supportPhone
</script>

<template>
  <Head>
    <title>Contact — SoftyFact</title>
    <meta name="description" content="Contactez l'équipe SoftyFact pour toute question sur le logiciel, une commande ou le support technique." />
  </Head>

  <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
    <!-- Navbar -->
    <nav class="fixed top-0 w-full bg-white/90 dark:bg-gray-900/90 backdrop-blur-md border-b border-gray-200 dark:border-gray-800 z-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">
        <Link href="/" class="flex items-center gap-2 hover:opacity-80 transition">
          <img src="/logo.png" alt="SoftyFact" class="w-8 h-8 rounded-lg object-contain" />
          <span class="text-xl font-bold text-gray-900 dark:text-white">SoftyFact</span>
        </Link>
        <Link href="/product" class="text-sm font-medium text-white bg-cm-primary hover:bg-cm-primary/90 px-4 py-2 rounded-lg transition">
          Commander
        </Link>
      </div>
    </nav>

    <div class="h-16"></div>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
      <div class="text-center mb-12">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-3">Contactez-nous</h1>
        <p class="text-gray-600 dark:text-gray-400">Notre équipe est disponible pour répondre à toutes vos questions sur le logiciel, les commandes ou le support technique.</p>
      </div>

      <!-- Contact cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-12">

        <!-- Phone -->
        <a
          :href="'tel:' + phone.replace(/\s/g, '')"
          class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 p-6 shadow-sm hover:shadow-md hover:border-cm-primary/30 dark:hover:border-cm-primary transition flex items-start gap-4"
        >
          <div class="w-12 h-12 bg-cm-primary/5 dark:bg-cm-primary/10 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-cm-primary/10 dark:group-hover:bg-cm-primary/15 transition">
            <svg class="w-6 h-6 text-cm-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
          </div>
          <div>
            <p class="text-sm font-semibold text-gray-500 dark:text-gray-400 mb-0.5">Téléphone</p>
            <p class="text-lg font-bold text-gray-900 dark:text-white group-hover:text-cm-primary transition">{{ phone }}</p>
            <p class="text-xs text-gray-400 mt-1">Disponible du lun. au sam., 9h – 18h</p>
          </div>
        </a>

        <!-- WhatsApp -->
        <a
          :href="'https://wa.me/216' + phone.replace(/\s/g, '')"
          target="_blank"
          rel="noopener noreferrer"
          class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 p-6 shadow-sm hover:shadow-md hover:border-green-300 dark:hover:border-green-500 transition flex items-start gap-4"
        >
          <div class="w-12 h-12 bg-green-50 dark:bg-green-900/30 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-green-100 dark:group-hover:bg-green-900/50 transition">
            <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
              <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
              <path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.554 4.117 1.529 5.845L.057 23.882l6.2-1.625A11.945 11.945 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.818 9.818 0 01-5.006-1.369l-.359-.213-3.719.975.993-3.624-.234-.372A9.818 9.818 0 012.182 12C2.182 6.573 6.573 2.182 12 2.182S21.818 6.573 21.818 12 17.427 21.818 12 21.818z"/>
            </svg>
          </div>
          <div>
            <p class="text-sm font-semibold text-gray-500 dark:text-gray-400 mb-0.5">WhatsApp</p>
            <p class="text-lg font-bold text-gray-900 dark:text-white group-hover:text-green-600 transition">{{ phone }}</p>
            <p class="text-xs text-gray-400 mt-1">Réponse rapide via WhatsApp</p>
          </div>
        </a>

      </div>

      <!-- FAQ quick links -->
      <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 p-6 shadow-sm">
        <h2 class="text-base font-bold text-gray-900 dark:text-white mb-4">Questions fréquentes</h2>
        <ul class="space-y-3 text-sm">
          <li class="flex items-start gap-2">
            <svg class="w-4 h-4 text-cm-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span class="text-gray-600 dark:text-gray-400">Comment recevoir ma licence après commande ?<br><span class="text-gray-400 dark:text-gray-500 text-xs">Votre code d'activation vous sera remis lors de la livraison.</span></span>
          </li>
          <li class="flex items-start gap-2">
            <svg class="w-4 h-4 text-cm-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span class="text-gray-600 dark:text-gray-400">Sur combien d'appareils puis-je utiliser le logiciel ?<br><span class="text-gray-400 dark:text-gray-500 text-xs">La licence couvre jusqu'à 4 appareils pour une même entreprise.</span></span>
          </li>
          <li class="flex items-start gap-2">
            <svg class="w-4 h-4 text-cm-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span class="text-gray-600 dark:text-gray-400">Les mises à jour sont-elles incluses ?<br><span class="text-gray-400 dark:text-gray-500 text-xs">Oui, toutes les mises à jour sont gratuites et incluses dans votre licence à vie.</span></span>
          </li>
          <li class="flex items-start gap-2">
            <svg class="w-4 h-4 text-cm-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span class="text-gray-600 dark:text-gray-400">Le logiciel fonctionne-t-il sans internet ?<br><span class="text-gray-400 dark:text-gray-500 text-xs">L'application bureau fonctionne hors ligne. La version web nécessite une connexion.</span></span>
          </li>
        </ul>
      </div>

    </div>

    <!-- Footer -->
    <footer class="border-t border-gray-200 dark:border-gray-800 mt-12 py-8 px-4 sm:px-6 lg:px-8 bg-white dark:bg-gray-900">
      <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4 text-sm text-gray-500 dark:text-gray-400">
        <span>© 2026 SoftyFact. Tous droits réservés.</span>
        <div class="flex gap-6">
          <Link href="/conditions" class="hover:text-cm-primary transition">Conditions</Link>
          <Link href="/confidentialite" class="hover:text-cm-primary transition">Confidentialité</Link>
          <Link href="/contact" class="hover:text-cm-primary transition">Contact</Link>
        </div>
      </div>
    </footer>
  </div>
</template>

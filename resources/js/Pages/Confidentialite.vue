<script setup>
import { Link, Head } from '@inertiajs/vue3'
</script>

<template>
  <Head>
    <title>Politique de Confidentialité — SoftyFact</title>
    <meta name="description" content="Découvrez comment SoftyFact collecte, utilise et protège vos données personnelles." />
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
      <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Politique de Confidentialité</h1>
      <p class="text-sm text-gray-500 dark:text-gray-400 mb-10">Dernière mise à jour : 28 février 2026</p>

      <div class="space-y-8 text-gray-700 dark:text-gray-300">

        <section>
          <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-2">1. Responsable du traitement</h2>
          <p>Le responsable du traitement des données collectées via le logiciel et le site <strong>softyfact.tn</strong> est SoftyFact, société basée en Tunisie.</p>
        </section>

        <section>
          <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-2">2. Données collectées</h2>
          <p>Nous collectons les données suivantes lors de l'achat ou de l'utilisation du logiciel :</p>
          <ul class="list-disc pl-5 mt-2 space-y-1">
            <li><strong>Données de commande :</strong> nom, numéro de téléphone, adresse, ville ;</li>
            <li><strong>Données de compte :</strong> nom de l'entreprise, adresse, matricule fiscal ;</li>
            <li><strong>Données d'utilisation :</strong> journaux d'activité anonymisés pour améliorer le logiciel.</li>
          </ul>
          <p class="mt-2">Nous ne collectons <strong>aucune donnée bancaire</strong>. Les paiements sont réglés hors ligne.</p>
        </section>

        <section>
          <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-2">3. Finalité du traitement</h2>
          <p>Les données collectées sont utilisées pour :</p>
          <ul class="list-disc pl-5 mt-2 space-y-1">
            <li>Traiter et livrer les commandes de licence ;</li>
            <li>Assurer le support technique et le suivi client ;</li>
            <li>Améliorer le logiciel et détecter les anomalies ;</li>
            <li>Respecter les obligations légales en vigueur en Tunisie.</li>
          </ul>
        </section>

        <section>
          <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-2">4. Partage des données</h2>
          <p>SoftyFact ne vend ni ne loue vos données personnelles à des tiers. Les données peuvent être partagées uniquement dans les cas suivants :</p>
          <ul class="list-disc pl-5 mt-2 space-y-1">
            <li>Prestataires techniques (hébergement, sauvegardes) soumis à des obligations de confidentialité ;</li>
            <li>Autorités compétentes en cas d'obligation légale.</li>
          </ul>
        </section>

        <section>
          <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-2">5. Durée de conservation</h2>
          <p>Les données sont conservées pendant la durée de la relation commerciale et au minimum 5 ans après la dernière transaction, conformément aux dispositions légales tunisiennes.</p>
        </section>

        <section>
          <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-2">6. Sécurité</h2>
          <p>Nous mettons en œuvre des mesures techniques et organisationnelles appropriées pour protéger vos données contre tout accès non autorisé, perte ou divulgation : chiffrement HTTPS, accès restreints, sauvegardes régulières.</p>
        </section>

        <section>
          <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-2">7. Vos droits</h2>
          <p>Conformément à la loi organique tunisienne n° 2004-63 portant sur la protection des données personnelles, vous disposez d'un droit d'accès, de rectification et de suppression de vos données. Pour exercer ces droits, contactez-nous via la page <Link href="/contact" class="text-cm-primary hover:underline">Contact</Link>.</p>
        </section>

        <section>
          <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-2">8. Cookies</h2>
          <p>Le site <strong>softyfact.tn</strong> utilise des cookies techniques strictement nécessaires au fonctionnement de la session. Aucun cookie publicitaire ou de traçage n'est utilisé.</p>
        </section>

        <section>
          <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-2">9. Modifications</h2>
          <p>Nous nous réservons le droit de modifier cette politique à tout moment. La date de mise à jour en haut de page sera actualisée en conséquence. Nous vous encourageons à la consulter régulièrement.</p>
        </section>

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

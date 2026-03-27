<script setup>
import { Link, Head } from '@inertiajs/vue3'
</script>

<template>
  <Head>
    <title>Conditions Générales d'Utilisation — SoftyFact</title>
    <meta name="description" content="Consultez les conditions générales d'utilisation du logiciel SoftyFact." />
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
      <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Conditions Générales d'Utilisation</h1>
      <p class="text-sm text-gray-500 dark:text-gray-400 mb-10">Dernière mise à jour : 28 février 2026</p>

      <div class="prose prose-cm-primary dark:prose-invert max-w-none space-y-8 text-gray-700 dark:text-gray-300">

        <section>
          <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-2">1. Objet</h2>
          <p>Les présentes Conditions Générales d'Utilisation (CGU) régissent l'utilisation du logiciel <strong>SoftyFact</strong>, solution de facturation et de gestion commerciale éditée et commercialisée par SoftyFact. En achetant ou en activant le logiciel, l'utilisateur accepte sans réserve les présentes conditions.</p>
        </section>

        <section>
          <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-2">2. Licence d'utilisation</h2>
          <p>L'achat de SoftyFact confère à l'acheteur une <strong>licence personnelle, non exclusive et non transférable</strong> d'utilisation du logiciel. La licence est valable à vie et couvre les mises à jour gratuites publiées par l'éditeur. La licence est liée à une seule entreprise et peut être activée sur un maximum de 4 appareils appartenant à cette entreprise.</p>
        </section>

        <section>
          <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-2">3. Utilisation autorisée</h2>
          <p>L'utilisateur s'engage à utiliser le logiciel uniquement à des fins légales et conformément à la législation tunisienne en vigueur. Il est interdit de :</p>
          <ul class="list-disc pl-5 mt-2 space-y-1">
            <li>Copier, redistribuer ou revendre le logiciel ou sa licence ;</li>
            <li>Tenter de décompiler, désassembler ou reverse-engineer le logiciel ;</li>
            <li>Utiliser le logiciel au nom de plusieurs entreprises avec une seule licence ;</li>
            <li>Partager ses identifiants de connexion avec des tiers non autorisés.</li>
          </ul>
        </section>

        <section>
          <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-2">4. Prix et paiement</h2>
          <p>Le prix affiché est en <strong>Dinars Tunisiens (DT)</strong>, toutes taxes comprises. Le paiement s'effectue en une seule fois. Aucun abonnement mensuel n'est requis. Le prix peut être modifié à tout moment pour les nouvelles commandes, sans impact sur les licences déjà achetées.</p>
        </section>

        <section>
          <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-2">5. Livraison</h2>
          <p>Après confirmation de la commande et réception du paiement, le code d'activation de la licence est remis au client <strong>lors de la livraison</strong>.</p>
        </section>

        <section>
          <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-2">6. Mises à jour</h2>
          <p>Les mises à jour correctives et fonctionnelles sont incluses gratuitement dans la licence à vie. SoftyFact se réserve le droit de modifier le logiciel à tout moment pour améliorer ses fonctionnalités ou corriger des anomalies.</p>
        </section>

        <section>
          <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-2">7. Responsabilité</h2>
          <p>SoftyFact met tout en œuvre pour assurer le bon fonctionnement du logiciel mais ne peut être tenu responsable des pertes de données, interruptions d'activité ou tout préjudice indirect résultant de l'utilisation ou de l'impossibilité d'utiliser le logiciel. Il appartient à l'utilisateur de sauvegarder régulièrement ses données.</p>
        </section>

        <section>
          <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-2">8. Résiliation</h2>
          <p>SoftyFact se réserve le droit de désactiver une licence en cas de violation avérée des présentes CGU, sans remboursement.</p>
        </section>

        <section>
          <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-2">9. Droit applicable</h2>
          <p>Les présentes CGU sont soumises au droit tunisien. Tout litige relève de la compétence exclusive des tribunaux tunisiens.</p>
        </section>

        <section>
          <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-2">10. Contact</h2>
          <p>Pour toute question relative aux présentes conditions, contactez-nous via la page <Link href="/contact" class="text-cm-primary hover:underline">Contact</Link>.</p>
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

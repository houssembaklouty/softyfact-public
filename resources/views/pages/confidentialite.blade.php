@extends('app')

@section('meta')
<title>Politique de Confidentialité — SoftyFact</title>
<meta name="description" content="Découvrez comment SoftyFact collecte, utilise et protège vos données personnelles." />
<meta name="robots" content="index, follow" />
<link rel="canonical" href="https://softyfact.tn/confidentialite" />
@endsection

@section('body')
<div class="min-h-screen bg-gray-50">
    @include('partials._navbar-simple')
    <div class="h-16"></div>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Politique de Confidentialité</h1>
        <p class="text-sm text-gray-500 mb-10">Dernière mise à jour : 28 février 2026</p>

        <div class="space-y-8 text-gray-700">

            <section>
                <h2 class="text-lg font-bold text-gray-900 mb-2">1. Responsable du traitement</h2>
                <p>Le responsable du traitement des données collectées via le logiciel et le site <strong>softyfact.tn</strong> est SoftyFact, société basée en Tunisie.</p>
            </section>

            <section>
                <h2 class="text-lg font-bold text-gray-900 mb-2">2. Données collectées</h2>
                <p>Nous collectons les données suivantes lors de l'achat ou de l'utilisation du logiciel :</p>
                <ul class="list-disc pl-5 mt-2 space-y-1">
                    <li><strong>Données de commande :</strong> nom, numéro de téléphone, adresse, ville ;</li>
                    <li><strong>Données de compte :</strong> nom de l'entreprise, adresse, matricule fiscal ;</li>
                    <li><strong>Données d'utilisation :</strong> journaux d'activité anonymisés pour améliorer le logiciel.</li>
                </ul>
                <p class="mt-2">Nous ne collectons <strong>aucune donnée bancaire</strong>. Les paiements sont réglés hors ligne.</p>
            </section>

            <section>
                <h2 class="text-lg font-bold text-gray-900 mb-2">3. Finalité du traitement</h2>
                <p>Les données collectées sont utilisées pour :</p>
                <ul class="list-disc pl-5 mt-2 space-y-1">
                    <li>Traiter et livrer les commandes de licence ;</li>
                    <li>Assurer le support technique et le suivi client ;</li>
                    <li>Améliorer le logiciel et détecter les anomalies ;</li>
                    <li>Respecter les obligations légales en vigueur en Tunisie.</li>
                </ul>
            </section>

            <section>
                <h2 class="text-lg font-bold text-gray-900 mb-2">4. Partage des données</h2>
                <p>SoftyFact ne vend ni ne loue vos données personnelles à des tiers. Les données peuvent être partagées uniquement dans les cas suivants :</p>
                <ul class="list-disc pl-5 mt-2 space-y-1">
                    <li>Prestataires techniques (hébergement, sauvegardes) soumis à des obligations de confidentialité ;</li>
                    <li>Autorités compétentes en cas d'obligation légale.</li>
                </ul>
            </section>

            <section>
                <h2 class="text-lg font-bold text-gray-900 mb-2">5. Durée de conservation</h2>
                <p>Les données sont conservées pendant la durée de la relation commerciale et au minimum 5 ans après la dernière transaction, conformément aux dispositions légales tunisiennes.</p>
            </section>

            <section>
                <h2 class="text-lg font-bold text-gray-900 mb-2">6. Sécurité</h2>
                <p>Nous mettons en œuvre des mesures techniques et organisationnelles appropriées pour protéger vos données contre tout accès non autorisé, perte ou divulgation : chiffrement HTTPS, accès restreints, sauvegardes régulières.</p>
            </section>

            <section>
                <h2 class="text-lg font-bold text-gray-900 mb-2">7. Vos droits</h2>
                <p>Conformément à la loi organique tunisienne n° 2004-63 portant sur la protection des données personnelles, vous disposez d'un droit d'accès, de rectification et de suppression de vos données. Pour exercer ces droits, contactez-nous via la page <a href="/contact" class="text-cm-primary hover:underline">Contact</a>.</p>
            </section>

            <section>
                <h2 class="text-lg font-bold text-gray-900 mb-2">8. Cookies</h2>
                <p>Le site <strong>softyfact.tn</strong> utilise des cookies techniques strictement nécessaires au fonctionnement de la session. Aucun cookie publicitaire ou de traçage n'est utilisé.</p>
            </section>

            <section>
                <h2 class="text-lg font-bold text-gray-900 mb-2">9. Modifications</h2>
                <p>Nous nous réservons le droit de modifier cette politique à tout moment. La date de mise à jour en haut de page sera actualisée en conséquence. Nous vous encourageons à la consulter régulièrement.</p>
            </section>
        </div>
    </div>

    @include('partials._footer-simple')
</div>
@endsection

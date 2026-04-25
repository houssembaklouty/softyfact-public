<!DOCTYPE html>
<html class="light" lang="fr">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="/favicon/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">

    <title>{{ $productName }} | Logiciel de Facturation Tunisien - {{ $pagePrice }} DT</title>
<meta name="description" content="Commandez {{ $productName }} : logiciel de facturation pour les entreprises tunisiennes. {{ $pagePrice }} DT — Licence à vie." />
<link rel="canonical" href="https://softyfact.tn/product/buyonepay" />
<meta property="og:type" content="product" />
<meta property="og:title" content="{{ $productName }} — Logiciel de facturation | {{ $pagePrice }} DT" />
<meta property="product:price:amount" content="{{ $pagePrice }}" />
<meta property="product:price:currency" content="TND" />

    {{-- Facebook Pixel --}}
    @if(config('app.fb_pixel_id'))
    <script>
        !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
        n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
        document,'script','https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '{{ config('app.fb_pixel_id') }}');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id={{ config('app.fb_pixel_id') }}&ev=PageView&noscript=1" /></noscript>
    @endif

<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<script id="tailwind-config">
tailwind.config = {
    darkMode: "class",
    theme: {
        extend: {
            "colors": {
                "inverse-surface": "#283040",
                "on-surface-variant": "#3e4945",
                "surface": "#f9f9ff",
                "secondary-fixed-dim": "#bfc6db",
                "secondary": "#565e70",
                "tertiary-fixed-dim": "#ffb3ad",
                "surface-container-low": "#f1f3ff",
                "on-primary-container": "#95e8d1",
                "surface-dim": "#d2daef",
                "primary": "#005143",
                "surface-variant": "#dbe2f7",
                "on-tertiary-fixed": "#410004",
                "on-tertiary-container": "#ffccc8",
                "surface-container-highest": "#dbe2f7",
                "on-secondary": "#ffffff",
                "on-secondary-fixed": "#141c2b",
                "primary-fixed": "#9ef3db",
                "on-tertiary-fixed-variant": "#930013",
                "on-primary-fixed-variant": "#005143",
                "tertiary": "#920013",
                "error": "#ba1a1a",
                "secondary-container": "#d8e0f4",
                "outline": "#6e7975",
                "on-background": "#141c2b",
                "tertiary-fixed": "#ffdad7",
                "surface-tint": "#006b59",
                "outline-variant": "#bec9c4",
                "on-secondary-fixed-variant": "#3f4758",
                "on-surface": "#141c2b",
                "on-primary-fixed": "#002019",
                "on-error": "#ffffff",
                "secondary-fixed": "#dbe2f7",
                "primary-container": "#006b59",
                "tertiary-container": "#b91a24",
                "error-container": "#ffdad6",
                "surface-container": "#e8eeff",
                "surface-container-high": "#e0e8fd",
                "inverse-on-surface": "#ecf0ff",
                "on-secondary-container": "#5b6374",
                "on-tertiary": "#ffffff",
                "on-error-container": "#93000a",
                "background": "#f9f9ff",
                "inverse-primary": "#83d6c0",
                "surface-bright": "#f9f9ff",
                "surface-container-lowest": "#ffffff",
                "primary-fixed-dim": "#83d6c0",
                "on-primary": "#ffffff"
            },
            "borderRadius": {
                "DEFAULT": "0.25rem",
                "lg": "0.5rem",
                "xl": "0.75rem",
                "full": "9999px"
            },
            "fontFamily": {
                "headline": ["Plus Jakarta Sans"],
                "body": ["Inter"],
                "label": ["Plus Jakarta Sans"]
            }
        }
    }
}
</script>

<style>
.material-symbols-outlined {
    font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 24
}
.zellige-pattern {
    background-image: url(https://lh3.googleusercontent.com/aida-public/AB6AXuAZ_T9PihfvK0RTOXl3kIf7Zmmg9ITBXPGVJm1jGQLN11PR7qGLUcDmD9cEaOGHYqoWKuUrZDVcZ28BRTOz26x-A6Mzqn75CtnipMjy8AlEpB3tZxeiuwat-KIkS1vZvIqseTcLeNukxJX0CUNCZAON6ToD1VtGDxaASkziXcRjfiUeFdokX8cmEjdXtAOnRg_QxLbkOBcuP-mgUbsIQRomDCQ0Id_9O-OAmNhdZhq7e6nIIbYnyDEEeOdf1Wrfevwg7OoI3l9RNg0);
    opacity: 0.03
}
body { min-height: max(884px, 100dvh); }
[x-cloak] { display: none !important; }
.hero-gradient { background: linear-gradient(135deg, #005143 0%, #006b59 100%); }
</style>
</head>

@php
$tunisCities = ['Ariana','Béja','Ben Arous','Bizerte','Gabès','Gafsa','Jendouba','Kairouan','Kasserine','Kébili','Kef','Mahdia','Manouba','Médenine','Monastir','Nabeul','Sfax','Sidi Bouzid','Siliana','Sousse','Tataouine','Tozeur','Tunis','Zaghouan'];
@endphp

<body class="bg-surface font-body text-on-surface overflow-x-hidden"
    x-data="{
        form: { nom: '', telephone: '', ville: '', email: '', adresse: '' },
        submitted: false,
        submitting: false,
        errorMessage: '',
        phoneError: '',
        cityDropdownOpen: false,
        citySearch: '',
        cities: @js($tunisCities),
        get filteredCities() {
            const q = this.citySearch.trim().toLowerCase();
            return q ? this.cities.filter(c => c.toLowerCase().includes(q)) : this.cities;
        },
        get isFormValid() {
            const digits = this.form.telephone.replace(/\s/g, '');
            const email = this.form.email.trim();
            return /^[0-9]{8}$/.test(digits) && this.form.ville && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email) && this.form.adresse.trim();
        },
        validatePhone() {
            const digits = this.form.telephone.replace(/\s/g, '');
            if (!digits) this.phoneError = 'Le téléphone est requis';
            else if (!/^[0-9]{8}$/.test(digits)) this.phoneError = 'Le téléphone doit contenir 8 chiffres';
            else this.phoneError = '';
        },
        selectCity(city) {
            this.form.ville = city;
            this.cityDropdownOpen = false;
            this.citySearch = '';
        },
        scrollToForm() {
            document.getElementById('reserve')?.scrollIntoView({ behavior: 'smooth', block: 'center' });
        },
        async submitOrder() {
            this.validatePhone();
            if (this.phoneError || !this.form.ville || !this.form.email.trim() || !this.form.adresse.trim()) return;
            this.submitting = true;
            this.errorMessage = '';
            try {
                const resp = await axios.post('/orders', {
                    name: this.form.nom,
                    phone: this.form.telephone,
                    city: this.form.ville,
                    email: this.form.email,
                    address: this.form.adresse,
                    type: 'online',
                }, {
                    headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content }
                });
                this.submitting = false;
                if (typeof gtag === 'function') gtag('event', 'purchase', { currency: 'TND', value: {{ $pagePrice }} });
                if (resp.data.redirect) window.location.href = resp.data.redirect;
                else this.submitted = true;
            } catch (err) {
                this.submitting = false;
                const errors = err.response?.data?.errors;
                if (errors) { const first = Object.values(errors)[0]; this.errorMessage = Array.isArray(first) ? first[0] : first; }
                else this.errorMessage = err.response?.data?.message || 'Une erreur est survenue';
            }
        },
        // Lightbox
        lightboxOpen: false,
        lightboxImage: '',
        lightboxAlt: '',
        openLightbox(src, alt) {
            this.lightboxImage = src;
            this.lightboxAlt = alt;
            this.lightboxOpen = true;
            document.body.style.overflow = 'hidden';
        },
        closeLightbox() {
            this.lightboxOpen = false;
            document.body.style.overflow = '';
        }
    }">

<!-- TopAppBar -->
<nav class="fixed top-0 w-full z-50 bg-white/80 backdrop-blur-xl shadow-[0px_24px_48px_-12px_rgba(20,28,43,0.08)]">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">
        <a href="/" aria-label="{{ $productName }} — Accueil">
            <picture>
                <source srcset="/logo.webp" type="image/webp">
                <img src="/logo.png" alt="{{ $productName }}" class="h-8 md:h-10 w-auto" width="40" height="43">
            </picture>
        </a>
        <!-- Desktop Navigation -->
        <nav class="hidden md:flex items-center gap-8">
            <a class="text-secondary font-medium hover:text-primary transition-colors" href="#features">Fonctionnalités</a>
            <a class="text-secondary font-medium hover:text-primary transition-colors" href="#how-it-works">Comment ça marche</a>
            <a class="text-secondary font-medium hover:text-primary transition-colors" href="#pricing">Tarifs</a>
        </nav>
        <div class="flex items-center gap-3">
            <a href="{{ $coreAppUrl }}" class="hidden md:block text-secondary font-medium hover:text-primary transition-colors">Connexion</a>
            <button @click="scrollToForm" class="hero-gradient text-white px-5 py-2 rounded-lg font-medium shadow-lg shadow-[#006b59]/20 hover:opacity-90 transition-opacity active:scale-95 duration-200">
                Commander
            </button>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="relative pt-28 md:pt-32 pb-16 md:pb-24 px-6 overflow-hidden">
    <div class="absolute inset-0 z-0 zellige-pattern"></div>
    <div class="relative z-10 max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Hero Content -->
            <div class="text-center lg:text-left order-1">
                <span class="inline-block py-1 px-3 bg-primary/10 text-primary font-headline font-semibold text-xs tracking-wider rounded-full mb-6">CONFORME AUX NORMES TUNISIENNES</span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-headline font-extrabold text-on-background leading-tight mb-6 tracking-tight">
                    Simplifiez votre <span class="text-primary">facturation</span>
                </h1>
                <p class="text-on-surface-variant text-lg md:text-xl mb-8 leading-relaxed max-w-xl mx-auto lg:mx-0">
                    Le logiciel de gestion tout-en-un conçu pour les PME tunisiennes. Gérez votre TVA, FODEC et Retenue à la source en un clic.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start items-center">
                    <button @click="scrollToForm" class="w-full sm:w-auto hero-gradient text-white py-4 px-8 rounded-xl font-headline font-bold text-lg shadow-lg shadow-primary/20 flex items-center justify-center gap-2 active:scale-95 duration-200 hover:opacity-90">
                        Commander maintenant <span class="material-symbols-outlined">arrow_forward</span>
                    </button>
                    <div class="flex flex-col items-center lg:items-start">
                        <span class="text-3xl font-headline font-extrabold text-on-surface">{{ $pagePrice }} TND <span class="text-sm font-medium text-secondary">HT</span></span>
                        <span class="text-xs text-primary font-semibold flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">verified</span>
                            Licence à vie - Sans abonnement
                        </span>
                    </div>
                </div>
            </div>
            <!-- Hero Image -->
            <div class="relative flex items-center justify-center order-2 lg:order-2">
                <div class="absolute -z-10 w-64 h-64 md:w-96 md:h-96 bg-primary/10 rounded-full blur-3xl"></div>
                <img alt="{{ $productName }} Product Box" class="w-full max-w-md drop-shadow-2xl rounded-2xl transform hover:rotate-2 transition-transform duration-500" src="/softy-fact%20(solution%20de%20facturation%20en%20tunisie).png"/>
            </div>
        </div>
    </div>
</section>


<!-- Comparison Section -->
<section class="py-16 md:py-24 px-6" id="features">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl md:text-4xl font-headline font-extrabold text-on-background text-center mb-12">Le choix de la performance</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">
            <!-- Old Way -->
            <div class="bg-surface-container-high rounded-2xl p-6 md:p-8 relative overflow-hidden border-l-4 border-error/30">
                <div class="flex items-center gap-3 mb-4">
                    <span class="material-symbols-outlined text-error text-2xl">cancel</span>
                    <h3 class="font-headline font-bold text-xl text-on-surface">Ancienne Méthode</h3>
                </div>
                <ul class="space-y-3 text-on-surface-variant text-sm md:text-base">
                    <li class="flex items-start gap-2">
                        <span class="material-symbols-outlined text-xs mt-1">remove</span>
                        Erreurs de calcul Excel manuelles
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="material-symbols-outlined text-xs mt-1">remove</span>
                        Perte de temps sur la déclaration TVA
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="material-symbols-outlined text-xs mt-1">remove</span>
                        Retenues à la source non suivies
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="material-symbols-outlined text-xs mt-1">remove</span>
                        Documents non conformes
                    </li>
                </ul>
            </div>
            <!-- SoftyFact Way -->
            <div class="bg-surface-container-lowest shadow-xl rounded-2xl p-6 md:p-8 relative overflow-hidden border-l-4 border-primary shadow-[0px_24px_48px_-12px_rgba(20,28,43,0.08)]">
                <div class="absolute top-4 right-4 bg-primary text-white text-[10px] px-2 py-1 rounded-full font-bold uppercase">Optimisé</div>
                <div class="flex items-center gap-3 mb-4">
                    <span class="material-symbols-outlined text-primary text-2xl" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                    <h3 class="font-headline font-bold text-xl text-on-surface">Solution {{ $productName }}</h3>
                </div>
                <ul class="space-y-3 text-on-surface-variant text-sm md:text-base">
                    <li class="flex items-start gap-2 font-semibold text-on-surface">
                        <span class="material-symbols-outlined text-primary text-xs mt-1">bolt</span>
                        Automatisation totale des calculs
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="material-symbols-outlined text-primary text-xs mt-1">bolt</span>
                        Génération automatique des PDF certifiés
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="material-symbols-outlined text-primary text-xs mt-1">bolt</span>
                        Alertes paiements et impayés en temps réel
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="material-symbols-outlined text-primary text-xs mt-1">bolt</span>
                        100% conforme loi de finances
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Local Expertise (Bento Grid Style) -->
<section class="py-16 md:py-24 px-6 bg-surface-container-low">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl md:text-4xl font-headline font-extrabold text-on-background text-center mb-4">Expertise Locale</h2>
        <p class="text-on-surface-variant text-center mb-12 text-lg">Tout ce dont vous avez besoin pour gérer votre entreprise.</p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 max-w-5xl mx-auto">
            <div class="bg-surface-container-lowest p-6 md:p-8 rounded-2xl flex flex-col items-center text-center hover:shadow-lg transition-shadow">
                <span class="material-symbols-outlined text-primary text-3xl md:text-4xl mb-4">folder_open</span>
                <span class="font-headline font-bold text-xs md:text-sm">Gestion des documents</span>
                <span class="text-xs text-on-surface-variant mt-1">Factures, Devis, BL...</span>
            </div>
            <div class="bg-surface-container-lowest p-6 md:p-8 rounded-2xl flex flex-col items-center text-center hover:shadow-lg transition-shadow">
                <span class="material-symbols-outlined text-primary text-3xl md:text-4xl mb-4">group</span>
                <span class="font-headline font-bold text-xs md:text-sm">Clients & Fournisseurs</span>
                <span class="text-xs text-on-surface-variant mt-1">Gestion complète</span>
            </div>
            <div class="bg-surface-container-lowest p-6 md:p-8 rounded-2xl flex flex-col items-center text-center hover:shadow-lg transition-shadow">
                <span class="material-symbols-outlined text-primary text-3xl md:text-4xl mb-4">dashboard</span>
                <span class="font-headline font-bold text-xs md:text-sm">Tableau de bord</span>
                <span class="text-xs text-on-surface-variant mt-1">Statistiques en temps réel</span>
            </div>
            <div class="bg-surface-container-lowest p-6 md:p-8 rounded-2xl flex flex-col items-center text-center hover:shadow-lg transition-shadow">
                <span class="material-symbols-outlined text-primary text-3xl md:text-4xl mb-4">verified</span>
                <span class="font-headline font-bold text-xs md:text-sm">Documents conformes</span>
                <span class="text-xs text-on-surface-variant mt-1">Loi de finances</span>
            </div>
            <div class="bg-surface-container-lowest p-6 md:p-8 rounded-2xl flex flex-col items-center text-center hover:shadow-lg transition-shadow">
                <span class="material-symbols-outlined text-primary text-3xl md:text-4xl mb-4">inventory_2</span>
                <span class="font-headline font-bold text-xs md:text-sm">Suivi de stock</span>
                <span class="text-xs text-on-surface-variant mt-1">Mouvement & inventaire</span>
            </div>
            <div class="bg-surface-container-lowest p-6 md:p-8 rounded-2xl flex flex-col items-center text-center hover:shadow-lg transition-shadow">
                <span class="material-symbols-outlined text-primary text-3xl md:text-4xl mb-4">payments</span>
                <span class="font-headline font-bold text-xs md:text-sm">Suivi paiements</span>
                <span class="text-xs text-on-surface-variant mt-1">Encaissements & relances</span>
            </div>
            <div class="bg-surface-container-lowest p-6 md:p-8 rounded-2xl flex flex-col items-center text-center hover:shadow-lg transition-shadow">
                <span class="material-symbols-outlined text-primary text-3xl md:text-4xl mb-4">receipt_long</span>
                <span class="font-headline font-bold text-xs md:text-sm">TVA & FODEC</span>
                <span class="text-xs text-on-surface-variant mt-1">Calcul automatique</span>
            </div>
            <div class="bg-surface-container-lowest p-6 md:p-8 rounded-2xl flex flex-col items-center text-center hover:shadow-lg transition-shadow">
                <span class="material-symbols-outlined text-primary text-3xl md:text-4xl mb-4">description</span>
                <span class="font-headline font-bold text-xs md:text-sm">Déclaration TEJ</span>
                <span class="text-xs text-on-surface-variant mt-1">Export automatisé</span>
            </div>
        </div>
    </div>
</section>

<!-- How it Works -->
<section class="py-16 md:py-24 px-6" id="how-it-works">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <span class="text-primary font-bold text-sm tracking-widest uppercase mb-4 block">Processus Simple</span>
            <h2 class="text-3xl md:text-4xl font-headline font-extrabold text-on-background mb-4">Comment ça marche ?</h2>
            <p class="text-on-surface-variant text-lg max-w-2xl mx-auto">Démarrez en quelques minutes avec notre parcours guidé intuitif.</p>
        </div>
        
        <!-- Desktop: Horizontal Timeline -->
        <div class="hidden lg:grid grid-cols-5 gap-6 mb-16">
            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 rounded-full bg-primary text-white flex items-center justify-center font-headline font-bold text-xl mb-4 shadow-lg">1</div>
                <h3 class="font-headline font-bold text-on-surface mb-2">Configurez votre entreprise</h3>
                <p class="text-on-surface-variant text-sm">Initialisation rapide de vos paramètres fiscaux.</p>
            </div>
            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 rounded-full bg-primary text-white flex items-center justify-center font-headline font-bold text-xl mb-4 shadow-lg">2</div>
                <h3 class="font-headline font-bold text-on-surface mb-2">Créez vos produits</h3>
                <p class="text-on-surface-variant text-sm">Gérez votre catalogue avec prix et taxes.</p>
            </div>
            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 rounded-full bg-primary text-white flex items-center justify-center font-headline font-bold text-xl mb-4 shadow-lg">3</div>
                <h3 class="font-headline font-bold text-on-surface mb-2">Créez vos listes clients</h3>
                <p class="text-on-surface-variant text-sm">Importez et organisez vos contacts.</p>
            </div>
            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 rounded-full bg-primary text-white flex items-center justify-center font-headline font-bold text-xl mb-4 shadow-lg">4</div>
                <h3 class="font-headline font-bold text-on-surface mb-2">Préparez vos devis & BL</h3>
                <p class="text-on-surface-variant text-sm">Documents professionnels en secondes.</p>
            </div>
            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 rounded-full bg-primary text-white flex items-center justify-center font-headline font-bold text-xl mb-4 shadow-lg">5</div>
                <h3 class="font-headline font-bold text-on-surface mb-2">Validez vos factures</h3>
                <p class="text-on-surface-variant text-sm">Factures certifiées et suivi paiements.</p>
            </div>
        </div>

        <!-- Mobile: Vertical Steps -->
        <div class="lg:hidden space-y-8 max-w-md mx-auto">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-headline font-bold shrink-0">1</div>
                <div>
                    <h3 class="text-lg font-headline font-bold">Configurez votre entreprise</h3>
                    <p class="text-on-surface-variant text-sm mt-1">Initialisation rapide de vos paramètres fiscaux.</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-headline font-bold shrink-0">2</div>
                <div>
                    <h3 class="text-lg font-headline font-bold">Créez vos produits</h3>
                    <p class="text-on-surface-variant text-sm mt-1">Gérez votre catalogue avec prix et taxes.</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-headline font-bold shrink-0">3</div>
                <div>
                    <h3 class="text-lg font-headline font-bold">Créez vos listes clients</h3>
                    <p class="text-on-surface-variant text-sm mt-1">Importez et organisez vos contacts.</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-headline font-bold shrink-0">4</div>
                <div>
                    <h3 class="text-lg font-headline font-bold">Préparez vos devis & BL</h3>
                    <p class="text-on-surface-variant text-sm mt-1">Documents professionnels en secondes.</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-headline font-bold shrink-0">5</div>
                <div>
                    <h3 class="text-lg font-headline font-bold">Validez vos factures</h3>
                    <p class="text-on-surface-variant text-sm mt-1">Factures certifiées et suivi paiements.</p>
                </div>
            </div>
        </div>

        <!-- Screenshots Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto mt-12">
            <div class="bg-white p-3 rounded-2xl shadow-xl border border-surface-variant cursor-pointer hover:shadow-2xl transition-shadow" @click="openLightbox('/screen/setup.png', 'Configurez votre entreprise')">
                <p class="text-xs font-bold text-primary px-3 py-2 uppercase tracking-wide">Étape 1 : Configuration</p>
                <img alt="Configurez votre entreprise" class="w-full h-auto rounded-xl" src="/screen/setup.png"/>
            </div>
            <div class="bg-white p-3 rounded-2xl shadow-xl border border-surface-variant cursor-pointer hover:shadow-2xl transition-shadow" @click="openLightbox('/screen/ajout-produit.webp', 'Créez vos produits')">
                <p class="text-xs font-bold text-primary px-3 py-2 uppercase tracking-wide">Étape 2 : Produits</p>
                <img alt="Créez vos produits" class="w-full h-auto rounded-xl" src="/screen/ajout-produit.webp"/>
            </div>
            <div class="bg-white p-3 rounded-2xl shadow-xl border border-surface-variant cursor-pointer hover:shadow-2xl transition-shadow" @click="openLightbox('/screen/gestion%20des%20clients.webp', 'Créez vos listes clients')">
                <p class="text-xs font-bold text-primary px-3 py-2 uppercase tracking-wide">Étape 3 : Clients</p>
                <img alt="Créez vos listes clients" class="w-full h-auto rounded-xl" src="/screen/gestion%20des%20clients.webp"/>
            </div>
            <div class="bg-white p-3 rounded-2xl shadow-xl border border-surface-variant cursor-pointer hover:shadow-2xl transition-shadow" @click="openLightbox('/screen/devis.webp', 'Préparez vos devis et BL')">
                <p class="text-xs font-bold text-primary px-3 py-2 uppercase tracking-wide">Étape 4 : Devis & BL</p>
                <img alt="Préparez vos devis et BL" class="w-full h-auto rounded-xl" src="/screen/devis.webp"/>
            </div>
            <div class="bg-white p-3 rounded-2xl shadow-xl border border-surface-variant cursor-pointer hover:shadow-2xl transition-shadow" @click="openLightbox('/screen/facture.webp', 'Validez vos factures')">
                <p class="text-xs font-bold text-primary px-3 py-2 uppercase tracking-wide">Étape 5 : Factures</p>
                <img alt="Validez vos factures" class="w-full h-auto rounded-xl" src="/screen/facture.webp"/>
            </div>
        </div>
    </div>
</section>

<!-- Social Proof -->
<section class="py-16 md:py-24 px-6 bg-primary text-white overflow-hidden relative">
    <div class="absolute inset-0 zellige-pattern opacity-10"></div>
    <div class="relative z-10 max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="material-symbols-outlined text-4xl md:text-6xl text-on-primary-container mb-6">format_quote</span>
                <p class="text-xl md:text-2xl font-headline font-medium italic mb-8 leading-relaxed">
                    "Depuis que nous utilisons {{ $productName }}, nous avons réduit le temps passé sur la comptabilité de 60%. C'est l'outil indispensable pour tout chef d'entreprise en Tunisie."
                </p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 md:w-14 md:h-14 rounded-full bg-surface-container-low overflow-hidden">
                        <img alt="Mr. Mahdi Kharrat" class="w-full h-full object-cover" src="https://www.annuairepro-afrique.com/_next/image?url=https%3A%2F%2Fadmin.annuairepro-afrique.com%2Fmedia%2Fpublished_logo%2F62058.jpg&w=1920&q=75"/>
                    </div>
                    <div>
                        <h4 class="font-headline font-bold text-lg">Mr. Mahdi Kharrat</h4>
                        <p class="text-sm text-on-primary-container font-medium opacity-80">Gérant, SKCD</p>
                    </div>
                </div>
            </div>
            <div class="hidden lg:flex justify-center">
                <div class="w-64 h-64 bg-white/10 rounded-full flex items-center justify-center">
                    <span class="material-symbols-outlined text-8xl text-white/30" style="font-variation-settings: 'FILL' 1;">thumb_up</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16 md:py-20 px-6 max-w-3xl mx-auto">
    <h2 class="font-headline font-extrabold text-2xl md:text-3xl text-[#141c2b] text-center mb-10">Questions fréquentes</h2>
    <div class="space-y-3" x-data="{ openFaq: null }">
        <div class="border border-[#141c2b]/10 rounded-xl overflow-hidden">
            <button @click="openFaq = openFaq === 1 ? null : 1"
                class="w-full flex items-center justify-between gap-4 px-5 py-4 text-left font-semibold text-[#141c2b] hover:bg-[#f1f3ff] transition-colors">
                <span>Le logiciel fonctionne-t-il 100% en ligne ?</span>
                <span class="material-symbols-outlined text-xl shrink-0 transition-transform duration-200" :class="{ 'rotate-180': openFaq === 1 }">expand_more</span>
            </button>
            <div x-show="openFaq === 1" x-collapse class="px-5 pb-4 text-sm text-[#141c2b]/70 leading-relaxed">
                Oui, {{ $productName }} est une solution 100% cloud. Accédez à votre entreprise depuis n'importe quel navigateur, où que vous soyez, sans rien installer sur votre poste.
            </div>
        </div>
        <div class="border border-[#141c2b]/10 rounded-xl overflow-hidden">
            <button @click="openFaq = openFaq === 2 ? null : 2"
                class="w-full flex items-center justify-between gap-4 px-5 py-4 text-left font-semibold text-[#141c2b] hover:bg-[#f1f3ff] transition-colors">
                <span>Comment se fait la livraison ?</span>
                <span class="material-symbols-outlined text-xl shrink-0 transition-transform duration-200" :class="{ 'rotate-180': openFaq === 2 }">expand_more</span>
            </button>
            <div x-show="openFaq === 2" x-collapse class="px-5 pb-4 text-sm text-[#141c2b]/70 leading-relaxed">
                Vous recevez un colis contenant votre code d'activation. Une fois le code saisi, vous pouvez immédiatement utiliser {{ $productName }} en ligne depuis n'importe quel navigateur.
            </div>
        </div>
        <div class="border border-[#141c2b]/10 rounded-xl overflow-hidden">
            <button @click="openFaq = openFaq === 3 ? null : 3"
                class="w-full flex items-center justify-between gap-4 px-5 py-4 text-left font-semibold text-[#141c2b] hover:bg-[#f1f3ff] transition-colors">
                <span>Sur quels appareils puis-je utiliser {{ $productName }} ?</span>
                <span class="material-symbols-outlined text-xl shrink-0 transition-transform duration-200" :class="{ 'rotate-180': openFaq === 3 }">expand_more</span>
            </button>
            <div x-show="openFaq === 3" x-collapse class="px-5 pb-4 text-sm text-[#141c2b]/70 leading-relaxed">
                Tout appareil avec un navigateur internet : PC Windows, Mac, Linux, tablettes et smartphones. L'interface s'adapte automatiquement à votre écran.
            </div>
        </div>
        <div class="border border-[#141c2b]/10 rounded-xl overflow-hidden">
            <button @click="openFaq = openFaq === 4 ? null : 4"
                class="w-full flex items-center justify-between gap-4 px-5 py-4 text-left font-semibold text-[#141c2b] hover:bg-[#f1f3ff] transition-colors">
                <span>Y a-t-il des frais mensuels ou un abonnement ?</span>
                <span class="material-symbols-outlined text-xl shrink-0 transition-transform duration-200" :class="{ 'rotate-180': openFaq === 4 }">expand_more</span>
            </button>
            <div x-show="openFaq === 4" x-collapse class="px-5 pb-4 text-sm text-[#141c2b]/70 leading-relaxed">
                Non, aucun abonnement. Vous payez une seule fois {{ $pagePrice }} DT et accédez à votre espace en ligne sans limite. Les mises à jour sont incluses automatiquement.
            </div>
        </div>
        <div class="border border-[#141c2b]/10 rounded-xl overflow-hidden">
            <button @click="openFaq = openFaq === 5 ? null : 5"
                class="w-full flex items-center justify-between gap-4 px-5 py-4 text-left font-semibold text-[#141c2b] hover:bg-[#f1f3ff] transition-colors">
                <span>Le logiciel est-il conforme à la fiscalité tunisienne ?</span>
                <span class="material-symbols-outlined text-xl shrink-0 transition-transform duration-200" :class="{ 'rotate-180': openFaq === 5 }">expand_more</span>
            </button>
            <div x-show="openFaq === 5" x-collapse class="px-5 pb-4 text-sm text-[#141c2b]/70 leading-relaxed">
                Absolument. TVA, FODEC, timbre fiscal, retenue à la source (TEJ) — tout est intégré et mis à jour automatiquement selon la réglementation tunisienne en vigueur.
            </div>
        </div>
    </div>
</section>

<!-- Pricing + Order Form -->
<section class="py-16 md:py-24 px-6 bg-surface" id="pricing">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl md:text-4xl font-headline font-extrabold text-on-background text-center mb-12">Tarif Simple & Transparent</h2>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-5xl mx-auto items-start" id="reserve">
            <!-- Pricing Card -->
            <div class="bg-surface-container-lowest p-8 rounded-[2rem] shadow-[0px_24px_48px_-12px_rgba(20,28,43,0.08)] border-2 border-primary relative">
                <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-primary text-white px-4 py-1 rounded-full text-xs font-bold uppercase tracking-widest">Le Plus Populaire</div>
                <h3 class="font-headline font-bold text-xl mb-2 text-center">Pack Business</h3>
                <div class="flex items-end justify-center gap-1 mb-6">
                    <span class="text-4xl md:text-5xl font-headline font-extrabold text-primary">{{ $pagePrice }}</span>
                    <span class="text-lg font-headline font-bold text-on-surface-variant mb-1">TND HT</span>
                </div>
                <div class="py-2 px-4 bg-surface-container-low rounded-lg text-primary font-headline font-bold text-sm mb-8 text-center">
                    Licence à Vie
                </div>
                <ul class="space-y-4 text-left mb-6">
                    <li class="flex items-center gap-3 text-sm">
                        <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                        Factures Illimitées
                    </li>
                    <li class="flex items-center gap-3 text-sm">
                        <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                        Gestion des Clients & Stocks
                    </li>
                    <li class="flex items-center gap-3 text-sm">
                        <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                        Support Technique prioritaire
                    </li>
                    <li class="flex items-center gap-3 text-sm">
                        <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                        Conformité Loi de Finance
                    </li>
                    <li class="flex items-center gap-3 text-sm">
                        <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                        Formation incluse
                    </li>
                    <li class="flex items-center gap-3 text-sm">
                        <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                        Mises à jour gratuites
                    </li>
                </ul>
            </div>

            <!-- Order Form -->
            <div class="bg-surface-container-high rounded-[2rem] p-6 md:p-8">
                <!-- Success state -->
                <div x-show="submitted" x-cloak class="text-center py-8">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="material-symbols-outlined text-primary text-4xl" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                    </div>
                    <h3 class="font-headline font-bold text-xl text-on-background mb-2">Commande envoyée !</h3>
                    <p class="text-on-surface-variant">Un conseiller vous contactera dans les plus brefs délais.</p>
                    <a href="/" class="mt-6 inline-block text-primary hover:underline font-medium">Retour à l'accueil</a>
                </div>

                <!-- Order form -->
                <div x-show="!submitted">
                    <h3 class="text-2xl font-headline font-extrabold text-on-background text-center mb-2">Passer votre commande</h3>
                    <p class="text-on-surface-variant text-center mb-6">Un conseiller vous rappellera dans l'heure.</p>
                    <form @submit.prevent="submitOrder" class="space-y-4">
                        <div>
                            <label class="block text-sm font-headline font-semibold text-on-surface-variant mb-2 px-1">Nom Complet</label>
                            <input x-model="form.nom" class="w-full bg-surface-container-lowest border-none rounded-xl py-4 px-6 focus:ring-2 focus:ring-primary/20 transition-all text-on-surface" placeholder="Ex: Ahmed Mansour" type="text"/>
                        </div>
                        <div>
                            <label class="block text-sm font-headline font-semibold text-on-surface-variant mb-2 px-1">Téléphone <span class="text-error">*</span></label>
                            <input x-model="form.telephone" @blur="validatePhone" @input="phoneError = ''" class="w-full bg-surface-container-lowest border-none rounded-xl py-4 px-6 focus:ring-2 focus:ring-primary/20 transition-all text-on-surface" :class="phoneError ? 'ring-2 ring-error' : ''" placeholder="+216 -- --- ---" type="tel" required/>
                            <p x-show="phoneError" x-text="phoneError" class="mt-1 text-xs text-error"></p>
                        </div>
                        <div>
                            <label class="block text-sm font-headline font-semibold text-on-surface-variant mb-2 px-1">Email <span class="text-error">*</span></label>
                            <input x-model="form.email" type="email" required placeholder="exemple@email.com" class="w-full bg-surface-container-lowest border-none rounded-xl py-4 px-6 focus:ring-2 focus:ring-primary/20 transition-all text-on-surface" />
                        </div>
                        <div class="relative" @click.away="cityDropdownOpen = false">
                            <label class="block text-sm font-headline font-semibold text-on-surface-variant mb-2 px-1">Ville <span class="text-error">*</span></label>
                            <button type="button" @click="cityDropdownOpen = !cityDropdownOpen; citySearch = ''"
                                class="w-full bg-surface-container-lowest border-none rounded-xl py-4 px-6 text-left transition-all flex items-center justify-between"
                                :class="!form.ville ? 'text-outline' : 'text-on-surface'">
                                <span x-text="form.ville || 'Sélectionnez une ville'"></span>
                                <span class="material-symbols-outlined text-outline text-lg transition-transform" :class="cityDropdownOpen ? 'rotate-180' : ''">expand_more</span>
                            </button>
                            <div x-show="cityDropdownOpen" x-cloak x-transition class="absolute z-50 mt-1 w-full bg-white border border-outline-variant/20 rounded-xl shadow-xl overflow-hidden">
                                <div class="p-2 border-b border-outline-variant/10">
                                    <input x-model="citySearch" type="text" placeholder="Rechercher..." class="w-full px-3 py-2 text-sm rounded-lg bg-surface border-none ring-1 ring-on-background/30 focus:ring-2 focus:ring-primary outline-none" @click.stop />
                                </div>
                                <ul class="max-h-48 overflow-y-auto py-1">
                                    <template x-for="city in filteredCities" :key="city">
                                        <li @click="selectCity(city)" class="px-4 py-2.5 text-sm cursor-pointer transition hover:bg-surface-container-low flex items-center justify-between" :class="form.ville === city ? 'bg-primary/10 text-primary font-medium' : 'text-on-surface'">
                                            <span x-text="city"></span>
                                            <span x-show="form.ville === city" class="material-symbols-outlined text-primary text-lg">check</span>
                                        </li>
                                    </template>
                                    <li x-show="filteredCities.length === 0" class="px-4 py-3 text-sm text-outline text-center">Aucune ville trouvée</li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-headline font-semibold text-on-surface-variant mb-2 px-1">Adresse complète <span class="text-error">*</span></label>
                            <textarea x-model="form.adresse" rows="3" required placeholder="Rue, quartier, code postal..." class="w-full bg-surface-container-lowest border-none rounded-xl py-4 px-6 focus:ring-2 focus:ring-primary/20 transition-all text-on-surface resize-none"></textarea>
                        </div>
                        <div x-show="errorMessage" x-cloak class="bg-error-container text-error text-sm rounded-xl p-3 flex items-center gap-2">
                            <span class="material-symbols-outlined text-lg">error</span>
                            <span x-text="errorMessage"></span>
                        </div>
                        <button type="submit" :disabled="submitting || !isFormValid" class="w-full hero-gradient text-white py-4 rounded-xl font-headline font-bold text-lg shadow-lg shadow-primary/20 active:scale-95 transition-all disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-2">
                            <span x-show="submitting" class="material-symbols-outlined animate-spin">progress_activity</span>
                            <span x-show="!submitting">Commander maintenant</span>
                            <span x-show="!submitting" class="material-symbols-outlined">arrow_forward</span>
                            <span x-show="submitting">Envoi en cours...</span>
                        </button>
                        <p class="text-center text-xs text-on-surface-variant">Paiement à la livraison. Activation immédiate.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sticky Bottom CTA (Mobile Only) -->
<div x-show="!submitted" class="fixed bottom-6 left-6 right-6 z-50 lg:hidden">
    <a @click.prevent="scrollToForm" class="bg-primary text-white w-full py-4 rounded-full font-headline font-bold text-lg flex items-center justify-center gap-2 shadow-[0px_24px_48px_-12px_rgba(0,81,67,0.4)] backdrop-blur-md cursor-pointer" href="#reserve">
        <span class="material-symbols-outlined">shopping_cart</span>
        Commander à {{ $pagePrice }} TND
    </a>
</div>

<!-- Footer -->
<footer class="w-full px-6 md:px-8 py-12 md:py-16 bg-[#f1f3ff] rounded-t-[2rem] mt-12 pb-24 lg:pb-12">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 md:gap-12">
            <!-- Brand -->
            <div class="md:col-span-2">
                <div class="flex items-center gap-2 mb-4">
                    <span class="material-symbols-outlined text-[#006B59] text-2xl">terminal</span>
                    <span class="font-headline font-bold text-[#141c2b] text-xl">{{ $productName }}</span>
                </div>
                <p class="text-[#141c2b]/60 max-w-sm mb-6">
                    Le logiciel de facturation pensé pour les entrepreneurs tunisiens. Simple, puissant et conforme.
                </p>
            </div>
            <!-- Links -->
            <div>
                <h4 class="font-headline font-bold mb-4 text-[#141c2b]">Logiciel</h4>
                <ul class="space-y-3 text-[#141c2b]/60 text-sm">
                    <li>Facturation</li>
                    <li>Gestion de stock</li>
                    <li>Devis & BL</li>
                </ul>
            </div>
            <!-- Contact -->
            <div>
                <h4 class="font-headline font-bold mb-4 text-[#141c2b]">Contact</h4>
                <ul class="space-y-3 text-[#141c2b]/60 text-sm">
                    <li>{{ $supportPhone }}</li>
                    <li>contact@softyfact.tn</li>
                    <li><a class="hover:text-[#006B59] transition-colors" href="/contact">Nous contacter</a></li>
                </ul>
            </div>
        </div>
        <!-- Bottom Bar -->
        <div class="mt-12 pt-8 border-t border-[#141c2b]/5 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="font-body text-sm text-[#141c2b]/60">
                © {{ date('Y') }} {{ $productName }}.
            </p>
            <div class="flex gap-6 text-sm text-[#141c2b]/60">
                <a href="/conditions" class="hover:text-[#006B59] transition-colors">Conditions</a>
                <a href="/confidentialite" class="hover:text-[#006B59] transition-colors">Confidentialité</a>
            </div>
        </div>
    </div>
</footer>

<!-- Lightbox Modal -->
<div x-show="lightboxOpen" x-cloak
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    @keydown.escape.window="closeLightbox()"
    class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/90"
    @click.self="closeLightbox()">
    <!-- Close Button -->
    <button @click="closeLightbox()" class="absolute top-4 right-4 w-12 h-12 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-colors">
        <span class="material-symbols-outlined text-white text-3xl">close</span>
    </button>
    <!-- Image -->
    <img :src="lightboxImage" :alt="lightboxAlt" class="max-w-full max-h-[90vh] rounded-xl shadow-2xl object-contain"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"/>
    <!-- Caption -->
    <p class="absolute bottom-6 left-1/2 -translate-x-1/2 text-white font-headline font-medium text-lg bg-black/50 px-4 py-2 rounded-lg" x-text="lightboxAlt"></p>
</div>

    {{-- WhatsApp floating button --}}
    <a href="https://wa.me/216{{ preg_replace('/\s/', '', $supportPhone) }}"
       target="_blank"
       rel="noopener noreferrer"
       class="fixed bottom-6 right-6 z-50 flex h-14 w-14 items-center justify-center rounded-full bg-[#25D366] text-white shadow-lg transition hover:scale-110 hover:shadow-xl">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
    </a>

</body>
</html>

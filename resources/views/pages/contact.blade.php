@extends('app')

@section('meta')
<title>Contact — SoftyFact</title>
<meta name="description" content="Contactez l'équipe SoftyFact pour toute question sur le logiciel, une commande ou le support technique." />
<meta name="robots" content="index, follow" />
<link rel="canonical" href="https://softyfact.tn/contact" />
@endsection

@section('body')
<div class="min-h-screen bg-gray-50">
    @include('partials._navbar-simple')
    <div class="h-16"></div>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        <div class="text-center mb-12">
            <h1 class="text-3xl font-bold text-gray-900 mb-3">Contactez-nous</h1>
            <p class="text-gray-600">Notre équipe est disponible pour répondre à toutes vos questions sur le logiciel, les commandes ou le support technique.</p>
        </div>

        {{-- Contact cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-12">
            {{-- Phone --}}
            <a href="tel:{{ preg_replace('/\s/', '', $supportPhone) }}"
               class="group bg-white rounded-2xl border border-gray-100 p-6 shadow-sm hover:shadow-md hover:border-cm-primary/30 transition flex items-start gap-4">
                <div class="w-12 h-12 bg-cm-primary/5 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-cm-primary/10 transition">
                    <svg class="w-6 h-6 text-cm-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-500 mb-0.5">Téléphone</p>
                    <p class="text-lg font-bold text-gray-900 group-hover:text-cm-primary transition">{{ $supportPhone }}</p>
                    <p class="text-xs text-gray-400 mt-1">Disponible du lun. au sam., 9h – 18h</p>
                </div>
            </a>

            {{-- WhatsApp --}}
            <a href="https://wa.me/216{{ preg_replace('/\s/', '', $supportPhone) }}" target="_blank" rel="noopener noreferrer"
               class="group bg-white rounded-2xl border border-gray-100 p-6 shadow-sm hover:shadow-md hover:border-green-300 transition flex items-start gap-4">
                <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-green-100 transition">
                    <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                        <path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.554 4.117 1.529 5.845L.057 23.882l6.2-1.625A11.945 11.945 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.818 9.818 0 01-5.006-1.369l-.359-.213-3.719.975.993-3.624-.234-.372A9.818 9.818 0 012.182 12C2.182 6.573 6.573 2.182 12 2.182S21.818 6.573 21.818 12 17.427 21.818 12 21.818z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-500 mb-0.5">WhatsApp</p>
                    <p class="text-lg font-bold text-gray-900 group-hover:text-green-600 transition">{{ $supportPhone }}</p>
                    <p class="text-xs text-gray-400 mt-1">Réponse rapide via WhatsApp</p>
                </div>
            </a>
        </div>

        {{-- FAQ quick links --}}
        <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-sm">
            <h2 class="text-base font-bold text-gray-900 mb-4">Questions fréquentes</h2>
            <ul class="space-y-3 text-sm">
                <li class="flex items-start gap-2">
                    <svg class="w-4 h-4 text-cm-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span class="text-gray-600">Comment recevoir ma licence après commande ?<br><span class="text-gray-400 text-xs">Votre code d'activation vous sera remis lors de la livraison.</span></span>
                </li>
                <li class="flex items-start gap-2">
                    <svg class="w-4 h-4 text-cm-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span class="text-gray-600">Sur combien d'appareils puis-je utiliser le logiciel ?<br><span class="text-gray-400 text-xs">La licence couvre jusqu'à 4 appareils pour une même entreprise.</span></span>
                </li>
                <li class="flex items-start gap-2">
                    <svg class="w-4 h-4 text-cm-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span class="text-gray-600">Les mises à jour sont-elles incluses ?<br><span class="text-gray-400 text-xs">Oui, toutes les mises à jour sont gratuites et incluses dans votre licence à vie.</span></span>
                </li>
                <li class="flex items-start gap-2">
                    <svg class="w-4 h-4 text-cm-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span class="text-gray-600">Le logiciel fonctionne-t-il sans internet ?<br><span class="text-gray-400 text-xs">L'application bureau fonctionne hors ligne. La version web nécessite une connexion.</span></span>
                </li>
            </ul>
        </div>
    </div>

    @include('partials._footer-simple')
</div>
@endsection

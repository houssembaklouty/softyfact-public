@extends('app')

@section('meta')
<title>Commande confirmée — SoftyFact</title>
<meta name="robots" content="noindex, nofollow" />
@endsection

@section('body')
<div class="min-h-screen bg-gradient-to-br from-cm-surface via-white to-cm-surface flex items-center justify-center p-6">
    <div class="w-full max-w-lg">
        {{-- Logo --}}
        <div class="text-center mb-8">
            <img src="/logo.png" alt="SoftyFact" class="w-16 h-16 mx-auto mb-3 rounded-xl shadow-lg" />
        </div>

        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8">
            {{-- Success icon --}}
            <div class="text-center mb-6">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-gray-900">Commande envoyée !</h1>
                <p class="text-sm text-gray-500 mt-2">Merci pour votre confiance. Votre commande a été enregistrée avec succès.</p>
            </div>

            {{-- Order details --}}
            <div class="bg-gray-50 rounded-xl p-5 mb-6 space-y-3">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Référence</span>
                    <span class="font-medium text-gray-900 text-xs break-all">{{ $token }}</span>
                </div>
                <div class="border-t border-gray-200 pt-3 flex justify-between">
                    <span class="text-sm font-semibold text-gray-700">Montant</span>
                    <span class="text-lg font-bold text-cm-primary">{{ number_format($orderAmount, 3, '.', '') }} DT</span>
                </div>
            </div>

            {{-- Next steps --}}
            <div class="bg-cm-primary/5 rounded-xl p-5 mb-6">
                <h3 class="text-sm font-bold text-cm-primary mb-3 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Prochaines étapes
                </h3>
                <ol class="space-y-2 text-sm text-cm-primary">
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
                        <span><a href="{{ $coreAppUrl }}/activate" class="underline font-semibold">Activez votre licence</a> et commencez à utiliser SoftyFact</span>
                    </li>
                </ol>
            </div>

            {{-- Actions --}}
            <div class="flex flex-col gap-3">
                <a href="/" class="w-full py-3 bg-cm-primary hover:bg-cm-primary/90 text-white font-semibold text-center rounded-xl shadow-lg shadow-cm-primary/25 transition">
                    Retour à l'accueil
                </a>
                <a href="tel:{{ preg_replace('/\s/', '', $supportPhone) }}"
                   class="w-full py-3 border-2 border-gray-200 text-gray-700 font-medium text-center rounded-xl hover:bg-gray-50 transition flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    Nous contacter — {{ $supportPhone }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

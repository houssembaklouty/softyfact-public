@extends('app')

@section('meta')
    <title>Erreur serveur — SoftyFact</title>
@endsection

@section('body')
    @include('partials._navbar-simple')

    <main class="flex items-center justify-center min-h-[calc(100vh-12rem)] px-4">
        <div class="text-center max-w-lg">
            <p class="text-8xl font-extrabold text-red-200">500</p>
            <h1 class="mt-4 text-2xl font-bold text-gray-900 sm:text-3xl">{{ __('errorServerTitle') }}</h1>
            <p class="mt-3 text-gray-500">{{ __('errorServerMessage') }}</p>
            <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-3">
                <a href="/" class="inline-flex items-center gap-2 rounded-lg bg-cm-primary px-5 py-2.5 text-sm font-medium text-white hover:bg-cm-primary/90 transition">
                    <span class="material-symbols-outlined text-[20px]">home</span>
                    {{ __('errorBackHome') }}
                </a>
                <a href="/contact" class="inline-flex items-center gap-2 rounded-lg border border-gray-300 px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 transition">
                    <span class="material-symbols-outlined text-[20px]">mail</span>
                    {{ __('errorContactUs') }}
                </a>
            </div>
        </div>
    </main>

    @include('partials._footer-simple')
@endsection

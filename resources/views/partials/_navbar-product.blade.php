{{-- Product page navbar --}}
<nav class="fixed top-0 w-full z-50 bg-white/70 backdrop-blur-xl shadow-sm" aria-label="{{ __('navLabel') }}">
    <div class="flex justify-between items-center px-6 md:px-8 py-4 max-w-7xl mx-auto">
        <a href="/" aria-label="{{ $productName }} — {{ __('home') }}">
            <img src="/logo.png" alt="{{ $productName }}" class="h-8 md:h-10 w-auto" />
        </a>
        <div class="hidden md:flex items-center gap-6">
            <a href="/" class="flex items-center gap-1.5 text-cm-secondary font-medium text-sm tracking-tight hover:text-cm-primary transition-colors">{{ __('home') }}</a>
            <a href="/#features" class="flex items-center gap-1.5 text-cm-secondary font-medium text-sm tracking-tight hover:text-cm-primary transition-colors">{{ __('features') }}</a>
            <a href="/#how-it-works" class="flex items-center gap-1.5 text-cm-secondary font-medium text-sm tracking-tight hover:text-cm-primary transition-colors">{{ __('howItWorks') }}</a>
            <a href="/#contact" class="flex items-center gap-1.5 text-cm-secondary font-medium text-sm tracking-tight hover:text-cm-primary transition-colors">{{ __('contact') }}</a>
        </div>
        <div class="flex items-center gap-3">
            @include('partials._lang-switcher')
            <a href="{{ $coreAppUrl }}/login" class="hidden sm:block text-sm font-semibold text-cm-secondary px-4 py-2 hover:opacity-80 transition-all">{{ __('login') }}</a>
            <a href="/" class="bg-cm-primary text-cm-on-primary px-5 py-2.5 rounded-xl font-bold text-sm tracking-tight transition-transform active:scale-95 shadow-lg shadow-[#006B59]/20">{{ __('home') }}</a>
        </div>
    </div>
</nav>
<div class="h-[72px]"></div>

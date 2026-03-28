{{-- Main site navbar (Homepage) with anchor links --}}
<header x-data="{ mobileOpen: false }">
    <nav class="fixed top-0 w-full z-50 bg-white/70 backdrop-blur-xl shadow-sm" aria-label="{{ __('navLabel') }}">
        <div class="flex justify-between items-center px-6 md:px-8 py-4 max-w-7xl mx-auto">
            <a href="/" aria-label="{{ $productName }} — {{ __('home') }}">
                <img src="/logo.png" alt="{{ $productName }}" class="h-8 md:h-10 w-auto" />
            </a>

            {{-- Desktop Nav --}}
            <div class="hidden md:flex items-center gap-6">
                <a href="/" class="flex items-center gap-1.5 text-cm-secondary font-medium text-sm tracking-tight hover:text-cm-primary transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 11-1.06 1.06l-.22-.22V19.5a.75.75 0 01-.75.75h-4.5a.75.75 0 01-.75-.75V15h-3v4.5a.75.75 0 01-.75.75h-4.5a.75.75 0 01-.75-.75v-6.13l-.22.22a.75.75 0 01-1.06-1.06l8.69-8.69z"/></svg>
                    {{ __('home') }}
                </a>
                <a href="#features" class="flex items-center gap-1.5 text-cm-secondary font-medium text-sm tracking-tight hover:text-cm-primary transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    {{ __('features') }}
                </a>
                <a href="#how-it-works" class="flex items-center gap-1.5 text-cm-secondary font-medium text-sm tracking-tight hover:text-cm-primary transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z"/></svg>
                    {{ __('howItWorks') }}
                </a>
                <a href="/blog" class="flex items-center gap-1.5 text-cm-secondary font-medium text-sm tracking-tight hover:text-cm-primary transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/></svg>
                    {{ __('blog') }}
                </a>
                <a href="#contact" class="flex items-center gap-1.5 text-cm-secondary font-medium text-sm tracking-tight hover:text-cm-primary transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                    {{ __('contact') }}
                </a>
            </div>

            <div class="flex items-center gap-3">
                @include('partials._lang-switcher')
                <div class="hidden sm:flex items-center gap-2">
                    <span class="flex h-2 w-2 rounded-full bg-cm-primary animate-pulse"></span>
                    <span class="text-xs font-bold text-cm-primary tracking-widest uppercase">{{ __('leaderTunisia') }}</span>
                </div>
                <a href="{{ $coreAppUrl }}/login" class="hidden md:block text-sm font-semibold text-cm-secondary px-4 py-2 hover:opacity-80 transition-all">{{ __('login') }}</a>
                {{-- Mobile hamburger --}}
                <button class="md:hidden text-cm-secondary p-1" @click="mobileOpen = !mobileOpen" aria-label="Menu">
                    <svg x-show="!mobileOpen" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" clip-rule="evenodd"/></svg>
                    <svg x-show="mobileOpen" x-cloak class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" clip-rule="evenodd"/></svg>
                </button>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="mobileOpen" x-cloak x-transition class="md:hidden bg-white/95 backdrop-blur-xl border-t border-cm-outline-variant/20 px-6 pb-6 space-y-4">
            <a href="/" class="flex items-center gap-2 text-cm-secondary font-medium py-2" @click="mobileOpen = false">{{ __('home') }}</a>
            <a href="#features" class="flex items-center gap-2 text-cm-secondary font-medium py-2" @click="mobileOpen = false">{{ __('features') }}</a>
            <a href="#how-it-works" class="flex items-center gap-2 text-cm-secondary font-medium py-2" @click="mobileOpen = false">{{ __('howItWorks') }}</a>
            <a href="/blog" class="flex items-center gap-2 text-cm-secondary font-medium py-2" @click="mobileOpen = false">{{ __('blog') }}</a>
            <a href="#contact" class="flex items-center gap-2 text-cm-secondary font-medium py-2" @click="mobileOpen = false">{{ __('contact') }}</a>
            <a href="{{ $coreAppUrl }}/login" class="block text-cm-primary font-semibold py-2">{{ __('login') }}</a>
        </div>
    </nav>
</header>
<div class="h-[72px]"></div>

{{-- Order Type Modal (Alpine.js) --}}
<div x-show="showOrderModal" x-cloak
     x-transition:enter="transition ease-out duration-200"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-150"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-[100] flex items-center justify-center p-4"
     @keydown.escape.window="showOrderModal = false">
    {{-- Backdrop --}}
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" @click="showOrderModal = false"></div>

    {{-- Modal content --}}
    <div class="relative bg-white rounded-3xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto p-6 md:p-10"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100">

        {{-- Close button --}}
        <button @click="showOrderModal = false" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>

        <div class="text-center mb-8">
            <h2 class="font-headline font-extrabold text-2xl md:text-3xl text-cm-on-background">{{ __('chooseVersion') }}</h2>
            <p class="text-cm-secondary mt-2">{{ __('chooseVersionSub') }}</p>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            {{-- Desktop version --}}
            <a href="/product/offline" class="group block bg-white border-2 border-cm-outline-variant/30 hover:border-cm-primary rounded-2xl p-6 transition-all hover:shadow-lg">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-cm-primary/10 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-cm-primary" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-cm-on-background">{{ __('desktopVersionTitle') }}</h3>
                        <p class="text-xs text-cm-secondary">{{ __('desktopVersionSub') }}</p>
                    </div>
                </div>
                <div class="mb-4">
                    <span class="text-3xl font-black text-cm-primary">{{ $offlinePrice }}</span>
                    <span class="text-sm font-bold text-cm-secondary ml-1">DT</span>
                    <p class="text-xs text-cm-outline mt-1">{{ __('lifetimeLicense') }}</p>
                </div>
                <ul class="space-y-2 mb-6">
                    @foreach([__('worksOffline'), __('localInstall'), __('freeDelivery'), __('localData')] as $item)
                    <li class="flex items-center gap-2 text-sm text-cm-on-surface-variant">
                        <svg class="w-4 h-4 text-cm-primary shrink-0" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd"/></svg>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>
                <span class="block w-full text-center bg-cm-primary text-cm-on-primary py-3 rounded-xl font-bold group-hover:scale-[1.02] transition-transform">{{ __('chooseDesktop') }}</span>
            </a>

            {{-- Cloud version --}}
            <a href="/product/online" class="group block bg-white border-2 border-blue-200 hover:border-blue-500 rounded-2xl p-6 transition-all hover:shadow-lg relative overflow-hidden">
                <div class="absolute top-3 right-3 bg-blue-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">{{ __('popular') }}</div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-blue-500/10 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15a4.5 4.5 0 004.5 4.5H18a3.75 3.75 0 001.332-7.257 3 3 0 00-3.758-3.848 5.25 5.25 0 00-10.233 2.33A4.502 4.502 0 002.25 15z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-cm-on-background">{{ __('cloudVersionTitle') }}</h3>
                        <p class="text-xs text-cm-secondary">{{ __('cloudVersionSub') }}</p>
                    </div>
                </div>
                <div class="mb-4">
                    <span class="text-3xl font-black text-blue-500">{{ $monthlyPrice }}</span>
                    <span class="text-sm font-bold text-cm-secondary ml-1">{{ __('dtMonth') }}</span>
                    <p class="text-xs text-cm-outline mt-1">{{ $onlinePrice }} DT/{{ __('year') }}</p>
                </div>
                <ul class="space-y-2 mb-6">
                    @foreach([__('instantAccess'), __('accessAnywhere'), __('noInstall'), __('secureBackup')] as $item)
                    <li class="flex items-center gap-2 text-sm text-cm-on-surface-variant">
                        <svg class="w-4 h-4 text-blue-500 shrink-0" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd"/></svg>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>
                <span class="block w-full text-center bg-blue-500 text-white py-3 rounded-xl font-bold group-hover:scale-[1.02] transition-transform">{{ __('chooseCloud') }}</span>
            </a>
        </div>

        <p class="text-center text-sm text-cm-secondary mt-6">{{ __('needHelp') }} <a href="/contact" class="text-cm-primary font-semibold hover:underline">{{ __('contactUs') }}</a></p>
    </div>
</div>

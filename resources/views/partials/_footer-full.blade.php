{{-- Full footer for product pages --}}
<footer class="bg-slate-50 mt-20" role="contentinfo">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-10 md:gap-12 px-6 md:px-8 py-12 md:py-16 max-w-7xl mx-auto">
        <div class="col-span-1">
            <img src="/logo.png" alt="{{ $productName }}" class="h-8 md:h-10 w-auto mb-4 md:mb-6" />
            <p class="text-sm text-slate-500 leading-relaxed">{{ __('footerDesc') }}</p>
        </div>
        <div>
            <h5 class="font-bold text-slate-900 mb-4 md:mb-6">{{ __('product') }}</h5>
            <ul class="space-y-3 md:space-y-4">
                <li><a href="/product/offline" class="text-sm text-slate-500 hover:text-cm-primary transition-all underline decoration-[#006B59]/30 underline-offset-4">{{ __('desktopVersion') }}</a></li>
                <li><a href="/product/online" class="text-sm text-slate-500 hover:text-blue-500 transition-all underline decoration-blue-500/30 underline-offset-4">{{ __('cloudVersion') }}</a></li>
                <li><a href="/#features" class="text-sm text-slate-500 hover:text-cm-primary transition-all underline decoration-[#006B59]/30 underline-offset-4">{{ __('features') }}</a></li>
            </ul>
        </div>
        <div>
            <h5 class="font-bold text-slate-900 mb-4 md:mb-6">{{ __('support') }}</h5>
            <ul class="space-y-3 md:space-y-4">
                <li><a href="/contact" class="text-sm text-slate-500 hover:text-cm-primary transition-all underline decoration-[#006B59]/30 underline-offset-4">{{ __('localSupportLink') }}</a></li>
                <li><a href="#" class="text-sm text-slate-500 hover:text-cm-primary transition-all underline decoration-[#006B59]/30 underline-offset-4">{{ __('userGuide') }}</a></li>
                <li><a href="/blog" class="text-sm text-slate-500 hover:text-cm-primary transition-all underline decoration-[#006B59]/30 underline-offset-4">{{ __('blog') }}</a></li>
            </ul>
        </div>
        <div>
            <h5 class="font-bold text-slate-900 mb-4 md:mb-6">{{ __('legal') }}</h5>
            <ul class="space-y-3 md:space-y-4">
                <li><a href="/conditions" class="text-sm text-slate-500 hover:text-cm-primary transition-all underline decoration-[#006B59]/30 underline-offset-4">{{ __('termsOfUse') }}</a></li>
                <li><a href="/confidentialite" class="text-sm text-slate-500 hover:text-cm-primary transition-all underline decoration-[#006B59]/30 underline-offset-4">{{ __('privacyPolicy') }}</a></li>
            </ul>
        </div>
    </div>
    <div class="px-6 md:px-8 py-6 md:py-8 max-w-7xl mx-auto border-t border-slate-200">
        <p class="text-sm text-slate-500 text-center">© {{ date('Y') }} {{ $productName }}. {{ __('footerDesc') }}</p>
    </div>
</footer>

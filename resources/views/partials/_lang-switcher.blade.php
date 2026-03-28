{{-- Language switcher --}}
@php $locale = app()->getLocale(); @endphp
<a href="{{ route('locale.switch', ['locale' => $locale === 'fr' ? 'ar' : 'fr']) }}"
   class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-sm font-semibold transition-all hover:bg-cm-surface-container-low border border-cm-outline-variant/20"
   title="{{ $locale === 'fr' ? 'التبديل إلى العربية' : 'Passer au français' }}">
    <span class="text-base">{{ $locale === 'fr' ? '🇹🇳' : '🇫🇷' }}</span>
    <span class="text-cm-secondary">{{ $locale === 'fr' ? 'العربية' : 'Français' }}</span>
</a>

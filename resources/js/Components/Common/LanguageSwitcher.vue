<template>
    <button
        @click="toggle"
        class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-sm font-semibold transition-all hover:bg-cm-surface-container-low border border-cm-outline-variant/20"
        :title="currentLocale === 'fr' ? 'التبديل إلى العربية' : 'Passer au français'"
    >
        <span class="text-base">{{ currentLocale === 'fr' ? '🇹🇳' : '🇫🇷' }}</span>
        <span class="text-cm-secondary">{{ currentLocale === 'fr' ? 'العربية' : 'Français' }}</span>
    </button>
</template>

<script setup>
import { computed } from 'vue'
import { useI18n } from 'vue-i18n'
import { setLocale } from '@/i18n'

const { locale } = useI18n()
const currentLocale = computed(() => locale.value)

function toggle() {
    const next = currentLocale.value === 'fr' ? 'ar' : 'fr'
    setLocale(next)
}
</script>

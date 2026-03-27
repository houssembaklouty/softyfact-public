import { createI18n } from 'vue-i18n'
import fr from './fr.js'
import ar from './ar.js'

const savedLocale = typeof localStorage !== 'undefined'
    ? localStorage.getItem('locale') || 'fr'
    : 'fr'

const i18n = createI18n({
    legacy: false,
    locale: savedLocale,
    fallbackLocale: 'fr',
    messages: { fr, ar },
})

export default i18n

export function setLocale(locale) {
    i18n.global.locale.value = locale
    localStorage.setItem('locale', locale)
    document.documentElement.lang = locale
    document.documentElement.dir = locale === 'ar' ? 'rtl' : 'ltr'
}

export function getCurrentLocale() {
    return i18n.global.locale.value
}

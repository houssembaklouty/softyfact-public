<template>
    <Teleport to="body">
        <Transition
            enter-active-class="transition duration-200 ease-out"
            enter-from-class="opacity-0"
            enter-to-class="opacity-100"
            leave-active-class="transition duration-150 ease-in"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0"
        >
            <div v-if="show" class="fixed inset-0 z-50 overflow-y-auto">
                <!-- Backdrop -->
                <div class="fixed inset-0 bg-black/60 backdrop-blur-sm" @click="$emit('close')"></div>

                <!-- Modal -->
                <div class="relative flex min-h-full items-end md:items-center justify-center md:p-4">
                    <Transition
                        enter-active-class="transition duration-300 ease-out"
                        enter-from-class="opacity-0 translate-y-full md:translate-y-4 md:scale-90"
                        enter-to-class="opacity-100 translate-y-0 md:scale-100"
                        leave-active-class="transition duration-200 ease-in"
                        leave-from-class="opacity-100 translate-y-0 md:scale-100"
                        leave-to-class="opacity-0 translate-y-full md:translate-y-0 md:scale-90"
                    >
                        <div v-if="show" class="relative w-full max-w-2xl max-h-[90vh] md:max-h-none overflow-y-auto" @click.stop>
                            <!-- Close button -->
                            <button
                                @click="$emit('close')"
                                class="absolute top-4 right-4 md:-top-3 md:-right-3 z-10 w-10 h-10 bg-white rounded-full shadow-lg flex items-center justify-center text-cm-secondary hover:text-cm-on-surface hover:scale-110 transition-all"
                                :aria-label="t('close')"
                            >
                                <XMarkIcon class="w-5 h-5" />
                            </button>

                            <!-- Content -->
                            <div class="bg-white rounded-t-3xl md:rounded-3xl shadow-2xl overflow-hidden">
                                <!-- Header -->
                                <div class="bg-cm-primary px-4 py-3 md:px-6 md:py-5 text-center relative overflow-hidden">
                                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_30%,rgba(255,255,255,0.1),transparent)]"></div>
                                    <h2 class="relative text-lg md:text-2xl font-extrabold text-white tracking-tight">
                                        {{ t('chooseVersion') }}
                                    </h2>
                                    <p class="relative text-white/80 text-xs md:text-sm mt-0.5 md:mt-1">
                                        {{ t('chooseVersionSub') }}
                                    </p>
                                </div>

                                <!-- Cards -->
                                <div class="p-3 md:p-8">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-6">

                                        <!-- Card: Version Bureau (Offline) -->
                                        <Link
                                            href="/product/offline"
                                            class="group relative bg-cm-surface rounded-2xl border-2 border-cm-outline-variant/20 p-4 md:p-6 transition-all hover:border-cm-primary hover:shadow-xl hover:shadow-cm-primary/10 hover:scale-[1.02] cursor-pointer"
                                        >
                                            <div class="flex items-center gap-3 md:hidden">
                                                <div class="w-11 h-11 shrink-0 bg-cm-primary/10 rounded-xl flex items-center justify-center">
                                                    <ComputerDesktopIcon class="w-6 h-6 text-cm-primary" />
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <h3 class="text-base font-extrabold text-cm-on-background">{{ t('desktopVersionTitle') }}</h3>
                                                    <p class="text-[11px] text-cm-secondary">{{ t('desktopVersionSub') }}</p>
                                                </div>
                                                <div class="text-right shrink-0">
                                                    <span class="text-2xl font-black text-cm-primary">{{ offlinePrice }}</span>
                                                    <span class="text-[10px] font-bold text-cm-secondary block">TND HT</span>
                                                </div>
                                            </div>

                                            <div class="hidden md:block text-center space-y-4 pt-2">
                                                <div class="w-16 h-16 mx-auto bg-cm-primary/10 rounded-2xl flex items-center justify-center group-hover:bg-cm-primary/20 transition-colors">
                                                    <ComputerDesktopIcon class="w-8 h-8 text-cm-primary" />
                                                </div>
                                                <div>
                                                    <h3 class="text-lg font-extrabold text-cm-on-background">{{ t('desktopVersionTitle') }}</h3>
                                                    <p class="text-xs text-cm-secondary mt-0.5">{{ t('desktopVersionSub') }}</p>
                                                </div>
                                                <div class="bg-white rounded-xl p-3 border border-cm-outline-variant/10">
                                                    <div class="flex items-baseline justify-center gap-1">
                                                        <span class="text-3xl font-black text-cm-primary">{{ offlinePrice }}</span>
                                                        <span class="text-sm font-bold text-cm-secondary">TND HT</span>
                                                    </div>
                                                    <p class="text-[11px] text-cm-outline mt-1">{{ t('lifetimeLicense') }}</p>
                                                </div>
                                                <ul class="space-y-2 text-left">
                                                    <li class="flex items-center gap-2 text-sm text-cm-on-surface-variant">
                                                        <CheckCircleIcon class="w-4 h-4 text-cm-primary shrink-0" />
                                                        {{ t('worksOffline') }}
                                                    </li>
                                                    <li class="flex items-center gap-2 text-sm text-cm-on-surface-variant">
                                                        <CheckCircleIcon class="w-4 h-4 text-cm-primary shrink-0" />
                                                        {{ t('localInstall') }}
                                                    </li>
                                                    <li class="flex items-center gap-2 text-sm text-cm-on-surface-variant">
                                                        <CheckCircleIcon class="w-4 h-4 text-cm-primary shrink-0" />
                                                        {{ t('freeDelivery') }}
                                                    </li>
                                                    <li class="flex items-center gap-2 text-sm text-cm-on-surface-variant">
                                                        <CheckCircleIcon class="w-4 h-4 text-cm-primary shrink-0" />
                                                        {{ t('localData') }}
                                                    </li>
                                                </ul>
                                            </div>

                                            <!-- Mobile features (compact) -->
                                            <div class="mt-3 flex flex-wrap gap-1.5 md:hidden">
                                                <span class="inline-flex items-center gap-1 text-[11px] text-cm-on-surface-variant bg-white rounded-lg px-2 py-1">
                                                    <CheckCircleIcon class="w-3.5 h-3.5 text-cm-primary shrink-0" />
                                                    {{ t('worksOffline') }}
                                                </span>
                                                <span class="inline-flex items-center gap-1 text-[11px] text-cm-on-surface-variant bg-white rounded-lg px-2 py-1">
                                                    <CheckCircleIcon class="w-3.5 h-3.5 text-cm-primary shrink-0" />
                                                    {{ t('freeDelivery') }}
                                                </span>
                                                <span class="inline-flex items-center gap-1 text-[11px] text-cm-on-surface-variant bg-white rounded-lg px-2 py-1">
                                                    <CheckCircleIcon class="w-3.5 h-3.5 text-cm-primary shrink-0" />
                                                    {{ t('localData') }}
                                                </span>
                                            </div>

                                            <!-- CTA -->
                                            <div class="pt-3 md:pt-2">
                                                <span class="flex items-center justify-center gap-2 w-full py-2.5 md:py-3 bg-cm-primary text-white font-bold text-sm rounded-xl group-hover:shadow-lg group-hover:shadow-cm-primary/20 transition-all">
                                                    {{ t('chooseDesktop') }}
                                                    <ArrowRightIcon class="w-4 h-4" />
                                                </span>
                                            </div>
                                        </Link>

                                        <!-- Card: Version Cloud (Online) -->
                                        <Link
                                            href="/product/online"
                                            class="group relative bg-cm-surface rounded-2xl border-2 border-cm-outline-variant/20 p-4 md:p-6 transition-all hover:border-blue-500 hover:shadow-xl hover:shadow-blue-500/10 hover:scale-[1.02] cursor-pointer"
                                        >
                                            <!-- Popular badge -->
                                            <div class="absolute -top-3 left-1/2 -translate-x-1/2">
                                                <span class="bg-blue-500 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-lg">
                                                    {{ t('popular') }}
                                                </span>
                                            </div>

                                            <div class="flex items-center gap-3 md:hidden pt-1">
                                                <div class="w-11 h-11 shrink-0 bg-blue-500/10 rounded-xl flex items-center justify-center">
                                                    <CloudIcon class="w-6 h-6 text-blue-500" />
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <h3 class="text-base font-extrabold text-cm-on-background">{{ t('cloudVersionTitle') }}</h3>
                                                    <p class="text-[11px] text-cm-secondary">{{ t('cloudVersionSub') }}</p>
                                                </div>
                                                <div class="text-right shrink-0">
                                                    <span class="text-2xl font-black text-blue-500">{{ monthlyPrice.split('.')[0] }}<span class="text-base">.{{ monthlyPrice.split('.')[1] }}</span></span>
                                                    <span class="text-[10px] font-bold text-cm-secondary block">DT/{{ t('month') }}</span>
                                                </div>
                                            </div>

                                            <div class="hidden md:block text-center space-y-4 pt-2">
                                                <div class="w-16 h-16 mx-auto bg-blue-500/10 rounded-2xl flex items-center justify-center group-hover:bg-blue-500/20 transition-colors">
                                                    <CloudIcon class="w-8 h-8 text-blue-500" />
                                                </div>
                                                <div>
                                                    <h3 class="text-lg font-extrabold text-cm-on-background">{{ t('cloudVersionTitle') }}</h3>
                                                    <p class="text-xs text-cm-secondary mt-0.5">{{ t('cloudVersionSub') }}</p>
                                                </div>
                                                <div class="bg-white rounded-xl p-3 border border-cm-outline-variant/10">
                                                    <div class="flex items-baseline justify-center gap-1">
                                                        <span class="text-3xl font-black text-blue-500">{{ monthlyPrice.split('.')[0] }}<span class="text-xl">.{{ monthlyPrice.split('.')[1] }}</span></span>
                                                        <span class="text-sm font-bold text-cm-secondary">DT/{{ t('month') }}</span>
                                                    </div>
                                                    <p class="text-[11px] text-cm-outline mt-1">{{ onlinePrice }} TND HT/{{ t('year') }} — {{ t('instantAccess') }}</p>
                                                </div>
                                                <ul class="space-y-2 text-left">
                                                    <li class="flex items-center gap-2 text-sm text-cm-on-surface-variant">
                                                        <CheckCircleIcon class="w-4 h-4 text-blue-500 shrink-0" />
                                                        {{ t('accessAnywhere') }}
                                                    </li>
                                                    <li class="flex items-center gap-2 text-sm text-cm-on-surface-variant">
                                                        <CheckCircleIcon class="w-4 h-4 text-blue-500 shrink-0" />
                                                        {{ t('noInstall') }}
                                                    </li>
                                                    <li class="flex items-center gap-2 text-sm text-cm-on-surface-variant">
                                                        <CheckCircleIcon class="w-4 h-4 text-blue-500 shrink-0" />
                                                        {{ t('autoUpdates') }}
                                                    </li>
                                                    <li class="flex items-center gap-2 text-sm text-cm-on-surface-variant">
                                                        <CheckCircleIcon class="w-4 h-4 text-blue-500 shrink-0" />
                                                        {{ t('secureBackup') }}
                                                    </li>
                                                </ul>
                                            </div>

                                            <!-- Mobile features (compact) -->
                                            <div class="mt-3 flex flex-wrap gap-1.5 md:hidden">
                                                <span class="inline-flex items-center gap-1 text-[11px] text-cm-on-surface-variant bg-white rounded-lg px-2 py-1">
                                                    <CheckCircleIcon class="w-3.5 h-3.5 text-blue-500 shrink-0" />
                                                    {{ t('accessAnywhere') }}
                                                </span>
                                                <span class="inline-flex items-center gap-1 text-[11px] text-cm-on-surface-variant bg-white rounded-lg px-2 py-1">
                                                    <CheckCircleIcon class="w-3.5 h-3.5 text-blue-500 shrink-0" />
                                                    {{ t('noInstall') }}
                                                </span>
                                                <span class="inline-flex items-center gap-1 text-[11px] text-cm-on-surface-variant bg-white rounded-lg px-2 py-1">
                                                    <CheckCircleIcon class="w-3.5 h-3.5 text-blue-500 shrink-0" />
                                                    {{ t('secureBackup') }}
                                                </span>
                                            </div>

                                            <!-- CTA -->
                                            <div class="pt-3 md:pt-2">
                                                <span class="flex items-center justify-center gap-2 w-full py-2.5 md:py-3 bg-blue-500 text-white font-bold text-sm rounded-xl group-hover:shadow-lg group-hover:shadow-blue-500/20 transition-all">
                                                    {{ t('chooseCloud') }}
                                                    <ArrowRightIcon class="w-4 h-4" />
                                                </span>
                                            </div>
                                        </Link>

                                    </div>

                                    <!-- Help text -->
                                    <p class="text-center text-xs text-cm-outline mt-5">
                                        {{ t('needHelp') }}
                                        <Link href="/contact" class="text-cm-primary font-semibold hover:underline">{{ t('contactUs') }}</Link>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </Transition>
                </div>
            </div>
        </Transition>
    </Teleport>
</template>

<script setup>
import { watch, computed, onBeforeUnmount } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'
import { CheckCircleIcon, XMarkIcon } from '@heroicons/vue/24/solid'
import { ComputerDesktopIcon, CloudIcon, ArrowRightIcon } from '@heroicons/vue/24/outline'
import { useI18n } from 'vue-i18n'

const { t } = useI18n()

const page = usePage()

const props = defineProps({
    show: { type: Boolean, default: false },
})

const offlinePrice = computed(() => page.props.orderAmount ?? 149)
const onlinePrice = computed(() => page.props.orderAmountOnline ?? 99)
const monthlyPrice = computed(() => (onlinePrice.value / 12).toFixed(2))

defineEmits(['close'])

watch(() => props.show, (val) => {
    document.body.style.overflow = val ? 'hidden' : ''
})

onBeforeUnmount(() => {
    document.body.style.overflow = ''
})
</script>

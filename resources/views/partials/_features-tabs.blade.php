{{-- ═══════════════ FEATURES SHOWCASE (TABBED) ═══════════════ --}}
@php
$featureTabs = [
    [
        'icon' => 'description',
        'title' => __('featTab_documents'),
        'desc' => __('featTab_documents_desc'),
        'badge' => __('featTab_documents_badge'),
        'image' => '/screen/facture.png',
        'images' => [
            '/screen/facture.png',
            '/screen/devis.png',
            '/screen/bon-de-livraison.png',
            '/screen/facture-fournisseur.png',
        ],
        'tags' => [
            __('tag_factures'), __('tag_devis'), __('tag_bl'), __('tag_br'),
            __('tag_bc'), __('tag_avoir'), __('tag_bon_sortie'), __('tag_bon_retour'), __('tag_et_plus'),
        ],
    ],
    [
        'icon' => 'payments',
        'title' => __('featTab_payments'),
        'desc' => __('featTab_payments_desc'),
        'badge' => null,
        'image' => '/screen/gestion Paiements (encaissements et décaissements).png',
        'tags' => [
            __('tag_encaissements'), __('tag_decaissements'), __('tag_tresorerie'),
        ],
    ],
    [
        'icon' => 'inventory_2',
        'title' => __('featTab_stock'),
        'desc' => __('featTab_stock_desc'),
        'badge' => null,
        'image' => '/screen/Gestion de stock.png',
        'tags' => [
            __('tag_multi_entrepot'), __('tag_mouvements'), __('tag_ajustements'), __('tag_alertes'),
        ],
    ],
    [
        'icon' => 'bar_chart',
        'title' => __('featTab_reports'),
        'desc' => __('featTab_reports_desc'),
        'badge' => null,
        'image' => '/screen/tableau-de-bord.png',
        'images' => [
            '/screen/tableau-de-bord.png',
            '/screen/tableau-de-bord-2.png',
        ],
        'tags' => [
            __('tag_ca'), __('tag_impayes'), __('tag_tableaux'), __('tag_stats'),
        ],
    ],
    [
        'icon' => 'link',
        'title' => __('featTab_tej'),
        'desc' => __('featTab_tej_desc'),
        'badge' => null,
        'image' => '/screen/Certificats TEJ.png',
        'images' => [
            '/screen/Certificats TEJ.png',
            '/screen/tej.png',
        ],
        'tags' => [
            __('tag_retenue'), __('tag_certificats'), __('tag_fichiers_tej'), __('tag_declarations'),
        ],
    ],
    [
        'icon' => 'verified',
        'title' => __('featTab_compliance'),
        'desc' => __('featTab_compliance_desc'),
        'badge' => null,
        'image' => '/screen/Paramètres de l\'application.png',
        'images' => [
            '/screen/Paramètres de l\'application.png',
            '/screen/paramètres-gestion-taxs.png',
            '/screen/paramètres-gestion-taxs-2.png',
            '/screen/paramètres-gestion-des-numérotation-des-docs.png.png',
        ],
        'tags' => [
            __('tag_tva'), __('tag_fodec'), __('tag_timbre'), __('tag_elfatoora'), __('tag_retenue_src'),
        ],
    ],
];
@endphp

<section class="mt-12 sm:mt-20" x-data="{ activeTab: 0 }">
    {{-- Section title --}}
    <div class="text-center mb-8 sm:mb-12">
        <h2 class="font-headline font-extrabold text-2xl sm:text-3xl md:text-4xl text-cm-on-background leading-tight">
            {{ __('featShowcase_title_before') }} <span class="text-cm-primary">{{ __('featShowcase_title_highlight') }}</span>
            <br class="hidden sm:block">{{ __('featShowcase_title_after') }}
        </h2>
        <div class="w-12 h-1 bg-cm-primary mx-auto mt-4 rounded-full"></div>
    </div>

    {{-- Tab bar --}}
    <div class="flex justify-center gap-3 sm:overflow-x-auto pb-0 sm:pb-2 mb-2 sm:mb-8 scrollbar-hide sm:snap-x sm:snap-mandatory px-1" role="tablist">
        @foreach($featureTabs as $i => $tab)
        <button
            @click="activeTab = {{ $i }}"
            :class="activeTab === {{ $i }}
                ? 'bg-cm-primary text-white shadow-lg shadow-cm-primary/20'
                : 'bg-white text-cm-on-surface-variant border border-cm-outline-variant/30 hover:bg-cm-surface-container-low'"
            class="flex items-center justify-center gap-2 w-11 h-11 sm:w-auto sm:h-auto sm:px-5 sm:py-3 rounded-full font-semibold text-sm whitespace-nowrap transition-all sm:snap-start sm:shrink-0"
            role="tab"
            :aria-selected="activeTab === {{ $i }}"
            aria-controls="feat-panel-{{ $i }}"
        >
            <span class="material-symbols-outlined text-xl sm:text-lg" :class="activeTab === {{ $i }} ? 'text-white' : 'text-cm-primary'">{{ $tab['icon'] }}</span>
            <span class="hidden sm:inline">{{ $tab['title'] }}</span>
        </button>
        @endforeach
    </div>
    {{-- Mobile dot indicators --}}
    <div class="flex justify-center gap-1.5 mb-6 sm:hidden">
        @foreach($featureTabs as $i => $tab)
        <button
            @click="activeTab = {{ $i }}"
            :class="activeTab === {{ $i }} ? 'bg-cm-primary w-5' : 'bg-cm-outline-variant/40 w-2'"
            class="h-2 rounded-full transition-all duration-300"
        ></button>
        @endforeach
    </div>

    {{-- Content panels --}}
    @foreach($featureTabs as $i => $tab)
    <div
        x-show="activeTab === {{ $i }}"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        id="feat-panel-{{ $i }}"
        role="tabpanel"
        class="bg-white rounded-3xl border border-cm-outline-variant/10 shadow-sm overflow-hidden"
    >
        <div class="flex flex-col lg:flex-row">
            {{-- Left: text content --}}
            <div class="p-6 sm:p-8 lg:p-10 lg:w-1/2 flex flex-col justify-center">
                {{-- Number badge --}}
                <div class="flex items-center gap-3 mb-4">
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-cm-primary text-white text-sm font-bold">{{ $i + 1 }}</span>
                    <h3 class="font-headline font-bold text-xl sm:text-2xl text-cm-on-background">{{ $tab['title'] }}</h3>
                </div>

                {{-- Description --}}
                <p class="text-cm-secondary text-sm sm:text-base leading-relaxed mb-5">{{ $tab['desc'] }}</p>

                {{-- Compliance badge (only for first tab) --}}
                @if($tab['badge'])
                <div class="inline-flex items-center gap-1.5 bg-green-50 text-green-600 text-sm font-medium px-3 py-1.5 rounded-full mb-5 w-fit">
                    <span class="material-symbols-outlined text-base">check_circle</span>
                    {{ $tab['badge'] }}
                </div>
                @endif

                {{-- Tags --}}
                <div class="flex flex-wrap gap-2 mb-6">
                    @foreach($tab['tags'] as $tag)
                    <span class="px-3 py-1.5 bg-cm-surface-container-low text-cm-on-surface-variant text-xs sm:text-sm rounded-lg border border-cm-outline-variant/20">{{ $tag }}</span>
                    @endforeach
                </div>

                {{-- Next tab link --}}
                @if($i < count($featureTabs) - 1)
                <button @click="activeTab = {{ $i + 1 }}" class="inline-flex items-center gap-1 text-cm-primary font-medium text-sm hover:underline mt-auto w-fit">
                    {{ $featureTabs[$i + 1]['title'] }}
                    <span class="material-symbols-outlined text-base rtl:rotate-180">chevron_right</span>
                </button>
                @endif
            </div>

            {{-- Right: screenshot --}}
            <div class="lg:w-1/2 bg-gradient-to-br from-cm-primary-container/5 to-cm-surface-container-low p-4 sm:p-6 flex items-center justify-center">
                @if(!empty($tab['images']))
                <div class="rounded-2xl overflow-hidden border border-cm-outline-variant/20 shadow-sm w-full relative"
                     x-data="{ current: 0, images: {{ json_encode($tab['images']) }}, interval: null }"
                     x-init="interval = setInterval(() => { current = (current + 1) % images.length }, 3000)"
                     x-effect="if (activeTab !== {{ $i }}) { clearInterval(interval); interval = null } else if (!interval) { interval = setInterval(() => { current = (current + 1) % images.length }, 3000) }"
                >
                    <div class="relative w-full group">
                        @foreach($tab['images'] as $imgIdx => $img)
                        <picture>
                            <source srcset="{{ str_replace('.png', '.webp', $img) }}" type="image/webp">
                            <img
                                src="{{ $img }}"
                                alt="{{ $tab['title'] }}"
                                class="w-full h-auto object-contain max-h-[400px] mx-auto transition-opacity duration-700 ease-in-out"
                                :class="current === {{ $imgIdx }} ? 'opacity-100 relative' : 'opacity-0 absolute inset-0'"
                                loading="{{ $imgIdx === 0 ? 'eager' : 'lazy' }}"
                            />
                        </picture>
                        @endforeach

                        {{-- Prev / Next arrows --}}
                        <button
                            @click="current = (current - 1 + images.length) % images.length"
                            class="absolute top-1/2 left-2 rtl:left-auto rtl:right-2 -translate-y-1/2 w-9 h-9 bg-cm-primary/80 hover:bg-cm-primary backdrop-blur rounded-full shadow-md flex items-center justify-center text-white transition-all"
                        >
                            <span class="material-symbols-outlined text-xl rtl:rotate-180">chevron_left</span>
                        </button>
                        <button
                            @click="current = (current + 1) % images.length"
                            class="absolute top-1/2 right-2 rtl:right-auto rtl:left-2 -translate-y-1/2 w-9 h-9 bg-cm-primary/80 hover:bg-cm-primary backdrop-blur rounded-full shadow-md flex items-center justify-center text-white transition-all"
                        >
                            <span class="material-symbols-outlined text-xl rtl:rotate-180">chevron_right</span>
                        </button>
                    </div>

                    {{-- Dots indicator --}}
                    <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-1.5">
                        @foreach($tab['images'] as $imgIdx => $img)
                        <button
                            @click="current = {{ $imgIdx }}"
                            :class="current === {{ $imgIdx }} ? 'bg-cm-primary w-6' : 'bg-cm-outline-variant/50 w-2'"
                            class="h-2 rounded-full transition-all duration-300"
                        ></button>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="rounded-2xl overflow-hidden border border-cm-outline-variant/20 shadow-sm w-full">
                    <picture>
                        <source srcset="{{ str_replace('.png', '.webp', $tab['image']) }}" type="image/webp">
                        <img src="{{ $tab['image'] }}" alt="{{ $tab['title'] }}" class="w-full h-auto object-contain max-h-[400px] mx-auto" loading="lazy" />
                    </picture>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</section>

{{-- Order Modal (Alpine.js) — Cloud version direct order --}}
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
    <div class="relative bg-white rounded-3xl shadow-2xl max-w-lg w-full max-h-[90vh] overflow-y-auto p-6 md:p-10"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-data="{
            form: { name: '', phone: '', email: '', address: '' },
            submitting: false,
            submitted: false,
            errorMessage: '',
            phoneError: '',
            emailError: '',
            get isFormValid() {
                const digits = this.form.phone.replace(/\s/g, '');
                const email = this.form.email.trim();
                return /^[0-9]{8}$/.test(digits) && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email) && this.form.address.trim();
            },
            validatePhone() {
                const digits = this.form.phone.replace(/\s/g, '');
                if (!digits) this.phoneError = '{{ addslashes(__('phoneRequired_err')) }}';
                else if (!/^[0-9]{8}$/.test(digits)) this.phoneError = '{{ addslashes(__('phoneDigits_err')) }}';
                else this.phoneError = '';
            },
            validateEmail() {
                const email = this.form.email.trim();
                if (!email) this.emailError = '{{ addslashes(__('emailRequired_err')) }}';
                else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) this.emailError = '{{ addslashes(__('emailInvalid_err')) }}';
                else this.emailError = '';
            },
            async submitOrder() {
                this.validatePhone();
                this.validateEmail();
                if (this.phoneError || this.emailError || !this.form.address.trim()) return;
                this.submitting = true;
                this.errorMessage = '';
                try {
                    const resp = await axios.post('/orders', {
                        name: this.form.name,
                        phone: this.form.phone,
                        email: this.form.email,
                        address: this.form.address,
                        type: 'online',
                    });
                    this.submitting = false;
                    if (typeof gtag === 'function') gtag('event', 'purchase', { currency: 'TND', value: {{ $pagePrice ?? config('app.order_amount_online', 119) }}, items: [{ item_name: 'SoftyFact Cloud', quantity: 1 }] });
                    if (typeof fbq === 'function') fbq('track', 'Purchase', { currency: 'TND', value: {{ $pagePrice ?? config('app.order_amount_online', 119) }}, content_name: 'SoftyFact Cloud' });
                    if (resp.data.redirect) window.location.href = resp.data.redirect;
                    else this.submitted = true;
                } catch (err) {
                    this.submitting = false;
                    const errors = err.response?.data?.errors;
                    if (errors) { const first = Object.values(errors)[0]; this.errorMessage = Array.isArray(first) ? first[0] : first; }
                    else this.errorMessage = err.response?.data?.message || '{{ addslashes(__('genericError')) }}';
                }
            }
         }">

        {{-- Close button --}}
        <button @click="showOrderModal = false" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>

        {{-- Success state --}}
        <div x-show="submitted" x-cloak class="text-center py-8">
            <div class="w-16 h-16 bg-cm-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                <span class="material-symbols-outlined text-cm-primary text-4xl" style="font-variation-settings: 'FILL' 1;">check_circle</span>
            </div>
            <h3 class="font-headline font-bold text-xl text-cm-on-background mb-2">{{ __('orderSent') }}</h3>
            <p class="text-cm-secondary">{{ __('onlineOrderConfirm') }}</p>
            <button @click="showOrderModal = false; submitted = false" class="mt-4 text-cm-primary font-semibold hover:underline">{{ __('backToHome') }}</button>
        </div>

        {{-- Order form --}}
        <div x-show="!submitted">
            <div class="text-center mb-6">
                <div class="inline-flex items-center gap-2 bg-blue-500/10 px-4 py-1.5 rounded-full mb-3">
                    <span class="material-symbols-outlined text-blue-500 text-base" style="font-variation-settings: 'FILL' 1;">cloud</span>
                    <span class="text-xs font-bold text-blue-500 tracking-widest uppercase">{{ __('cloudVersionTitle') }}</span>
                </div>
                <h2 class="font-headline font-extrabold text-2xl md:text-3xl text-cm-on-background">{{ __('commandInstant') }}</h2>
                <p class="text-cm-secondary mt-2">{{ __('fillInfoEmail') }}</p>
            </div>

            {{-- Price highlight --}}
            <div class="bg-blue-500/5 rounded-xl p-4 mb-6 text-center border border-blue-500/10">
                <span class="text-3xl font-black text-blue-500">{{ $pagePrice ?? config('app.order_amount_online', 119) }}</span>
                <span class="text-sm font-bold text-cm-secondary ml-1">DT</span>
                <p class="text-xs text-cm-secondary mt-1">{{ __('oneTimePayment') }}</p>
            </div>

            <form @submit.prevent="submitOrder" class="space-y-4">
                <div>
                    <label class="text-xs font-bold text-cm-on-background uppercase">{{ __('name') }}</label>
                    <input x-model="form.name" type="text" placeholder="{{ __('namePlaceholder') }}" class="mt-1 w-full bg-cm-surface px-4 py-3 rounded-xl border-none ring-1 ring-cm-on-background/30 focus:ring-2 focus:ring-blue-500 transition-all" />
                </div>

                <div>
                    <label class="text-xs font-bold text-cm-on-background uppercase">{{ __('phoneRequired') }} <span class="text-cm-error">*</span></label>
                    <input x-model="form.phone" type="tel" inputmode="numeric" required placeholder="XX XXX XXX" maxlength="11"
                        @blur="validatePhone" @input="phoneError = ''"
                        :class="['mt-1 w-full px-4 py-3 rounded-xl bg-cm-surface border-none ring-1 focus:ring-2 transition-all', phoneError ? 'ring-cm-error focus:ring-cm-error' : 'ring-cm-on-background/30 focus:ring-blue-500']" />
                    <p x-show="phoneError" x-text="phoneError" class="mt-1 text-xs text-cm-error"></p>
                </div>

                <div>
                    <label class="text-xs font-bold text-cm-on-background uppercase">{{ __('email') }} <span class="text-cm-error">*</span></label>
                    <input x-model="form.email" type="email" required placeholder="{{ __('emailPlaceholder') }}"
                        @blur="validateEmail" @input="emailError = ''"
                        :class="['mt-1 w-full px-4 py-3 rounded-xl bg-cm-surface border-none ring-1 focus:ring-2 transition-all', emailError ? 'ring-cm-error focus:ring-cm-error' : 'ring-cm-on-background/30 focus:ring-blue-500']" />
                    <p x-show="emailError" x-text="emailError" class="mt-1 text-xs text-cm-error"></p>
                </div>

                <div>
                    <label class="text-xs font-bold text-cm-on-background uppercase">{{ __('address') }} <span class="text-cm-error">*</span></label>
                    <textarea x-model="form.address" rows="4" placeholder="{{ __('addressPlaceholder') }}" required class="mt-1 w-full bg-cm-surface px-4 py-3 rounded-xl border-none ring-1 ring-cm-on-background/30 focus:ring-2 focus:ring-blue-500 transition-all resize-none"></textarea>
                </div>

                <div x-show="errorMessage" x-cloak class="bg-cm-error-container text-cm-error text-sm rounded-xl p-3 flex items-center gap-2">
                    <span class="material-symbols-outlined text-lg">error</span>
                    <span x-text="errorMessage"></span>
                </div>

                <button type="submit" :disabled="submitting || !isFormValid"
                    class="btn-buy w-full py-4 bg-blue-500 hover:scale-[1.02] disabled:opacity-50 disabled:cursor-not-allowed text-white font-bold text-lg rounded-xl shadow-lg shadow-blue-500/20 transition-all flex items-center justify-center gap-2">
                    <span x-show="submitting" class="material-symbols-outlined animate-spin text-xl">progress_activity</span>
                    <span x-show="!submitting">{{ __('commandInstant') }}</span>
                    <span x-show="!submitting" class="material-symbols-outlined">arrow_forward</span>
                    <span x-show="submitting">{{ __('sending') }}</span>
                </button>
            </form>

            <p class="text-center text-sm text-cm-secondary mt-6">{{ __('needHelp') }} <a href="/contact" class="text-cm-primary font-semibold hover:underline">{{ __('contactUs') }}</a></p>
        </div>
    </div>
</div>

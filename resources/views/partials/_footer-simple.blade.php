{{-- Simple footer for static pages --}}
<footer class="border-t border-gray-200 mt-12 py-8 px-4 sm:px-6 lg:px-8 bg-white">
    <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4 text-sm text-gray-500">
        <span>© {{ date('Y') }} SoftyFact. Tous droits réservés.</span>
        <div class="flex gap-6">
            <a href="/conditions" class="hover:text-cm-primary transition">Conditions</a>
            <a href="/confidentialite" class="hover:text-cm-primary transition">Confidentialité</a>
            <a href="/contact" class="hover:text-cm-primary transition">Contact</a>
        </div>
    </div>
</footer>

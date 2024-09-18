<section id="get-started-today" class="relative overflow-hidden bg-coral-600 py-32 min-h-80">
    <img src="{{ asset('images/background-call-to-action.jpg') }}" alt="" width="2347" height="1244" class="absolute left-1/2 top-1/2 max-w-none -translate-x-1/2 -translate-y-1/2" />
    <x-tailwind.container class="relative">
        <div class="mx-auto max-w-lg text-center">
            <h2 class="font-display text-3xl tracking-tight text-white sm:text-4xl">
                Inizia Oggi
            </h2>
            <p class="mt-4 text-lg tracking-tight text-white">
                Il momento di semplificare la gestione del tuo studio è arrivato.
            </p>
            <a href="#pricing">
                <x-tailwind.button href="{{ $href ?? '#pricing' }}" color="white" class="mt-10">
                    Ottieni 3 mesi gratis
                </x-tailwind.button>
            </a>

        </div>
    </x-tailwind.container>
</section>

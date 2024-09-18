@php
    if (!isset($plans)) {
    $plans = [
        (object)[
            'name' => 'Starter',
            'description' => 'Per professionisti all\'inizio della loro attività.',
            'price' => '€30/mese',
            'features' => [
                'Appuntamenti',
                'Fatture',
                'Gestione Pazienti',
                'Fino a 10 appuntamenti a settimana',
            ],
            'interval' => 'month',
            'href' => '/contacts',
            'featured' => false,
        ],
        (object)[
            'name' => 'Professional',
            'description' => 'Per professionisti affermati o piccoli studi',
            'price' => '€60/mese',
            'features' => [
                'Appuntamenti',
                'Fatture',
                'Gestione Pazienti',
                'Appuntamenti illimiitati',
                'Dominio Personalizzato',
            ],
            'interval' => 'month',
            'href' => '/contacts',
            'featured' => true,
        ],
        (object)[
            'name' => 'Enterprise',
            'description' => 'Per grandi studi e aziende con esigenze complesse.',
            'price' => 'Custom',
            'features' => [
                'Appuntamenti',
                'Fatture',
                'Gestione Pazienti',
                'Appuntamenti illimiitati',
                'Dominio Personalizzato',
                'Accesso API',
                'Gestione Personale',
                'Segreteria Digitale',
            ],
            'interval' => 'year',
            'href' => '/contacts',
            'featured' => false,
        ],
    ];
    }

    usort($plans, function ($a, $b) {
    return $a->price <=> $b->price;
});
@endphp

<div id="pricing" aria-label="Pricing" class="bg-slate-900 py-20 sm:py-32" x-data="{ billingInterval: 'year' }">
    <x-tailwind.container class="container">
        <div class="md:text-center">
            <h2 class="font-display text-3xl tracking-tight text-white sm:text-4xl">
                <span class="relative whitespace-nowrap">
                    <svg aria-hidden="true" viewBox="0 0 281 40" preserveAspectRatio="none" class="absolute left-0 top-1/2 h-[1em] w-full fill-coral-400"><path fill-rule="evenodd" clip-rule="evenodd" d="M240.172 22.994c-8.007 1.246-15.477 2.23-31.26 4.114-18.506 2.21-26.323 2.977-34.487 3.386-2.971.149-3.727.324-6.566 1.523-15.124 6.388-43.775 9.404-69.425 7.31-26.207-2.14-50.986-7.103-78-15.624C10.912 20.7.988 16.143.734 14.657c-.066-.381.043-.344 1.324.456 10.423 6.506 49.649 16.322 77.8 19.468 23.708 2.65 38.249 2.95 55.821 1.156 9.407-.962 24.451-3.773 25.101-4.692.074-.104.053-.155-.058-.135-1.062.195-13.863-.271-18.848-.687-16.681-1.389-28.722-4.345-38.142-9.364-15.294-8.15-7.298-19.232 14.802-20.514 16.095-.934 32.793 1.517 47.423 6.96 13.524 5.033 17.942 12.326 11.463 18.922l-.859.874.697-.006c2.681-.026 15.304-1.302 29.208-2.953 25.845-3.07 35.659-4.519 54.027-7.978 9.863-1.858 11.021-2.048 13.055-2.145a61.901 61.901 0 0 0 4.506-.417c1.891-.259 2.151-.267 1.543-.047-.402.145-2.33.913-4.285 1.707-4.635 1.882-5.202 2.07-8.736 2.903-3.414.805-19.773 3.797-26.404 4.829Zm40.321-9.93c.1-.066.231-.085.29-.041.059.043-.024.096-.183.119-.177.024-.219-.007-.107-.079ZM172.299 26.22c9.364-6.058 5.161-12.039-12.304-17.51-11.656-3.653-23.145-5.47-35.243-5.576-22.552-.198-33.577 7.462-21.321 14.814 12.012 7.205 32.994 10.557 61.531 9.831 4.563-.116 5.372-.288 7.337-1.559Z"></path></svg>
                    <span class="relative">Tariffa semplice,</span>
                </span> per chiunque.
            </h2>
            <p class="mt-4 text-lg text-slate-400">
                Non importa se sei un grande studio e se stai appena iniziando. Abbiamo un piano per te.
            </p>

            <div class="mt-8 flex justify-center">
                <div >
                    <div class="relative inline-flex">
                        <button
                            @click="billingInterval = 'month'"
                            :class="{ 'bg-coral-600 text-white': billingInterval === 'month', 'bg-slate-600 text-slate-400': billingInterval !== 'month' }"
                            class="relative z-10 rounded-l-lg px-4 py-2 text-sm font-medium transition-colors focus:outline-none"
                        >
                            Mensile
                        </button>
                        <button
                            @click="billingInterval = 'year'"
                            :class="{ 'bg-coral-600 text-white': billingInterval === 'year', 'bg-slate-600 text-slate-400': billingInterval !== 'year' }"
                            class="relative z-10 rounded-r-lg px-4 py-2 text-sm font-medium transition-colors focus:outline-none"
                        >
                            Annuale
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="-mx-4 mt-16 grid max-w-2xl grid-cols-1 gap-y-10 sm:mx-auto lg:-mx-8 lg:max-w-none lg:grid-cols-3 xl:mx-0 xl:gap-x-8">
            @foreach($plans as $plan)
                <section x-show="billingInterval === '{{ $plan->interval }}'" class="flex flex-col rounded-3xl px-6 sm:px-8 gap-y-3 {{ $plan->name == 'Business Plan' ? 'order-first bg-coral-600 py-8 lg:order-none' : 'lg:py-8' }}">
                    <h3 class="mt-5 font-display text-lg text-white">{{ $plan->name }}</h3>
                    <p class="{{ $plan->name == 'Business Plan' ? 'text-white' : 'text-slate-400' }} mt-2 text-base">{{ $plan->description }}</p>
                    @if($plan->name != 'Enterprise Plan')
                        @if($plan->interval == 'month')
                        <p class="order-first font-display text-5xl font-light tracking-tight text-white">{{ $plan->price }}€/mese</p>
                            <p class="order-first font-display text-md font-light tracking-tight text-white">pagato mensilmente</p>
                        @else
                            <p class="order-first font-display text-5xl font-light tracking-tight text-white">{{ round($plan->price / 12, 2) }}€/mese</p>
                            <p class="order-first font-display text-md font-light tracking-tight text-white">pagato annualmente</p>
                        @endif
                    @else
                        <p class="order-first font-display text-5xl font-light tracking-tight text-white">Personalizzato</p>
                    @endif
                    <ul role="list" class="{{ $plan->name == 'Business Plan' ? 'text-white' : 'text-slate-200' }} order-last mt-10 flex flex-col gap-y-3 text-sm">
                        @foreach($plan->features as $feature)
                            <li class="flex">
                                <svg aria-hidden="true" class="h-6 w-6 flex-none fill-current stroke-current {{$plan->name == 'Business Plan' ? 'text-white' : 'text-slate-400'  }} "><path d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0 0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5 1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z" stroke-width="0"></path><circle cx="12" cy="12" r="8.25" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle></svg>
                                <span class="ml-4">{{ $feature }}</span>
                            </li>
                        @endforeach
                    </ul>
                    @if($plan->name != 'Enterprise Plan')
                        <x-tailwind.button wire:click="selectPrice('{{ $plan->price_id }}')"  class="{{ $plan->name == 'Business Plan' ? 'solid' : 'outline' }}" color="white" aria-label="Get started with the {{ $plan->name }} plan for {{ $plan->price }}">Inizia</x-tailwind.button>
                        <a href="/contacts"  class="{{ $plan->name == 'Business Plan' ? 'text-white' : 'text-slate-400' }} font-semibold text-center" aria-label="Contact us">Oppure richiedi più informazioni</a>
                    @else
                        <x-tailwind.button href="/contacts"  class="{{ $plan->name == 'Business Plan' ? 'solid' : 'outline' }}" color="white" aria-label="Get started with the {{ $plan->name }} plan for {{ $plan->price }}">Contattaci</x-tailwind.button>
                    @endif


                </section>
            @endforeach
        </div>
    </x-tailwind.container>
</div>

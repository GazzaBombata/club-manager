@php
$features = [
[
'title' => 'Appuntamenti',
'description' => 'Crea appuntmaenti in un secondo, automatizza conferme e reminder.',
'image' => 'appuntamenti.png',
],
[
'title' => 'Pazienti',
'description' => 'Gestisci i tuoi pazienti, le visite da loro prenotate e quelle ancora da pagare.',
'image' => 'pazienti.png',
],
[
'title' => 'Calendario',
'description' => 'Controlla la tua agenda, visualizza i tuoi appuntamenti e gestisci i tuoi impegni.',
'image' => 'calendario.png',
],
[
'title' => 'Fatture',
'description' => 'Inserisci i tuoi dati di fatturazione ed automatizza la gestione delle fatture.',
'image' => 'payroll.png',
],
[
'title' => 'Medbooks app per professionisti',
'description' => 'Per velocizzare ancora di più la gestione, puoi utilizzare anche la nostra app Medbooks Pro.',
'image' => 'reporting.png',
],
];
@endphp

<section id="features" aria-label="Features for running your books" class="hidden md:block relative overflow-hidden bg-coral-600 pb-28 pt-20 sm:py-32">
  <img class="absolute left-1/2 top-1/2 max-w-none translate-x-[-44%] translate-y-[-42%]" src="{{ asset('images/background-features.jpg') }}" alt="" width="2245" height="1636">
  <div class="relative max-w-2xl md:mx-auto md:text-center xl:max-w-none z-10">
    <h2 class="font-display text-3xl tracking-tight text-white sm:text-4xl md:text-5xl">Tutto ciò che ti serve per gestire i tuoi pazienti</h2>
    <p class="mt-6 text-lg tracking-tight text-blue-100">I tuoi pazienti possono prenotare un appuntamento con un click, e tu, sempre con un click, puoi visualizzarli, confermarli gestirli o cancellarli.</p>
  </div>
  <div class="mt-16 grid grid-cols-1 items-center gap-y-2 pt-10 sm:gap-y-6 md:mt-20 lg:grid-cols-12 lg:pt-0"
  x-data="{ tab: '0' }">
    <div class="-mx-4 flex overflow-x-auto pb-4 sm:mx-0 sm:overflow-visible sm:pb-0 lg:col-span-5 justify-end">
      <div class="relative flex gap-x-4 whitespace-nowrap px-4 sm:mx-auto sm:px-0 lg:mx-0 lg:block lg:gap-x-0 lg:gap-y-1 lg:whitespace-normal" role="tablist" aria-orientation="vertical">
        @foreach($features as $index => $feature)
        <div class="group relative rounded-full px-4 py-1 lg:rounded-l-xl lg:rounded-r-none "
        x-bind:class="{'lg:p-6 hover:bg-white/10 lg:hover:bg-white/5': tab !== '{{$index}}', 'lg:p-6 bg-white lg:bg-white/10 lg:ring-1 lg:ring-inset lg:ring-white/10': tab === '{{$index}}'}"
        >
          {{--div   group relative rounded-full px-4 py-1 lg:rounded-l-xl lg:rounded-r-none lg:p-6 bg-white lg:bg-white/10 lg:ring-1 lg:ring-inset lg:ring-white/10 --}}
          <h3 >
            <button class=" text-2xl font-semibold ui-not-focus-visible:outline-none text-blue-600 lg:text-white" id="headlessui-tabs-tab-{{$index}}" type="button"
            @click="tab = '{{$index}}'">
              <span class="absolute inset-0 rounded-full lg:rounded-l-xl lg:rounded-r-none"></span>
              {{ $feature['title'] }}
            </button>
          </h3>
          <p class="mt-2 hidden text-sm lg:block text-white">{{ $feature['description'] }}</p>
        </div>
        @endforeach
      </div>
    </div>
    <div class="lg:col-span-7 z-20">
      @foreach($features as $index => $feature)
      <div id="headlessui-tabs-panel-{{$index}}" x-init="console.log('{{$index}}')"
      x-show="tab === '{{$index}}'"
      >
        <div class="relative sm:px-6 lg:hidden">
          <div class="absolute -inset-x-4 bottom-[-4.25rem] top-[-6.5rem] bg-white/10 ring-1 ring-inset ring-white/10 sm:inset-x-0 sm:rounded-t-xl"></div>
          <p class="relative mx-auto max-w-2xl text-base text-white sm:text-center">Keep track of everyone's salaries and whether or not they've been paid. Direct deposit not supported.</p>
        </div>
        <div class="mt-10 w-[45rem] overflow-hidden rounded-xl bg-slate-50 shadow-xl shadow-blue-900/20 sm:w-auto lg:mt-0 lg:w-[67.8125rem]">
          <img alt="" fetchpriority="high" width="2174" height="1464" decoding="async" data-nimg="1" class="w-full" sizes="(min-width: 1024px) 67.8125rem, (min-width: 640px) 100vw, 45rem" src="{{ asset('images/screenshots/' . $feature['image']) }}" style="color: transparent;">
        </div>
      </div>
      @endforeach
    </div>
  </div>
  </div>
</section>

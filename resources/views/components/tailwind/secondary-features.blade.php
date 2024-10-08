@php
  $features = [
[
'title' => 'Appuntamenti',
'description' => 'Crea appuntamenti in un secondo, automatizza conferme e reminder.',
'long-description' => 'Grazie a Medbooks puoi creare appuntamenti in un secondo, automatizzare conferme e reminder e gestire la tua disponibilità in modo semplice e veloce.',
'image' => 'appuntamenti.png',
],
[
'title' => 'Calendario',
'description' => 'Controlla la tua agenda, visualizza i tuoi appuntamenti e gestisci i tuoi impegni.',
'long-description' => 'Visualizza i tuoi appuntamenti in un calendario intuitivo, gestisci la tua disponibilità e ricevi notifiche per non dimenticare mai un appuntamento.',
'image' => 'calendario.png',
],
[
'title' => 'Pazienti',
'description' => 'Gestisci i tuoi pazienti, le visite da loro prenotate e quelle ancora da pagare.',
'long-description' => 'Gestisci i tuoi pazienti, le visite da loro prenotate e quelle ancora da pagare. Ricevi notifiche per i pagamenti in scadenza e tieni sotto controllo le tue entrate.',
'image' => 'pazienti.png',
],

];
@endphp
<section id="secondary-features" aria-label="Features for simplifying everyday business tasks" class="pb-14 pt-20 sm:pb-20 sm:pt-32 lg:pb-32">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-2xl md:text-center">
      <h2 class="font-display text-3xl tracking-tight text-slate-900 sm:text-4xl">Il tuo calendario, i tuoi appuntamenti</h2>
      <p class="mt-4 text-lg tracking-tight text-slate-700">Gestisci la tua disponibilità in 10 secondi e lascia a Medbooks gesitire il resto.</p>
    </div>
    <div class="-mx-4 mt-20 flex flex-col gap-y-10 overflow-hidden px-4 sm:-mx-6 sm:px-6 lg:hidden">
    @foreach($features as $index => $feature)
      <div>
        <div class="mx-auto max-w-2xl">
          <div class="w-9 rounded-lg bg-blue-600"><svg aria-hidden="true" class="h-9 w-9" fill="none">
              <defs>
                <linearGradient id=":ru:" x1="11.5" y1="18" x2="36" y2="15.5" gradientUnits="userSpaceOnUse">
                  <stop offset=".194" stop-color="#fff"></stop>
                  <stop offset="1" stop-color="#6692F1"></stop>
                </linearGradient>
              </defs>
              <path d="m30 15-4 5-4-11-4 18-4-11-4 7-4-5" stroke="url(#:ru:)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg></div>
          <h3 class="mt-6 text-sm font-medium text-blue-600">{{$feature['title']}}</h3>
          <p class="mt-2 font-display text-xl text-slate-900">{{$feature['description']}}</p>
          <p class="mt-4 text-sm text-slate-600">{{$feature['long-description']}}</p>
        </div>
        <div class="relative mt-10 pb-10">
          <div class="absolute -inset-x-4 bottom-0 top-8 bg-slate-200 sm:-inset-x-6"></div>
          <div class="relative mx-auto w-[52.75rem] overflow-hidden rounded-xl bg-white shadow-lg shadow-slate-900/5 ring-1 ring-slate-500/10"><img alt="" loading="lazy" width="1688" height="856" decoding="async" data-nimg="1" class="w-full" sizes="52.75rem"
          src="{{ asset('images/screenshots/' . $feature['image']) }}" style="color: transparent;"></div>
        </div>
      </div>
    @endforeach
      {{-- <div>
        <div class="mx-auto max-w-2xl">
          <div class="w-9 rounded-lg bg-blue-600"><svg aria-hidden="true" class="h-9 w-9" fill="none">
              <path opacity=".5" d="M8 17a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1v-2Z" fill="#fff"></path>
              <path opacity=".3" d="M8 24a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1v-2Z" fill="#fff"></path>
              <path d="M8 10a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1v-2Z" fill="#fff"></path>
            </svg></div>
          <h3 class="mt-6 text-sm font-medium text-blue-600">Inventory</h3>
          <p class="mt-2 font-display text-xl text-slate-900">Never lose track of what’s in stock with accurate inventory tracking.</p>
          <p class="mt-4 text-sm text-slate-600">We don’t offer this as part of our software but that statement is inarguably true. Accurate inventory tracking would help you for sure.</p>
        </div>
        <div class="relative mt-10 pb-10">
          <div class="absolute -inset-x-4 bottom-0 top-8 bg-slate-200 sm:-inset-x-6"></div>
          <div class="relative mx-auto w-[52.75rem] overflow-hidden rounded-xl bg-white shadow-lg shadow-slate-900/5 ring-1 ring-slate-500/10"><img alt="" loading="lazy" width="1688" height="856" decoding="async" data-nimg="1" class="w-full" sizes="52.75rem" srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=16&amp;q=75 16w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=32&amp;q=75 32w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=48&amp;q=75 48w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=64&amp;q=75 64w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=96&amp;q=75 96w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=128&amp;q=75 128w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=256&amp;q=75 256w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=384&amp;q=75 384w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=640&amp;q=75 640w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=750&amp;q=75 750w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=828&amp;q=75 828w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=1080&amp;q=75 1080w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=1200&amp;q=75 1200w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=1920&amp;q=75 1920w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=2048&amp;q=75 2048w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Finventory.14ec7758.png&amp;w=3840&amp;q=75" style="color: transparent;"></div>
        </div>
      </div>
      <div>
        <div class="mx-auto max-w-2xl">
          <div class="w-9 rounded-lg bg-blue-600"><svg aria-hidden="true" class="h-9 w-9" fill="none">
              <path opacity=".5" d="M25.778 25.778c.39.39 1.027.393 1.384-.028A11.952 11.952 0 0 0 30 18c0-6.627-5.373-12-12-12S6 11.373 6 18c0 2.954 1.067 5.659 2.838 7.75.357.421.993.419 1.384.028.39-.39.386-1.02.036-1.448A9.959 9.959 0 0 1 8 18c0-5.523 4.477-10 10-10s10 4.477 10 10a9.959 9.959 0 0 1-2.258 6.33c-.35.427-.354 1.058.036 1.448Z" fill="#fff"></path>
              <path d="M12 28.395V28a6 6 0 0 1 12 0v.395A11.945 11.945 0 0 1 18 30c-2.186 0-4.235-.584-6-1.605ZM21 16.5c0-1.933-.5-3.5-3-3.5s-3 1.567-3 3.5 1.343 3.5 3 3.5 3-1.567 3-3.5Z" fill="#fff"></path>
            </svg></div>
          <h3 class="mt-6 text-sm font-medium text-blue-600">Contacts</h3>
          <p class="mt-2 font-display text-xl text-slate-900">Organize all of your contacts, service providers, and invoices in one place.</p>
          <p class="mt-4 text-sm text-slate-600">This also isn’t actually a feature, it’s just some friendly advice. We definitely recommend that you do this, you’ll feel really organized and professional.</p>
        </div>
        <div class="relative mt-10 pb-10">
          <div class="absolute -inset-x-4 bottom-0 top-8 bg-slate-200 sm:-inset-x-6"></div>
          <div class="relative mx-auto w-[52.75rem] overflow-hidden rounded-xl bg-white shadow-lg shadow-slate-900/5 ring-1 ring-slate-500/10"><img alt="" loading="lazy" width="1688" height="856" decoding="async" data-nimg="1" class="w-full" sizes="52.75rem" srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=16&amp;q=75 16w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=32&amp;q=75 32w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=48&amp;q=75 48w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=64&amp;q=75 64w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=96&amp;q=75 96w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=128&amp;q=75 128w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=256&amp;q=75 256w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=384&amp;q=75 384w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=640&amp;q=75 640w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=750&amp;q=75 750w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=828&amp;q=75 828w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=1080&amp;q=75 1080w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=1200&amp;q=75 1200w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=1920&amp;q=75 1920w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=2048&amp;q=75 2048w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcontacts.a61dce95.png&amp;w=3840&amp;q=75" style="color: transparent;"></div>
        </div> --}}
      {{-- </div> --}}
    </div>
    <div class="hidden lg:mt-20 lg:block"
    x-data = "{ tab: '0' }">
      <div class="grid grid-cols-3 gap-x-8" role="tablist" aria-orientation="horizontal">
      @foreach($features as $index => $feature)
          <div class="relative opacity-75 hover:opacity-100"
          @click="tab='{{$index}}', console.log(tab)"
          >
          <div class="w-9 rounded-lg bg-slate-500"><svg aria-hidden="true" class="h-9 w-9" fill="none">
              <defs>
                <linearGradient id=":rv:" x1="11.5" y1="18" x2="36" y2="15.5" gradientUnits="userSpaceOnUse">
                  <stop offset=".194" stop-color="#fff"></stop>
                  <stop offset="1" stop-color="#6692F1"></stop>
                </linearGradient>
              </defs>
              <path d="m30 15-4 5-4-11-4 18-4-11-4 7-4-5" stroke="url(#:rv:)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg></div>
          <h3 class="mt-6 text-sm font-medium text-slate-600"><button class="ui-not-focus-visible:outline-none" id="headlessui-tabs-tab-:r10:" role="tab" type="button" aria-selected="false" tabindex="-1" data-headlessui-state="" aria-controls="headlessui-tabs-panel-:r13:"><span class="absolute inset-0"></span>{{$feature['title']}}</button></h3>
          <p class="mt-2 font-display text-xl text-slate-900">{{$feature['description']}}</p>
          <p class="mt-4 text-sm text-slate-600">{{$feature['long-description']}}</p>
        </div>
      @endforeach
      </div>


      <div class="relative mt-20 overflow-hidden rounded-4xl bg-slate-200 px-14 py-16 xl:px-16 w-full">
        <div class="-mx-5 flex w-full">
        @foreach($features as $index => $feature)
          <div id="panel-tab-{{$index}}"
          x-show="tab === '{{$index}}'"
          x-init="console.log('panel-tab-{{$index}}')"
          class=" opacity-60"  role="tabpanel" tabindex="-1">
            <div class="w-[52.75rem] overflow-hidden rounded-xl bg-white shadow-lg shadow-slate-900/5 ring-1 ring-slate-500/10"><img alt="" loading="lazy" width="1688" height="856" decoding="async" data-nimg="1" class="w-full" sizes="52.75rem"
            src="{{ asset('images/screenshots/' . $feature['image']) }}" style="color: transparent;"></div>
          </div>
        @endforeach
        </div>
        <div class="pointer-events-none absolute inset-0 rounded-4xl ring-1 ring-inset ring-slate-900/10"></div>
      </div>
    </div>
  </div>
</section>

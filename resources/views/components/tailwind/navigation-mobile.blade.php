
<div data-headlessui-state="open" data-open="" x-data="{ open : false }">
  <button @click="open = !open" class="relative z-10 flex h-8 w-8 items-center justify-center ui-not-focus-visible:outline-none" aria-label="Toggle Navigation" type="button" aria-expanded="true" data-headlessui-state="open active" id="headlessui-popover-button-:R2v6fja:" data-open="" data-active="" aria-controls="headlessui-popover-panel-:r1:">
    <svg aria-hidden="true" class="h-3.5 w-3.5 overflow-visible stroke-slate-700" fill="none" stroke-width="2" stroke-linecap="round">
        <path x-cloak x-show="!open" d="M0 1H14M0 7H14M0 13H14" class="origin-center transition scale-90"></path>
        <path x-cloak x-show="open" d="M2 2L12 12M12 2L2 12" class="origin-center transition"></path>
    </svg>
  </button>
  <div x-cloak x-show="open" class="fixed inset-0 bg-slate-300/50 opacity-100" id="headlessui-popover-overlay-:r0:" aria-hidden="true" data-headlessui-state="open" data-open="" style=""></div>
  <div x-cloak x-show="open" class="absolute inset-x-0 top-full mt-4 flex origin-top flex-col rounded-2xl bg-white p-4 text-lg tracking-tight text-slate-900 shadow-xl ring-1 ring-slate-900/5 opacity-100 scale-100" id="headlessui-popover-panel-:r1:" tabindex="-1" data-headlessui-state="open" data-open="" style="--button-width: 32px;">
    <a class="block w-full p-2" data-headlessui-state="open active" data-open="" data-active="" href="#features">Funzionalità</a>
    {{-- <a class="block w-full p-2" data-headlessui-state="open active" data-open="" data-active="" href="#testimonials">Testimonials</a> --}}
    <a class="block w-full p-2" data-headlessui-state="open active" data-open="" data-active="" href="#pricing">Pricing</a>
    <hr class="m-2 border-slate-300/40">
    <a class="block w-full p-2" data-headlessui-state="open active" data-open="" data-active="" href="/login">Sign in</a>
  </div>
</div>

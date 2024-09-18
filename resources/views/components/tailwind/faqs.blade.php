@php
$faqs = [
[
[
'question' => 'Does TaxPal handle VAT?',
'answer' => 'Well no, but if you move your company offshore you can probably ignore it.',
],
[
'question' => 'Does TaxPal handle VAT?',
'answer' => 'Well no, but if you move your company offshore you can probably ignore it.',
],
[
'question' => 'Does TaxPal handle VAT?',
'answer' => 'Well no, but if you move your company offshore you can probably ignore it.',
],
],
[
[
'question' => 'Does TaxPal handle VAT?',
'answer' => 'Well no, but if you move your company offshore you can probably ignore it.',
],
[
'question' => 'Does TaxPal handle VAT?',
'answer' => 'Well no, but if you move your company offshore you can probably ignore it.',
],
[
'question' => 'Does TaxPal handle VAT?',
'answer' => 'Well no, but if you move your company offshore you can probably ignore it.',
],
[
'question' => 'Does TaxPal handle VAT?',
'answer' => 'Well no, but if you move your company offshore you can probably ignore it.',
],
],
[
[
'question' => 'Does TaxPal handle VAT?',
'answer' => 'Well no, but if you move your company offshore you can probably ignore it.',
],
[
'question' => 'Does TaxPal handle VAT?',
'answer' => 'Well no, but if you move your company offshore you can probably ignore it.',
],
[
'question' => 'Does TaxPal handle VAT?',
'answer' => 'Well no, but if you move your company offshore you can probably ignore it.',
],
],
];
@endphp

<section id="faq" aria-labelledby="faq-title" class="relative overflow-hidden bg-slate-50 py-20 sm:py-32">
  <img src="{{ asset('images/background-faqs.jpg') }}" alt="" width="1558" height="946" class="absolute left-1/2 top-0 max-w-none -translate-y-1/4 translate-x-[-30%]" />
  <x-tailwind.container class="relative">
    <div class="mx-auto max-w-2xl lg:mx-0">
      <h2 id="faq-title" class="font-display text-3xl tracking-tight text-slate-900 sm:text-4xl">
        Frequently asked questions
      </h2>
      <p class="mt-4 text-lg tracking-tight text-slate-700">
        If you can’t find what you’re looking for, email our support team
        and if you’re lucky someone will get back to you.
      </p>
    </div>
    <ul role="list" class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-8 lg:max-w-none lg:grid-cols-3">
      @foreach ($faqs as $column)
      <li>
        <ul role="list" class="flex flex-col gap-y-8">
          @foreach ($column as $faq)
          <li>
            <h3 class="font-display text-lg leading-7 text-slate-900">
              {{ $faq['question'] }}
            </h3>
            <p class="mt-4 text-sm text-slate-700">{{ $faq['answer'] }}</p>
          </li>
          @endforeach
        </ul>
      </li>
      @endforeach
    </ul>
  </x-tailwind.container>
</section>

@php
    $testimonials = [
        [
            [
                'content' => 'Non posso credere a quanto sia facile usare Medbooks. Lo uso da tempo e non mi ha mai deluso.',
                'author' => [
                    'name' => 'Paolo Giotto',
                    'role' => 'Titolare, Manus Brescia',
                    'image' => 'images/testimonials/jane-doe.jpg',
                ],
            ],
            [
                'content' => 'I can’t believe how easy it is to use TaxPal. I’ve been using it for years and it’s never let me down.',
                'author' => [
                    'name' => 'John Doe',
                    'role' => 'CTO, Example Corp',
                    'image' => 'images/testimonials/john-doe.jpg',
                ],
            ],
        ],
        [
            [
                'content' => 'I can’t believe how easy it is to use TaxPal. I’ve been using it for years and it’s never let me down.',
                'author' => [
                    'name' => 'Jane Doe',
                    'role' => 'CEO, Example Corp',
                    'image' => 'images/testimonials/jane-doe.jpg',
                ],
            ],
            [
                'content' => 'I can’t believe how easy it is to use TaxPal. I’ve been using it for years and it’s never let me down.',
                'author' => [
                    'name' => 'John Doe',
                    'role' => 'CTO, Example Corp',
                    'image' => 'images/testimonials/john-doe.jpg',
                ],
            ],
        ],
        [
            [
                'content' => 'I can’t believe how easy it is to use TaxPal. I’ve been using it for years and it’s never let me down.',
                'author' => [
                    'name' => 'Jane Doe',
                    'role' => 'CEO, Example Corp',
                    'image' => 'images/testimonials/jane-doe.jpg',
                ],
            ],
            [
                'content' => 'I can’t believe how easy it is to use TaxPal. I’ve been using it for years and it’s never let me down.',
                'author' => [
                    'name' => 'John Doe',
                    'role' => 'CTO, Example Corp',
                    'image' => 'images/testimonials/john-doe.jpg',
                ],
            ],
        ],
    ];

@endphp
<section id="testimonials" aria-label="What our customers are saying" class="bg-slate-50 py-20 sm:py-32">
    <x-tailwind.container>
        <div class="mx-auto max-w-2xl md:text-center">
            <h2 class="font-display text-3xl tracking-tight text-slate-900 sm:text-4xl">
                Amato da dottori e fisioterapisti in tutta Italia.
            </h2>
            <p class="mt-4 text-lg tracking-tight text-slate-700">
                Scopri cosa dicono di noi i nostri clienti.
                
            </p>
        </div>
        <ul role="list" class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-6 sm:gap-8 lg:mt-20 lg:max-w-none lg:grid-cols-3">
            @foreach ($testimonials as $column)
                <li>
                    <ul role="list" class="flex flex-col gap-y-6 sm:gap-y-8">
                        @foreach ($column as $testimonial)
                            <li>
                                <figure class="relative rounded-2xl bg-white p-6 shadow-xl shadow-slate-900/10">
                                    <x-tailwind.quote-icon class="absolute left-6 top-6 fill-slate-200" />
                                    <blockquote class="relative">
                                        <p class="text-lg tracking-tight text-slate-900">
                                            {{ $testimonial['content'] }}
                                        </p>
                                    </blockquote>
                                    <figcaption class="relative mt-6 flex items-center justify-between border-t border-slate-100 pt-6">
                                        <div>
                                            <div class="font-display text-base text-slate-900">
                                                {{ $testimonial['author']['name'] }}
                                            </div>
                                            <div class="mt-1 text-sm text-slate-500">
                                                {{ $testimonial['author']['role'] }}
                                            </div>
                                        </div>
                                        <div class="overflow-hidden rounded-full bg-slate-50">
                                            <img class="h-14 w-14 object-cover" src="{{ $testimonial['author']['image'] }}" alt="" width="56" height="56">
                                        </div>
                                    </figcaption>
                                </figure>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </x-tailwind.container>
</section>
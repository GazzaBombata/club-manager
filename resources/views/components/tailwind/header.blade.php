<header class="py-10">
    <x-tailwind.container>
        <nav class="relative z-50 flex justify-between">
            <div class="flex items-center md:gap-x-12">
                <x-authentication-card-logo />
                <div class="hidden md:flex md:gap-x-6 px-4">
                    {{--<x-tailwind.navlink href="#features" class="nav-link">Funzionalità</x-tailwind.navlink>--}}
                    {{-- <x-tailwind.navlink href="#testimonials" class="nav-link">Testimonials</x-tailwind.navlink> --}}
                    {{--<x-tailwind.navlink href="#pricing" class="nav-link">Prezzo</x-tailwind.navlink>--}}
                </div>
            </div>
            <div class="flex items-center gap-x-5 md:gap-x-8">
                <div class="block">
                    @if(!auth()->user())
                        <x-tailwind.navlink href="/login" class="nav-link">Log in</x-tailwind.navlink>
                    @else
                        <x-tailwind.navlink href="/dashboard" class="nav-link">Dashboard</x-tailwind.navlink>
                    @endif
                </div>
                {{-- <x-tailwind.button href="/contacts" color="coral">
                    <span>
                        Contattaci <span class="hidden lg:inline">ora</span>
                    </span>
                </x-tailwind.button> --}}
{{--                <div class="-mr-1 md:hidden">
                    <x-tailwind.navigation-mobile />
                </div>--}}
            </div>
        </nav>
    </x-tailwind.container>
</header>

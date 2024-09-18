<x-filament-widgets::widget>
    <x-filament::section>
        <h3 class="fi-header-heading text-md font-bold tracking-tight text-gray-950 dark:text-white sm:text-xl">{{ __('Verbale') }}</h3>

        <form wire:submit="submit" class="flex flex-col space-y-4">

            {{$this->form}}

        @if(!Gate::allows('create', MinuteMeeting::class))
            <x-filament::button  id="cardButton" type="submit" wire:loading.remove >
                {{ __('Salva') }}
            </x-filament::button>
            <x-filament::loading-indicator class="h-5 w-5" wire:loading />
        @endif
        </form>
    </x-filament::section>
</x-filament-widgets::widget>

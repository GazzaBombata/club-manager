<x-filament-widgets::widget>
    <x-filament::section>
            <h2 class="fi-header-heading text-lg font-bold tracking-tight text-gray-950 dark:text-white sm:text-xl">{{ __('Foto profilo') }}</h2>


        <form wire:submit="submit" class="flex flex-col w-full space-y-4">
            {{ $this->form }}
            <x-filament::button  id="cardButton" type="submit" wire:loading.remove >
                {{ __('Salva') }}
            </x-filament::button>
            <x-filament::loading-indicator class="h-5 w-5" wire:loading />
        </form>
    </x-filament::section>
</x-filament-widgets::widget>

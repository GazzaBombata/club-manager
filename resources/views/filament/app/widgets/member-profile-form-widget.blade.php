<x-filament::widget>
    <x-filament::section class="flex flex-col space-y-6">

        <h2 class="fi-header-heading text-lg font-bold tracking-tight text-gray-950 dark:text-white sm:text-xl">{{ __('Contact Information') }}</h2>

        <form wire:submit="submit" class="flex flex-col space-y-4">

            {{ $this->form }}


            @if(!$this->record || ($this->record->user && $this->record->user->id === auth()->user()->id))
                <x-filament::button  id="cardButton" type="submit" wire:loading.remove >
                    {{ __('Submit') }}
                </x-filament::button>
                <x-filament::loading-indicator class="h-5 w-5" wire:loading />
            @endif

        </form>

    </x-filament::section>
</x-filament::widget>

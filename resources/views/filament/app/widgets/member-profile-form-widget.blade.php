<x-filament::widget>
    <x-filament::section class="flex flex-col space-y-6">

        <h2 class="fi-header-heading text-lg font-bold tracking-tight text-gray-950 dark:text-white sm:text-xl">{{ __('Informazioni Professionali') }}</h2>

        @if($this->record && $this->record->user)
            <div class="w-full h-12 !h-12 flex flex-col items-center">
                <x-filament::avatar
                    src="{{$this->record->user->profile_photo_path ? env('AWS_URL').'/'.$this->record->user->profile_photo_path : 'https://medbooksbucket2.s3.eu-central-1.amazonaws.com/clubberly/profile-photos/01J873M1M02EBBBNN51V92RVJF.jpg'}}"
                    alt="{{$this->record->user->name}}"
                    size="h-full"
                />
            </div>
        @endif

        <form wire:submit="submit" class="flex flex-col space-y-4">

            {{ $this->form }}


            @if(!$this->record || ($this->record->user && $this->record->user->id === auth()->user()->id))
                <x-filament::button  id="cardButton" type="submit" wire:loading.remove >
                    {{ __('Salva') }}
                </x-filament::button>
                <x-filament::loading-indicator class="h-5 w-5" wire:loading />
            @endif

        </form>

    </x-filament::section>
</x-filament::widget>

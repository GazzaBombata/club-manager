

<div class="flex flex-col items-center space-x-4">

    <!-- Present Button -->
    @if($getState() == 'Present')
        <x-filament::icon
            icon="heroicon-o-check-circle"
            class="h-5 w-5 text-emerald-500 dark:text-emerald-200"
        />
    @if($getRecord()->meeting->editable_until > now())
        Cancella
    @else
        Confermato
    @endif

    @endif

    <!-- Absent Button -->
        @if($getState() != 'Present')
            <x-filament::icon
                icon="heroicon-o-x-circle"
                class="h-5 w-5 text-emerald-500 dark:text-emerald-200"
            />
        @if($getRecord()->meeting->editable_until > now())
            Cancella
        @else
            Scaduto
        @endif
        @endif

</div>

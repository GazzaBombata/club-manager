<?php

namespace App\Filament\App\Widgets;

use App\Models\ClubUserAffiliation;
use App\Models\User;
use Filament\Facades\Filament;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Widgets\Widget;
use Filament\Forms\Components\FileUpload;
use Filament\Forms;

class UserProfilePhotoWidget extends Widget implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static string $view = 'filament.app.widgets.user-profile-photo-widget';

    protected static bool $isDiscovered = false;

    public ?array $data = [];

    public $record;


    public function mount(): void
    {
        $this->record = auth()->user();

        $this->form->fill($this->record->toArray());
    }



    public function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('profile_photo_path')
                    ->label('Caricamento foto profilo')
                    ->disk('s3')
                    ->directory('clubberly/profile-photos')
                    ->avatar(),
            ])
            ->model(User::class)
            ->statePath('data');
    }

    public function submit()
    {
        $record = auth()->user();

        // Ottieni i dati del form come array
        $formData = $this->form->getState();

        // Riempi il modello con i dati del form
        $record->fill($formData);

        // Salva il record nel database
        $record->save();

        // Notifica l'utente dell'avvenuto salvataggio
        Notification::make()
            ->title('Saved successfully')
            ->success()
            ->send();

    }
}

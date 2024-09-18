<?php

namespace App\Filament\App\Widgets;

use App\Models\ClubUserAffiliation;
use Filament\Widgets\Widget;
use Illuminate\Contracts\View\View;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Livewire\Component;
use Filament\Forms\Set;
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification;

class AffiliationFormWidget extends Widget implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static string $view = 'filament.app.widgets.affiliation-form-widget';

    protected static bool $isDiscovered = false;

    public ?array $data = [];

    public $record;


    public function mount(): void
    {
        $this->record = auth()->user()->clubUserAffiliation;

        $this->form->fill($this->record->toArray());
    }



    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->default(auth()->user()->id)
                    ->hidden()
                    ->required(),
                Forms\Components\Select::make('club_id')
                    ->relationship('club', 'name')
                    ->default(Filament::getTenant()->id)
                    ->hidden()
                    ->required(),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->disabled(),
                Forms\Components\TextInput::make('user_contact_email')
                    ->label('Email di contatto')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('user_contact_phone')
                    ->label('Contatto telefonico')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('joined_at')
                    ->disabled()
                    ->hidden()
                    ->required(),
                Forms\Components\DateTimePicker::make('left_at')
                    ->disabled()
                    ->hidden(),
            ])
            ->model(ClubUserAffiliation::class)
            ->statePath('data');
    }

    public function submit()
    {
        $record = auth()->user()->clubUserAffiliation;

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

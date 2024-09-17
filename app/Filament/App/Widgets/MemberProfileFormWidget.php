<?php

namespace App\Filament\App\Widgets;


use App\Enums\ProfileVisibility;
use App\Models\User;
use Filament\Widgets\Widget;
use App\Models\MemberProfile;
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

class MemberProfileFormWidget extends Widget implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static string $view = 'filament.app.widgets.member-profile-form-widget';
    protected static bool $isDiscovered = false;

    public ?array $data = [];

    public ?Model $record = null;

    protected int | string | array $columnSpan = 'full';

    public function mount(): void
    {
        if(!$this->record) {
            $user = auth()->user();
            $this->record = $user->memberProfile ? $user->memberProfile : null;
            if ($this->record) {
                $this->form->fill($this->record->toArray());
            } else {
                $this->form->fill();
            }
        } else {
            if ($this->record->user->memberProfile) {
                $this->form->fill($this->record->user->memberProfile->toArray());
            } else {
                $this->form->fill();
            }

        }

    }


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->hidden()
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->maxLength(255)
                    ->disabled(function (Forms\Get $get) {
                        // Use $get to access the form state, including the record
                        return !($get('user_id') === auth()->user()->id);
                    }),
                Forms\Components\RichEditor::make('description')
                    ->maxLength(255)
                    ->disabled(function (Forms\Get $get) {
                        // Use $get to access the form state, including the record
                        return !($get('user_id') === auth()->user()->id);
                    }),
                Forms\Components\TextInput::make('linkedin_profile_link')
                    ->maxLength(255)
                    ->disabled(function (Forms\Get $get) {
                        // Use $get to access the form state, including the record
                        return !($get('user_id') === auth()->user()->id);
                    }),
                Forms\Components\Select::make('visibility')
                    ->options(ProfileVisibility::class)
                    ->default(ProfileVisibility::Public)
                    ->required()
                    ->disabled(function (Forms\Get $get) {
                        // Use $get to access the form state, including the record
                        return !($get('user_id') === auth()->user()->id);
                    }),
            ])
            ->model(MemberProfile::class)
            ->statePath('data');
    }

    public function submit()
    {

        // Ottieni i dati del form come array
        $formData = $this->form->getState();

        $formData['user_id'] = $this->record->user->id;

        if(!$this->record->memberProfile) {
            $this->record->user->memberProfile = MemberProfile::create($formData);
        }

        // Riempi il modello con i dati del form
        $this->record->user->memberProfile->fill($formData);

        // Salva il record nel database
        $this->record->user->memberProfile->save();

        // Notifica l'utente dell'avvenuto salvataggio
        Notification::make()
            ->title('Saved successfully')
            ->success()
            ->send();

    }

}

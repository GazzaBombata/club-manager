<?php

namespace App\Filament\App\Resources\MeetingResource\Widgets;

use App\Models\ClubUserAffiliation;
use App\Models\Meeting;
use App\Models\MeetingMinute;
use Filament\Forms\Form;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Gate;

class MeetingMinuteWidget extends Widget implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static string $view = 'filament.app.resources.meeting-resource.widgets.meeting-minute-widget';

    public Meeting $meeting;

    public MeetingMinute $meetingMinute;

    protected int | string | array $columnSpan = 'full';

    protected static bool $isDiscovered = false;

    public ?array $data = [];

    public $record;

    // Ensure the widget has access to the current meeting
    public function mount(Meeting $record)
    {
        $this->record = $record;

        $meeting_minute =  Meeting::find($record->id)->meetingMinute ?? new MeetingMinute();

        $this->form->fill($meeting_minute->toArray());

        $this->data['meeting_id'] = $record->id;

        $this->meetingMinute = $meeting_minute;

    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('meeting_id')
                    ->relationship('meeting', 'id')
                    ->hidden()
                    ->default(fn (Forms\Get $get) => $get('record.id'))
                    ->required(),
                Forms\Components\RichEditor::make('content')
                    ->required()
                    ->disabled(!Gate::allows('create', MeetingMinute::class))
                    ->columnSpanFull(),
            ])
            ->model(MeetingMinute::class)
            ->statePath('data');
    }

    public function submit()
    {

        $record = $this->meetingMinute;

        // Ottieni i dati del form come array
        $formData = $this->form->getState();

        $formData['meeting_id'] = $this->record->id;

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

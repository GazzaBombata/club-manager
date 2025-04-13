<?php

namespace App\Filament\App\Resources\MeetingResource\Pages;

use App\Filament\App\Resources\MeetingResource;
use App\Services\GoogleCalendarService;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Google\Service\Calendar;
use Google\Service\Calendar\Event as GoogleEvent;
use Google\Service\Calendar\EventDateTime;

class EditMeeting extends EditRecord
{
    protected static string $resource = MeetingResource::class;

    protected function afterSave(): void
    {
        $this->record->loadMissing('club');

        $client = GoogleCalendarService::getClientForClub($this->record->club);

        if (!$client) {
            return;
        }

        $service = new Calendar($client);

        if (!$this->record->google_event_id) {
            return;
        }

        $event = $service->events->get($this->record->club->googleAccount->email, $this->record->google_event_id);

        // Aggiorna i campi modificabili
        $event->setSummary($this->record->meeting_name);
        $event->setLocation($this->record->location);
        $event->setDescription($this->record->meeting_description);
        $start = new EventDateTime();
        $start->setDateTime($this->record->meeting_date->toRfc3339String());
        $start->setTimeZone('Europe/Rome');

        $end = new EventDateTime();
        $end->setDateTime($this->record->meeting_date->copy()->addHours(2)->toRfc3339String());
        $end->setTimeZone('Europe/Rome');

        $event->setStart($start);
        $event->setEnd($end);


        $service->events->update(
            $this->record->club->googleAccount->email,
            $event->getId(),
            $event,
            ['sendUpdates' => 'all']
        );

    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

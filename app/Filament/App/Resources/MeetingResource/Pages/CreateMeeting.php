<?php

namespace App\Filament\App\Resources\MeetingResource\Pages;

use App\Enums\AttendanceStatus;
use App\Filament\App\Resources\MeetingResource;
use App\Models\Attendance;
use App\Services\GoogleCalendarService;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Google\Service\Calendar;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Spatie\GoogleCalendar\Event as GoogleCalendarEvent;
use Carbon\Carbon;
use Google\Service\Calendar\Event as GoogleEvent;

class CreateMeeting extends CreateRecord
{
    protected static string $resource = MeetingResource::class;

    protected function afterCreate(): void
    {
        try {
            $this->record->loadMissing('club'); // 👈 forza il caricamento della relazione

            if ($this->record->commission) {
                $invitees = $this->record->commission->users;
                Log::info('commission');
            } else {
                $invitees = $this->record->club->users;
                Log::info('club');
            }


            // 1. Crea record di Attendance
            foreach ($invitees as $invitee) {
                Attendance::create([
                    'meeting_id' => $this->record->id,
                    'user_id' => $invitee->id,
                    'payment_id' => null,
                    'status' => AttendanceStatus::Invited,
                    'is_compulsory' => true,
                ]);
            }

            $client = GoogleCalendarService::getClientForClub($this->record->club);

            if (!$client) {
                // fallback o log
                return;
            }

            $service = new Calendar($client);

            $event = new GoogleEvent([
                'summary' => $this->record->meeting_name,
                'location' => $this->record->location,
                'description' => $this->record->meeting_description,
                'start' => [
                    'dateTime' => $this->record->meeting_date->toRfc3339String(),
                    'timeZone' => 'Europe/Rome',
                ],
                'end' => [
                    'dateTime' => $this->record->meeting_date_end->toRfc3339String(),
                    'timeZone' => 'Europe/Rome',
                ],
                'attendees' => $invitees->map(fn($user) => ['email' => $user->email])->toArray(),
            ]);

            $calendarId = $this->record->club->googleAccount->email; // o un campo "calendar_id" se lo salvi separatamente
            $createdEvent = $service->events->insert($calendarId, $event);
            $this->record->update([
                'google_event_id' => $createdEvent->getId(),
            ]);
        } catch (\Google\Service\Exception $e) {
            if ($e->getCode() === 400 && Str::contains($e->getMessage(), 'invalid_grant')) {
                Notification::make()
                    ->title('Accesso a Google Calendar scaduto')
                    ->body('Il collegamento è scaduto. <a href"'. route('google.redirect') .'"class="underline">Clicca qui per ricollegarlo</>.')
                    ->danger()
                    ->persistent()
                    ->send();
                return;
            }
            throw $e;
        }
    }
}

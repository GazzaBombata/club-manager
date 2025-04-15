<?php

namespace App\Console\Commands;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Console\Command;
use App\Models\Club;
use App\Services\GoogleCalendarService;
use Google\Service\Calendar;
use App\Enums\AttendanceStatus;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


class SyncGoogleAttendance extends Command
{
    protected $signature = 'sync:google-attendance';
    protected $description = 'Sync Google Calendar attendees with Clubberly attendances';

    public function handle(): void
    {
        $from = now()->subHours(48);
        $to = now()->addDays(30);

        Club::whereHas('googleAccount')->each(function ($club) use ($from, $to) {
            $client = GoogleCalendarService::getClientForClub($club);
            if (!$client) return;

            $calendar = new Calendar($client);

            $events = $calendar->events->listEvents($club->googleAccount->email, [
                'timeMin' => $from->toRfc3339String(),
                'timeMax' => $to->toRfc3339String(),
                'singleEvents' => true,
                'orderBy' => 'startTime',
            ]);

            foreach ($events->getItems() as $event) {
                if (!$event->getAttendees()) continue;

                foreach ($event->getAttendees() as $attendee) {
                    $userEmail = $attendee->getEmail();
                    $status = $attendee->getResponseStatus(); // accepted, declined, tentative, needsAction

                    $attendance = \App\Models\Attendance::whereHas('user', fn($q) => $q->where('email', $userEmail))
                        ->whereHas('meeting', fn($q) => $q->where('google_event_id', $event->getId()))
                        ->first();

                    if ($attendance) {
                        $statusMap = [
                            'accepted' => AttendanceStatus::Accepted,
                            'declined' => AttendanceStatus::Declined,
                            'tentative' => AttendanceStatus::Tentative,
                            'needsAction' => AttendanceStatus::Invited,
                        ];

                        $attendance->update([
                            'status' => $statusMap[$status] ?? AttendanceStatus::Invited,
                        ]);

                        if (in_array($status, ['needsAction', 'tentative'])) {
                            Mail::mailer('smtp')
                                ->to($userEmail)
                                ->queue(new \App\Mail\RsvpReminder($attendance->meeting));
                        }

                    }
                }
            }
        });

        Log::info('Sincronizzazione completata');

        $this->info('Sincronizzazione completata');
    }

}

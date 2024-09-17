<?php

namespace App\Filament\App\Resources\MeetingResource\Pages;

use App\Enums\AttendanceStatus;
use App\Filament\App\Resources\MeetingResource;
use App\Models\Attendance;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CreateMeeting extends CreateRecord
{
    protected static string $resource = MeetingResource::class;

    protected function afterCreate(): void
    {
        if ($this->record->commission) {
            $invitees = $this->record->commission->users;
            Log::info('commission');
        } else {
            $invitees = $this->record->club->users;
            Log::info('club');
        }


        foreach ($invitees as $invitee) {
            Attendance::create([
                'meeting_id' => $this->record->id,
                'user_id' => $invitee->id,
                'payment_id' => null,
                'status' => AttendanceStatus::Invited,
                'is_compulsory' => true,
            ]);

        }
    }
}

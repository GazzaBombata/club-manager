<?php

namespace App\Filament\App\Resources\MeetingResource\Pages;

use App\Filament\App\Resources\MeetingResource;
use App\Filament\App\Resources\MeetingResource\Widgets\MeetingMinuteWidget;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\App\Resources\MeetingResource\Widgets\MeetingParticipants;

class ViewMeeting extends ViewRecord
{
    protected static string $resource = MeetingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            /*Actions\EditAction::make(),*/
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            MeetingParticipants::class,
            MeetingMinuteWidget::class
        ];
    }
}

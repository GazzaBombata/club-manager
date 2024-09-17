<?php

namespace App\Filament\App\Resources\CommissionResource\Pages;

use App\Filament\App\Resources\CommissionResource;
use App\Filament\App\Resources\MeetingResource\Widgets\MeetingParticipants;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCommission extends ViewRecord
{
    protected static string $resource = CommissionResource::class;

    protected function getFooterWidgets(): array
    {
        return [
            CommissionResource\Widgets\CommissionMembersTable::class,
        ];
    }
}

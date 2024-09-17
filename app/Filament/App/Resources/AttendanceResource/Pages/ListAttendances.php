<?php

namespace App\Filament\App\Resources\AttendanceResource\Pages;

use App\Filament\App\Resources\AttendanceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAttendances extends ListRecords
{
    protected static string $resource = AttendanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}

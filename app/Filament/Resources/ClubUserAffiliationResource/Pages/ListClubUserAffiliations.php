<?php

namespace App\Filament\Resources\ClubUserAffiliationResource\Pages;

use App\Filament\Resources\ClubUserAffiliationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClubUserAffiliations extends ListRecords
{
    protected static string $resource = ClubUserAffiliationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

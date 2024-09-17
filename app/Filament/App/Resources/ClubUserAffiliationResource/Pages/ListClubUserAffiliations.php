<?php

namespace App\Filament\App\Resources\ClubUserAffiliationResource\Pages;

use App\Filament\App\Resources\ClubUserAffiliationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClubUserAffiliations extends ListRecords
{
    protected static string $resource = ClubUserAffiliationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            /*Actions\CreateAction::make(),*/
        ];
    }
}

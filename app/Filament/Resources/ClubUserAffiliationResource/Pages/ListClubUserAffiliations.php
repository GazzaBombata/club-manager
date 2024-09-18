<?php

namespace App\Filament\Resources\ClubUserAffiliationResource\Pages;

use App\Filament\Resources\ClubUserAffiliationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClubUserAffiliations extends ListRecords
{
    protected static string $resource = ClubUserAffiliationResource::class;

    public static ?string $title = 'Elenco Soci del club';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

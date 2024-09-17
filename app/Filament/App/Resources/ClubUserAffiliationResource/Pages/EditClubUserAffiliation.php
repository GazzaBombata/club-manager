<?php

namespace App\Filament\App\Resources\ClubUserAffiliationResource\Pages;

use App\Filament\App\Resources\ClubUserAffiliationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClubUserAffiliation extends EditRecord
{
    protected static string $resource = ClubUserAffiliationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

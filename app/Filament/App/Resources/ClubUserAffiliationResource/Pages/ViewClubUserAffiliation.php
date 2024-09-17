<?php

namespace App\Filament\App\Resources\ClubUserAffiliationResource\Pages;

use App\Filament\App\Resources\ClubUserAffiliationResource;
use App\Filament\App\Widgets\AffiliationFormWidget;
use App\Filament\App\Widgets\MemberProfileFormWidget;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewClubUserAffiliation extends ViewRecord
{
    protected static string $resource = ClubUserAffiliationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            MemberProfileFormWidget::class,
        ];
    }
}

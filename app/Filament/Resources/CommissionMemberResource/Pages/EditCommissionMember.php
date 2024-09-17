<?php

namespace App\Filament\Resources\CommissionMemberResource\Pages;

use App\Filament\Resources\CommissionMemberResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCommissionMember extends EditRecord
{
    protected static string $resource = CommissionMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

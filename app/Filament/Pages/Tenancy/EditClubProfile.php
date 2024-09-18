<?php

namespace App\Filament\Pages\Tenancy;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Tenancy\EditTenantProfile;

class EditClubProfile extends EditTenantProfile
{
    public static function getLabel(): string
    {
        return 'Club profile';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('address')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('photo')
                    ->disk('s3')
                    ->directory('clubberly/profile-photos')
                    ->avatar(),
            ]);
    }
}

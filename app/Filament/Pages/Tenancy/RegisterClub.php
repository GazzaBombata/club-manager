<?php

namespace App\Filament\Pages\Tenancy;

use App\Models\Club;
use App\Models\ClubUserAffiliation;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Tenancy\RegisterTenant;

class RegisterClub extends RegisterTenant
{
public static function getLabel(): string
{
return 'Register Club';
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
    ]);
}

protected function handleRegistration(array $data): Club
{
    $club = Club::create($data);

    // Crea manualmente il record nella tabella pivot
    ClubUserAffiliation::create([
        'user_id' => auth()->user()->id,
        'club_id' => $club->id,
        'status' => 'Member', // Puoi definire il ruolo se necessario
        'user_contact_email' => auth()->user()->email,
        'joined_at' => now(),
    ]);

    return $club;

}
}

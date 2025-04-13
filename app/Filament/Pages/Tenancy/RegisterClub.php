<?php

namespace App\Filament\Pages\Tenancy;

use App\Models\Club;
use App\Models\ClubUserAffiliation;
use Illuminate\Support\Carbon;
use Filament\Forms\Components\Actions\Action;
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
        TextInput::make('google_email')
            ->hint('Dopo la registrazione ti verrà chiesto di connettere il calendario Google ufficiale del club')
            ->required()
            ->email(),
        TextInput::make('address')
            ->required()
            ->maxLength(255),
    ]);
}

protected function handleRegistration(array $data): Club
{
    $club = Club::create($data);

    // Crea l'affiliazione del fondatore
    $user = auth()->user();

    // Crea manualmente il record nella tabella pivot
    ClubUserAffiliation::create([
        'user_id' => $user->id,
        'club_id' => $club->id,
        'status' => 'Member', // Puoi definire il ruolo se necessario
        'user_contact_email' => auth()->user()->email,
        'joined_at' => now(),
    ]);

    $commission = $club->commissions()->create([
        'name' => 'Consiglio Direttivo',
        'description' => 'Commissione direzionale del club',
    ]);

    // Aggiungi l'utente come membro della commissione
    $commission->commissionMembers()->create([
        'user_id' => $user->id,
        'role' => 'Presidente', // o qualsiasi altro ruolo predefinito
        'start_date' => Carbon::today(),
    ]);

    return $club;
}

    protected function redirectAfterRegistration(): string
    {
        return route('google.redirect');
    }
}

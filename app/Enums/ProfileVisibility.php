<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ProfileVisibility : string implements HasLabel
{
    case Club = 'Club';
    case Registered = 'Registered';
    case Public = 'Public';

    public function getLabel(): ?string
    {

        return match ($this) {
            self::Club => 'Club',
            self::Registered => 'Registered',
            self::Public => 'Public',
        };
    }
}

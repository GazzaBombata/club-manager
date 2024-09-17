<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum AffiliationStatus : string implements HasLabel
{
    case Member = 'Member';
    case Honorary = 'Honorary';
    case Aspiring = 'Aspiring';

    public function getLabel(): ?string
    {

        return match ($this) {
            self::Member => 'Member',
            self::Honorary => 'Honorary',
            self::Aspiring => 'Aspiring',
        };
    }
}

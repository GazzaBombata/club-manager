<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum CommissionMembersName : string implements HasLabel
{
    case Member = 'Member';
    case President = 'President';
    case Councellor = 'Councellor';
    case Treasury = 'Treasury';
    case PublicImage = 'PublicImage';
    case Other = 'Other';

    public function getLabel(): ?string
    {

        return match ($this) {
            self::Member => 'Member',
            self::President => 'President',
            self::Councellor => 'Councellor',
            self::Treasury => 'Treasury',
            self::PublicImage => 'PublicImage',
            self::Other => 'Other',
        };
    }
}

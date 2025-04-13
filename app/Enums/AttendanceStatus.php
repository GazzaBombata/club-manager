<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum AttendanceStatus : string implements HasLabel
{
    case Invited = 'Invited';
    case Accepted = 'Accepted';
    case Declined = 'Declined';
    case Tentative = 'Tentative';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Invited => 'Invited',
            self::Accepted => 'Accepted',
            self::Declined => 'Declined',
            self::Tentative => 'Tentative',
        };
    }
}

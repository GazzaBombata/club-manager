<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum MeetingBookingMethod : string implements HasLabel
{
    case Internal = 'Internal';
    case External = 'External';

    public function getLabel(): ?string
    {

        return match ($this) {
            self::Internal => 'Internal',
            self::External => 'External',
        };
    }
}

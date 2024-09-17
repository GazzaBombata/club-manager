<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum MeetingStatus : string implements HasLabel
{
    case Draft = 'draft';
    case Published = 'Published';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Draft => 'Draft',
            self::Published => 'Published',
        };
    }
}

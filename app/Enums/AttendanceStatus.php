<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum AttendanceStatus : string implements HasLabel
{
    case Invited = 'Invited';
    case Present = 'Present';
    case Absent = 'Absent';
    case Excused = 'Excused';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Invited => 'Invited',
            self::Present => 'Present',
            self::Absent => 'Absent',
            self::Excused => 'Excused',
        };
    }
}

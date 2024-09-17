<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum PaymentType : string implements HasLabel
{
    case Annual = 'Annual';
    case OneTime = 'One-time';

    public function getLabel(): ?string
    {

        return match ($this) {
            self::Annual => 'Annual',
            self::OneTime => 'One-time',
        };
    }
}

<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum PaymentStatus : string implements HasLabel
{
    case Pending = 'Pending';
    case Paid = 'Paid';

    public function getLabel(): ?string
    {

        return match ($this) {
            self::Pending => 'Pending',
            self::Paid => 'Paid',
        };
    }
}

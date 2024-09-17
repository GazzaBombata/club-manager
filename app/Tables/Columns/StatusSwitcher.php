<?php

namespace App\Tables\Columns;

use App\Models\Attendance;
use Filament\Tables\Columns\Column;

class StatusSwitcher extends Column
{
    protected string $view = 'tables.columns.status-switcher';

    public function setStatus (Attendance $attendance, $status)
    {
        $attendance->status = $status;
        $attendance->save();
    }
}

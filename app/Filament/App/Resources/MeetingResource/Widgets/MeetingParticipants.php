<?php

namespace App\Filament\App\Resources\MeetingResource\Widgets;

use App\Models\Attendance;
use App\Models\Meeting;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class MeetingParticipants extends BaseWidget
{
    public Meeting $meeting;

    protected int | string | array $columnSpan = 'full';

    // Ensure the widget has access to the current meeting
    public function mount(Meeting $record)
    {
        $this->meeting = $record;
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Attendance::query()
                    ->where('meeting_id', $this->meeting->id)
                    ->where('status', 'Present')
                    ->with('user') // Eager load the user relationship
            )
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable(),
            ]);
    }
}

<?php

namespace App\Filament\App\Resources\MeetingResource\Widgets;

use App\Filament\App\Resources\ClubUserAffiliationResource;
use App\Filament\App\Resources\MeetingResource;
use App\Models\Attendance;
use App\Models\Commission;
use App\Models\Meeting;
use App\Models\MeetingMinute;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class CommissionMeetings extends BaseWidget
{
    public Commission $commission;

    protected int | string | array $columnSpan = 'full';

    // Ensure the widget has access to the current meeting
    public function mount(Commission $record)
    {
        $this->commission = $record;
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Meeting::query()
                ->where('commission_id', '=', $this->commission->id)
            )
            ->columns([
                Tables\Columns\TextColumn::make('meeting_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('meeting_date')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable(),
            ])
            ->recordUrl(fn ($record) => MeetingResource::getUrl('view', ['record' => $record]));
    }
}

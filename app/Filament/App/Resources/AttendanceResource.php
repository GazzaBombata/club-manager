<?php

namespace App\Filament\App\Resources;

use App\Enums\AttendanceStatus;
use App\Enums\MeetingStatus;
use App\Filament\App\Resources\AttendanceResource\Pages;
use App\Filament\App\Resources\AttendanceResource\RelationManagers;
use App\Models\Attendance;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Tables\Columns\StatusSwitcher;

class AttendanceResource extends Resource
{
    protected static ?string $model = Attendance::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $query->where('user_id', auth()->id())
                    ->whereHas('meeting', function ($query) {
                        $query->where('status', '=', MeetingStatus::Published);
                    }) // Include meeting with status "Published"
                    ->whereHas('meeting', function ($query) {
                        $query->where('meeting_date', '>', now()); // Meetings in the future
                    });
            })
            ->columns([
                Tables\Columns\TextColumn::make('meeting.meeting_name')
                    ->label('Nome Evento')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('meeting.location')
                    ->label('Luogo')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('meeting.meeting_date')
                    ->label('Data Evento')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('meeting.editable_until')
                    ->label('Chiusura Registrazioni')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment.id')
                    ->numeric()
                    ->sortable(),
                /*Tables\Columns\ViewColumn::make('status')->view('filament.app.columns.attendance-status'),*/
                StatusSwitcher::make('status')
                    ->action(function ($record) {
                        if ($record->meeting->editable_until < now()) {
                            return;
                        }
                        $record->status = $record->status === 'Present' ? 'Absent' : 'Present';
                        $record->save();
                    }),
                Tables\Columns\IconColumn::make('is_compulsory')
                    ->label('Obbligatorio')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->recordUrl(fn ($record) => MeetingResource::getUrl('view', ['record' => $record->meeting->id]))
            ->filters([
                //
            ])
            ->actions([
                //
            ])
            ->bulkActions([
                //
            ]);
    }


    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAttendances::route('/'),
            /*'edit' => Pages\EditAttendance::route('/{record}/edit'),*/
        ];
    }
}

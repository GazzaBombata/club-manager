<?php

namespace App\Filament\App\Resources;

use App\Enums\CommissionMembersName;
use App\Enums\MeetingBookingMethod;
use App\Enums\MeetingStatus;
use App\Filament\App\Resources\MeetingResource\Pages;
use App\Filament\App\Resources\MeetingResource\RelationManagers;
use App\Filament\App\Resources\MeetingResource\Widgets\MeetingMinuteWidget;
use App\Filament\App\Resources\MeetingResource\Widgets\MeetingParticipants;
use App\Models\Meeting;
use Filament\Forms\Get;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MeetingResource extends Resource
{
    protected static ?string $model = Meeting::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $modelLabel = 'Riunione';

    protected static ?string $pluralModelLabel = 'Riunioni';

    public static function shouldRegisterNavigation(): bool
    {
        // Only register the navigation item if the user's email is 'giorgio.giotto.gg@gmail.com'
        return auth()->check() && auth()->user()->email === 'giorgio.giotto.gg@gmail.com';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('club_id')
                    ->relationship('club', 'name')
                    ->default(Filament::getTenant()->id)
                    ->disabled(),
                Forms\Components\Select::make('commission_id')
                    ->relationship('commission', 'name',fn (Builder $query) => $query->where('club_id','=',Filament::getTenant()->id)),
                Forms\Components\DateTimePicker::make('meeting_date')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set, Get $get) {
                        // Only set editable_until if it's currently null
                        if (!$get('editable_until')) {
                            // Set editable_until to 2 days before the meeting_date
                            $set('editable_until', now()->parse($state)->subDays(2)->format('Y-m-d H:i:s'));
                        }
                    }),
                Forms\Components\DateTimePicker::make('editable_until')
                    ->required(),
                Forms\Components\TextInput::make('meeting_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('meeting_description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('location')
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->options(MeetingStatus::class)
                    ->default(MeetingStatus::Draft)
                    ->required(),
                Forms\Components\Select::make('booking_method')
                    ->options(MeetingBookingMethod::class)
                    ->default(MeetingBookingMethod::Internal)
                    ->live()
                    ->required(),
                Forms\Components\Textarea::make('booking_instructions')
                    ->hidden(fn (Get $get): bool => $get('booking_method') === MeetingBookingMethod::Internal)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('club.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('commission.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('meeting_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('editable_until')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('meeting_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('booking_method'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getWidgets(): array
    {
        return [
            MeetingParticipants::class,
            MeetingMinuteWidget::class,
        ];
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMeetings::route('/'),
            'create' => Pages\CreateMeeting::route('/create'),
            'view' => Pages\ViewMeeting::route('/{record}'),
            'edit' => Pages\EditMeeting::route('/{record}/edit'),
        ];
    }
}

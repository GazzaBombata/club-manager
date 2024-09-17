<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\ClubUserAffiliationResource\Pages;
use App\Filament\App\Resources\ClubUserAffiliationResource\RelationManagers;
use App\Models\ClubUserAffiliation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClubUserAffiliationResource extends Resource
{
    protected static ?string $model = ClubUserAffiliation::class;

    protected static ?string $navigationIcon = 'heroicon-o-queue-list';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\Select::make('club_id')
                    ->relationship('club', 'name')
                    ->required(),
                Forms\Components\TextInput::make('status')
                    ->required(),
                Forms\Components\TextInput::make('user_contact_email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('user_contact_phone')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('joined_at')
                    ->required(),
                Forms\Components\DateTimePicker::make('left_at'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('club.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('user_contact_email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user_contact_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('joined_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('left_at')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListClubUserAffiliations::route('/'),
            'create' => Pages\CreateClubUserAffiliation::route('/create'),
            'view' => Pages\ViewClubUserAffiliation::route('/{record}'),
            'edit' => Pages\EditClubUserAffiliation::route('/{record}/edit'),
        ];
    }
}

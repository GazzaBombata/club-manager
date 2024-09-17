<?php

namespace App\Filament\App\Resources;

use App\Enums\CommissionMembersName;
use App\Filament\App\Resources\CommissionMemberResource\Pages;
use App\Filament\App\Resources\CommissionMemberResource\RelationManagers;
use App\Models\Commission;
use App\Models\CommissionMember;
use App\Models\User;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CommissionMemberResource extends Resource
{
    protected static ?string $model = CommissionMember::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function shouldRegisterNavigation(): bool
    {
        // Only register the navigation item if the user's email is 'giorgio.giotto.gg@gmail.com'
        return auth()->check() && auth()->user()->email === 'giorgio.giotto.gg@gmail.com';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('commission_id',)
                    ->relationship('commission', 'name',fn (Builder $query) => $query->where('club_id','=',Filament::getTenant()->id))
                    ->default(request()->query('commission_id')),
                Forms\Components\Select::make('user_id')
                    ->options(function () {
                        // Preload users associated with the current club
                        return User::whereHas('clubs', function (Builder $query) {
                            $query->where('club_id', Filament::getTenant()->id);
                        })->limit(10) // Limit to show the first 10 users initially
                        ->pluck('name', 'id');
                    })
                    ->relationship('user', 'name', function (Builder $query) {
                        $query->whereHas('clubs', function (Builder $query) {
                            // Assuming Filament::getTenant() returns the current club
                            $query->where('club_id', Filament::getTenant()->id);
                        });
                    })
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('role')
                    ->options(CommissionMembersName::class,)
                    ->required(),
                Forms\Components\DatePicker::make('start_date')
                    ->required(),
                Forms\Components\DatePicker::make('end_date'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('commission.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('role')
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->date()
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
            'index' => Pages\ListCommissionMembers::route('/'),
            'create' => Pages\CreateCommissionMember::route('/create'),
            'edit' => Pages\EditCommissionMember::route('/{record}/edit'),
        ];
    }
}

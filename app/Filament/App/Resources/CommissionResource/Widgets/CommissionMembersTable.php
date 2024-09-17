<?php

namespace App\Filament\App\Resources\CommissionResource\Widgets;

use App\Filament\App\Resources\CommissionMemberResource;
use App\Filament\App\Resources\MeetingResource;
use App\Models\Commission;
use App\Models\CommissionMember;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class CommissionMembersTable extends BaseWidget

{

    public Commission $commission;

    protected int | string | array $columnSpan = 'full';

    // Ensure the widget has access to the current meeting
    public function mount(Commission $record): void
    {
        $this->commission = $record;
    }

    public function getTableHeaderActions(): array
    {
        return[
            Tables\Actions\Action::make('add')
                ->label('Add Member')
                ->action(fn ($record) => CommissionMemberResource::getUrl('edit', ['commission_id' => $this->commission->id]))
                ->color('success')
                ->icon('heroicon-o-plus'),
        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
               CommissionMember::query()
                    ->where('commission_id', $this->commission->id)
                    ->where('start_date', '<=', now()->subDay())
                   ->where(function (Builder $query) {
                       $query->where('end_date', '>=', now()->subDay())
                           ->orWhereNull('end_date');
                   })
                    ->with('user') // Eager load the user relationship
            )
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable(),
            ])
            ->recordUrl(fn ($record) => CommissionMemberResource::getUrl('edit', ['record' => $record]))
            ->actions([
/*                Tables\Actions\Action::make('edit')
                    ->action(fn ($record) => CommissionMemberResource::getUrl('edit', ['record' => $record]))
                    ->icon('heroicon-o-pencil'),*/
            ])
            ->headerActions([
                Tables\Actions\Action::make('add')
                    ->label('Add Member')
                    ->url(fn ($record) => CommissionMemberResource::getUrl('create', ['commission_id' => $this->commission->id]))
                    ->color('success')
                    ->icon('heroicon-o-plus'),
            ]);
    }
}

<?php

namespace App\Filament\Resources\HumanResource\Attendances\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AttendancesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('employee_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('session_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('date')
                    ->date()
                    ->sortable(),
                TextColumn::make('checkin_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('checkout_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('checkin_lat')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('checkin_lng')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('checkout_lat')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('checkout_lng')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('checkin_photo')
                    ->searchable(),
                TextColumn::make('checkout_photo')
                    ->searchable(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

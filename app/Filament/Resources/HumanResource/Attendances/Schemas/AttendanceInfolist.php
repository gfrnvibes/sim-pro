<?php

namespace App\Filament\Resources\HumanResource\Attendances\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AttendanceInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('employee_id')
                    ->numeric(),
                TextEntry::make('session_id')
                    ->numeric(),
                TextEntry::make('date')
                    ->date(),
                TextEntry::make('checkin_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('checkout_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('checkin_lat')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('checkin_lng')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('checkout_lat')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('checkout_lng')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('checkin_photo')
                    ->placeholder('-'),
                TextEntry::make('checkout_photo')
                    ->placeholder('-'),
                TextEntry::make('status')
                    ->badge()
                    ->placeholder('-'),
                TextEntry::make('notes')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}

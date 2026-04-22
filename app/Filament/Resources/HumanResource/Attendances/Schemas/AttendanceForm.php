<?php

namespace App\Filament\Resources\HumanResource\Attendances\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AttendanceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('employee_id')
                    ->required()
                    ->numeric(),
                TextInput::make('session_id')
                    ->required()
                    ->numeric(),
                DatePicker::make('date')
                    ->required(),
                DateTimePicker::make('checkin_at'),
                DateTimePicker::make('checkout_at'),
                TextInput::make('checkin_lat')
                    ->numeric(),
                TextInput::make('checkin_lng')
                    ->numeric(),
                TextInput::make('checkout_lat')
                    ->numeric(),
                TextInput::make('checkout_lng')
                    ->numeric(),
                TextInput::make('checkin_photo'),
                TextInput::make('checkout_photo'),
                Select::make('status')
                    ->options([
            'present' => 'Present',
            'late' => 'Late',
            'out_of_radius' => 'Out of radius',
            'face_mismatch' => 'Face mismatch',
        ]),
                Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }
}

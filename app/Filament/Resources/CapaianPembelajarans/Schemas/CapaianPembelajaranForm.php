<?php

namespace App\Filament\Resources\CapaianPembelajarans\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CapaianPembelajaranForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('mata_pelajaran_id')
                    ->required()
                    ->numeric(),
                TextInput::make('kurikulum_version_id')
                    ->numeric(),
                Select::make('fase')
                    ->options(['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F'])
                    ->required(),
                TextInput::make('elemen')
                    ->required(),
                Textarea::make('sub_elemen')
                    ->columnSpanFull(),
                Textarea::make('deskripsi_cp')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('tahun_ajaran_start'),
            ]);
    }
}

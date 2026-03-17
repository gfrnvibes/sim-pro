<?php

namespace App\Filament\Resources\CapaianPembelajarans\Schemas;

use App\Models\CapaianPembelajaran;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CapaianPembelajaranInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('mata_pelajaran_id')
                    ->numeric(),
                TextEntry::make('kurikulum_version_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('fase')
                    ->badge(),
                TextEntry::make('elemen'),
                TextEntry::make('sub_elemen')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('deskripsi_cp')
                    ->columnSpanFull(),
                TextEntry::make('tahun_ajaran_start')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (CapaianPembelajaran $record): bool => $record->trashed()),
            ]);
    }
}

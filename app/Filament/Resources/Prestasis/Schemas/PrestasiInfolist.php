<?php

namespace App\Filament\Resources\Prestasis\Schemas;

use App\Models\Prestasi;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PrestasiInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->inlineLabel()
            ->components([
                TextEntry::make('siswa.nama_lengkap')
                    ->label('Nama Siswa'),
                TextEntry::make('tahunAjaran.nama')
                    ->label('Tahun Ajaran'),
                TextEntry::make('nama_prestasi'),
                TextEntry::make('deskripsi')
                    ->placeholder('-'),
                TextEntry::make('penyelenggara')
                    ->placeholder('-'),
                TextEntry::make('tingkat')
                    ->badge(),
                TextEntry::make('tanggal_prestasi')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('juara')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Prestasi $record): bool => $record->trashed()),
            ]);
    }
}

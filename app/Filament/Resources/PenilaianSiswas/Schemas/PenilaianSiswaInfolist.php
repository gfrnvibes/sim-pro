<?php

namespace App\Filament\Resources\PenilaianSiswas\Schemas;

use App\Models\PenilaianSiswa;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PenilaianSiswaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('siswaKelas.id')
                    ->label('Siswa kelas'),
                TextEntry::make('capaianPembelajaran.id')
                    ->label('Capaian pembelajaran')
                    ->placeholder('-'),
                TextEntry::make('mataPelajaran.id')
                    ->label('Mata pelajaran')
                    ->placeholder('-'),
                TextEntry::make('jenis_penilaian')
                    ->badge(),
                TextEntry::make('nilai')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('predikat')
                    ->placeholder('-'),
                TextEntry::make('deskripsi')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('semester')
                    ->numeric(),
                TextEntry::make('created_by')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (PenilaianSiswa $record): bool => $record->trashed()),
            ]);
    }
}

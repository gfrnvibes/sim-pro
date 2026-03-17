<?php

namespace App\Filament\Resources\OrangTuas\Schemas;

use App\Models\OrangTua;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class OrangTuaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->inlineLabel()
            ->components([
                TextEntry::make('nama'),
                TextEntry::make('siswa.nama_lengkap')
                    ->label('Siswa')
                    ->numeric(),
                TextEntry::make('hubungan')
                    ->badge(),
                TextEntry::make('nik')
                    ->placeholder('-'),
                TextEntry::make('pekerjaan')
                    ->placeholder('-'),
                TextEntry::make('pendidikan_terakhir')
                    ->placeholder('-'),
                TextEntry::make('alamat')
                    ->placeholder('-'),
                TextEntry::make('no_hp')
                    ->placeholder('-'),
                TextEntry::make('email')
                    ->label('Email address')
                    ->placeholder('-'),
                TextEntry::make('foto_path')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (OrangTua $record): bool => $record->trashed()),
            ]);
    }
}

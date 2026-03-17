<?php

namespace App\Filament\Resources\Siswas\Schemas;

use App\Models\Siswa;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class SiswaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->inlineLabel()
            ->components([
                Fieldset::make('Identitas Siswa')
                    ->columns([
                        'md' => 1,
                        'xl' => 1
                    ])
                    ->schema([
                        TextEntry::make('nis')
                            ->label('NIS')
                            ->placeholder('-'),
                        TextEntry::make('nisn')
                            ->label('NISN')
                            ->placeholder('-'),
                        TextEntry::make('nama_lengkap')
                            ->label('Nama Lengkap')
                            ->placeholder('-'),
                        TextEntry::make('nama_panggilan')
                            ->label('Nama Panggilan')
                            ->placeholder('-'),
                        TextEntry::make('jenis_kelamin')
                            ->label('Jenis Kelamin')
                            ->badge(),
                        TextEntry::make('ttl')
                            ->label('Tempat, Tanggal Lahir')
                            ->getStateUsing(function ($record) {
                                if (!$record) return '-';

                                $tempat = $record->tempat_lahir;
                                $tanggal = $record->tanggal_lahir;

                                if (!$tempat && !$tanggal) return '-';

                                return trim(
                                    ($tempat ?? '') .
                                    ($tempat && $tanggal ? ', ' : '') .
                                    ($tanggal
                                        ? \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y')
                                        : '')
                                );
                            }),
                        TextEntry::make('agama')
                            ->label('Agama')
                            ->placeholder('-'),
                    ]),
                Fieldset::make('Alamat')
                    ->columns([
                        'md' => 1,
                        'xl' => 1
                    ])
                    ->schema([
                        TextEntry::make('alamat')
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('rt_rw')
                            ->label('RT/RW')
                            ->placeholder('-'),
                        TextEntry::make('kelurahan')
                            ->placeholder('-'),
                        TextEntry::make('kecamatan')
                            ->placeholder('-'),
                        TextEntry::make('kabupaten')
                            ->placeholder('-'),
                        TextEntry::make('provinsi')
                            ->placeholder('-'),
                        TextEntry::make('kode_pos')
                            ->label('Kode Pos')
                            ->placeholder('-'),
                    ]),
                Fieldset::make('Lainnya')
                    ->columns([
                        'md' => 1,
                        'xl' => 1
                    ])
                    ->schema([
                        TextEntry::make('foto_path')
                            ->placeholder('-'),
                        TextEntry::make('golongan_darah')
                            ->placeholder('-'),
                        TextEntry::make('tinggi_badan')
                            ->numeric()
                            ->suffix(' cm')
                            ->placeholder('-'),
                        TextEntry::make('berat_badan')
                            ->numeric()
                            ->suffix(' Kg')
                            ->placeholder('-'),
                        TextEntry::make('jarak_rumah_ke_sekolah')
                            ->numeric()
                            ->suffix(' KM')
                            ->placeholder('-'),
                    ]),
                Fieldset::make('Metadata')
                    ->columns([
                        'md' => 1,
                        'xl' => 1
                    ])
                    ->schema([
                        TextEntry::make('created_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('updated_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('deleted_at')
                            ->dateTime()
                            ->visible(fn (Siswa $record): bool => $record->trashed()),
                    ]),
            ]);
    }
}

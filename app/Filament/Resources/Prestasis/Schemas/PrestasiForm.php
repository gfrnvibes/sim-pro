<?php

namespace App\Filament\Resources\Prestasis\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class PrestasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->schema([
                        Select::make('siswa_id')
                            ->label('Nama Siswa')
                            ->relationship('siswa', 'nama_lengkap')
                            ->required()
                            ->preload()
                            ->searchable(),
                        Select::make('tahun_ajaran_id')
                            ->label('Tahun Ajaran')
                            ->relationship('tahunAjaran', 'nama')
                            ->required()
                            ->preload()
                            ->searchable(),
                        TextInput::make('nama_prestasi')
                            ->required(),
                        Textarea::make('deskripsi')
                            ->columnSpanFull(),
                        TextInput::make('penyelenggara'),
                        Select::make('tingkat')
                            ->options([
                                'Kelas' => 'Kelas',
                                'Sekolah' => 'Sekolah',
                                'Kecamatan' => 'Kecamatan',
                                'Kabupaten/Kota' => 'Kabupaten/ kota',
                                'Provinsi' => 'Provinsi',
                                'Nasional' => 'Nasional',
                                'Internasional' => 'Internasional',
                            ])
                            ->required(),
                        DatePicker::make('tanggal_prestasi'),
                        TextInput::make('juara'),
                        TextInput::make('bukti_file_path'),
                    ])->columnSpanFull(),
            ]);
    }
}

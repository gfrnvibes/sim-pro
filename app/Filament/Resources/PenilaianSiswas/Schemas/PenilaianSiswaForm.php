<?php

namespace App\Filament\Resources\PenilaianSiswas\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PenilaianSiswaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('siswa_kelas_id')
                    ->relationship('siswaKelas', 'id')
                    ->required(),
                Select::make('capaian_pembelajaran_id')
                    ->relationship('capaianPembelajaran', 'id'),
                Select::make('mata_pelajaran_id')
                    ->relationship('mataPelajaran', 'id'),
                Select::make('jenis_penilaian')
                    ->options([
            'Formatif' => 'Formatif',
            'Sumatif Tengah' => 'Sumatif tengah',
            'Sumatif Akhir' => 'Sumatif akhir',
            'Projek' => 'Projek',
            'Observasi' => 'Observasi',
            'Portofolio' => 'Portofolio',
            'Lainnya' => 'Lainnya',
        ])
                    ->required(),
                TextInput::make('nilai')
                    ->numeric(),
                TextInput::make('predikat'),
                Textarea::make('deskripsi')
                    ->columnSpanFull(),
                TextInput::make('semester')
                    ->required()
                    ->numeric(),
                TextInput::make('created_by')
                    ->numeric(),
            ]);
    }
}

<?php

namespace App\Filament\Resources\PenilaianSiswas\Schemas;

use App\Models\Kelas;
use App\Models\SiswaKelas;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Repeater\TableColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PenilaianSiswaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(4)->schema([
Select::make('kelas_id')
    ->relationship('kelas', 'nama_kelas'),

                    Select::make('siswa_kelas_id')
                        ->label('Siswa')
                        ->options(function (callable $get) {
                            $kelasId = $get('kelas_id');

                            if (!$kelasId) return [];

                            return SiswaKelas::with('siswa')
                                ->where('kelas_id', $kelasId)
                                ->where('status', 'Aktif')
                                ->get()
                                ->mapWithKeys(fn ($item) => [
                                    $item->id => $item->siswa->nama_lengkap
                                ]);
                        })
                        ->searchable()
                        ->required()
                ])->columnSpanFull(),

                Section::make('Pengetahuan dan Keterampilan')
                    ->collapsible()
                    ->schema([
                        Repeater::make('Nilai Pengetahuan dan Keterampilan')
                            ->table([
                                TableColumn::make('Mata Pelajaran'),
                                TableColumn::make('Nilai'),
                                TableColumn::make('Predikat'),
                                TableColumn::make('Deskripsi'),
                            ])
                            ->schema([
                                Select::make('mata_pelajaran_id')
                                    ->relationship('mataPelajaran', 'nama')
                                    ->preload()
                                    ->searchable()
                                    ->required(),
                                TextInput::make('nilai')
                                    ->numeric(),
                                TextInput::make('predikat'),
                                Textarea::make('deskripsi')
                                    ->rows(1),
                            ])->columnSpanFull(),
                    ])->columnSpanFull(),

                Section::make('Projek Penguatan Profil Pelajar Pancasila')
                    ->collapsed()
                    ->schema([
                        Repeater::make('Nilai Projek Penguatan Profil Pelajar Pancasila')
                            ->table([
                                TableColumn::make('Dimensi'),
                                TableColumn::make('Elemen CP'),
                                TableColumn::make('Nilai'),
                                TableColumn::make('Sub Elemen'),
                                TableColumn::make('Nilai'),
                            ])
                            ->schema([
                                Select::make('Dimensi'),
                                TextInput::make('Elemen CP'),
                                TextInput::make('Nilai'),
                                TextInput::make('Sub Elemen'),
                                TextInput::make('Nilai'),
                            ])->columnSpanFull(),
                    ])->columnSpanFull(),

                Section::make('Extrakurikuler')
                    ->collapsed()
                    ->schema([
                        Repeater::make('Nilai Extrakurikuler')
                            ->table([
                                TableColumn::make('Nama Kegiatan'),
                                TableColumn::make('Keterangan'),
                                TableColumn::make('Nilai'),
                            ])
                            ->schema([
                                TextInput::make('Nama Kegiatan'),
                                TextInput::make('Keterangan'),
                                TextInput::make('Nilai'),
                            ])->columnSpanFull(),
                    ])->columnSpanFull(),

                Section::make('Prestasi')
                    ->collapsed()
                    ->schema([
                        Repeater::make('Prestasi Siswa')
                            ->table([
                                TableColumn::make('Jenis Prestasi'),
                                TableColumn::make('Keterangan'),
                                TableColumn::make('Nilai'),
                            ])
                            ->schema([
                                TextInput::make('Nama Kegiatan'),
                                TextInput::make('Keterangan'),
                                TextInput::make('Nilai'),
                            ])->columnSpanFull(),
                    ])->columnSpanFull(),

                Section::make('Ketidakhadiran')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        Repeater::make('Ketidakhadiran Siswa')
                            ->table([
                                TableColumn::make('Jenis Ketidakhadiran'),
                                TableColumn::make('Keterangan'),
                                TableColumn::make('Nilai'),
                            ])
                            ->schema([
                                TextInput::make('Jenis Ketidakhadiran'),
                                TextInput::make('Keterangan'),
                                TextInput::make('Nilai'),
                            ])->columnSpanFull(),
                    ])->columnSpanFull(),
            ]);
    }
}

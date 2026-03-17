<?php

namespace App\Filament\Resources\Siswas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class SiswaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Fieldset::make('Identitas Siswa')
                    ->columns([

                    ])
                    ->schema([
                        TextInput::make('nis')
                            ->label('NIS')
                            ->required(),
                        TextInput::make('nisn')
                            ->label('NISN')
                            ->required(),
                        TextInput::make('nama_lengkap')
                            ->label('Nama Lengkap')
                            ->required(),
                        TextInput::make('nama_panggilan')
                            ->label('Nama Panggilan'),
                        Select::make('jenis_kelamin')
                            ->options(['L' => 'L', 'P' => 'P'])
                            ->required(),
                        TextInput::make('tempat_lahir')
                            ->label('Tempat Lahir')
                            ->required(),
                        DatePicker::make('tanggal_lahir')
                            ->label('Tanggal Lahir')
                            ->required(),
                        TextInput::make('agama')
                            ->label('Agama')
                            ->required()
                            ->default('Islam'),
                    ]),
                Fieldset::make('Alamat')
                    ->columns([

                    ])
                    ->schema([
                        Textarea::make('alamat')
                            ->rows(1)
                            ->columnSpanFull(),
                        TextInput::make('rt_rw')
                            ->label('RT/RW'),
                        TextInput::make('kelurahan')
                            ->label('Kelurahan'),
                        TextInput::make('kecamatan')
                            ->label('Kecamatan'),
                        TextInput::make('kabupaten')
                            ->label('Kabupaten'),
                        TextInput::make('provinsi')
                            ->label('Provinsi'),
                        TextInput::make('kode_pos')
                            ->label('Kode Pos'),
                    ]),
                Fieldset::make('Lainnya')
                    ->columns([

                    ])
                    ->schema([
                        TextInput::make('foto_path')
                            ->label('Foto Path'),
                        TextInput::make('golongan_darah')
                            ->label('Golongan Darah'),
                        TextInput::make('tinggi_badan')
                            ->label('Tinggi Badan')
                            ->numeric(),
                        TextInput::make('berat_badan')
                            ->label('Berat Badan')
                            ->numeric(),
                        TextInput::make('jarak_rumah_ke_sekolah')
                            ->label('Jarak Rumah ke Sekolah')
                            ->numeric(),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}

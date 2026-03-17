<?php

namespace App\Filament\Resources\OrangTuas\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class OrangTuaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->schema([
                        TextInput::make('nama')
                            ->required(),
                        Select::make('siswa_id')
                            ->label('Siswa')
                            ->relationship('siswa', 'nama_lengkap')
                            ->required()
                            ->searchable()
                            ->preload(),
                        Select::make('hubungan')
                            ->options(['Ayah' => 'Ayah', 'Ibu' => 'Ibu', 'Wali' => 'Wali'])
                            ->required(),
                        TextInput::make('nik')
                            ->label('NIK'),
                        TextInput::make('pekerjaan'),
                        TextInput::make('pendidikan_terakhir')
                            ->label('Pendidikan Terakhir'),
                        Textarea::make('alamat')
                            ->columnSpanFull(),
                        TextInput::make('no_hp')
                            ->label('No. HP'),
                        TextInput::make('email')
                            ->label('Email')
                            ->email(),
                        TextInput::make('foto_path'),
                    ])->columnSpanFull()
            ]);
    }
}

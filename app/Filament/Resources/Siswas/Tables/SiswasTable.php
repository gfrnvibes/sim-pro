<?php

namespace App\Filament\Resources\Siswas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\TextSize;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class SiswasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nis')
                    ->label('NIS')
                    ->searchable(),
                TextColumn::make('nisn')
                    ->label('NISN')
                    ->searchable(),
                TextColumn::make('nama_lengkap')
                    ->label('Nama Lengkap')
                    ->weight(FontWeight::Bold)
                    ->searchable(),
                TextColumn::make('nama_panggilan')
                    ->label('Nama Panggilan')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('jenis_kelamin')
                    ->label('JK')
                    ->alignCenter()
                    ->badge(),
                TextColumn::make('ttl')
                    ->label('TTL')
                    ->getStateUsing(function ($record) {
                        if (!$record) return '-';

                        $tempat = $record->tempat_lahir;
                        $tanggal = $record->tanggal_lahir
                            ? \Carbon\Carbon::parse($record->tanggal_lahir)->translatedFormat('d M Y')
                            : null;

                        if (!$tempat && !$tanggal) return '-';

                        return trim(
                            ($tempat ?? '') .
                            ($tempat && $tanggal ? ', ' : '') .
                            ($tanggal ?? '')
                        );
                    })
                    ->searchable(),
                TextColumn::make('agama')
                    ->label('Agama')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('alamat_lengkap')
                    ->label('Alamat')
                    ->getStateUsing(function ($record) {
                        if (!$record) return '-';

                        $parts = [
                            $record->rt_rw,
                            $record->kelurahan,
                            $record->kecamatan,
                            $record->kabupaten,
                            $record->provinsi,
                            $record->kode_pos,
                        ];

                        // buang yang kosong/null
                        $filtered = array_filter($parts);

                        return count($filtered)
                            ? implode(', ', $filtered)
                            : '-';
                    })
                    ->limit(20)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();

                        if (strlen($state) <= $column->getCharacterLimit()) {
                            return null;
                        }

                        // Only render the tooltip if the column contents exceeds the length limit.
                        return $state;
                    })
                    ->searchable(),
                TextColumn::make('foto_path')
                    ->label('Foto')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('golongan_darah')
                    ->label('Golongan Darah')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('tinggi_badan')
                    ->label('Tinggi Badan')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('berat_badan')
                    ->label('Berat Badan')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('jarak_rumah_ke_sekolah')
                    ->label('Jarak Rumah ke Sekolah')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Diperbarui Pada')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->label('Dihapus Pada')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}

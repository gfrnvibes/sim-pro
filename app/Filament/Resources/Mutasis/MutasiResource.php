<?php

namespace App\Filament\Resources\Mutasis;

use App\Filament\Resources\Mutasis\Pages\ManageMutasis;
use App\Models\Mutasi;
use BackedEnum;
use UnitEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MutasiResource extends Resource
{
    protected static ?string $model = Mutasi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ArrowsRightLeft;
    protected static string | UnitEnum | null $navigationGroup = 'Data Siswa';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('siswa_id')
                    ->required()
                    ->numeric(),
                Select::make('jenis')
                    ->options([
            'Masuk' => 'Masuk',
            'Keluar' => 'Keluar',
            'Pindah Kelas Dalam Madrasah' => 'Pindah kelas dalam madrasah',
        ])
                    ->required(),
                DatePicker::make('tanggal_mutasi')
                    ->required(),
                TextInput::make('asal_sekolah'),
                TextInput::make('tujuan_sekolah'),
                TextInput::make('no_surat'),
                DatePicker::make('tanggal_surat'),
                Textarea::make('alasan')
                    ->columnSpanFull(),
                TextInput::make('tahun_ajaran_id')
                    ->numeric(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('siswa_id')
                    ->numeric(),
                TextEntry::make('jenis')
                    ->badge(),
                TextEntry::make('tanggal_mutasi')
                    ->date(),
                TextEntry::make('asal_sekolah')
                    ->placeholder('-'),
                TextEntry::make('tujuan_sekolah')
                    ->placeholder('-'),
                TextEntry::make('no_surat')
                    ->placeholder('-'),
                TextEntry::make('tanggal_surat')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('alasan')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('tahun_ajaran_id')
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
                    ->visible(fn (Mutasi $record): bool => $record->trashed()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('siswa_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('jenis')
                    ->badge(),
                TextColumn::make('tanggal_mutasi')
                    ->date()
                    ->sortable(),
                TextColumn::make('asal_sekolah')
                    ->searchable(),
                TextColumn::make('tujuan_sekolah')
                    ->searchable(),
                TextColumn::make('no_surat')
                    ->searchable(),
                TextColumn::make('tanggal_surat')
                    ->date()
                    ->sortable(),
                TextColumn::make('tahun_ajaran_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
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
                DeleteAction::make(),
                ForceDeleteAction::make(),
                RestoreAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageMutasis::route('/'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}

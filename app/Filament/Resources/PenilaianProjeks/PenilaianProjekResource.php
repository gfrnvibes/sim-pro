<?php

namespace App\Filament\Resources\PenilaianProjeks;

use App\Filament\Resources\PenilaianProjeks\Pages\ManagePenilaianProjeks;
use App\Models\PenilaianProjek;
use BackedEnum;
use UnitEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PenilaianProjekResource extends Resource
{
    protected static ?string $model = PenilaianProjek::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::CubeTransparent;
    protected static string | UnitEnum | null $navigationGroup = 'Penilaian';
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('projek_id')
                    ->relationship('projek', 'id')
                    ->required(),
                Select::make('siswa_kelas_id')
                    ->relationship('siswaKelas', 'id')
                    ->required(),
                TextInput::make('nilai')
                    ->numeric(),
                Textarea::make('deskripsi')
                    ->columnSpanFull(),
                TextInput::make('bukti'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('projek.id')
                    ->searchable(),
                TextColumn::make('siswaKelas.id')
                    ->searchable(),
                TextColumn::make('nilai')
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
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManagePenilaianProjeks::route('/'),
        ];
    }
}

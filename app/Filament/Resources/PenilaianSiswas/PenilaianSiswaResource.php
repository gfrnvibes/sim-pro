<?php

namespace App\Filament\Resources\PenilaianSiswas;

use App\Filament\Resources\PenilaianSiswas\Pages\CreatePenilaianSiswa;
use App\Filament\Resources\PenilaianSiswas\Pages\EditPenilaianSiswa;
use App\Filament\Resources\PenilaianSiswas\Pages\ListPenilaianSiswas;
use App\Filament\Resources\PenilaianSiswas\Pages\ViewPenilaianSiswa;
use App\Filament\Resources\PenilaianSiswas\Schemas\PenilaianSiswaForm;
use App\Filament\Resources\PenilaianSiswas\Schemas\PenilaianSiswaInfolist;
use App\Filament\Resources\PenilaianSiswas\Tables\PenilaianSiswasTable;
use App\Models\PenilaianSiswa;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PenilaianSiswaResource extends Resource
{
    protected static ?string $model = PenilaianSiswa::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Sparkles;
    protected static string | UnitEnum | null $navigationGroup = 'Penilaian';
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Schema $schema): Schema
    {
        return PenilaianSiswaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PenilaianSiswaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PenilaianSiswasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPenilaianSiswas::route('/'),
            'create' => CreatePenilaianSiswa::route('/create'),
            'view' => ViewPenilaianSiswa::route('/{record}'),
            'edit' => EditPenilaianSiswa::route('/{record}/edit'),
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

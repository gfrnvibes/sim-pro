<?php

namespace App\Filament\Resources\OrangTuas;

use App\Filament\Resources\OrangTuas\Pages\CreateOrangTua;
use App\Filament\Resources\OrangTuas\Pages\EditOrangTua;
use App\Filament\Resources\OrangTuas\Pages\ListOrangTuas;
use App\Filament\Resources\OrangTuas\Pages\ViewOrangTua;
use App\Filament\Resources\OrangTuas\Schemas\OrangTuaForm;
use App\Filament\Resources\OrangTuas\Schemas\OrangTuaInfolist;
use App\Filament\Resources\OrangTuas\Tables\OrangTuasTable;
use App\Models\OrangTua;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrangTuaResource extends Resource
{
    protected static ?string $model = OrangTua::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::UserGroup;
    protected static string | UnitEnum | null $navigationGroup = 'Data Siswa';
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Schema $schema): Schema
    {
        return OrangTuaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return OrangTuaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OrangTuasTable::configure($table);
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
            'index' => ListOrangTuas::route('/'),
            'create' => CreateOrangTua::route('/create'),
            'view' => ViewOrangTua::route('/{record}'),
            'edit' => EditOrangTua::route('/{record}/edit'),
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

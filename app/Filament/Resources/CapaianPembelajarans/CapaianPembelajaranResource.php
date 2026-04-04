<?php

namespace App\Filament\Resources\CapaianPembelajarans;

use App\Filament\Resources\CapaianPembelajarans\Pages\CreateCapaianPembelajaran;
use App\Filament\Resources\CapaianPembelajarans\Pages\EditCapaianPembelajaran;
use App\Filament\Resources\CapaianPembelajarans\Pages\ListCapaianPembelajarans;
use App\Filament\Resources\CapaianPembelajarans\Pages\ViewCapaianPembelajaran;
use App\Filament\Resources\CapaianPembelajarans\Schemas\CapaianPembelajaranForm;
use App\Filament\Resources\CapaianPembelajarans\Schemas\CapaianPembelajaranInfolist;
use App\Filament\Resources\CapaianPembelajarans\Tables\CapaianPembelajaransTable;
use App\Models\CapaianPembelajaran;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CapaianPembelajaranResource extends Resource
{
    protected static ?string $model = CapaianPembelajaran::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ArrowTrendingUp;
    protected static string | UnitEnum | null $navigationGroup = 'Master';
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Schema $schema): Schema
    {
        return CapaianPembelajaranForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CapaianPembelajaranInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CapaianPembelajaransTable::configure($table);
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
            'index' => ListCapaianPembelajarans::route('/'),
            'create' => CreateCapaianPembelajaran::route('/create'),
            'view' => ViewCapaianPembelajaran::route('/{record}'),
            'edit' => EditCapaianPembelajaran::route('/{record}/edit'),
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

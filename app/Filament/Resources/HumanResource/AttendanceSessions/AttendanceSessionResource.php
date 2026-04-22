<?php

namespace App\Filament\Resources\HumanResource\AttendanceSessions;

use App\Filament\Resources\HumanResource\AttendanceSessions\Pages\CreateAttendanceSession;
use App\Filament\Resources\HumanResource\AttendanceSessions\Pages\EditAttendanceSession;
use App\Filament\Resources\HumanResource\AttendanceSessions\Pages\ListAttendanceSessions;
use App\Filament\Resources\HumanResource\AttendanceSessions\Pages\ViewAttendanceSession;
use App\Filament\Resources\HumanResource\AttendanceSessions\Schemas\AttendanceSessionForm;
use App\Filament\Resources\HumanResource\AttendanceSessions\Schemas\AttendanceSessionInfolist;
use App\Filament\Resources\HumanResource\AttendanceSessions\Tables\AttendanceSessionsTable;
use App\Models\HumanResource\AttendanceSession;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AttendanceSessionResource extends Resource
{
    protected static ?string $model = AttendanceSession::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return AttendanceSessionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AttendanceSessionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AttendanceSessionsTable::configure($table);
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
            'index' => ListAttendanceSessions::route('/'),
            'create' => CreateAttendanceSession::route('/create'),
            'view' => ViewAttendanceSession::route('/{record}'),
            'edit' => EditAttendanceSession::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources\HumanResource\AttendanceSessions\Pages;

use App\Filament\Resources\HumanResource\AttendanceSessions\AttendanceSessionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditAttendanceSession extends EditRecord
{
    protected static string $resource = AttendanceSessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}

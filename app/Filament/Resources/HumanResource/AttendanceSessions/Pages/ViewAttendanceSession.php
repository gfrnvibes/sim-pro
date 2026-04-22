<?php

namespace App\Filament\Resources\HumanResource\AttendanceSessions\Pages;

use App\Filament\Resources\HumanResource\AttendanceSessions\AttendanceSessionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAttendanceSession extends ViewRecord
{
    protected static string $resource = AttendanceSessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

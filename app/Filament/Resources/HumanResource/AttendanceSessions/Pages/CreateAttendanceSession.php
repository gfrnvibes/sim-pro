<?php

namespace App\Filament\Resources\HumanResource\AttendanceSessions\Pages;

use App\Filament\Resources\HumanResource\AttendanceSessions\AttendanceSessionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAttendanceSession extends CreateRecord
{
    protected static string $resource = AttendanceSessionResource::class;
}

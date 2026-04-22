<?php

namespace App\Filament\Resources\HumanResource\Attendances\Pages;

use App\Filament\Resources\HumanResource\Attendances\AttendanceResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAttendance extends CreateRecord
{
    protected static string $resource = AttendanceResource::class;
}

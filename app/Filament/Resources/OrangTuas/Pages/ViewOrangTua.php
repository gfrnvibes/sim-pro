<?php

namespace App\Filament\Resources\OrangTuas\Pages;

use App\Filament\Resources\OrangTuas\OrangTuaResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewOrangTua extends ViewRecord
{
    protected static string $resource = OrangTuaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

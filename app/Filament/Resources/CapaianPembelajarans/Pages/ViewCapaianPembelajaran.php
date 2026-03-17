<?php

namespace App\Filament\Resources\CapaianPembelajarans\Pages;

use App\Filament\Resources\CapaianPembelajarans\CapaianPembelajaranResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCapaianPembelajaran extends ViewRecord
{
    protected static string $resource = CapaianPembelajaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

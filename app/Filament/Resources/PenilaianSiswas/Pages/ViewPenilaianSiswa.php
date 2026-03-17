<?php

namespace App\Filament\Resources\PenilaianSiswas\Pages;

use App\Filament\Resources\PenilaianSiswas\PenilaianSiswaResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPenilaianSiswa extends ViewRecord
{
    protected static string $resource = PenilaianSiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

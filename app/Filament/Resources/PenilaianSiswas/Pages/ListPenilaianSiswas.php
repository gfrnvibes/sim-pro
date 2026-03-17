<?php

namespace App\Filament\Resources\PenilaianSiswas\Pages;

use App\Filament\Resources\PenilaianSiswas\PenilaianSiswaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPenilaianSiswas extends ListRecords
{
    protected static string $resource = PenilaianSiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

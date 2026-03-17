<?php

namespace App\Filament\Resources\CapaianPembelajarans\Pages;

use App\Filament\Resources\CapaianPembelajarans\CapaianPembelajaranResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCapaianPembelajarans extends ListRecords
{
    protected static string $resource = CapaianPembelajaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

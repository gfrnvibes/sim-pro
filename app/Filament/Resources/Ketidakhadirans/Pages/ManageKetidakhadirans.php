<?php

namespace App\Filament\Resources\Ketidakhadirans\Pages;

use App\Filament\Resources\Ketidakhadirans\KetidakhadiranResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageKetidakhadirans extends ManageRecords
{
    protected static string $resource = KetidakhadiranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

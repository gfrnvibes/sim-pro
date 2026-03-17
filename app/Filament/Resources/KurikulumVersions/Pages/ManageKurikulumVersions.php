<?php

namespace App\Filament\Resources\KurikulumVersions\Pages;

use App\Filament\Resources\KurikulumVersions\KurikulumVersionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageKurikulumVersions extends ManageRecords
{
    protected static string $resource = KurikulumVersionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

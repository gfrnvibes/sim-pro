<?php

namespace App\Filament\Resources\Extrakurikulers\Pages;

use App\Filament\Resources\Extrakurikulers\ExtrakurikulerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageExtrakurikulers extends ManageRecords
{
    protected static string $resource = ExtrakurikulerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

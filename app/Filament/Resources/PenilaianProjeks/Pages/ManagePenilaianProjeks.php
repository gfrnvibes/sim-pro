<?php

namespace App\Filament\Resources\PenilaianProjeks\Pages;

use App\Filament\Resources\PenilaianProjeks\PenilaianProjekResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManagePenilaianProjeks extends ManageRecords
{
    protected static string $resource = PenilaianProjekResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\PenilaianSiswas\Pages;

use App\Filament\Resources\PenilaianSiswas\PenilaianSiswaResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPenilaianSiswa extends EditRecord
{
    protected static string $resource = PenilaianSiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}

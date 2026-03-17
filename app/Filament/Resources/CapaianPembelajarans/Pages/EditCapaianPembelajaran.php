<?php

namespace App\Filament\Resources\CapaianPembelajarans\Pages;

use App\Filament\Resources\CapaianPembelajarans\CapaianPembelajaranResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCapaianPembelajaran extends EditRecord
{
    protected static string $resource = CapaianPembelajaranResource::class;

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

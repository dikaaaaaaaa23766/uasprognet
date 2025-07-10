<?php

namespace App\Filament\Resources\MedicalGuideSubmenuResource\Pages;

use App\Filament\Resources\MedicalGuideSubmenuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMedicalGuideSubmenu extends EditRecord
{
    protected static string $resource = MedicalGuideSubmenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

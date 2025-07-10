<?php

namespace App\Filament\Resources\MedicalGuideResource\Pages;

use App\Filament\Resources\MedicalGuideResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMedicalGuide extends EditRecord
{
    protected static string $resource = MedicalGuideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\MedicalGuideResource\Pages;

use App\Filament\Resources\MedicalGuideResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMedicalGuides extends ListRecords
{
    protected static string $resource = MedicalGuideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

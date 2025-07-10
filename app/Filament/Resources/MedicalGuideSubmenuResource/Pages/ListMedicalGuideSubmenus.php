<?php

namespace App\Filament\Resources\MedicalGuideSubmenuResource\Pages;

use App\Filament\Resources\MedicalGuideSubmenuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMedicalGuideSubmenus extends ListRecords
{
    protected static string $resource = MedicalGuideSubmenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

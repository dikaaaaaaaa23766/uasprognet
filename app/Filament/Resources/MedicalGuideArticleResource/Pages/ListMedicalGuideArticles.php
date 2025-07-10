<?php

namespace App\Filament\Resources\MedicalGuideArticleResource\Pages;

use App\Filament\Resources\MedicalGuideArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMedicalGuideArticles extends ListRecords
{
    protected static string $resource = MedicalGuideArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

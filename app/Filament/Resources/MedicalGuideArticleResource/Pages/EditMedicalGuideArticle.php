<?php

namespace App\Filament\Resources\MedicalGuideArticleResource\Pages;

use App\Filament\Resources\MedicalGuideArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMedicalGuideArticle extends EditRecord
{
    protected static string $resource = MedicalGuideArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

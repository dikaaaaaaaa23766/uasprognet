<?php

// app/Filament/Resources/MedicalGuideResource.php
namespace App\Filament\Resources;

use App\Filament\Resources\MedicalGuideResource\Pages;
use App\Models\MedicalGuide;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;

class MedicalGuideResource extends Resource
{
    protected static ?string $model = MedicalGuide::class;

    public static function getNavigationGroup(): ?string
    {
        return 'Medical Guide';
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMedicalGuides::route('/'),
            'create' => Pages\CreateMedicalGuide::route('/create'),
            'edit' => Pages\EditMedicalGuide::route('/{record}/edit'),
        ];
    }
}
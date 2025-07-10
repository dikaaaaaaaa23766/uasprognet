<?php

// app/Filament/Resources/MedicalGuideSubmenuResource.php
namespace App\Filament\Resources;

use App\Filament\Resources\MedicalGuideSubmenuResource\Pages;
use App\Models\MedicalGuideSubmenu;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
class MedicalGuideSubmenuResource extends Resource
{
    protected static ?string $model = MedicalGuideSubmenu::class;

    public static function getNavigationGroup(): ?string
    {
        return 'Medical Guide';
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('medical_guide_id')
                    ->relationship('medicalGuide', 'title')
                    ->required(),
                Forms\Components\TextInput::make('title')->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('medicalGuide.title')->label('Guide'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMedicalGuideSubmenus::route('/'),
            'create' => Pages\CreateMedicalGuideSubmenu::route('/create'),
            'edit' => Pages\EditMedicalGuideSubmenu::route('/{record}/edit'),
        ];
    }
}
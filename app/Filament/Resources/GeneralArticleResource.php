<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GeneralArticleResource\Pages;
use App\Models\GeneralArticle;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use FilamentTiptapEditor\TiptapEditor;


class GeneralArticleResource extends Resource
{
    protected static ?string $model = GeneralArticle::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, \Filament\Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->disabled()
                    ->dehydrated(),

                FileUpload::make('cover_image')
                    ->image()
                    ->imageEditor()
                    ->Disk('public'),

                Textarea::make('summary')
                    ->required(),

                TiptapEditor::make('content')
                    ->required()
                    ->columnSpanFull()
                    ->Disk('public'), // <-- BARIS PENTING INI SUDAH DITAMBAHKAN
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover_image'),
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('summary')->limit(50),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGeneralArticles::route('/'),
            'create' => Pages\CreateGeneralArticle::route('/create'),
            'edit' => Pages\EditGeneralArticle::route('/{record}/edit'),
        ];
    }
}

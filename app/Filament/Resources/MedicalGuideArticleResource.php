<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MedicalGuideArticleResource\Pages;
use App\Models\MedicalGuideArticle;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;

class MedicalGuideArticleResource extends Resource
{
    protected static ?string $model = MedicalGuideArticle::class;

    public static function getNavigationGroup(): ?string
    {
        return 'Medical Guide';
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('medical_guide_submenu_id')
                    ->relationship('medicalGuideSubmenu', 'title')
                    ->required(),

                Forms\Components\TextInput::make('title')->required(),

                Forms\Components\RichEditor::make('content')
                ->required()
                ->toolbarButtons([
                    'blockquote',
                    'bold',
                    'bulletList',
                    'codeBlock',
                    'h1',
                    'h2', 
                    'h3',
                    'italic',
                    'link',
                    'orderedList',
                    'redo',
                    'strike',
                    'underline',
                    'undo',
                ])
                ->fileAttachmentsDisk('public')
                ->fileAttachmentsDirectory('article-attachments')
                ->extraInputAttributes(['style' => 'min-height: 500px'])
                ->columnSpanFull(),

                Forms\Components\FileUpload::make('photo')
                 ->image()
                 ->multiple()
                 ->directory('articles') // Simpan di folder `storage/app/public/articles`
                 ->reorderable() // Bisa mengubah urutan gambar
                 ->preserveFilenames() // Menyimpan nama asli file
                 ->deleteUploadedFileUsing(fn ($file) => \Storage::disk('public')->delete($file)) // Hapus file saat dihapus di form
                 ->columnSpanFull(), // Lebar penuh

            

                
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('content')
                    ->limit(50)
                    ->label('Content'),

                Tables\Columns\ImageColumn::make('photo')
                    ->label('Photo')
                    ->circular(),

                Tables\Columns\TextColumn::make('questions')
                    ->label('Questions')
                    ->formatStateUsing(fn ($state) => is_array($state) ? implode(', ', array_column($state, 'question')) : '-')
                    ->limit(50),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMedicalGuideArticles::route('/'),
            'create' => Pages\CreateMedicalGuideArticle::route('/create'),
            'edit' => Pages\EditMedicalGuideArticle::route('/{record}/edit'),
        ];
    }
}

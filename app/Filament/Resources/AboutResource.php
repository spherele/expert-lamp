<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutResource\Pages;
use App\Filament\Resources\AboutResource\RelationManagers;
use App\Models\About;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Обо мне';

    protected static ?string $modelLabel = 'Обо мне';

    protected static ?string $pluralModelLabel = 'Обо мне';

    protected static ?string $navigationGroup = 'Контент';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->label('Заголовок')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Grid::make()
                ->schema([
                    FileUpload::make('preview_picture')
                        ->label('Картинка для анонса')
                        ->directory('/about')
                        ->required()
                        ->image()
                        ->maxSize(4096),

                    FileUpload::make('image')
                        ->label('Картинка на странице')
                        ->directory('/about')
                        ->required()
                        ->image()
                        ->maxSize(4096),
                ]),
                Forms\Components\TextInput::make('preview_text')->label('Текст анонса')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                TinyEditor::make('content')->label('Контент')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('active')->label('Активность')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Заголовок')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('preview_picture')->label('Картинка для анонса'),
                Tables\Columns\ImageColumn::make('image')->label('Картинка на странице'),
                Tables\Columns\IconColumn::make('active')->label('Активность')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAbouts::route('/'),
            'create' => Pages\CreateAbout::route('/create'),
            'edit' => Pages\EditAbout::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticlesCategoryResource\Pages;
use App\Filament\Resources\ArticlesCategoryResource\RelationManagers;
use App\Models\ArticlesCategory;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms;
use Filament\Forms\Form;

class ArticlesCategoryResource extends Resource
{
    protected static ?string $model = ArticlesCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-bolt';

    protected static ?string $navigationLabel = 'Категории статей';

    protected static ?string $modelLabel = 'Категории статей';

    protected static ?string $pluralModelLabel = 'Категории статей';

    protected static ?string $navigationGroup = 'Контент';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->label('Название')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->label('Символьный код')
                    ->required()
                    ->maxLength(255)
                    ->live()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                Forms\Components\Toggle::make('active')->label('Активность')
                    ->default(true)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Название')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')->label('Символьный код')
                    ->searchable(),
                Tables\Columns\IconColumn::make('active')->label('Активность')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')->label('Создан')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')->label('Обновлен')
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
            'index' => Pages\ListArticlesCategories::route('/'),
            'create' => Pages\CreateArticlesCategory::route('/create'),
            'edit' => Pages\EditArticlesCategory::route('/{record}/edit'),
        ];
    }
}

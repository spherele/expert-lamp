<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticlesResource\Pages;
use App\Filament\Resources\ArticlesResource\RelationManagers;
use App\Models\Article;
use App\Models\ArticlesCategory;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class ArticlesResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = 'Статьи';

    protected static ?string $modelLabel = 'Статьи';

    protected static ?string $pluralModelLabel = 'Статьи';

    protected static ?string $navigationGroup = 'Контент';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->label('Название')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')->label('Символьный код')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('preview_picture')->label('Картинка для анонса')
                    ->directory('articles/previews')
                    ->required()
                    ->image()
                    ->maxSize(4096),
                FileUpload::make('detail_picture')->label('Картинка для детальной страницы')
                    ->directory('articles/details')
                    ->required()
                    ->image()
                    ->maxSize(4096),
                Forms\Components\Textarea::make('preview_text')->label('Текст для анонса')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                TinyEditor::make('detail_text')->label('Текст для детальной страницы')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TagsInput::make('tags')->label('Тэги'),
                Forms\Components\Select::make('category_id')->label('Категория')
                    ->required()
                    ->options(static::categoryOptions())
                    ->label('Категория')
                    ->searchable(),
                Forms\Components\DateTimePicker::make('published_at')->label('Дата публикации')
                    ->default(Carbon::now())
                    ->required(),
                Forms\Components\Toggle::make('active')->label('Активность')
                    ->default(true)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')->label('Название')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')->label('Символьный код')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('preview_picture')->label('Картинка для анонса')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('detail_picture')->label('Картинка для детальной страницы')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.title')->label('Категория')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('published_at')->label('Дата публикации')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\IconColumn::make('active')->label('Активность')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')->label('Дата создания')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')->label('Дата изменения')
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticles::route('/create'),
            'edit' => Pages\EditArticles::route('/{record}/edit'),
        ];
    }

    public static function categoryOptions(): array
    {
        return ArticlesCategory::pluck('title', 'id')->toArray();
    }
}

<?php

namespace App\Filament\Resources\ArticlesCategoryResource\Pages;

use App\Filament\Resources\ArticlesCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListArticlesCategories extends ListRecords
{
    protected static string $resource = ArticlesCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;

class ListCategories extends ListRecords
{
    use Translatable;

    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
=======
namespace App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCategories extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = CategoryResource::class;
    protected function getHeaderActions(): array
    {
        return [Actions\LocaleSwitcher::make(), Actions\CreateAction::make()];
>>>>>>> Stashed changes
    }
}

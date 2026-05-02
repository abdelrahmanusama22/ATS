<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;

class ListProducts extends ListRecords
{
    use Translatable;

    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
=======
namespace App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProducts extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = ProductResource::class;
    protected function getHeaderActions(): array
    {
        return [Actions\LocaleSwitcher::make(), Actions\CreateAction::make()];
>>>>>>> Stashed changes
    }
}

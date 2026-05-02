<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateProduct extends CreateRecord
{
    use Translatable;

    protected static string $resource = ProductResource::class;
    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\LocaleSwitcher::make(),
        ];
=======
namespace App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = ProductResource::class;
    protected function getHeaderActions(): array
    {
        return [Actions\LocaleSwitcher::make()];
>>>>>>> Stashed changes
    }
}

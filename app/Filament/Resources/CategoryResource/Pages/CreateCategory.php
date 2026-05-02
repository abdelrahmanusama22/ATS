<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateCategory extends CreateRecord
{
    use Translatable;

    protected static string $resource = CategoryResource::class;
    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\LocaleSwitcher::make(),
        ];
=======
namespace App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCategory extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = CategoryResource::class;
    protected function getHeaderActions(): array
    {
        return [Actions\LocaleSwitcher::make()];
>>>>>>> Stashed changes
    }
}

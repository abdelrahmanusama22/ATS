<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\EditRecord\Concerns\Translatable;

class EditProduct extends EditRecord
{
    use Translatable;

    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
=======
namespace App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = ProductResource::class;
    protected function getHeaderActions(): array
    {
        return [Actions\LocaleSwitcher::make(), Actions\DeleteAction::make()];
>>>>>>> Stashed changes
    }
}

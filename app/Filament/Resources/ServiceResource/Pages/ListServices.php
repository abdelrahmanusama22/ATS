<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;

class ListServices extends ListRecords
{
    use Translatable;

    protected static string $resource = ServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
=======
namespace App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
class ListServices extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = ServiceResource::class;
    protected function getHeaderActions(): array { return [Actions\LocaleSwitcher::make(), Actions\CreateAction::make()]; }
>>>>>>> Stashed changes
}

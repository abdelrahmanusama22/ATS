<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\SliderResource\Pages;

use App\Filament\Resources\SliderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;

class ListSliders extends ListRecords
{
    use Translatable;

    protected static string $resource = SliderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
=======
namespace App\Filament\Resources\SliderResource\Pages;
use App\Filament\Resources\SliderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
class ListSliders extends ListRecords { use ListRecords\Concerns\Translatable; protected static string $resource = SliderResource::class; protected function getHeaderActions(): array { return [Actions\LocaleSwitcher::make(), Actions\CreateAction::make()]; } }
>>>>>>> Stashed changes

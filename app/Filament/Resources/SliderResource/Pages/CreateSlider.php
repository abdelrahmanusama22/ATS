<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\SliderResource\Pages;

use App\Filament\Resources\SliderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateSlider extends CreateRecord
{
    use Translatable;

    protected static string $resource = SliderResource::class;
    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\LocaleSwitcher::make(),
        ];
    }
}
=======
namespace App\Filament\Resources\SliderResource\Pages;
use App\Filament\Resources\SliderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
class CreateSlider extends CreateRecord { use CreateRecord\Concerns\Translatable; protected static string $resource = SliderResource::class; protected function getHeaderActions(): array { return [Actions\LocaleSwitcher::make()]; } }
>>>>>>> Stashed changes

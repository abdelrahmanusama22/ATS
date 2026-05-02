<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\SliderResource\Pages;

use App\Filament\Resources\SliderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\EditRecord\Concerns\Translatable;

class EditSlider extends EditRecord
{
    use Translatable;

    protected static string $resource = SliderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
=======
namespace App\Filament\Resources\SliderResource\Pages;
use App\Filament\Resources\SliderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
class EditSlider extends EditRecord { use EditRecord\Concerns\Translatable; protected static string $resource = SliderResource::class; protected function getHeaderActions(): array { return [Actions\LocaleSwitcher::make(), Actions\DeleteAction::make()]; } }
>>>>>>> Stashed changes

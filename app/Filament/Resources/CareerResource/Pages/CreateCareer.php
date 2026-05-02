<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\CareerResource\Pages;

use App\Filament\Resources\CareerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCareer extends CreateRecord
{
    use \Filament\Resources\Pages\CreateRecord\Concerns\Translatable;

    protected static string $resource = CareerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\LocaleSwitcher::make(),
        ];
    }
}
=======
namespace App\Filament\Resources\CareerResource\Pages;
use App\Filament\Resources\CareerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
class CreateCareer extends CreateRecord { use CreateRecord\Concerns\Translatable; protected static string $resource = CareerResource::class; protected function getHeaderActions(): array { return [Actions\LocaleSwitcher::make()]; } }
>>>>>>> Stashed changes

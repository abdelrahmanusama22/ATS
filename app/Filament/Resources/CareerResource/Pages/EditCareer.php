<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\CareerResource\Pages;

use App\Filament\Resources\CareerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCareer extends EditRecord
{
    use \Filament\Resources\Pages\EditRecord\Concerns\Translatable;

    protected static string $resource = CareerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

=======
namespace App\Filament\Resources\CareerResource\Pages;
use App\Filament\Resources\CareerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
class EditCareer extends EditRecord { use EditRecord\Concerns\Translatable; protected static string $resource = CareerResource::class; protected function getHeaderActions(): array { return [Actions\LocaleSwitcher::make(), Actions\DeleteAction::make()]; } }
>>>>>>> Stashed changes

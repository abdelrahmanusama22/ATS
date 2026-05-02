<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreatePage extends CreateRecord
{
    use Translatable;

    protected static string $resource = PageResource::class;
    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\LocaleSwitcher::make(),
        ];
    }
}
=======
namespace App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
class CreatePage extends CreateRecord { use CreateRecord\Concerns\Translatable; protected static string $resource = PageResource::class; protected function getHeaderActions(): array { return [Actions\LocaleSwitcher::make()]; } }
>>>>>>> Stashed changes

<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\FaqResource\Pages;

use App\Filament\Resources\FaqResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFaq extends CreateRecord
{
    use \Filament\Resources\Pages\CreateRecord\Concerns\Translatable;

    protected static string $resource = FaqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\LocaleSwitcher::make(),
        ];
    }
}
=======
namespace App\Filament\Resources\FaqResource\Pages;
use App\Filament\Resources\FaqResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
class CreateFaq extends CreateRecord { use CreateRecord\Concerns\Translatable; protected static string $resource = FaqResource::class; protected function getHeaderActions(): array { return [Actions\LocaleSwitcher::make()]; } }
>>>>>>> Stashed changes

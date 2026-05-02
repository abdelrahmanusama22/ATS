<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\FaqResource\Pages;

use App\Filament\Resources\FaqResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFaq extends EditRecord
{
    use \Filament\Resources\Pages\EditRecord\Concerns\Translatable;

    protected static string $resource = FaqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

=======
namespace App\Filament\Resources\FaqResource\Pages;
use App\Filament\Resources\FaqResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
class EditFaq extends EditRecord { use EditRecord\Concerns\Translatable; protected static string $resource = FaqResource::class; protected function getHeaderActions(): array { return [Actions\LocaleSwitcher::make(), Actions\DeleteAction::make()]; } }
>>>>>>> Stashed changes

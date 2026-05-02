<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\FaqResource\Pages;

use App\Filament\Resources\FaqResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFaqs extends ListRecords
{
    use \Filament\Resources\Pages\ListRecords\Concerns\Translatable;

    protected static string $resource = FaqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}

=======
namespace App\Filament\Resources\FaqResource\Pages;
use App\Filament\Resources\FaqResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
class ListFaqs extends ListRecords { use ListRecords\Concerns\Translatable; protected static string $resource = FaqResource::class; protected function getHeaderActions(): array { return [Actions\LocaleSwitcher::make(), Actions\CreateAction::make()]; } }
>>>>>>> Stashed changes

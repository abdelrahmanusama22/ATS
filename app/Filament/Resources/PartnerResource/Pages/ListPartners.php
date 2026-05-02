<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\PartnerResource\Pages;

use App\Filament\Resources\PartnerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPartners extends ListRecords
{
    protected static string $resource = PartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
=======
namespace App\Filament\Resources\PartnerResource\Pages;
use App\Filament\Resources\PartnerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
class ListPartners extends ListRecords { use ListRecords\Concerns\Translatable; protected static string $resource = PartnerResource::class; protected function getHeaderActions(): array { return [Actions\LocaleSwitcher::make(), Actions\CreateAction::make()]; } }
>>>>>>> Stashed changes

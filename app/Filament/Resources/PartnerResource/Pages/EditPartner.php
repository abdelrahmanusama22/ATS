<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\PartnerResource\Pages;

use App\Filament\Resources\PartnerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPartner extends EditRecord
{
    protected static string $resource = PartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
=======
namespace App\Filament\Resources\PartnerResource\Pages;
use App\Filament\Resources\PartnerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
class EditPartner extends EditRecord { use EditRecord\Concerns\Translatable; protected static string $resource = PartnerResource::class; protected function getHeaderActions(): array { return [Actions\LocaleSwitcher::make(), Actions\DeleteAction::make()]; } }
>>>>>>> Stashed changes

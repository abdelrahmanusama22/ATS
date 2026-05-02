<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\PartnerResource\Pages;

use App\Filament\Resources\PartnerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePartner extends CreateRecord
{
    protected static string $resource = PartnerResource::class;
}
=======
namespace App\Filament\Resources\PartnerResource\Pages;
use App\Filament\Resources\PartnerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
class CreatePartner extends CreateRecord { use CreateRecord\Concerns\Translatable; protected static string $resource = PartnerResource::class; protected function getHeaderActions(): array { return [Actions\LocaleSwitcher::make()]; } }
>>>>>>> Stashed changes

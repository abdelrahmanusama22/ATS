<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\CertificationResource\Pages;

use App\Filament\Resources\CertificationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;
use Filament\Resources\Pages\CreateRecord;

class CreateCertification extends CreateRecord
{
    protected static string $resource = CertificationResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}

=======
namespace App\Filament\Resources\CertificationResource\Pages;
use App\Filament\Resources\CertificationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
class CreateCertification extends CreateRecord { use CreateRecord\Concerns\Translatable; protected static string $resource = CertificationResource::class; protected function getHeaderActions(): array { return [Actions\LocaleSwitcher::make()]; } }
>>>>>>> Stashed changes

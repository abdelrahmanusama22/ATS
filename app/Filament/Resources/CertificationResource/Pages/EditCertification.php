<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\CertificationResource\Pages;

use App\Filament\Resources\CertificationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord\Concerns\Translatable;
use Filament\Resources\Pages\EditRecord;

class EditCertification extends EditRecord
{
    protected static string $resource = CertificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

=======
namespace App\Filament\Resources\CertificationResource\Pages;
use App\Filament\Resources\CertificationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
class EditCertification extends EditRecord { use EditRecord\Concerns\Translatable; protected static string $resource = CertificationResource::class; protected function getHeaderActions(): array { return [Actions\LocaleSwitcher::make(), Actions\DeleteAction::make()]; } }
>>>>>>> Stashed changes

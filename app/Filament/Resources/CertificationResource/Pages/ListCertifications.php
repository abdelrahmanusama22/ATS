<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\CertificationResource\Pages;

use App\Filament\Resources\CertificationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;
use Filament\Resources\Pages\ListRecords;

class ListCertifications extends ListRecords
{
    protected static string $resource = CertificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

=======
namespace App\Filament\Resources\CertificationResource\Pages;
use App\Filament\Resources\CertificationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
class ListCertifications extends ListRecords { use ListRecords\Concerns\Translatable; protected static string $resource = CertificationResource::class; protected function getHeaderActions(): array { return [Actions\LocaleSwitcher::make(), Actions\CreateAction::make()]; } }
>>>>>>> Stashed changes

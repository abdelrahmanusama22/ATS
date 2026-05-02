<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\FeatureResource\Pages;

use App\Filament\Resources\FeatureResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;
use Filament\Resources\Pages\ListRecords;

class ListFeatures extends ListRecords
{
    protected static string $resource = FeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

=======
namespace App\Filament\Resources\FeatureResource\Pages;
use App\Filament\Resources\FeatureResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
class ListFeatures extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = FeatureResource::class;
    protected function getHeaderActions(): array { return [Actions\LocaleSwitcher::make(), Actions\CreateAction::make()]; }
}
>>>>>>> Stashed changes

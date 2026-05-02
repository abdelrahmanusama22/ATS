<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\FeatureResource\Pages;

use App\Filament\Resources\FeatureResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord\Concerns\Translatable;
use Filament\Resources\Pages\EditRecord;

class EditFeature extends EditRecord
{
    protected static string $resource = FeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

=======
namespace App\Filament\Resources\FeatureResource\Pages;
use App\Filament\Resources\FeatureResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
class EditFeature extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = FeatureResource::class;
    protected function getHeaderActions(): array { return [Actions\LocaleSwitcher::make(), Actions\DeleteAction::make()]; }
}
>>>>>>> Stashed changes

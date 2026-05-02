<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\EditRecord\Concerns\Translatable;

class EditService extends EditRecord
{
    use Translatable;

    protected static string $resource = ServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
=======
namespace App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
class EditService extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = ServiceResource::class;
    protected function getHeaderActions(): array { return [Actions\LocaleSwitcher::make(), Actions\DeleteAction::make()]; }
>>>>>>> Stashed changes
}

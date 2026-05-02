<?php

namespace App\Filament\Resources\ContentBlockResource\Pages;

use App\Filament\Resources\ContentBlockResource;
use Filament\Actions;
<<<<<<< Updated upstream
use Filament\Resources\Pages\EditRecord\Concerns\Translatable;
=======
>>>>>>> Stashed changes
use Filament\Resources\Pages\EditRecord;

class EditContentBlock extends EditRecord
{
<<<<<<< Updated upstream
=======
    use EditRecord\Concerns\Translatable;

>>>>>>> Stashed changes
    protected static string $resource = ContentBlockResource::class;

    protected function getHeaderActions(): array
    {
        return [
<<<<<<< Updated upstream
=======
            Actions\LocaleSwitcher::make(),
>>>>>>> Stashed changes
            Actions\DeleteAction::make(),
        ];
    }
}
<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes

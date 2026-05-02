<?php

namespace App\Filament\Resources\ContentBlockResource\Pages;

use App\Filament\Resources\ContentBlockResource;
use Filament\Actions;
<<<<<<< Updated upstream
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;
=======
>>>>>>> Stashed changes
use Filament\Resources\Pages\ListRecords;

class ListContentBlocks extends ListRecords
{
<<<<<<< Updated upstream
=======
    use ListRecords\Concerns\Translatable;

>>>>>>> Stashed changes
    protected static string $resource = ContentBlockResource::class;

    protected function getHeaderActions(): array
    {
        return [
<<<<<<< Updated upstream
=======
            Actions\LocaleSwitcher::make(),
>>>>>>> Stashed changes
            Actions\CreateAction::make(),
        ];
    }
}
<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes

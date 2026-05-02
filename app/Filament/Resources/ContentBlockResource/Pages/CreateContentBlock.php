<?php

namespace App\Filament\Resources\ContentBlockResource\Pages;

use App\Filament\Resources\ContentBlockResource;
<<<<<<< Updated upstream
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;
=======
>>>>>>> Stashed changes
use Filament\Resources\Pages\CreateRecord;

class CreateContentBlock extends CreateRecord
{
<<<<<<< Updated upstream
    protected static string $resource = ContentBlockResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}

=======
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = ContentBlockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\LocaleSwitcher::make(),
        ];
    }
}
>>>>>>> Stashed changes

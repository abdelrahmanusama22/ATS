<?php

namespace App\Filament\Resources\CareerResource\Pages;

use App\Filament\Resources\CareerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCareers extends ListRecords
{
    use \Filament\Resources\Pages\ListRecords\Concerns\Translatable;

    protected static string $resource = CareerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}


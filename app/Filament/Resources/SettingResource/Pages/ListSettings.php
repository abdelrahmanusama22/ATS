<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
<<<<<<< Updated upstream
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;

class ListSettings extends ListRecords
{
    use Translatable;

=======

class ListSettings extends ListRecords
{
>>>>>>> Stashed changes
    protected static string $resource = SettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
<<<<<<< Updated upstream
            \Filament\Actions\LocaleSwitcher::make(),
=======
>>>>>>> Stashed changes
            Actions\CreateAction::make(),
        ];
    }
}

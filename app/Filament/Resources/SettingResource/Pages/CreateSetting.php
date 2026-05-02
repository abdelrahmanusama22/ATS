<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
<<<<<<< Updated upstream
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateSetting extends CreateRecord
{
    use Translatable;

    protected static string $resource = SettingResource::class;
    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\LocaleSwitcher::make(),
        ];
    }
=======
use Filament\Resources\Pages\CreateRecord;

class CreateSetting extends CreateRecord
{
    protected static string $resource = SettingResource::class;
>>>>>>> Stashed changes
}

<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
<<<<<<< Updated upstream
use Filament\Resources\Pages\EditRecord\Concerns\Translatable;

class EditSetting extends EditRecord
{
    use Translatable;

=======

class EditSetting extends EditRecord
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
            Actions\DeleteAction::make(),
        ];
    }
}

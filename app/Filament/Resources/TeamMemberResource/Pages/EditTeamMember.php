<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\TeamMemberResource\Pages;

use App\Filament\Resources\TeamMemberResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTeamMember extends EditRecord
{
    use \Filament\Resources\Pages\EditRecord\Concerns\Translatable;

    protected static string $resource = TeamMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

=======
namespace App\Filament\Resources\TeamMemberResource\Pages;
use App\Filament\Resources\TeamMemberResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
class EditTeamMember extends EditRecord { use EditRecord\Concerns\Translatable; protected static string $resource = TeamMemberResource::class; protected function getHeaderActions(): array { return [Actions\LocaleSwitcher::make(), Actions\DeleteAction::make()]; } }
>>>>>>> Stashed changes

<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\TeamMemberResource\Pages;

use App\Filament\Resources\TeamMemberResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTeamMembers extends ListRecords
{
    use \Filament\Resources\Pages\ListRecords\Concerns\Translatable;

    protected static string $resource = TeamMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}

=======
namespace App\Filament\Resources\TeamMemberResource\Pages;
use App\Filament\Resources\TeamMemberResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
class ListTeamMembers extends ListRecords { use ListRecords\Concerns\Translatable; protected static string $resource = TeamMemberResource::class; protected function getHeaderActions(): array { return [Actions\LocaleSwitcher::make(), Actions\CreateAction::make()]; } }
>>>>>>> Stashed changes

<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\TimelineEventResource\Pages;

use App\Filament\Resources\TimelineEventResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;
use Filament\Resources\Pages\ListRecords;

class ListTimelineEvents extends ListRecords
{
    protected static string $resource = TimelineEventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

=======
namespace App\Filament\Resources\TimelineEventResource\Pages;
use App\Filament\Resources\TimelineEventResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
class ListTimelineEvents extends ListRecords { use ListRecords\Concerns\Translatable; protected static string $resource = TimelineEventResource::class; protected function getHeaderActions(): array { return [Actions\LocaleSwitcher::make(), Actions\CreateAction::make()]; } }
>>>>>>> Stashed changes

<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\TimelineEventResource\Pages;

use App\Filament\Resources\TimelineEventResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;
use Filament\Resources\Pages\CreateRecord;

class CreateTimelineEvent extends CreateRecord
{
    protected static string $resource = TimelineEventResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}

=======
namespace App\Filament\Resources\TimelineEventResource\Pages;
use App\Filament\Resources\TimelineEventResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
class CreateTimelineEvent extends CreateRecord { use CreateRecord\Concerns\Translatable; protected static string $resource = TimelineEventResource::class; protected function getHeaderActions(): array { return [Actions\LocaleSwitcher::make()]; } }
>>>>>>> Stashed changes

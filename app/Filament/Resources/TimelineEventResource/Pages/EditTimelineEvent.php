<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\TimelineEventResource\Pages;

use App\Filament\Resources\TimelineEventResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord\Concerns\Translatable;
use Filament\Resources\Pages\EditRecord;

class EditTimelineEvent extends EditRecord
{
    protected static string $resource = TimelineEventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

=======
namespace App\Filament\Resources\TimelineEventResource\Pages;
use App\Filament\Resources\TimelineEventResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
class EditTimelineEvent extends EditRecord { use EditRecord\Concerns\Translatable; protected static string $resource = TimelineEventResource::class; protected function getHeaderActions(): array { return [Actions\LocaleSwitcher::make(), Actions\DeleteAction::make()]; } }
>>>>>>> Stashed changes

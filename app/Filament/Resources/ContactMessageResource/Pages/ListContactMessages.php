<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\ContactMessageResource\Pages;

use App\Filament\Resources\ContactMessageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContactMessages extends ListRecords
{
    protected static string $resource = ContactMessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
=======
namespace App\Filament\Resources\ContactMessageResource\Pages;
use App\Filament\Resources\ContactMessageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
class ListContactMessages extends ListRecords { protected static string $resource = ContactMessageResource::class; protected function getHeaderActions(): array { return [Actions\CreateAction::make()]; } }
>>>>>>> Stashed changes

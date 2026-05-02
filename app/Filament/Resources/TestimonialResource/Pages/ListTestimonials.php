<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\TestimonialResource\Pages;

use App\Filament\Resources\TestimonialResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;
use Filament\Resources\Pages\ListRecords;

class ListTestimonials extends ListRecords
{
    protected static string $resource = TestimonialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

=======
namespace App\Filament\Resources\TestimonialResource\Pages;
use App\Filament\Resources\TestimonialResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
class ListTestimonials extends ListRecords { use ListRecords\Concerns\Translatable; protected static string $resource = TestimonialResource::class; protected function getHeaderActions(): array { return [Actions\LocaleSwitcher::make(), Actions\CreateAction::make()]; } }
>>>>>>> Stashed changes

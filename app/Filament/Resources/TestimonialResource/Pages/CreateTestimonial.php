<?php
<<<<<<< Updated upstream

namespace App\Filament\Resources\TestimonialResource\Pages;

use App\Filament\Resources\TestimonialResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;
use Filament\Resources\Pages\CreateRecord;

class CreateTestimonial extends CreateRecord
{
    protected static string $resource = TestimonialResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}

=======
namespace App\Filament\Resources\TestimonialResource\Pages;
use App\Filament\Resources\TestimonialResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
class CreateTestimonial extends CreateRecord { use CreateRecord\Concerns\Translatable; protected static string $resource = TestimonialResource::class; protected function getHeaderActions(): array { return [Actions\LocaleSwitcher::make()]; } }
>>>>>>> Stashed changes

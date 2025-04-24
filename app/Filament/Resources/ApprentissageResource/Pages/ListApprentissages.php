<?php

namespace App\Filament\Resources\ApprentissageResource\Pages;

use App\Filament\Resources\ApprentissageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListApprentissages extends ListRecords
{
    protected static string $resource = ApprentissageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\TechnicalWorkingGroupResource\Pages;

use App\Filament\Resources\TechnicalWorkingGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTechnicalWorkingGroup extends EditRecord
{
    protected static string $resource = TechnicalWorkingGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

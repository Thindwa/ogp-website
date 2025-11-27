<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEvent extends EditRecord
{
    protected static string $resource = EventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $user = auth()->user();

        // TWG managers cannot publish - force to pending if they try
        if ($user->isTWGManager() && isset($data['status']) && $data['status'] === 'published') {
            $data['status'] = 'pending';
            $data['is_published'] = false;
        }

        return $data;
    }
}

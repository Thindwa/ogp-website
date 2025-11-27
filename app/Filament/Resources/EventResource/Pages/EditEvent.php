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
        } else {
            // For admins: Auto-set published_at if status is published and published_at is not set
            if (isset($data['status']) && $data['status'] === 'published' && empty($data['published_at'])) {
                $data['published_at'] = now();
            }
        }

        return $data;
    }
}

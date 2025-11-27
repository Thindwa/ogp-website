<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = auth()->user();

        // Ensure technical_working_group_id is set for TWG managers
        if ($user->isTWGManager() && !isset($data['technical_working_group_id'])) {
            $data['technical_working_group_id'] = $user->technical_working_group_id;
        }

        // TWG managers can only create as draft or pending, never published
        if ($user->isTWGManager()) {
            if (!isset($data['status']) || $data['status'] === 'published') {
                $data['status'] = 'pending';
            }
            // Also set is_published to false
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

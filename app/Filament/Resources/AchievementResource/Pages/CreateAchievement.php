<?php

namespace App\Filament\Resources\AchievementResource\Pages;

use App\Filament\Resources\AchievementResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAchievement extends CreateRecord
{
    protected static string $resource = AchievementResource::class;

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
        }

        return $data;
    }
}

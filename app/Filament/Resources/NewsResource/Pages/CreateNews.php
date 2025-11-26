<?php

namespace App\Filament\Resources\NewsResource\Pages;

use App\Filament\Resources\NewsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNews extends CreateRecord
{
    protected static string $resource = NewsResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = auth()->user();

        // Ensure technical_working_group_id is set for TWG managers
        if ($user->isTWGManager() && !isset($data['technical_working_group_id'])) {
            $data['technical_working_group_id'] = $user->technical_working_group_id;
        }

        return $data;
    }
}

<?php

namespace App\Filament\Resources\DocumentResource\Pages;

use App\Filament\Resources\DocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDocument extends EditRecord
{
    protected static string $resource = DocumentResource::class;

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
            $data['is_public'] = false;
        }

        return $data;
    }
}

<?php

namespace App\Filament\Resources\GalleryItemResource\Pages;

use App\Filament\Resources\GalleryItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGalleryItem extends EditRecord
{
    protected static string $resource = GalleryItemResource::class;

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
            $data['is_active'] = false;
        }

        return $data;
    }
}

<?php

namespace App\Filament\Resources\AboutPageResource\Pages;

use App\Filament\Resources\AboutPageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAboutPage extends CreateRecord
{
    protected static string $resource = AboutPageResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // The steering_committee_membership field should already be updated by the live callbacks
        // Just ensure it's properly formatted
        if (isset($data['steering_committee_membership']) && is_array($data['steering_committee_membership'])) {
            // Clean up any empty values
            foreach ($data['steering_committee_membership'] as $key => $value) {
                if (is_array($value)) {
                    $data['steering_committee_membership'][$key] = array_values(array_filter($value));
                }
            }
        }
        
        // Remove temporary fields
        unset($data['gov_institutions_temp'], $data['cso_organizations_temp'], $data['ex_officio_temp']);
        
        return $data;
    }
}

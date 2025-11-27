<?php

namespace App\Filament\Resources\AboutPageResource\Pages;

use App\Filament\Resources\AboutPageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAboutPage extends EditRecord
{
    protected static string $resource = AboutPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Populate temporary fields from steering_committee_membership
        if (isset($data['steering_committee_membership']) && is_array($data['steering_committee_membership'])) {
            $membership = $data['steering_committee_membership'];
            
            // Convert government_institutions array to repeater format
            if (isset($membership['government_institutions']) && is_array($membership['government_institutions'])) {
                $data['gov_institutions_temp'] = array_map(function ($item) {
                    return ['name' => is_string($item) ? $item : ($item['name'] ?? $item)];
                }, $membership['government_institutions']);
            }
            
            // Convert civil_society_organizations array to repeater format
            if (isset($membership['civil_society_organizations']) && is_array($membership['civil_society_organizations'])) {
                $data['cso_organizations_temp'] = array_map(function ($item) {
                    return ['name' => is_string($item) ? $item : ($item['name'] ?? $item)];
                }, $membership['civil_society_organizations']);
            }
            
            // Convert ex_officio_members array to repeater format
            if (isset($membership['ex_officio_members']) && is_array($membership['ex_officio_members'])) {
                $data['ex_officio_temp'] = array_map(function ($item) {
                    return ['name' => is_string($item) ? $item : ($item['name'] ?? $item)];
                }, $membership['ex_officio_members']);
            }
        }
        
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
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

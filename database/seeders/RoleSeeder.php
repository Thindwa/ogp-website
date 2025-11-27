<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Create or get roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $twgManagerRole = Role::firstOrCreate(['name' => 'twg_manager']);
        $contentManagerRole = Role::firstOrCreate(['name' => 'content_manager']);

        // Get all permissions
        $allPermissions = Permission::all();

        // Admin gets all permissions
        $adminRole->givePermissionTo($allPermissions);

        // Content Manager permissions (home page, about page, general content)
        $contentManagerPermissions = [
            'view_home::page',
            'view_any_home::page',
            'create_home::page',
            'update_home::page',
            'delete_home::page',
            'view_home::slider',
            'view_any_home::slider',
            'create_home::slider',
            'update_home::slider',
            'delete_home::slider',
            'view_about::page',
            'view_any_about::page',
            'create_about::page',
            'update_about::page',
            'delete_about::page',
        ];
        $contentManagerRole->givePermissionTo($contentManagerPermissions);

        // TWG Manager permissions (limited to their TWG content)
        $twgManagerPermissions = [
            'view_technical::working::group',
            'update_technical::working::group',
            'view_event',
            'view_any_event',
            'create_event',
            'update_event',
            'delete_event',
            'view_achievement',
            'view_any_achievement',
            'create_achievement',
            'update_achievement',
            'delete_achievement',
            'view_document',
            'view_any_document',
            'create_document',
            'update_document',
            'delete_document',
            'view_gallery::item',
            'view_any_gallery::item',
            'create_gallery::item',
            'update_gallery::item',
            'delete_gallery::item',
            'view_highlight',
            'view_any_highlight',
            'create_highlight',
            'update_highlight',
            'delete_highlight',
        ];
        $twgManagerRole->givePermissionTo($twgManagerPermissions);
    }
}

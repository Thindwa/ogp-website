<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Create roles safely
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $twgManagerRole = Role::firstOrCreate(['name' => 'twg_manager', 'guard_name' => 'web']);
        $contentManagerRole = Role::firstOrCreate(['name' => 'content_manager', 'guard_name' => 'web']);

        // Get all permissions
        $allPermissions = Permission::all();

        // Admin gets all permissions
        $adminRole->syncPermissions($allPermissions);

        // Content Manager permissions
        $contentManagerPermissions = Permission::whereIn('name', [
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
        ])->get();
        $contentManagerRole->syncPermissions($contentManagerPermissions);

        // TWG Manager permissions
        $twgManagerPermissions = Permission::whereIn('name', [
            'view_technical::working::group',
            'update_technical::working::group',
            'view_news',
            'view_any_news',
            'create_news',
            'update_news',
            'delete_news',
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
        ])->get();
        $twgManagerRole->syncPermissions($twgManagerPermissions);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
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
            'view_technical::working::group',
            'update_technical::working::group',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate([
                'name' => $perm,
                'guard_name' => 'web',
            ]);
        }
    }
}

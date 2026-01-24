<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\TechnicalWorkingGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $twgs = TechnicalWorkingGroup::all();

        // Main admin user
        $admin = User::updateOrCreate(
            ['email' => 'admin@ogp.mw'],
            [
                'name' => 'OGP Admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // TWG users
        $twgUsers = [
            ['name' => 'Anti-Corruption TWG Manager', 'email' => 'anticorruption@ogp.mw'],
            ['name' => 'Access to Information TWG Manager', 'email' => 'accesstoinfo@ogp.mw'],
            ['name' => 'Digital Governance TWG Manager', 'email' => 'digitalgovernance@ogp.mw'],
            ['name' => 'Natural Resources TWG Manager', 'email' => 'naturalresources@ogp.mw'],
            ['name' => 'Open Parliament TWG Manager', 'email' => 'openparliament@ogp.mw'],
        ];

        foreach ($twgUsers as $index => $data) {
            $user = User::updateOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => Hash::make('password'),
                    'role' => 'twg_manager',
                    'email_verified_at' => now(),
                ]
            );

            // Assign TWG
            if ($twgs->count() > $index) {
                $user->update(['technical_working_group_id' => $twgs[$index]->id]);
            }
        }

        // General content manager
        User::updateOrCreate(
            ['email' => 'content@ogp.mw'],
            [
                'name' => 'Content Manager',
                'password' => Hash::make('password'),
                'role' => 'content_manager',
                'email_verified_at' => now(),
            ]
        );
    }
}

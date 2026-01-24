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

        // --- Main Admin User ---
        $admin = User::updateOrCreate(
            ['email' => 'admin@ogp.mw'],
            [
                'name' => 'OGP Admin',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        $admin->assignRole('admin');

        // --- TWG Manager Users ---
        $twgUsers = [
            [
                'name' => 'Anti-Corruption TWG Manager',
                'email' => 'anticorruption@ogp.mw',
                'role' => 'twg_manager',
            ],
            [
                'name' => 'Access to Information TWG Manager',
                'email' => 'accesstoinfo@ogp.mw',
                'role' => 'twg_manager',
            ],
            [
                'name' => 'Digital Governance TWG Manager',
                'email' => 'digitalgovernance@ogp.mw',
                'role' => 'twg_manager',
            ],
            [
                'name' => 'Natural Resources TWG Manager',
                'email' => 'naturalresources@ogp.mw',
                'role' => 'twg_manager',
            ],
            [
                'name' => 'Open Parliament TWG Manager',
                'email' => 'openparliament@ogp.mw',
                'role' => 'twg_manager',
            ],
        ];

        foreach ($twgUsers as $index => $data) {
            $user = User::updateOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => Hash::make('password'),
                    'email_verified_at' => now(),
                ]
            );

            // Assign role
            $user->assignRole($data['role']);

            // Assign TWG if available
            if ($twgs->count() > $index) {
                $user->update(['technical_working_group_id' => $twgs[$index]->id]);
            }
        }

        // --- General Content Manager ---
        $contentManager = User::updateOrCreate(
            ['email' => 'content@ogp.mw'],
            [
                'name' => 'Content Manager',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        $contentManager->assignRole('content_manager');
    }
}

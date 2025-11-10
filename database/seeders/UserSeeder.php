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
        // Get TWGs for assignment
        $twgs = TechnicalWorkingGroup::all();

        // Create main admin user
        User::create([
            'name' => 'OGP Admin',
            'email' => 'admin@ogp.mw',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Create TWG users for each Technical Working Group
        $twgUsers = [
            [
                'name' => 'Anti-Corruption TWG Manager',
                'email' => 'anticorruption@ogp.mw',
                'password' => Hash::make('password'),
                'role' => 'twg_manager',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Access to Information TWG Manager',
                'email' => 'accesstoinfo@ogp.mw',
                'password' => Hash::make('password'),
                'role' => 'twg_manager',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Digital Governance TWG Manager',
                'email' => 'digitalgovernance@ogp.mw',
                'password' => Hash::make('password'),
                'role' => 'twg_manager',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Natural Resources TWG Manager',
                'email' => 'naturalresources@ogp.mw',
                'password' => Hash::make('password'),
                'role' => 'twg_manager',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Open Parliament TWG Manager',
                'email' => 'openparliament@ogp.mw',
                'password' => Hash::make('password'),
                'role' => 'twg_manager',
                'email_verified_at' => now(),
            ],
        ];

        foreach ($twgUsers as $index => $userData) {
            $user = User::create($userData);
            // Assign TWG if available
            if ($twgs->count() > $index) {
                $user->update(['technical_working_group_id' => $twgs[$index]->id]);
            }
        }

        // Create a general content manager
        User::create([
            'name' => 'Content Manager',
            'email' => 'content@ogp.mw',
            'password' => Hash::make('password'),
            'role' => 'content_manager',
            'email_verified_at' => now(),
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\FooterSettings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if footer settings already exist
        $existing = FooterSettings::where('is_active', true)->first();

        if (!$existing) {
            FooterSettings::create([
                'organization_name' => 'OGP Malawi',
                'description' => 'Promoting transparency, accountability, and citizen participation in government through collaborative initiatives and innovative solutions.',
                'quick_links' => [
                    [
                        'title' => 'About OGP',
                        'url' => '/about',
                    ],
                    [
                        'title' => 'Working Groups',
                        'url' => '/technical-group',
                    ],
                    [
                        'title' => 'Achievements',
                        'url' => '/achievements',
                    ],
                    [
                        'title' => 'Documents',
                        'url' => '/documents',
                    ],
                    [
                        'title' => 'Events',
                        'url' => '/events',
                    ],
                    [
                        'title' => 'Gallery',
                        'url' => '/gallery',
                    ],
                ],
                'address' => 'Lilongwe, Malawi',
                'address_detail' => 'Government Complex',
                'email' => 'info@ogp.mw',
                'phone' => '+265 1 123 456',
                'website' => 'https://www.ogp.mw',
                'facebook_url' => null,
                'twitter_url' => null,
                'linkedin_url' => null,
                'youtube_url' => null,
                'is_active' => true,
            ]);

            $this->command->info('Footer settings seeded successfully!');
        } else {
            $this->command->info('Footer settings already exist. Skipping seed.');
        }
    }
}

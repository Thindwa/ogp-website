<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            TechnicalWorkingGroupSeeder::class,
            HomePageSeeder::class,
            AboutPageSeeder::class,
            HomeSliderSeeder::class,
            NewsSeeder::class,
            AchievementSeeder::class,
            DocumentSeeder::class,
            GalleryItemSeeder::class,
            PageSectionSeeder::class,
        ]);
    }
}

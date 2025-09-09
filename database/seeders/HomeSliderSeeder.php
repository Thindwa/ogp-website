<?php

namespace Database\Seeders;

use App\Models\HomeSlider;
use Illuminate\Database\Seeder;

class HomeSliderSeeder extends Seeder
{
    public function run(): void
    {
        $sliders = [
            [
                'title' => 'President at the Launch',
                'subtitle' => 'Official Opening Ceremony',
                'description' => 'Captured during the official opening ceremony of OGP Malawi initiatives',
                'image' => 'he.jpg',
                'button_text' => 'Learn More',
                'button_url' => '/about',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Open Government Week',
                'subtitle' => 'Transparency and Collaboration',
                'description' => 'Showcasing transparency and collaboration in public service delivery',
                'image' => 'openweek.jpg',
                'button_text' => 'View Events',
                'button_url' => '/gallery',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'President Chakwera\'s Address',
                'subtitle' => 'Commitment to Openness',
                'description' => 'Highlighting the government\'s commitment to openness and transparency',
                'image' => 'he-chakwera.jpg',
                'button_text' => 'Read Speech',
                'button_url' => '/downloads',
                'is_active' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($sliders as $slider) {
            HomeSlider::create($slider);
        }
    }
}

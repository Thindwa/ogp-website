<?php

namespace Database\Seeders;

use App\Models\GalleryItem;
use App\Models\TechnicalWorkingGroup;
use Illuminate\Database\Seeder;

class GalleryItemSeeder extends Seeder
{
    public function run(): void
    {
        $twgs = TechnicalWorkingGroup::all();

        if ($twgs->isEmpty()) {
            $this->command->warn('No Technical Working Groups found. Please run TechnicalWorkingGroupSeeder first.');
            return;
        }

        $galleryItems = [
            [
                'title' => 'OGP Global Summit 2024 - Malawi Delegation',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Malawi delegation at the Open Government Partnership Global Summit 2024, showcasing the country\'s progress in open government initiatives.',
                'category' => 'Conferences',
                'image_path' => 'gallery/ogp-summit-2024-malawi-delegation.jpg',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Citizen Budget Consultation Workshop',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Community workshop on citizen budget consultation, where citizens provided input on national budget priorities and allocations.',
                'category' => 'Workshops',
                'image_path' => 'gallery/citizen-budget-consultation-workshop.jpg',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Open Data Portal Launch Event',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Official launch of Malawi\'s Open Data Portal, attended by government officials, civil society representatives, and citizens.',
                'category' => 'Events',
                'image_path' => 'gallery/open-data-portal-launch.jpg',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'TWG Monthly Meeting - March 2024',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Technical Working Group monthly meeting discussing progress on OGP commitments and upcoming initiatives.',
                'category' => 'Meetings',
                'image_path' => 'gallery/twg-meeting-march-2024.jpg',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Digital Government Services Training',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Training session for government officials on digital government services and citizen engagement platforms.',
                'category' => 'Workshops',
                'image_path' => 'gallery/digital-government-training.jpg',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Civil Society Partnership Signing',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Official signing ceremony of the partnership agreement between government and civil society organizations.',
                'category' => 'Events',
                'image_path' => 'gallery/civil-society-partnership-signing.jpg',
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'title' => 'Regional OGP Learning Exchange',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Malawi hosting regional Open Government Partnership learning exchange with representatives from 12 African countries.',
                'category' => 'Conferences',
                'image_path' => 'gallery/regional-ogp-learning-exchange.jpg',
                'sort_order' => 7,
                'is_active' => true,
            ],
            [
                'title' => 'Anti-Corruption Workshop',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Workshop on anti-corruption measures and transparency initiatives for government officials and civil society representatives.',
                'category' => 'Workshops',
                'image_path' => 'gallery/anti-corruption-workshop.jpg',
                'sort_order' => 8,
                'is_active' => true,
            ],
            [
                'title' => 'Community Monitoring Training',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Training community members on monitoring public projects and providing feedback to government agencies.',
                'category' => 'Workshops',
                'image_path' => 'gallery/community-monitoring-training.jpg',
                'sort_order' => 9,
                'is_active' => true,
            ],
            [
                'title' => 'TWG Strategic Planning Session',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Strategic planning session for Technical Working Groups to develop action plans for the upcoming year.',
                'category' => 'Meetings',
                'image_path' => 'gallery/twg-strategic-planning.jpg',
                'sort_order' => 10,
                'is_active' => true,
            ],
            [
                'title' => 'Open Contracting Data Standard Workshop',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Workshop on implementing the Open Contracting Data Standard to improve procurement transparency.',
                'category' => 'Workshops',
                'image_path' => 'gallery/open-contracting-workshop.jpg',
                'sort_order' => 11,
                'is_active' => true,
            ],
            [
                'title' => 'Citizen Engagement Forum',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Public forum where citizens engaged with government officials on transparency and accountability issues.',
                'category' => 'Events',
                'image_path' => 'gallery/citizen-engagement-forum.jpg',
                'sort_order' => 12,
                'is_active' => true,
            ],
            [
                'title' => 'Digital Service Center Opening',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Opening ceremony of a new digital service center in a rural area, providing citizens with access to government services.',
                'category' => 'Events',
                'image_path' => 'gallery/digital-service-center-opening.jpg',
                'sort_order' => 13,
                'is_active' => true,
            ],
            [
                'title' => 'TWG Progress Review Meeting',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Quarterly progress review meeting to assess implementation of OGP commitments and identify challenges.',
                'category' => 'Meetings',
                'image_path' => 'gallery/twg-progress-review.jpg',
                'sort_order' => 14,
                'is_active' => true,
            ],
            [
                'title' => 'Transparency Awards Ceremony',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Annual awards ceremony recognizing government agencies and individuals for outstanding contributions to transparency and accountability.',
                'category' => 'Events',
                'image_path' => 'gallery/transparency-awards-ceremony.jpg',
                'sort_order' => 15,
                'is_active' => true,
            ],
        ];

        foreach ($galleryItems as $item) {
            if (!isset($item['slug'])) {
                $item['slug'] = \Illuminate\Support\Str::slug($item['title']);
            }
            GalleryItem::create($item);
        }

        $this->command->info('Gallery items seeded successfully!');
    }
}

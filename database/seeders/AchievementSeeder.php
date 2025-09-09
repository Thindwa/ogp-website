<?php

namespace Database\Seeders;

use App\Models\Achievement;
use App\Models\TechnicalWorkingGroup;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    public function run(): void
    {
        $twgs = TechnicalWorkingGroup::all();

        if ($twgs->isEmpty()) {
            $this->command->warn('No Technical Working Groups found. Please run TechnicalWorkingGroupSeeder first.');
            return;
        }

        $achievements = [
            [
                'title' => 'Open Data Portal Launch',
                'slug' => 'open-data-portal-launch',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Successfully launched Malawi\'s first comprehensive open data portal, providing citizens with access to government datasets, budget information, and development project data. The portal features interactive dashboards and real-time updates on key government initiatives.',
                'submitted_year' => 2024,
                'policy_area' => 'Digital Government',
                'is_featured' => true,
            ],
            [
                'title' => 'Citizen Budget Consultation Implementation',
                'slug' => 'citizen-budget-consultation-implementation',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Implemented the first-ever citizen budget consultation process in Malawi, allowing citizens to provide input on national budget priorities through online platforms, community meetings, and mobile surveys. This initiative increased citizen participation in fiscal decision-making.',
                'submitted_year' => 2024,
                'policy_area' => 'Fiscal Transparency',
                'is_featured' => true,
            ],
            [
                'title' => 'Digital Government Services Expansion',
                'slug' => 'digital-government-services-expansion',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Expanded digital government services to rural areas, ensuring all citizens have access to essential public services regardless of location. Established digital service centers and trained local officials to support citizen access to online services.',
                'submitted_year' => 2023,
                'policy_area' => 'Digital Inclusion',
                'is_featured' => true,
            ],
            [
                'title' => 'Open Contracting Data Standard Implementation',
                'slug' => 'open-contracting-data-standard-implementation',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Successfully implemented the Open Contracting Data Standard (OCDS) to improve transparency in public procurement. Created a public procurement portal with searchable data, real-time contract updates, and citizen feedback mechanisms.',
                'submitted_year' => 2023,
                'policy_area' => 'Procurement Transparency',
                'is_featured' => true,
            ],
            [
                'title' => 'Anti-Corruption Digital Systems',
                'slug' => 'anti-corruption-digital-systems',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Developed and implemented digital systems to combat corruption, including enhanced financial controls, improved procurement processes, and strengthened oversight mechanisms. These systems have significantly improved transparency and reduced corruption opportunities.',
                'submitted_year' => 2023,
                'policy_area' => 'Anti-Corruption',
                'is_featured' => false,
            ],
            [
                'title' => 'Civil Society Partnership Framework',
                'slug' => 'civil-society-partnership-framework',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Established a comprehensive partnership framework between government and civil society organizations to enhance transparency and accountability. The framework includes community monitoring, citizen feedback mechanisms, and participatory policy development.',
                'submitted_year' => 2022,
                'policy_area' => 'Citizen Engagement',
                'is_featured' => false,
            ],
            [
                'title' => 'Regional OGP Leadership',
                'slug' => 'regional-ogp-leadership',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Malawi hosted a successful regional Open Government Partnership learning exchange, bringing together representatives from 12 African countries to share best practices and lessons learned in implementing open government initiatives.',
                'submitted_year' => 2022,
                'policy_area' => 'International Cooperation',
                'is_featured' => false,
            ],
            [
                'title' => 'Transparency in Health Sector',
                'slug' => 'transparency-health-sector',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Implemented transparency measures in the health sector, including public reporting on health service delivery, budget allocations, and performance metrics. This initiative improved accountability and citizen trust in health services.',
                'submitted_year' => 2022,
                'policy_area' => 'Health Transparency',
                'is_featured' => false,
            ],
            [
                'title' => 'Education Sector Open Data',
                'slug' => 'education-sector-open-data',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Launched open data initiatives in the education sector, providing public access to school performance data, teacher deployment information, and infrastructure development updates. This transparency improved education planning and citizen oversight.',
                'submitted_year' => 2021,
                'policy_area' => 'Education Transparency',
                'is_featured' => false,
            ],
            [
                'title' => 'Land Administration Transparency',
                'slug' => 'land-administration-transparency',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Improved transparency in land administration through digital land registration systems, public access to land records, and streamlined land transaction processes. This initiative reduced land disputes and improved service delivery.',
                'submitted_year' => 2021,
                'policy_area' => 'Land Governance',
                'is_featured' => false,
            ],
        ];

        foreach ($achievements as $achievement) {
            Achievement::create($achievement);
        }

        $this->command->info('Achievements seeded successfully!');
    }
}

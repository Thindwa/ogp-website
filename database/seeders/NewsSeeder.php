<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\TechnicalWorkingGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $twgs = TechnicalWorkingGroup::all();

        if ($twgs->isEmpty()) {
            $this->command->warn('No Technical Working Groups found. Please run TechnicalWorkingGroupSeeder first.');
            return;
        }

        $newsData = [
            [
                'title' => 'Malawi Launches New Open Data Portal',
                'slug' => 'malawi-launches-new-open-data-portal',
                'technical_working_group_id' => $twgs->random()->id,
                'author' => 'OGP Secretariat',
                'content' => '<p>Malawi has officially launched its new Open Data Portal, marking a significant milestone in the country\'s commitment to transparency and accountability. The portal provides citizens with easy access to government data, including budget information, development projects, and public service delivery metrics.</p><p>The portal features interactive dashboards, downloadable datasets, and real-time updates on key government initiatives. This initiative is part of Malawi\'s Third OGP National Action Plan and represents a major step forward in promoting data-driven governance.</p><p>Citizens can now access information on:</p><ul><li>Government budgets and expenditures</li><li>Development project progress</li><li>Public service delivery statistics</li><li>Health and education sector data</li><li>Infrastructure development updates</li></ul>',
                'published_at' => now()->subDays(5),
                'is_published' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Civil Society Organizations Partner with Government on Transparency Initiative',
                'slug' => 'civil-society-organizations-partner-government-transparency',
                'technical_working_group_id' => $twgs->random()->id,
                'author' => 'Transparency International Malawi',
                'content' => '<p>Leading civil society organizations in Malawi have announced a new partnership with the government to enhance transparency and accountability in public service delivery. The initiative focuses on citizen engagement and participatory governance.</p><p>Key areas of collaboration include:</p><ul><li>Community monitoring of public projects</li><li>Citizen feedback mechanisms</li><li>Transparency in procurement processes</li><li>Public participation in policy development</li></ul><p>This partnership represents a significant step forward in Malawi\'s open government journey and demonstrates the commitment of both government and civil society to work together for the benefit of all citizens.</p>',
                'published_at' => now()->subDays(12),
                'is_published' => true,
                'is_featured' => false,
            ],
            [
                'title' => 'New Anti-Corruption Measures Implemented Across Government',
                'slug' => 'new-anti-corruption-measures-implemented-government',
                'technical_working_group_id' => $twgs->random()->id,
                'author' => 'Anti-Corruption Bureau',
                'content' => '<p>The Government of Malawi has implemented new anti-corruption measures as part of its commitment to the Open Government Partnership. These measures include enhanced financial controls, improved procurement processes, and strengthened oversight mechanisms.</p><p>Key initiatives include:</p><ul><li>Digital procurement system with real-time monitoring</li><li>Enhanced financial reporting requirements</li><li>Strengthened audit processes</li><li>Citizen reporting mechanisms for corruption</li><li>Training programs for public officials</li></ul><p>These measures are expected to significantly improve transparency and reduce opportunities for corruption in public service delivery.</p>',
                'published_at' => now()->subDays(18),
                'is_published' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Malawi Hosts Regional OGP Learning Exchange',
                'slug' => 'malawi-hosts-regional-ogp-learning-exchange',
                'technical_working_group_id' => $twgs->random()->id,
                'author' => 'OGP Secretariat',
                'content' => '<p>Malawi recently hosted a regional Open Government Partnership learning exchange, bringing together representatives from 12 African countries to share best practices and lessons learned in implementing open government initiatives.</p><p>The three-day event featured:</p><ul><li>Panel discussions on transparency and accountability</li><li>Workshops on citizen engagement</li><li>Case study presentations</li><li>Networking opportunities</li><li>Site visits to successful projects</li></ul><p>Participants praised Malawi\'s progress in implementing OGP commitments and expressed interest in adopting similar approaches in their own countries.</p>',
                'published_at' => now()->subDays(25),
                'is_published' => true,
                'is_featured' => false,
            ],
            [
                'title' => 'Digital Government Services Expand to Rural Areas',
                'slug' => 'digital-government-services-expand-rural-areas',
                'technical_working_group_id' => $twgs->random()->id,
                'author' => 'Ministry of Information and Digitalization',
                'content' => '<p>The Government of Malawi has expanded its digital government services to rural areas, ensuring that all citizens have access to essential public services regardless of their location. This initiative is part of the country\'s commitment to digital inclusion and open government.</p><p>New services include:</p><ul><li>Online birth and death certificate applications</li><li>Digital land registration</li><li>Mobile payment systems for government fees</li><li>Online business registration</li><li>Digital health records</li></ul><p>The expansion includes the establishment of digital service centers in rural areas and training programs for local government officials to support citizens in accessing these services.</p>',
                'published_at' => now()->subDays(32),
                'is_published' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Citizen Budget Consultation Process Launched',
                'slug' => 'citizen-budget-consultation-process-launched',
                'technical_working_group_id' => $twgs->random()->id,
                'author' => 'Ministry of Finance',
                'content' => '<p>For the first time in Malawi\'s history, citizens are being invited to participate in the national budget consultation process. This groundbreaking initiative allows citizens to provide input on budget priorities and allocations through various channels.</p><p>Citizens can participate through:</p><ul><li>Online consultation platform</li><li>Community meetings</li><li>Mobile phone surveys</li><li>Social media engagement</li><li>Written submissions</li></ul><p>This initiative represents a significant step forward in participatory budgeting and demonstrates the government\'s commitment to involving citizens in decision-making processes that affect their lives.</p>',
                'published_at' => now()->subDays(40),
                'is_published' => true,
                'is_featured' => false,
            ],
            [
                'title' => 'Open Contracting Data Standard Implementation Begins',
                'slug' => 'open-contracting-data-standard-implementation-begins',
                'technical_working_group_id' => $twgs->random()->id,
                'author' => 'Public Procurement and Disposal of Assets Authority',
                'content' => '<p>Malawi has begun implementing the Open Contracting Data Standard (OCDS) to improve transparency in public procurement. This initiative will make procurement data more accessible and understandable to citizens and businesses.</p><p>The implementation includes:</p><ul><li>Standardized data formats for procurement information</li><li>Public procurement portal with searchable data</li><li>Real-time updates on contract awards</li><li>Performance monitoring of contractors</li><li>Citizen feedback mechanisms</li></ul><p>This initiative is expected to reduce corruption in procurement processes and improve the quality of public services through better contractor accountability.</p>',
                'published_at' => now()->subDays(47),
                'is_published' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Malawi Receives International Recognition for Open Government Progress',
                'slug' => 'malawi-receives-international-recognition-open-government-progress',
                'technical_working_group_id' => $twgs->random()->id,
                'author' => 'OGP Secretariat',
                'content' => '<p>Malawi has received international recognition for its significant progress in implementing open government initiatives. The country was highlighted as a success story at the recent OGP Global Summit for its innovative approaches to citizen engagement and transparency.</p><p>Key achievements recognized include:</p><ul><li>Successful implementation of open data initiatives</li><li>Effective citizen engagement mechanisms</li><li>Transparent budget processes</li><li>Digital government service delivery</li><li>Anti-corruption measures</li></ul><p>This recognition reflects the hard work and dedication of government officials, civil society organizations, and citizens who have worked together to advance open government principles in Malawi.</p>',
                'published_at' => now()->subDays(55),
                'is_published' => true,
                'is_featured' => false,
            ],
        ];

        foreach ($newsData as $news) {
            News::create($news);
        }

        $this->command->info('News seeded successfully!');
    }
}

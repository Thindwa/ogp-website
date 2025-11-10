<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\TechnicalWorkingGroup;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    public function run(): void
    {
        $twgs = TechnicalWorkingGroup::all();

        if ($twgs->isEmpty()) {
            $this->command->warn('No Technical Working Groups found. Please run TechnicalWorkingGroupSeeder first.');
            return;
        }

        $documents = [
            [
                'title' => 'Malawi OGP Third National Action Plan 2024-2026',
                'slug' => 'malawi-ogp-third-national-action-plan-2024-2026',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'The Third National Action Plan outlines Malawi\'s commitments to open government, including transparency, accountability, and citizen engagement initiatives.',
                'category' => 'Policy Documents',
                'file_path' => 'documents/malawi-ogp-third-action-plan-2024-2026.pdf',
                'file_type' => 'PDF',
                'download_count' => 1250,
                'is_public' => true,
            ],
            [
                'title' => 'President\'s Speech at OGP Global Summit 2024',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'His Excellency Dr. Lazarus Chakwera\'s keynote address at the Open Government Partnership Global Summit, highlighting Malawi\'s progress in open government initiatives.',
                'category' => 'Speeches',
                'file_path' => 'documents/president-speech-ogp-summit-2024.pdf',
                'file_type' => 'PDF',
                'download_count' => 890,
                'is_public' => true,
            ],
            [
                'title' => 'OGP Malawi Annual Report 2023',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Comprehensive annual report detailing Malawi\'s achievements, challenges, and progress in implementing open government commitments during 2023.',
                'category' => 'Annual Reports',
                'file_path' => 'documents/ogp-malawi-annual-report-2023.pdf',
                'file_type' => 'PDF',
                'download_count' => 2100,
                'is_public' => true,
            ],
            [
                'title' => 'Open Data Policy Framework',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Policy framework establishing guidelines for government data publication, access, and use to promote transparency and innovation.',
                'category' => 'Policy Documents',
                'file_path' => 'documents/open-data-policy-framework.pdf',
                'file_type' => 'PDF',
                'download_count' => 750,
                'is_public' => true,
            ],
            [
                'title' => 'TWG Meeting Minutes - January 2024',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Minutes from the Technical Working Group meeting held in January 2024, covering progress updates and strategic planning discussions.',
                'category' => 'Meeting Minutes',
                'file_path' => 'documents/twg-meeting-minutes-january-2024.pdf',
                'file_type' => 'PDF',
                'download_count' => 340,
                'is_public' => true,
            ],
            [
                'title' => 'Citizen Engagement Guidelines',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Comprehensive guidelines for government agencies on effective citizen engagement practices and participatory governance mechanisms.',
                'category' => 'Policy Documents',
                'file_path' => 'documents/citizen-engagement-guidelines.pdf',
                'file_type' => 'PDF',
                'download_count' => 680,
                'is_public' => true,
            ],
            [
                'title' => 'Minister\'s Statement on Digital Government',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Statement by the Minister of Information and Digitalization on the government\'s digital transformation initiatives and open government commitments.',
                'category' => 'Speeches',
                'file_path' => 'documents/ministers-statement-digital-government.pdf',
                'file_type' => 'PDF',
                'download_count' => 420,
                'is_public' => true,
            ],
            [
                'title' => 'Procurement Transparency Report 2023',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Annual report on procurement transparency initiatives, including open contracting data standard implementation and public procurement portal statistics.',
                'category' => 'Annual Reports',
                'file_path' => 'documents/procurement-transparency-report-2023.pdf',
                'file_type' => 'PDF',
                'download_count' => 1560,
                'is_public' => true,
            ],
            [
                'title' => 'TWG Meeting Minutes - February 2024',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Minutes from the Technical Working Group meeting held in February 2024, focusing on implementation progress and upcoming initiatives.',
                'category' => 'Meeting Minutes',
                'file_path' => 'documents/twg-meeting-minutes-february-2024.pdf',
                'file_type' => 'PDF',
                'download_count' => 280,
                'is_public' => true,
            ],
            [
                'title' => 'Anti-Corruption Strategy Implementation Plan',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Detailed implementation plan for anti-corruption measures, including digital systems, oversight mechanisms, and citizen reporting tools.',
                'category' => 'Policy Documents',
                'file_path' => 'documents/anti-corruption-strategy-implementation.pdf',
                'file_type' => 'PDF',
                'download_count' => 920,
                'is_public' => true,
            ],
            [
                'title' => 'Civil Society Partnership Agreement',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Formal agreement between government and civil society organizations outlining collaboration frameworks for transparency and accountability initiatives.',
                'category' => 'Policy Documents',
                'file_path' => 'documents/civil-society-partnership-agreement.pdf',
                'file_type' => 'PDF',
                'download_count' => 640,
                'is_public' => true,
            ],
            [
                'title' => 'Budget Transparency Guidelines',
                'technical_working_group_id' => $twgs->random()->id,
                'description' => 'Guidelines for government agencies on budget transparency, including public reporting requirements and citizen consultation processes.',
                'category' => 'Policy Documents',
                'file_path' => 'documents/budget-transparency-guidelines.pdf',
                'file_type' => 'PDF',
                'download_count' => 780,
                'is_public' => true,
            ],
        ];

        foreach ($documents as $document) {
            if (!isset($document['slug'])) {
                $document['slug'] = \Illuminate\Support\Str::slug($document['title']);
            }
            Document::create($document);
        }

        $this->command->info('Documents seeded successfully!');
    }
}

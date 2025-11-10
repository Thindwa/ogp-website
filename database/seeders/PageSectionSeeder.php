<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PageSection;

class PageSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Home Page Sections
        $homeSections = [
            [
                'page' => 'home',
                'section_key' => 'mission',
                'title' => 'Our Mission',
                'subtitle' => 'Transparency & Accountability',
                'content' => 'To promote transparency, accountability, and citizen participation in government through collaborative initiatives and innovative solutions that strengthen democratic governance in Malawi.',
                'description' => 'We work to ensure that government processes are open, accessible, and responsive to citizens\' needs.',
                'icon' => 'fas fa-eye',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'page' => 'home',
                'section_key' => 'vision',
                'title' => 'Our Vision',
                'subtitle' => 'Open Government',
                'content' => 'A Malawi where government is open, transparent, and responsive to citizens\' needs, where public participation is meaningful and inclusive, and where accountability mechanisms ensure effective service delivery and good governance.',
                'description' => 'We envision a future where citizens actively participate in governance and hold government accountable.',
                'icon' => 'fas fa-rocket',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'page' => 'home',
                'section_key' => 'who_is_ogp',
                'title' => 'Who is in OGP?',
                'subtitle' => 'Global Partnership',
                'content' => 'The Open Government Partnership (OGP) includes 75 countries and 150 local governments, representing more than two billion people, and thousands of civil society organizations. These national governments and local jurisdictions work alongside thousands of civil society organizations to co-create two-year action plans. Each member submits a plan co-created with civil society that outlines concrete commitments to enhance transparency, accountability, and public participation in government.',
                'description' => 'OGP is a multilateral partnership that aims to secure concrete commitments from national governments to promote open government, active citizen participation, transparency, accountability, and the harnessing of new technologies to strengthen governance.',
                'icon' => 'fas fa-globe',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'page' => 'home',
                'section_key' => 'how_ogp_works',
                'title' => 'How Does OGP Work?',
                'subtitle' => 'Collaborative Process',
                'content' => 'The OGP is based on the idea that civil society and government co-create action plans with concrete commitments. These commitments are then credibly implemented with support from partner organizations either within the member country or globally.',
                'description' => 'The process begins when a state endorses the Open Government Declaration, signaling its commitment to transparency, access to information, and civic participation.',
                'icon' => 'fas fa-cogs',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'page' => 'home',
                'section_key' => 'malawi_ogp',
                'title' => 'When Did Malawi Join OGP?',
                'subtitle' => 'Since 2013',
                'content' => 'Malawi has been a member of the OGP Global Body since 2013. Through OGP, Malawi embraces democratic values by promoting its constitutional principles of transparency, accountability, and citizen engagement.',
                'description' => 'OGP in Malawi is a partnership among Government, Civil Society Organizations, and the Private Sector.',
                'icon' => 'fas fa-flag',
                'is_active' => true,
                'sort_order' => 5,
            ],
        ];

        // About Page Sections
        $aboutSections = [
            [
                'page' => 'about',
                'section_key' => 'ogp_global',
                'title' => 'OGP Global',
                'subtitle' => 'Multilateral Partnership',
                'content' => 'The Open Government Partnership (OGP) is a multilateral partnership that aims to secure concrete commitments from national governments to promote open government, active citizen participation, transparency, accountability, and the harnessing of new technologies to strengthen governance. This initiative started in 2011 and includes national governments, the private sector, and civil society organizations (CSOs) working together to co-create action plans with concrete commitments across various thematic areas.',
                'description' => 'A global initiative promoting open government principles worldwide.',
                'icon' => 'fas fa-globe',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'page' => 'about',
                'section_key' => 'malawi_timeline',
                'title' => 'OGP in Malawi',
                'subtitle' => 'Our Journey',
                'content' => 'Malawi\'s journey with OGP has been marked by significant milestones and challenges, from joining in 2013 to the current implementation of the 2023-2025 National Action Plan.',
                'description' => 'Key milestones in Malawi\'s OGP participation.',
                'icon' => 'fas fa-history',
                'is_active' => true,
                'sort_order' => 2,
                'metadata' => [
                    'timeline' => [
                        [
                            'year' => '2013',
                            'title' => 'Malawi Joins OGP',
                            'description' => 'Malawi became a member of the OGP Global Partnership, embracing democratic principles of transparency, accountability and citizen engagement as outlined in our Constitution.'
                        ],
                        [
                            'year' => '2019',
                            'title' => 'Temporary Interruptions',
                            'description' => 'OGP Malawi\'s initiatives were interrupted by the protracted electoral process and subsequently by the COVID-19 pandemic, slowing progress on implementation.'
                        ],
                        [
                            'year' => '2022',
                            'title' => 'Revitalization',
                            'description' => 'His Excellency Dr. Lazarus McCarthy Chakwera, President of Malawi, revitalized OGP Malawi. A co-creation kick-off workshop was held in August 2022 with government, civil society, and private sector stakeholders.'
                        ],
                        [
                            'year' => '2023',
                            'title' => 'New Action Plan',
                            'description' => 'Malawi launched its 2023-2025 National Action Plan with commitments across five thematic areas, guided by a National Steering Committee and Technical Working Groups.'
                        ]
                    ]
                ]
            ],
            [
                'page' => 'about',
                'section_key' => 'steering_committee',
                'title' => 'National Steering Committee',
                'subtitle' => 'Leadership & Oversight',
                'content' => 'OGP in Malawi is coordinated by a National Steering Committee that leads the implementation of the Malawi OGP 2023–2025 National Action Plan. The committee includes government and civil society representatives who collaboratively guide implementation across sectors.',
                'description' => 'The National Steering Committee provides oversight and support to government agencies, civil society organizations, and private sector stakeholders in fulfilling the commitments outlined in the action plan.',
                'icon' => 'fas fa-users',
                'is_active' => true,
                'sort_order' => 3,
                'metadata' => [
                    'government_institutions' => [
                        'NGO Regulatory Authority',
                        'Ministry of Justice',
                        'Ministry of Foreign Affairs',
                        'National Assembly',
                        'Ministry of Information and Digitalization',
                        'Ministry of Mining'
                    ],
                    'civil_society_organizations' => [
                        'Malawi Confederation of Chambers of Commerce and Industry (MCCCI)',
                        'Malawi Building and Civil Engineering Contractors and Allied Traders Association (MABCATA)',
                        'Council for Non-Governmental Organizations in Malawi (CONGOMA)',
                        'Public Affairs Committee (PAC)',
                        'Federation of Disability on Malawi',
                        'Centre for Social Accountability and Transparency'
                    ],
                    'ex_officio' => 'United States Agency for International Development (USAID)'
                ]
            ],
            [
                'page' => 'about',
                'section_key' => 'action_plan',
                'title' => 'Malawi National Action Plan',
                'subtitle' => '2023-2025 Commitments',
                'content' => 'The Malawi OGP National Action Plan 2023–2025 outlines the country\'s commitments toward transparency, accountability, and citizen engagement. It was developed collaboratively with input from government and civil society.',
                'description' => 'A comprehensive plan outlining Malawi\'s OGP commitments and implementation strategies.',
                'icon' => 'fas fa-file-alt',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'page' => 'about',
                'section_key' => 'secretariat',
                'title' => 'Secretariat',
                'subtitle' => 'Administrative Support',
                'content' => 'The Malawi OGP National Action Plan 2023–2025 outlines the country\'s commitments toward transparency, accountability, and citizen engagement. It was developed collaboratively with input from government and civil society.',
                'description' => 'Administrative support and coordination for OGP implementation in Malawi.',
                'icon' => 'fas fa-building',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'page' => 'about',
                'section_key' => 'technical_working_groups',
                'title' => 'Technical Working Groups',
                'subtitle' => 'Implementation Support',
                'content' => 'Technical Working Groups (TWGs) are formed to coordinate and track progress on specific commitment areas within the action plan. These groups consist of representatives from government ministries, civil society, and technical experts who meet regularly to review progress and provide implementation support.',
                'description' => 'Specialized groups focusing on different thematic areas of OGP implementation.',
                'icon' => 'fas fa-cogs',
                'is_active' => true,
                'sort_order' => 6,
                'metadata' => [
                    'twgs' => [
                        [
                            'name' => 'Open Parliament',
                            'description' => 'Improving transparency on public debt and government financing through parliamentary openness and accountability measures.'
                        ],
                        [
                            'name' => 'Digital Governance',
                            'description' => 'Accelerating adoption of e-government services and increasing ICT utilization among Malawians for better service delivery.'
                        ],
                        [
                            'name' => 'Natural Resources',
                            'description' => 'Enhancing transparency in natural resource governance including contracts, production, exports and revenue management.'
                        ],
                        [
                            'name' => 'Right to Information',
                            'description' => 'Actualizing transparency on political party and campaign financing through implementation of relevant legislation.'
                        ],
                        [
                            'name' => 'Anti-Corruption',
                            'description' => 'Strengthening anti-corruption measures through open contracting and beneficial ownership transparency.'
                        ]
                    ]
                ]
            ],
        ];

        // Insert home page sections
        foreach ($homeSections as $section) {
            PageSection::updateOrCreate(
                ['page' => $section['page'], 'section_key' => $section['section_key']],
                $section
            );
        }

        // Insert about page sections
        foreach ($aboutSections as $section) {
            PageSection::updateOrCreate(
                ['page' => $section['page'], 'section_key' => $section['section_key']],
                $section
            );
        }
    }
}

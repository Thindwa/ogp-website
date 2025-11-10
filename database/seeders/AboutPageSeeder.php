<?php

namespace Database\Seeders;

use App\Models\AboutPage;
use Illuminate\Database\Seeder;

class AboutPageSeeder extends Seeder
{
    public function run(): void
    {
        AboutPage::updateOrCreate(
            ['is_active' => true],
            [
                'title' => 'About Open Government Partnership Malawi',
                'subtitle' => 'Building Transparent and Accountable Governance',
                'description' => 'The Open Government Partnership (OGP) in Malawi represents a collaborative effort between government, civil society organizations, and the private sector to promote transparency, accountability, and citizen engagement in governance processes.',
                'mission' => 'To promote transparent, participatory, inclusive and accountable governance through collaborative partnerships between government and civil society, fostering democratic values and constitutional principles of transparency, accountability, and citizen engagement.',
                'vision' => 'A Malawi where government serves its citizens with complete transparency, active participation, and unwavering accountability, creating a model of open governance for the region.',
                'values' => [
                    ['value' => 'Transparency - Open access to government information and decision-making processes'],
                    ['value' => 'Accountability - Government officials and institutions answerable to citizens'],
                    ['value' => 'Participation - Active citizen engagement in governance and policy-making'],
                    ['value' => 'Inclusion - Ensuring all voices are heard and represented'],
                    ['value' => 'Integrity - Upholding the highest ethical standards in public service'],
                    ['value' => 'Collaboration - Working together across sectors for common goals'],
                ],
                'history' => 'Malawi joined the Open Government Partnership in 2013, becoming one of the early adopters in the region. Since then, the country has made significant strides in implementing open government reforms, including the development of four national action plans, the establishment of technical working groups, and the implementation of various transparency initiatives across different sectors.',
                'team_description' => 'Our team consists of dedicated professionals from government ministries, civil society organizations, and private sector partners who work collaboratively to advance open government principles in Malawi. The team is supported by technical working groups focusing on specific thematic areas such as anti-corruption, access to information, digital governance, natural resources, and public service delivery.',
                'contact_info' => 'For more information about OGP Malawi activities, please contact us at info@ogp.mw or visit our offices in Lilongwe. We welcome partnerships and collaborations from organizations committed to advancing open government principles.',
                'featured_image' => 'he-chakwera.jpg',

                // OGP Global section
                'ogp_global_title' => 'OGP Global',
                'ogp_global_subtitle' => 'Multilateral Partnership',
                'ogp_global_content' => 'The Open Government Partnership (OGP) is a multilateral partnership that aims to secure concrete commitments from national governments to promote open government, active citizen participation, transparency, accountability, and the harnessing of new technologies to strengthen governance. This initiative started in 2011 and includes national governments, the private sector, and civil society organizations (CSOs) working together to co-create action plans with concrete commitments across various thematic areas.',
                'ogp_global_description' => 'A global initiative promoting open government principles worldwide.',
                'ogp_global_icon' => 'fas fa-globe',
                'ogp_global_image' => 'ogp-global.jpg',

                // Malawi Timeline section
                'malawi_timeline_title' => 'OGP in Malawi',
                'malawi_timeline_subtitle' => 'Our Journey',
                'malawi_timeline_content' => 'Malawi\'s journey with OGP has been marked by significant milestones and challenges, from joining in 2013 to the current implementation of the 2023-2025 National Action Plan.',
                'malawi_timeline_description' => 'Key milestones in Malawi\'s OGP participation.',
                'malawi_timeline_icon' => 'fas fa-history',
                'malawi_timeline_data' => [
                    '2013' => 'Malawi Joins OGP - Malawi became a member of the OGP Global Partnership, embracing democratic principles of transparency, accountability and citizen engagement as outlined in our Constitution.',
                    '2019' => 'Temporary Interruptions - OGP Malawi\'s initiatives were interrupted by the protracted electoral process and subsequently by the COVID-19 pandemic, slowing progress on implementation.',
                    '2022' => 'Revitalization - His Excellency Dr. Lazarus McCarthy Chakwera, President of Malawi, revitalized OGP Malawi. A co-creation kick-off workshop was held in August 2022 with government, civil society, and private sector stakeholders.',
                    '2023' => 'New Action Plan - Malawi launched its 2023-2025 National Action Plan with commitments across five thematic areas, guided by a National Steering Committee and Technical Working Groups.',
                ],

                // Steering Committee section
                'steering_committee_title' => 'National Steering Committee',
                'steering_committee_subtitle' => 'Leadership & Coordination',
                'steering_committee_content' => 'OGP in Malawi is coordinated by a National Steering Committee that leads the implementation of the Malawi OGP 2023–2025 National Action Plan. The committee includes government and civil society representatives who collaboratively guide implementation across sectors. The National Steering Committee provides oversight and support to government agencies, civil society organizations, and private sector stakeholders in fulfilling the commitments outlined in the action plan.',
                'steering_committee_description' => 'Multi-stakeholder committee providing strategic direction and oversight.',
                'steering_committee_icon' => 'fas fa-users-cog',
                'steering_committee_membership' => [
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
                    'ex_officio_members' => [
                        'United States Agency for International Development (USAID)'
                    ]
                ],

                // Action Plan section
                'action_plan_title' => 'Malawi National Action Plan',
                'action_plan_subtitle' => '2023-2025 Commitments',
                'action_plan_content' => 'The Malawi OGP National Action Plan 2023–2025 outlines the country\'s commitments toward transparency, accountability, and citizen engagement. It was developed collaboratively with input from government and civil society.',
                'action_plan_description' => 'Comprehensive plan outlining Malawi\'s open government commitments.',
                'action_plan_icon' => 'fas fa-clipboard-list',

                // Secretariat section
                'secretariat_title' => 'Secretariat',
                'secretariat_subtitle' => 'Implementation Support',
                'secretariat_content' => 'The Secretariat provides administrative and technical support to the OGP Malawi initiative, coordinating activities between government agencies, civil society organizations, and other stakeholders. It facilitates communication, organizes meetings, and ensures smooth implementation of the National Action Plan.',
                'secretariat_description' => 'Supporting implementation of OGP commitments through coordination and administrative support.',
                'secretariat_icon' => 'fas fa-building',

                // Technical Working Groups section
                'technical_working_groups_title' => 'Technical Working Groups',
                'technical_working_groups_subtitle' => 'Specialized Focus Areas',
                'technical_working_groups_content' => 'Technical Working Groups (TWGs) are formed to coordinate and track progress on specific commitment areas within the action plan. These groups consist of representatives from government ministries, civil society, and technical experts who meet regularly to review progress and provide implementation support.',
                'technical_working_groups_description' => 'Specialized groups focusing on specific thematic areas.',
                'technical_working_groups_icon' => 'fas fa-cogs',
                'technical_working_groups_list' => [
                    '1' => 'Open Parliament',
                    '2' => 'Digital Governance',
                    '3' => 'Natural Resources',
                    '4' => 'Right to Information',
                    '5' => 'Anti-Corruption',
                ],

                'is_active' => true,
            ]
        );
    }
}

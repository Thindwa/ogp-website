<?php

namespace Database\Seeders;

use App\Models\TechnicalWorkingGroup;
use Illuminate\Database\Seeder;

class TechnicalWorkingGroupSeeder extends Seeder
{
    public function run(): void
    {
        $groups = [
            [
                'name' => 'Anti-Corruption',
                'slug' => 'anti-corruption',
                'short_description' => 'Enhancing transparency in procurement through Open Contracting and Beneficial Ownership disclosures to reduce opportunities for corruption and malpractice in public procurement processes.',
                'description' => 'The Anti-Corruption thematic area seeks to enhance Open Contracting and Beneficial Ownership transparency to reduce opportunities for procurement malpractice. The approach to achieving this lies in institutionalizing and operationalizing beneficial ownership transparency for all legal entities in Malawi engaged in public procurement.',
                'icon' => 'anti-corruption.png',
                'color' => '#f44336',
                'is_active' => true,
                'sort_order' => 1,
                'contact_person' => 'Anti-Corruption Team Lead',
                'contact_email' => 'anticorruption@ogp.mw',
                'objectives' => [
                    ['objective' => 'Institutionalize beneficial ownership transparency'],
                    ['objective' => 'Reduce procurement malpractice'],
                    ['objective' => 'Enhance public oversight'],
                ],
                'challenges' => [
                    ['challenge' => 'Limited public oversight due to lack of incorporation of open contracting principles'],
                    ['challenge' => 'Non-disclosure of beneficial owners by business entities'],
                    ['challenge' => 'The need to strengthen mechanisms for reporting corrupt practices'],
                ],
                'interventions' => [
                    ['intervention' => 'Institutionalize and operationalize the Companies Regulations for beneficial ownership transparency'],
                    ['intervention' => 'Issue public notices on compliance requirements for all registered companies'],
                    ['intervention' => 'Assess and verify reporting of registered companies in compliance with Companies Regulations'],
                    ['intervention' => 'Bi-annual publication of the list of compliant companies'],
                ],
            ],
            [
                'name' => 'Access to Information',
                'slug' => 'access-to-information',
                'short_description' => 'Promoting transparency in political financing by implementing the Political Parties Act (2018) and strengthening right to information frameworks for greater government accountability.',
                'description' => 'This working group focuses on improving access to information and transparency in political processes, ensuring citizens have the right to access government information and promoting accountability in political financing.',
                'icon' => 'info.png',
                'color' => '#ff9800',
                'is_active' => true,
                'sort_order' => 2,
                'contact_person' => 'Access to Information Team Lead',
                'contact_email' => 'info@ogp.mw',
                'objectives' => [
                    ['objective' => 'Strengthen right to information frameworks'],
                    ['objective' => 'Promote transparency in political financing'],
                    ['objective' => 'Enhance government accountability'],
                ],
                'challenges' => [
                    ['challenge' => 'Limited access to government information'],
                    ['challenge' => 'Lack of transparency in political financing'],
                    ['challenge' => 'Weak enforcement of information access laws'],
                ],
                'interventions' => [
                    ['intervention' => 'Implement Political Parties Act (2018)'],
                    ['intervention' => 'Strengthen information access frameworks'],
                    ['intervention' => 'Develop citizen engagement mechanisms'],
                ],
            ],
            [
                'name' => 'Digital Governance',
                'slug' => 'digital-governance',
                'short_description' => 'Accelerating the adoption of digital government services and increasing ICT utilization among citizens to improve service delivery and government-citizen interactions.',
                'description' => 'This working group focuses on digital transformation of government services, improving ICT infrastructure, and enhancing digital literacy among citizens to create a more connected and efficient government.',
                'icon' => 'money.png',
                'color' => '#009688',
                'is_active' => true,
                'sort_order' => 3,
                'contact_person' => 'Digital Governance Team Lead',
                'contact_email' => 'digital@ogp.mw',
                'objectives' => [
                    ['objective' => 'Accelerate digital government services adoption'],
                    ['objective' => 'Increase ICT utilization among citizens'],
                    ['objective' => 'Improve service delivery efficiency'],
                ],
                'challenges' => [
                    ['challenge' => 'Limited digital infrastructure'],
                    ['challenge' => 'Low ICT literacy among citizens'],
                    ['challenge' => 'Digital divide in rural areas'],
                ],
                'interventions' => [
                    ['intervention' => 'Develop digital government platforms'],
                    ['intervention' => 'Implement ICT training programs'],
                    ['intervention' => 'Expand digital infrastructure'],
                ],
            ],
            [
                'name' => 'Natural Resources',
                'slug' => 'natural-resources',
                'short_description' => 'Enhancing transparency in the governance of Malawi\'s natural resources including contracts, production data, revenue collection, and environmental impact management.',
                'description' => 'This working group focuses on ensuring transparent and accountable management of natural resources, including mining, forestry, and water resources, to ensure sustainable development and proper revenue management.',
                'icon' => 'natural.png',
                'color' => '#4caf50',
                'is_active' => true,
                'sort_order' => 4,
                'contact_person' => 'Natural Resources Team Lead',
                'contact_email' => 'resources@ogp.mw',
                'objectives' => [
                    ['objective' => 'Enhance transparency in resource contracts'],
                    ['objective' => 'Improve revenue collection transparency'],
                    ['objective' => 'Strengthen environmental impact management'],
                ],
                'challenges' => [
                    ['challenge' => 'Lack of transparency in resource contracts'],
                    ['challenge' => 'Weak revenue collection mechanisms'],
                    ['challenge' => 'Limited environmental monitoring'],
                ],
                'interventions' => [
                    ['intervention' => 'Publish resource contracts and agreements'],
                    ['intervention' => 'Implement transparent revenue collection systems'],
                    ['intervention' => 'Strengthen environmental monitoring frameworks'],
                ],
            ],
            [
                'name' => 'Public Service Delivery',
                'slug' => 'public-service-delivery',
                'short_description' => 'Improving efficiency and accountability in public services through citizen engagement mechanisms and open government practices across key service delivery sectors.',
                'description' => 'This working group focuses on improving the quality and efficiency of public services through better citizen engagement, service delivery monitoring, and implementation of open government principles in key sectors.',
                'icon' => 'post-office.png',
                'color' => '#3f51b5',
                'is_active' => true,
                'sort_order' => 5,
                'contact_person' => 'Public Service Delivery Team Lead',
                'contact_email' => 'services@ogp.mw',
                'objectives' => [
                    ['objective' => 'Improve public service efficiency'],
                    ['objective' => 'Enhance citizen engagement in service delivery'],
                    ['objective' => 'Implement open government practices'],
                ],
                'challenges' => [
                    ['challenge' => 'Inefficient public service delivery'],
                    ['challenge' => 'Limited citizen engagement mechanisms'],
                    ['challenge' => 'Weak service delivery monitoring'],
                ],
                'interventions' => [
                    ['intervention' => 'Develop citizen engagement platforms'],
                    ['intervention' => 'Implement service delivery monitoring systems'],
                    ['intervention' => 'Train public servants on open government principles'],
                ],
            ],
        ];

        foreach ($groups as $group) {
            TechnicalWorkingGroup::create($group);
        }
    }
}

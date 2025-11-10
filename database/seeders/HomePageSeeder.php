<?php

namespace Database\Seeders;

use App\Models\HomePage;
use Illuminate\Database\Seeder;

class HomePageSeeder extends Seeder
{
    public function run(): void
    {
        HomePage::updateOrCreate(
            ['is_active' => true],
            [
                'hero_title' => 'Open Government Partnership Malawi',
                'hero_subtitle' => 'Transparency, Accountability, and Citizen Engagement',
                'hero_description' => 'Building a more transparent, accountable, and participatory government through collaborative partnerships between government and civil society.',
                'hero_image' => 'he.jpg',
                'about_title' => 'What is Open Government Partnership (OGP)?',
                'about_description' => 'Open Government Partnership is an organization of reformers inside and outside of governments working to transform how government serves its citizens. It was formed in 2011, when government leaders and civil society advocates came together to create a unique partnership that promotes transparent, participatory, inclusive and accountable governance through government and civil society advocate collaboration.',
                'about_image' => 'he-chakwera.jpg',
                'ogp_title' => 'Malawi\'s Commitment to Open Government',
                'ogp_description' => 'Malawi has been a member of the OGP Global Body since 2013. Through OGP, Malawi embraces democratic values by promoting its constitutional principles of transparency, accountability, and citizen engagement. OGP in Malawi is a partnership among Government, Civil Society Organizations, and the Private Sector.',
                'ogp_image' => 'nsc.jpg',

                // Mission & Vision sections
                'mission_title' => 'Our Mission',
                'mission_subtitle' => 'Transparency & Accountability',
                'mission_content' => 'To promote transparency, accountability, and citizen participation in government through collaborative initiatives and innovative solutions that strengthen democratic governance in Malawi.',
                'mission_description' => 'We work to ensure that government processes are open, accessible, and responsive to citizens\' needs.',
                'mission_icon' => 'fas fa-eye',

                'vision_title' => 'Our Vision',
                'vision_subtitle' => 'Open & Responsive Government',
                'vision_content' => 'A Malawi where government is open, transparent, and responsive to citizens\' needs, where public participation is meaningful and inclusive, and where accountability mechanisms ensure effective service delivery and good governance.',
                'vision_description' => 'We envision a future where citizens actively participate in governance and hold government accountable.',
                'vision_icon' => 'fas fa-bullseye',

                // Who is in OGP section
                'who_is_ogp_title' => 'Who is in OGP?',
                'who_is_ogp_content' => 'The Open Government Partnership (OGP) includes 75 countries and 150 local governments, representing more than two billion people, and thousands of civil society organizations. These national governments and local jurisdictions work alongside thousands of civil society organizations to co-create two-year action plans. Each member submits a plan co-created with civil society that outlines concrete commitments to enhance transparency, accountability, and public participation in government.',
                'who_is_ogp_description' => 'A global initiative bringing together governments and civil society to promote open government principles.',

                // How Does OGP Work section
                'how_ogp_works_title' => 'How Does OGP Work?',
                'how_ogp_works_content' => 'The OGP is based on the idea that civil society and government co-create action plans with concrete commitments. These commitments are then credibly implemented with support from partner organizations either within the member country or globally. The process begins when a state endorses the Open Government Declaration, signaling its commitment to transparency, access to information, and civic participation. Action plans are co-created with civil society to improve services and enhance people\'s lives, with progress openly reported.',
                'how_ogp_works_description' => 'A collaborative process that brings together government and civil society to create and implement concrete commitments.',

                // When Did Malawi Join OGP section
                'malawi_ogp_title' => 'When Did Malawi Join OGP?',
                'malawi_ogp_content' => 'Malawi has been a member of the OGP Global Body since 2013. Through OGP, Malawi embraces democratic values by promoting its constitutional principles of transparency, accountability, and citizen engagement. OGP in Malawi is a partnership among Government, Civil Society Organizations, and the Private Sector.',
                'malawi_ogp_description' => 'Malawi\'s journey with OGP began in 2013, marking a commitment to open government principles.',

                'is_active' => true,
            ]
        );
    }
}

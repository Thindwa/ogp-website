<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function technicalGroup()
    {
        return view('frontend.technical');
    }

    public function showTechnical()
    {
        return view('frontend.single-technical');
    }

    public function Highlights()
    {
        return view('frontend.highlights');
    }

    public function show($slug)
{
    // Sample static data keyed by slug
    $sampleAchievements = [
        'transparency-laws' => [
            'title' => 'Reform laws related to transparency and access to information',
            'submitted_year' => '2020',
            'policy_area' => 'Public Participation',
            'description' => "This reform focuses on improving laws that govern public access to information.\n\nIt aims to enhance transparency and citizen trust in government processes.\n\nBy strengthening access to information frameworks, citizens can engage more meaningfully with public services and decision-making processes.\n\nThis reform also aligns with global best practices in open governance and supports democratic accountability.",
        ],

        'accountability-plan' => [
            'title' => 'Transparency and Accountability Improvement and Reinforcement Plan',
            'submitted_year' => '2020',
            'policy_area' => 'Anti-Corruption and Integrity',
            'description' => "The plan outlines strategies for strengthening government accountability and anti-corruption measures.\n\nIt emphasizes proactive disclosure of public data, institutional reforms, and compliance monitoring.\n\nCivil society was actively involved in shaping the commitments to ensure relevance and impact.\n\nThe plan represents a national-level push toward curbing misuse of public resources and improving trust in public institutions.",
        ],

        'citizen-participation' => [
            'title' => 'Promote citizen participation in public affairs',
            'submitted_year' => '2020',
            'policy_area' => 'Public Participation',
            'description' => "This initiative encourages inclusive civic engagement in policymaking and service delivery.\n\nIt introduces structured public consultations, participatory budgeting, and feedback mechanisms.\n\nThe goal is to strengthen the social contract between citizens and the state by enabling dialogue and collaboration.\n\nSpecial focus is placed on marginalized groups to ensure that every voice is heard and valued.",
        ],

        'whistleblower-protection' => [
            'title' => 'Establish legal whistleblower protections',
            'submitted_year' => '2020',
            'policy_area' => 'Anti-Corruption and Integrity',
            'description' => "The reform establishes a legal framework to protect whistleblowers who report misconduct or corruption.\n\nIt sets out procedures for safe reporting, confidentiality guarantees, and penalties against retaliation.\n\nThis helps create a culture of integrity within the public sector, encouraging people to speak up.\n\nRobust whistleblower laws are essential for detecting wrongdoing early and preserving public trust.",
        ],

        'digital-transparency' => [
            'title' => 'Observatory of Open Government and Digital Transparency',
            'submitted_year' => '2020',
            'policy_area' => 'Digital Governance',
            'description' => "This reform creates a national observatory to monitor open government and digital transparency efforts.\n\nIt provides a centralized platform for reporting, analysis, and public engagement with transparency data.\n\nIt also serves as a learning hub where institutions can share success stories and challenges.\n\nThe observatory enhances coordination across sectors and keeps the momentum of reforms going.",
        ],
    ];


    // Check if the slug exists
    if (!array_key_exists($slug, $sampleAchievements)) {
        abort(404);
    }

    // Convert array to object for use in Blade
    $achievement = (object) $sampleAchievements[$slug];

    return view('frontend.single-highlight', compact('achievement'));
}


    public function news()
    {
        return view('frontend.news');
    }

    public function showNews($slug)
    {
        return view('frontend.single-news');
    }

    public function achievements()
    {
        return view('frontend.achievements');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function Gallery()
    {
        return view('frontend.gallery');
    }

    public function downloads()
    {
        return view('frontend.downloads');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
}

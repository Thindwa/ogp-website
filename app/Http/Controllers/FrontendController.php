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
        return view('frontend.single-highlight');
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

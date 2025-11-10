<?php

namespace App\Http\Controllers;

use App\Models\TechnicalWorkingGroup;
use App\Models\News;
use App\Models\Achievement;
use App\Models\Document;
use App\Models\GalleryItem;
use App\Models\HomePage;
use App\Models\AboutPage;
use App\Models\HomeSlider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $homePage = HomePage::getActive();
        $featuredNews = News::published()->with('technicalWorkingGroup')->latest('published_at')->take(3)->get();
        $featuredAchievements = Achievement::featured()->with('technicalWorkingGroup')->take(4)->get();
        $technicalWorkingGroups = TechnicalWorkingGroup::active()->get();
        $galleryItems = GalleryItem::active()->with('technicalWorkingGroup')->take(6)->get();

        return view('frontend.index', compact('homePage', 'featuredNews', 'featuredAchievements', 'technicalWorkingGroups', 'galleryItems'));
    }

    public function about()
    {
        $aboutPage = AboutPage::getActive();
        return view('frontend.about', compact('aboutPage'));
    }

    public function technicalGroup()
    {
        $technicalWorkingGroups = TechnicalWorkingGroup::active()->ordered()->get();
        return view('frontend.technical', compact('technicalWorkingGroups'));
    }

    public function showTechnical($slug)
    {
        $group = TechnicalWorkingGroup::where('slug', $slug)->firstOrFail();
        $relatedGroups = TechnicalWorkingGroup::where('id', '!=', $group->id)->active()->take(4)->get();

        return view('frontend.single-technical', compact('group', 'relatedGroups'));
    }


    public function news()
    {
        $query = News::published()->with('technicalWorkingGroup');

        // Apply filters
        if (request('category')) {
            $query->whereHas('technicalWorkingGroup', function($q) {
                $q->where('name', 'like', '%' . request('category') . '%');
            });
        }

        if (request('year')) {
            $query->whereYear('published_at', request('year'));
        }

        if (request('status') === 'featured') {
            $query->where('is_featured', true);
        }

        $news = $query->latest('published_at')->paginate(6);
        $featuredNews = News::published()->featured()->take(3)->get();

        return view('frontend.news', compact('news', 'featuredNews'));
    }

    public function showNews($slug)
    {
        $article = News::where('slug', $slug)->with('technicalWorkingGroup')->firstOrFail();
        $relatedArticles = News::published()
            ->where('id', '!=', $article->id)
            ->where('technical_working_group_id', $article->technical_working_group_id)
            ->take(3)->get();

        return view('frontend.single-news', compact('article', 'relatedArticles'));
    }

    public function showAchievement($slug)
    {
        $achievement = Achievement::where('slug', $slug)->with('technicalWorkingGroup')->firstOrFail();
        $relatedAchievements = Achievement::where('id', '!=', $achievement->id)
            ->where('technical_working_group_id', $achievement->technical_working_group_id)
            ->take(3)->get();

        return view('frontend.single-achievement', compact('achievement', 'relatedAchievements'));
    }

    public function showDocument($slug)
    {
        $document = Document::where('slug', $slug)->with('technicalWorkingGroup')->firstOrFail();
        $relatedDocuments = Document::where('id', '!=', $document->id)
            ->where('technical_working_group_id', $document->technical_working_group_id)
            ->where('is_public', true)
            ->take(3)->get();

        return view('frontend.single-document', compact('document', 'relatedDocuments'));
    }

    public function showGalleryItem($slug)
    {
        $galleryItem = GalleryItem::where('slug', $slug)->with('technicalWorkingGroup')->firstOrFail();
        $relatedGalleryItems = GalleryItem::where('id', '!=', $galleryItem->id)
            ->where('technical_working_group_id', $galleryItem->technical_working_group_id)
            ->where('is_active', true)
            ->take(3)->get();

        return view('frontend.single-gallery', compact('galleryItem', 'relatedGalleryItems'));
    }

    public function achievements()
    {
        $query = Achievement::with('technicalWorkingGroup');

        // Apply filters
        if (request('year')) {
            $query->where('submitted_year', request('year'));
        }

        if (request('policy_area')) {
            $query->where('policy_area', request('policy_area'));
        }

        if (request('twg')) {
            $query->where('technical_working_group_id', request('twg'));
        }

        $achievements = $query->orderBy('submitted_year', 'desc')->paginate(12);
        $years = Achievement::distinct()->pluck('submitted_year')->filter()->sort()->values();
        $policyAreas = Achievement::distinct()->pluck('policy_area')->filter()->sort()->values();
        $technicalWorkingGroups = TechnicalWorkingGroup::active()->get();

        return view('frontend.achievements', compact('achievements', 'years', 'policyAreas', 'technicalWorkingGroups'));
    }

    public function documents()
    {
        $query = Document::with('technicalWorkingGroup')->where('is_public', true);

        // Apply filters
        if (request('category')) {
            $query->where('category', request('category'));
        }

        if (request('type')) {
            $query->where('file_type', request('type'));
        }

        if (request('twg')) {
            $query->where('technical_working_group_id', request('twg'));
        }

        $documents = $query->orderBy('created_at', 'desc')->paginate(12);
        $categories = Document::distinct()->pluck('category')->filter()->sort()->values();
        $types = Document::distinct()->pluck('file_type')->filter()->sort()->values();
        $technicalWorkingGroups = TechnicalWorkingGroup::active()->get();

        return view('frontend.documents', compact('documents', 'categories', 'types', 'technicalWorkingGroups'));
    }

    public function gallery()
    {
        $query = GalleryItem::with('technicalWorkingGroup')->where('is_active', true);

        // Apply filters
        if (request('category')) {
            $query->where('category', request('category'));
        }

        if (request('year')) {
            $query->whereYear('created_at', request('year'));
        }

        if (request('status') === 'featured') {
            $query->where('is_featured', true);
        }

        $galleryItems = $query->orderBy('sort_order')->paginate(12);
        $categories = GalleryItem::distinct()->pluck('category')->filter()->sort()->values();
        $technicalWorkingGroups = TechnicalWorkingGroup::active()->get();

        return view('frontend.gallery', compact('galleryItems', 'categories', 'technicalWorkingGroups'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}

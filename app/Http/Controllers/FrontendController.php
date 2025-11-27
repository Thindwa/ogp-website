<?php

namespace App\Http\Controllers;

use App\Models\TechnicalWorkingGroup;
use App\Models\Event;
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
        $featuredEvents = Event::published()->current()->with('technicalWorkingGroup')->latest('published_at')->take(3)->get();
        $featuredAchievements = Achievement::featured()->current()->with('technicalWorkingGroup')->take(4)->get();
        $technicalWorkingGroups = TechnicalWorkingGroup::current()->get();
        $galleryItems = GalleryItem::active()->current()->with('technicalWorkingGroup')->take(6)->get();

        return view('frontend.index', compact('homePage', 'featuredEvents', 'featuredAchievements', 'technicalWorkingGroups', 'galleryItems'));
    }

    public function about()
    {
        $aboutPage = AboutPage::getActive();
        return view('frontend.about', compact('aboutPage'));
    }

    public function technicalGroup()
    {
        $currentTWGs = TechnicalWorkingGroup::current()->ordered()->get();
        $archivedTWGs = TechnicalWorkingGroup::archived()->orderBy('end_date', 'desc')->get();
        return view('frontend.technical', compact('currentTWGs', 'archivedTWGs'));
    }

    public function showTechnical($slug)
    {
        $group = TechnicalWorkingGroup::where('slug', $slug)->firstOrFail();

        // Show related groups from the same period (current or archived)
        // Only show active groups in related groups
        if ($group->is_archived) {
            $relatedGroups = TechnicalWorkingGroup::archived()
                ->where('id', '!=', $group->id)
                ->where('is_active', true)
                ->orderBy('end_date', 'desc')
                ->take(4)
                ->get();
        } else {
            $relatedGroups = TechnicalWorkingGroup::current()
                ->where('id', '!=', $group->id)
                ->take(4)
                ->get();
        }

        // Get related content from this TWG
        $relatedEvents = $group->events()->published()->latest('published_at')->take(3)->get();
        $relatedDocuments = $group->documents()->published()->latest()->take(3)->get();
        $relatedAchievements = $group->achievements()->published()->latest()->take(3)->get();
        $relatedGalleryItems = $group->galleryItems()->published()->take(3)->get();

        return view('frontend.single-technical', compact('group', 'relatedGroups', 'relatedEvents', 'relatedDocuments', 'relatedAchievements', 'relatedGalleryItems'));
    }


    public function events()
    {
        // Check if showing archived events
        $showArchived = request('archive') == '1';

        if ($showArchived) {
            $query = Event::published()->archived()->with('technicalWorkingGroup');
        } else {
            $query = Event::published()->current()->with('technicalWorkingGroup');
        }

        // Apply filters
        if (request('category')) {
            $query->where(function($q) {
                $q->whereHas('technicalWorkingGroup', function($subQ) {
                    $subQ->where('name', 'like', '%' . request('category') . '%');
                })
                // Include general content when filtering (or remove this if you want to exclude general content from filtered results)
                ->orWhereNull('technical_working_group_id');
            });
        }

        if (request('year')) {
            $query->whereYear('published_at', request('year'));
        }

        if (request('status') === 'featured') {
            $query->where('is_featured', true);
        }

        $events = $query->latest('published_at')->paginate(6);

        if ($showArchived) {
            $featuredEvents = Event::published()->archived()->featured()->take(3)->get();
            $archivedTWGs = TechnicalWorkingGroup::archived()->orderBy('end_date', 'desc')->get();
        } else {
            $featuredEvents = Event::published()->current()->featured()->take(3)->get();
            $archivedTWGs = collect();
        }

        return view('frontend.events', compact('events', 'featuredEvents', 'archivedTWGs', 'showArchived'));
    }

    public function showEvent($slug)
    {
        $event = Event::where('slug', $slug)->with('technicalWorkingGroup')->firstOrFail();
        $relatedEvents = Event::published()
            ->where('id', '!=', $event->id)
            ->where('technical_working_group_id', $event->technical_working_group_id)
            ->take(3)->get();

        return view('frontend.single-event', compact('event', 'relatedEvents'));
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
            ->published()
            ->take(3)->get();

        return view('frontend.single-document', compact('document', 'relatedDocuments'));
    }

    public function downloadDocument($slug)
    {
        $document = Document::where('slug', $slug)->firstOrFail();

        // Check if document is published
        if ($document->status !== 'published') {
            abort(404);
        }

        // Increment download count
        $document->increment('download_count');

        // Get the file path - Filament stores files in storage/app/public
        $filePath = storage_path('app/public/' . $document->file_path);

        // Check if file exists
        if (!file_exists($filePath)) {
            abort(404, 'File not found');
        }

        // Get the original filename from the file path or use document title
        $originalFileName = basename($document->file_path);
        $downloadFileName = $document->title . '.' . $document->file_type;

        // Clean the download filename (remove invalid characters)
        $downloadFileName = preg_replace('/[^a-zA-Z0-9._-]/', '_', $downloadFileName);

        // Return file download response
        return response()->download($filePath, $downloadFileName);
    }

    public function showGalleryItem($slug)
    {
        $galleryItem = GalleryItem::where('slug', $slug)->with('technicalWorkingGroup')->firstOrFail();
        $relatedGalleryItems = GalleryItem::where('id', '!=', $galleryItem->id)
            ->where('technical_working_group_id', $galleryItem->technical_working_group_id)
            ->published()
            ->take(3)->get();

        return view('frontend.single-gallery', compact('galleryItem', 'relatedGalleryItems'));
    }

    public function achievements()
    {
        // Check if showing archived achievements
        $showArchived = request('archive') == '1';

        if ($showArchived) {
            $query = Achievement::published()->archived()->with('technicalWorkingGroup');
        } else {
            $query = Achievement::published()->current()->with('technicalWorkingGroup');
        }

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

        if ($showArchived) {
            $years = Achievement::archived()->distinct()->pluck('submitted_year')->filter()->sort()->values();
            $policyAreas = Achievement::archived()->distinct()->pluck('policy_area')->filter()->sort()->values();
            $technicalWorkingGroups = TechnicalWorkingGroup::archived()->get();
            $archivedTWGs = TechnicalWorkingGroup::archived()->orderBy('end_date', 'desc')->get();
        } else {
            $years = Achievement::current()->distinct()->pluck('submitted_year')->filter()->sort()->values();
            $policyAreas = Achievement::current()->distinct()->pluck('policy_area')->filter()->sort()->values();
            $technicalWorkingGroups = TechnicalWorkingGroup::current()->get();
            $archivedTWGs = collect();
        }

        return view('frontend.achievements', compact('achievements', 'years', 'policyAreas', 'technicalWorkingGroups', 'archivedTWGs', 'showArchived'));
    }

    public function documents()
    {
        // Check if showing archived documents
        $showArchived = request('archive') == '1';

        if ($showArchived) {
            $query = Document::published()->archived()->with('technicalWorkingGroup');
        } else {
            $query = Document::published()->current()->with('technicalWorkingGroup');
        }

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

        if ($showArchived) {
            $categories = Document::archived()->distinct()->pluck('category')->filter()->sort()->values();
            $types = Document::archived()->distinct()->pluck('file_type')->filter()->sort()->values();
            $technicalWorkingGroups = TechnicalWorkingGroup::archived()->get();
            $archivedTWGs = TechnicalWorkingGroup::archived()->orderBy('end_date', 'desc')->get();
        } else {
            $categories = Document::current()->distinct()->pluck('category')->filter()->sort()->values();
            $types = Document::current()->distinct()->pluck('file_type')->filter()->sort()->values();
            $technicalWorkingGroups = TechnicalWorkingGroup::current()->get();
            $archivedTWGs = collect();
        }

        return view('frontend.documents', compact('documents', 'categories', 'types', 'technicalWorkingGroups', 'archivedTWGs', 'showArchived'));
    }

    public function gallery()
    {
        // Check if showing archived gallery items
        $showArchived = request('archive') == '1';

        if ($showArchived) {
            $query = GalleryItem::published()->archived()->with('technicalWorkingGroup');
        } else {
            $query = GalleryItem::published()->current()->with('technicalWorkingGroup');
        }

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

        if ($showArchived) {
            $categories = GalleryItem::archived()->distinct()->pluck('category')->filter()->sort()->values();
            $technicalWorkingGroups = TechnicalWorkingGroup::archived()->get();
            $archivedTWGs = TechnicalWorkingGroup::archived()->orderBy('end_date', 'desc')->get();
        } else {
            $categories = GalleryItem::current()->distinct()->pluck('category')->filter()->sort()->values();
            $technicalWorkingGroups = TechnicalWorkingGroup::current()->get();
            $archivedTWGs = collect();
        }

        return view('frontend.gallery', compact('galleryItems', 'categories', 'technicalWorkingGroups', 'archivedTWGs', 'showArchived'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}

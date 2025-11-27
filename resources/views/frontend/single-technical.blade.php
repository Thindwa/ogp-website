@extends('layouts.frontendlayout')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-dark to-secondary text-white py-4">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-white-50">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('technical.group') }}" class="text-decoration-none text-white-50">Working Groups</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">{{ $group->name }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Technical Group Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Group Header -->
                <div class="text-center mb-5">
                    @if($group->featured_image)
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . $group->featured_image) }}" alt="{{ $group->name }}" class="img-fluid rounded" style="max-height: 300px; object-fit: cover;">
                        </div>
                    @elseif($group->icon)
                    <div class="bg-secondary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                            <i class="{{ $group->icon }} fa-4x text-secondary"></i>
                        </div>
                        @else
                        <div class="bg-secondary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                            <i class="fas fa-users fa-4x text-secondary"></i>
                        </div>
                        @endif
                    <h1 class="display-4 fw-bold mb-3 text-dark">{{ $group->name }}</h1>
                    <p class="lead text-muted">{{ $group->short_description ?? 'Technical Working Group' }}</p>
                </div>

                <!-- Group Description -->
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0 fw-bold">About This Working Group</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="group-content">
                            {!! $group->description !!}
                        </div>
                    </div>
                </div>

                <!-- Issues -->
                @if($group->issues && is_array($group->issues) && count($group->issues) > 0)
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0 fw-bold">Issues</h5>
                    </div>
                    <div class="card-body p-4">
                        <ul class="list-unstyled mb-0">
                            @foreach($group->issues as $issue)
                            <li class="mb-2">
                                <i class="fas fa-exclamation-circle text-primary me-2"></i>
                                {{ is_array($issue) ? $issue['issue'] : $issue }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                <!-- Group Objectives -->
                @if($group->objectives && is_array($group->objectives) && count($group->objectives) > 0)
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0 fw-bold">Objectives</h5>
                    </div>
                    <div class="card-body p-4">
                        <ul class="list-unstyled mb-0">
                            @foreach($group->objectives as $objective)
                            <li class="mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                {{ is_array($objective) ? $objective['objective'] : $objective }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                <!-- Group Challenges -->
                @if($group->challenges && is_array($group->challenges) && count($group->challenges) > 0)
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0 fw-bold">Key Challenges</h5>
                    </div>
                    <div class="card-body p-4">
                        <ul class="list-unstyled mb-0">
                            @foreach($group->challenges as $challenge)
                            <li class="mb-2">
                                <i class="fas fa-exclamation-triangle text-warning me-2"></i>
                                {{ is_array($challenge) ? $challenge['challenge'] : $challenge }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                <!-- Commitments (formerly Interventions) -->
                @if($group->commitments && is_array($group->commitments) && count($group->commitments) > 0)
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0 fw-bold">Commitments</h5>
                    </div>
                    <div class="card-body p-4">
                        <ul class="list-unstyled mb-0">
                            @foreach($group->commitments as $commitment)
                            <li class="mb-2">
                                <i class="fas fa-handshake text-info me-2"></i>
                                {{ is_array($commitment) ? $commitment['commitment'] : $commitment }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @elseif($group->interventions && is_array($group->interventions) && count($group->interventions) > 0)
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0 fw-bold">Commitments</h5>
                    </div>
                    <div class="card-body p-4">
                        <ul class="list-unstyled mb-0">
                            @foreach($group->interventions as $intervention)
                            <li class="mb-2">
                                <i class="fas fa-handshake text-info me-2"></i>
                                {{ is_array($intervention) ? $intervention['intervention'] : $intervention }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Group Info -->
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0 fw-bold">Group Information</h5>
                    </div>
                    <div class="card-body p-4">
                        @if($group->co_chairs)
                        <div class="mb-3">
                            <strong class="text-dark">Co-chairs:</strong>
                            <p class="mb-0 text-muted">{{ $group->co_chairs }}</p>
                        </div>
                        @elseif($group->contact_person)
                        <div class="mb-3">
                            <strong class="text-dark">Co-chairs:</strong>
                            <p class="mb-0 text-muted">{{ $group->contact_person }}</p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Other Working Groups -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0 fw-bold">Other Working Groups</h5>
                    </div>
                    <div class="card-body p-0">
                        @forelse($relatedGroups as $related)
                        <div class="p-3 border-bottom">
                            <h6 class="mb-0 fw-bold">
                                <a href="{{ route('technical.detail', $related->slug) }}" class="text-decoration-none text-dark">{{ $related->name }}</a>
                            </h6>
                        </div>
                        @empty
                        <div class="p-3 text-center">
                            <p class="text-muted mb-0">No other working groups found.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Content Section -->
@if($relatedEvents->count() > 0 || $relatedDocuments->count() > 0 || $relatedAchievements->count() > 0 || $relatedGalleryItems->count() > 0)
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="h2 h1-md display-4-md fw-light text-dark mb-3">Related Content</h2>
            <div class="border-bottom border-3 border-success mx-auto mb-4" style="width: 100px;"></div>
        </div>

        <div class="row g-4">
            @if($relatedEvents->count() > 0)
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-calendar me-2"></i>Related Events</h5>
                    </div>
                    <div class="card-body p-0">
                        @foreach($relatedEvents as $event)
                        <div class="p-3 border-bottom">
                            <h6 class="mb-1">
                                <a href="{{ route('event.detail', $event->slug) }}" class="text-decoration-none text-dark">{{ $event->title }}</a>
                            </h6>
                            <small class="text-muted">{{ $event->published_at ? $event->published_at->format('M d, Y') : 'Draft' }}</small>
                        </div>
                        @endforeach
                        <div class="p-3">
                            <a href="{{ route('events') }}?twg={{ $group->id }}" class="btn btn-outline-success btn-sm w-100">View All Events</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if($relatedDocuments->count() > 0)
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-warning text-white">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-file-alt me-2"></i>Related Documents</h5>
                    </div>
                    <div class="card-body p-0">
                        @foreach($relatedDocuments as $doc)
                        <div class="p-3 border-bottom">
                            <h6 class="mb-1">
                                <a href="{{ route('document.detail', $doc->slug) }}" class="text-decoration-none text-dark">{{ $doc->title }}</a>
                            </h6>
                            <small class="text-muted">{{ $doc->category ?? 'Document' }}</small>
                        </div>
                        @endforeach
                        <div class="p-3">
                            <a href="{{ route('documents') }}?twg={{ $group->id }}" class="btn btn-outline-warning btn-sm w-100">View All Documents</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if($relatedAchievements->count() > 0)
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-trophy me-2"></i>Related Achievements</h5>
                    </div>
                    <div class="card-body p-0">
                        @foreach($relatedAchievements as $achievement)
                        <div class="p-3 border-bottom">
                            <h6 class="mb-1">
                                <a href="{{ route('achievement.detail', $achievement->slug) }}" class="text-decoration-none text-dark">{{ $achievement->title }}</a>
                            </h6>
                            <small class="text-muted">{{ $achievement->submitted_year }} • {{ $achievement->policy_area }}</small>
                        </div>
                        @endforeach
                        <div class="p-3">
                            <a href="{{ route('achievements') }}?twg={{ $group->id }}" class="btn btn-outline-info btn-sm w-100">View All Achievements</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if($relatedGalleryItems->count() > 0)
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-images me-2"></i>Related Gallery</h5>
                    </div>
                    <div class="card-body p-0">
                        @foreach($relatedGalleryItems as $item)
                        <div class="p-3 border-bottom">
                            <h6 class="mb-1">
                                <a href="{{ route('gallery.detail', $item->slug) }}" class="text-decoration-none text-dark">{{ $item->title }}</a>
                            </h6>
                            <small class="text-muted">{{ $item->category ?? 'Gallery Item' }}</small>
                        </div>
                        @endforeach
                        <div class="p-3">
                            <a href="{{ route('gallery') }}?twg={{ $group->id }}" class="btn btn-outline-primary btn-sm w-100">View All Gallery</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endif



@include('layouts.partials.call-to-action')
@endsection

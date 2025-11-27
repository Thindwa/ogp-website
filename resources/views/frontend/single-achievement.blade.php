@extends('layouts.frontendlayout')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-dark to-secondary text-white py-4">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-white-50">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('achievements') }}" class="text-decoration-none text-white-50">Achievements</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">{{ $achievement->title }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Achievement Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Achievement Header -->
                <div class="text-center mb-5">
                    <div class="bg-secondary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                        <i class="fas fa-trophy fa-4x text-secondary"></i>
                    </div>
                    <h1 class="display-4 fw-bold mb-3 text-dark">{{ $achievement->title }}</h1>
                    <p class="lead text-muted">{{ $achievement->submitted_year }} • {{ $achievement->policy_area }}</p>
                    <p class="text-muted">{{ $achievement->technicalWorkingGroup->name ?? 'General' }}</p>
                </div>

                <!-- Achievement Description -->
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0 fw-bold">Achievement Description</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="achievement-content">
                            {!! $achievement->description !!}
                        </div>
                    </div>
                </div>

                <!-- Impact & Results -->
                @if($achievement->impact_metrics)
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0 fw-bold">Impact & Results</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="impact-content">
                            {!! $achievement->impact_metrics !!}
                        </div>
                    </div>
                </div>
                @endif

                <!-- Key Outcomes -->
                @if($achievement->key_outcomes)
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0 fw-bold">Key Outcomes</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="outcomes-content">
                            {!! $achievement->key_outcomes !!}
                        </div>
                    </div>
                </div>
                @endif

                <!-- Working Group Info -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0 fw-bold">Working Group</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="bg-secondary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-users fa-lg text-secondary"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1 text-dark">{{ $achievement->technicalWorkingGroup->name ?? 'General' }}</h6>
                                <small class="text-muted">Technical Working Group</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Achievement Info -->
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0 fw-bold">Achievement Information</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <strong class="text-dark">Submitted Year:</strong>
                            <p class="mb-0 text-muted">{{ $achievement->submitted_year }}</p>
                        </div>
                        <div class="mb-3">
                            <strong class="text-dark">Policy Area:</strong>
                            <p class="mb-0 text-muted">{{ $achievement->policy_area }}</p>
                        </div>
                        <div class="mb-3">
                            <strong class="text-dark">Working Group:</strong>
                            <p class="mb-0 text-muted">{{ $achievement->technicalWorkingGroup->name ?? 'General' }}</p>
                        </div>

                    </div>
                </div>

                <!-- Related Achievements -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0 fw-bold">Related Achievements</h5>
                    </div>
                    <div class="card-body p-0">
                        @forelse($relatedAchievements as $related)
                        <div class="d-flex p-3 border-bottom">
                            <div class="bg-secondary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <i class="fas fa-trophy text-secondary"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1 fw-bold">
                                    <a href="{{ route('achievement.detail', $related->slug) }}" class="text-decoration-none text-dark">{{ Str::limit($related->title, 50) }}</a>
                                </h6>
                                <small class="text-muted">{{ $related->submitted_year }} • {{ $related->policy_area }}</small>
                            </div>
                        </div>
                        @empty
                        <div class="p-3 text-center">
                            <p class="text-muted mb-0">No related achievements found.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<script>
function shareAchievement() {
    if (navigator.share) {
        navigator.share({
            title: '{{ $achievement->title }}',
            text: '{{ Str::limit(strip_tags($achievement->description), 100) }}',
            url: window.location.href
        });
    } else {
        // Fallback for browsers that don't support Web Share API
        navigator.clipboard.writeText(window.location.href).then(function() {
            alert('Link copied to clipboard!');
        });
    }
}
</script>

@include('layouts.partials.call-to-action')
@endsection

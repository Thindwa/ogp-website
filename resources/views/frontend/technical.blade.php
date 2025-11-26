@extends('layouts.frontendlayout')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-dark to-secondary text-white py-5">
    <div class="container">
        <div class="text-center">
            <h1 class="display-3 fw-bold mb-3">Technical Working Groups</h1>
            <p class="lead fs-4">Collaborative groups driving open government initiatives</p>
            <div class="border-bottom border-3 border-warning mx-auto mt-4" style="width: 100px;"></div>
        </div>
    </div>
</section>



<!-- Working Groups Grid -->
<section class="py-5">
    <div class="container">
        @if($technicalWorkingGroups->count() > 0)
            <div class="row g-4">
                @foreach($technicalWorkingGroups as $group)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm hover-lift">
                        <div class="card-body p-4">
                            <!-- Group Header -->
                            <div class="d-flex align-items-start mb-3">
                                <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                    @if($group->icon)
                                        <i class="{{ $group->icon }} fa-lg text-success"></i>
                                    @else
                                        <i class="fas fa-users fa-lg text-success"></i>
                                    @endif
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fw-bold mb-2 text-dark">{{ Str::limit($group->name, 50) }}</h5>
                                    <p class="text-muted small mb-2">{{ $group->short_description ?? 'Working Group' }}</p>
                                </div>
                            </div>

                            <!-- Group Description -->
                            <div class="mb-3">
                                <p class="text-muted small mb-0">{{ Str::limit(strip_tags($group->description), 80) }}</p>
                            </div>

                            <!-- Group Status -->
                            <div class="mb-3">
                                <small class="text-muted">
                                    <i class="fas fa-circle me-1 {{ $group->is_active ? 'text-success' : 'text-secondary' }}"></i>
                                    {{ $group->is_active ? 'Active' : 'Inactive' }}
                                </small>
                            </div>

                            <!-- Action Button -->
                            <div class="d-flex justify-content-start">
                                <a href="{{ route('technical.detail', $group->slug) }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-eye me-2"></i>View Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <!-- No Results -->
            <div class="text-center py-5">
                <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                    <i class="fas fa-search fa-4x text-warning"></i>
                </div>
                <h3 class="fw-bold text-dark mb-3">No Working Groups Found</h3>
                <p class="text-muted mb-4">Check back later for new working groups.</p>
            </div>
        @endif
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-gradient-to-r from-success to-info text-white">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2 class="display-4 fw-bold mb-4">Join a Working Group</h2>
                <p class="lead mb-4 fs-5">
                    Interested in contributing to open government initiatives? Join one of our working groups and help drive positive change.
                </p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="#" class="btn btn-light btn-lg px-5 py-3">
                        <i class="fas fa-user-plus me-2"></i>Join a Group
                    </a>
                    <a href="#" class="btn btn-outline-light btn-lg px-5 py-3">
                        <i class="fas fa-info-circle me-2"></i>Learn More
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

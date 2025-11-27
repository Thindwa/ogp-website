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



<!-- TWGs Tabs -->
<section class="py-5">
    <div class="container">
        <!-- Tabs Navigation -->
        <ul class="nav nav-pills justify-content-center mb-4" id="twgTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ !request('archive') ? 'active' : '' }}" id="current-tab" data-bs-toggle="pill" data-bs-target="#current" type="button" role="tab" onclick="switchTab('current')">
                    Current TWGs
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ request('archive') ? 'active' : '' }}" id="past-tab" data-bs-toggle="pill" data-bs-target="#past" type="button" role="tab" onclick="switchTab('past')">
                    Past Working Groups
                </button>
            </li>
        </ul>

        <!-- Tabs Content -->
        <div class="tab-content" id="twgTabContent">
            <!-- Current TWGs Tab -->
            <div class="tab-pane fade {{ !request('archive') ? 'show active' : '' }}" id="current" role="tabpanel">
                @if($currentTWGs->count() > 0)
                    <div class="row g-4">
                        @foreach($currentTWGs as $group)
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
                                            <p class="text-muted small mb-2">
                                                {{ $group->short_description ?? 'Working Group' }}
                                                @if($group->date_range)
                                                    <span class="badge bg-success ms-2">{{ $group->date_range }}</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Group Description -->
                                    <div class="mb-3">
                                        <p class="text-muted small mb-0">{{ Str::limit(strip_tags($group->description), 80) }}</p>
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
                    <div class="text-center py-5">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                            <i class="fas fa-search fa-4x text-warning"></i>
                        </div>
                        <h3 class="fw-bold text-dark mb-3">No Current TWGs Found</h3>
                        <p class="text-muted mb-4">Check back later for new working groups.</p>
                    </div>
                @endif
            </div>

            <!-- Past TWGs Tab -->
            <div class="tab-pane fade {{ request('archive') ? 'show active' : '' }}" id="past" role="tabpanel">
                @if($archivedTWGs->count() > 0)
                    <div class="row g-4">
                        @foreach($archivedTWGs as $group)
                        <div class="col-lg-4 col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <!-- Group Header -->
                                    <div class="d-flex align-items-start mb-3">
                                        <div class="bg-warning bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                            @if($group->icon)
                                                <i class="{{ $group->icon }} fa-lg text-warning"></i>
                                            @else
                                                <i class="fas fa-users fa-lg text-warning"></i>
                                            @endif
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="fw-bold mb-2 text-dark">{{ Str::limit($group->name, 50) }}</h5>
                                            <p class="text-muted small mb-2">
                                                {{ $group->short_description ?? 'Working Group' }}
                                                @if($group->date_range)
                                                    <span class="badge bg-warning ms-2">{{ $group->date_range }}</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Group Description -->
                                    <div class="mb-3">
                                        <p class="text-muted small mb-0">{{ Str::limit(strip_tags($group->description), 80) }}</p>
                                    </div>

                                    <!-- Action Button -->
                                    <div class="d-flex justify-content-start">
                                        <a href="{{ route('technical.detail', $group->slug) }}" class="btn btn-outline-warning btn-sm">
                                            <i class="fas fa-eye me-2"></i>View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-5">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                            <i class="fas fa-archive fa-4x text-warning"></i>
                        </div>
                        <h3 class="fw-bold text-dark mb-3">No Past Working Groups Found</h3>
                        <p class="text-muted mb-4">No archived working groups at this time.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<script>
function switchTab(tab) {
    const url = new URL(window.location);
    if (tab === 'past') {
        url.searchParams.set('archive', '1');
    } else {
        url.searchParams.delete('archive');
    }
    window.location = url;
}

// Set active tab on page load
document.addEventListener('DOMContentLoaded', function() {
    @if(request('archive'))
        document.getElementById('past-tab').classList.add('active');
        document.getElementById('current-tab').classList.remove('active');
        document.getElementById('past').classList.add('show', 'active');
        document.getElementById('current').classList.remove('show', 'active');
    @endif
});
</script>


@include('layouts.partials.call-to-action')
@endsection

@extends('layouts.frontendlayout')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-dark to-secondary text-white py-5">
    <div class="container">
        <div class="text-center">
            <h1 class="display-3 fw-bold mb-3">Our Achievements</h1>
            <p class="lead fs-4">Celebrating milestones and successes in open government initiatives</p>
            <div class="border-bottom border-3 border-warning mx-auto mt-4" style="width: 100px;"></div>
        </div>
    </div>
</section>

<!-- Achievements Section -->
<section class="py-5">
    <div class="container">
        <!-- Tabs Navigation -->
        <ul class="nav nav-pills justify-content-center mb-4" id="achievementsTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ !request('archive') ? 'active' : '' }}" id="current-achievements-tab" data-bs-toggle="pill" data-bs-target="#current-achievements" type="button" role="tab" onclick="switchAchievementsTab('current')">
                    Current Achievements
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ request('archive') ? 'active' : '' }}" id="past-achievements-tab" data-bs-toggle="pill" data-bs-target="#past-achievements" type="button" role="tab" onclick="switchAchievementsTab('past')">
                    Past Achievements
                </button>
            </li>
        </ul>

        <!-- Tabs Content -->
        <div class="tab-content" id="achievementsTabContent">
            <!-- Current Achievements Tab -->
            <div class="tab-pane fade {{ !request('archive') ? 'show active' : '' }}" id="current-achievements" role="tabpanel" @if(request('archive')) style="display: none !important;" @endif>
                <!-- Filter Section -->
                <div class="row align-items-center mb-4 bg-light p-3 rounded">
            <div class="col-lg-8">
                <div class="d-flex flex-wrap gap-3 align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-filter text-success me-2"></i>
                        <span class="fw-semibold text-dark">Filter by:</span>
                    </div>
                    <select class="form-select form-select-sm" style="width: auto;" onchange="filterByYear(this.value)">
                        <option value="">All Years</option>
                        @foreach($years as $year)
                            <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                        @endforeach
                    </select>
                    <select class="form-select form-select-sm" style="width: auto;" onchange="filterByPolicyArea(this.value)">
                        <option value="">All Policy Areas</option>
                        @foreach($policyAreas as $area)
                            <option value="{{ $area }}" {{ request('policy_area') == $area ? 'selected' : '' }}>{{ $area }}</option>
                        @endforeach
                    </select>
                    <select class="form-select form-select-sm" style="width: auto;" onchange="filterByTWG(this.value)">
                        <option value="">All Working Groups</option>
                        @foreach($technicalWorkingGroups as $twg)
                            <option value="{{ $twg->id }}" {{ request('twg') == $twg->id ? 'selected' : '' }}>{{ $twg->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <div class="d-flex align-items-center justify-content-lg-end">
                    <span class="text-muted me-3">Showing {{ $achievements->count() }} of {{ $achievements->total() }} achievements</span>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-success btn-sm" onclick="changeView('grid')">
                            <i class="fas fa-th"></i>
                        </button>
                        <button type="button" class="btn btn-outline-success btn-sm" onclick="changeView('list')">
                            <i class="fas fa-list"></i>
                        </button>
                    </div>
                </div>
                </div>

            <div id="current-achievements-grid" class="row g-4">
                @forelse($achievements as $achievement)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm hover-lift">
                        <div class="card-body p-4">
                            <!-- Achievement Header -->
                            <div class="d-flex align-items-start mb-3">
                                <div class="bg-warning bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                    <i class="fas fa-trophy fa-lg text-warning"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fw-bold mb-2 text-dark">{{ Str::limit($achievement->title, 50) }}</h5>
                                    <p class="text-muted small mb-2">{{ $achievement->submitted_year }} • {{ $achievement->policy_area }}</p>
                                </div>
                            </div>

                            <!-- Achievement Description -->
                            <div class="mb-3">
                                <p class="text-muted small mb-0">{{ Str::limit(strip_tags($achievement->description), 80) }}</p>
                            </div>

                            <!-- Working Group -->
                            <div class="mb-3">
                                <small class="text-muted">
                                    <i class="fas fa-users me-1"></i>
                                    {{ $achievement->technicalWorkingGroup->name ?? 'General' }}
                                </small>
                            </div>

                            <!-- Action Button -->
                            <div class="d-flex justify-content-start">
                                <a href="{{ route('achievement.detail', $achievement->slug) }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-eye me-2"></i>View Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                        <i class="fas fa-search fa-4x text-warning"></i>
                    </div>
                    <h3 class="fw-bold text-dark mb-3">No Achievements Found</h3>
                    <p class="text-muted mb-4">Try adjusting your filters or check back later for new achievements.</p>
                    <a href="{{ route('achievements') }}" class="btn btn-success btn-lg px-4 py-3">
                        <i class="fas fa-refresh me-2"></i>Clear Filters
                    </a>
                </div>
                @endforelse
            </div>

            <!-- List View (Hidden by default) -->
            <div id="current-achievements-list" class="d-none">
                @foreach($achievements as $achievement)
                <div class="card mb-3 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-md-1">
                                <div class="bg-warning bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mx-auto" style="width: 40px; height: 40px;">
                                    <i class="fas fa-trophy text-warning"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h5 class="fw-bold mb-1 text-dark">{{ $achievement->title }}</h5>
                                <p class="text-muted small mb-2">{{ $achievement->submitted_year }} • {{ $achievement->policy_area }}</p>
                                <p class="text-muted mb-0 small">{{ Str::limit(strip_tags($achievement->description), 100) }}</p>
                            </div>
                            <div class="col-md-3 text-md-end">
                                <a href="{{ route('achievement.detail', $achievement->slug) }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-eye me-2"></i>View Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($achievements->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $achievements->links('pagination::bootstrap-4') }}
            </div>
            @endif
            </div>

            <!-- Past Achievements Tab -->
            <div class="tab-pane fade {{ request('archive') ? 'show active' : '' }}" id="past-achievements" role="tabpanel" @if(request('archive')) style="display: block !important;" @endif>
                <!-- Filter Section -->
                <div class="row align-items-center mb-4">
                    <div class="col-lg-8">
                        <div class="d-flex flex-wrap gap-3 align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-filter text-warning me-2"></i>
                                <span class="fw-semibold text-dark">Filter by:</span>
                            </div>
                            <select class="form-select form-select-sm" style="width: auto;" onchange="filterByYear(this.value)">
                                <option value="">All Years</option>
                                @foreach($years as $year)
                                    <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                @endforeach
                            </select>
                            <select class="form-select form-select-sm" style="width: auto;" onchange="filterByPolicyArea(this.value)">
                                <option value="">All Policy Areas</option>
                                @foreach($policyAreas as $area)
                                    <option value="{{ $area }}" {{ request('policy_area') == $area ? 'selected' : '' }}>{{ $area }}</option>
                                @endforeach
                            </select>
                            <select class="form-select form-select-sm" style="width: auto;" onchange="filterByTWG(this.value)">
                                <option value="">All Working Groups</option>
                                @foreach($technicalWorkingGroups as $twg)
                                    <option value="{{ $twg->id }}" {{ request('twg') == $twg->id ? 'selected' : '' }}>{{ $twg->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                        <div class="d-flex align-items-center justify-content-lg-end">
                            <span class="text-muted me-3">Showing {{ $achievements->count() }} of {{ $achievements->total() }} achievements</span>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-outline-warning btn-sm" onclick="changeView('grid')">
                                    <i class="fas fa-th"></i>
                                </button>
                                <button type="button" class="btn btn-outline-warning btn-sm" onclick="changeView('list')">
                                    <i class="fas fa-list"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="past-achievements-grid" class="row g-4">
                    @forelse($achievements as $achievement)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body p-4">
                                <!-- Achievement Header -->
                                <div class="d-flex align-items-start mb-3">
                                    <div class="bg-warning bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                        <i class="fas fa-trophy fa-lg text-warning"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="fw-bold mb-2 text-dark">{{ Str::limit($achievement->title, 50) }}</h5>
                                        <p class="text-muted small mb-2">{{ $achievement->submitted_year }} • {{ $achievement->policy_area }}</p>
                                    </div>
                                </div>

                                <!-- Achievement Description -->
                                <div class="mb-3">
                                    <p class="text-muted small mb-0">{{ Str::limit(strip_tags($achievement->description), 80) }}</p>
                                </div>

                                <!-- Working Group -->
                                <div class="mb-3">
                                    <small class="text-muted">
                                        <i class="fas fa-users me-1"></i>
                                        {{ $achievement->technicalWorkingGroup->name ?? 'General' }}
                                    </small>
                                </div>

                                <!-- Action Button -->
                                <div class="d-flex justify-content-start">
                                    <a href="{{ route('achievement.detail', $achievement->slug) }}" class="btn btn-outline-warning btn-sm">
                                        <i class="fas fa-eye me-2"></i>View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center py-5">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                            <i class="fas fa-search fa-4x text-warning"></i>
                        </div>
                        <h3 class="fw-bold text-dark mb-3">No Archived Achievements Found</h3>
                        <p class="text-muted mb-4">Try adjusting your filters or check back later for archived achievements.</p>
                    </div>
                    @endforelse
                </div>

                <!-- List View (Hidden by default) -->
                <div id="past-achievements-list" class="d-none">
                    @foreach($achievements as $achievement)
                    <div class="card mb-3 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="row align-items-center">
                                <div class="col-md-1">
                                    <div class="bg-warning bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mx-auto" style="width: 40px; height: 40px;">
                                        <i class="fas fa-trophy text-warning"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h5 class="fw-bold mb-1 text-dark">{{ $achievement->title }}</h5>
                                    <p class="text-muted small mb-2">{{ $achievement->submitted_year }} • {{ $achievement->policy_area }}</p>
                                    <p class="text-muted mb-0 small">{{ Str::limit(strip_tags($achievement->description), 100) }}</p>
                                </div>
                                <div class="col-md-3 text-md-end">
                                    <a href="{{ route('achievement.detail', $achievement->slug) }}" class="btn btn-outline-warning btn-sm">
                                        <i class="fas fa-eye me-2"></i>View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($achievements->hasPages())
                <div class="d-flex justify-content-center mt-5">
                    {{ $achievements->links('pagination::bootstrap-4') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</section>



<script>
function switchAchievementsTab(tab) {
    const url = new URL(window.location);
    if (tab === 'past') {
        url.searchParams.set('archive', '1');
    } else {
        url.searchParams.delete('archive');
    }
    window.location = url;
}

function filterByYear(year) {
    const url = new URL(window.location);
    if (year) {
        url.searchParams.set('year', year);
    } else {
        url.searchParams.delete('year');
    }
    window.location = url;
}

function filterByPolicyArea(area) {
    const url = new URL(window.location);
    if (area) {
        url.searchParams.set('policy_area', area);
    } else {
        url.searchParams.delete('policy_area');
    }
    window.location = url;
}

function filterByTWG(twg) {
    const url = new URL(window.location);
    if (twg) {
        url.searchParams.set('twg', twg);
    } else {
        url.searchParams.delete('twg');
    }
    window.location = url;
}

function changeView(view) {
    // Determine which tab is active
    const isPastTab = document.getElementById('past-achievements').classList.contains('active');
    const gridViewId = isPastTab ? 'past-achievements-grid' : 'current-achievements-grid';
    const listViewId = isPastTab ? 'past-achievements-list' : 'current-achievements-list';

    const gridView = document.getElementById(gridViewId);
    const listView = document.getElementById(listViewId);

    if (view === 'grid') {
        gridView.classList.remove('d-none');
        listView.classList.add('d-none');
    } else {
        gridView.classList.add('d-none');
        listView.classList.remove('d-none');
    }
}

// Set active tab on page load
document.addEventListener('DOMContentLoaded', function() {
    @if(request('archive'))
        // Wait a bit to ensure Bootstrap is loaded
        setTimeout(function() {
            const currentTabBtn = document.getElementById('current-achievements-tab');
            const currentTabPane = document.getElementById('current-achievements');
            const pastTabBtn = document.getElementById('past-achievements-tab');
            const pastTabPane = document.getElementById('past-achievements');

            if (currentTabBtn && currentTabPane) {
                currentTabBtn.classList.remove('active');
                currentTabPane.classList.remove('show', 'active');
            }

            if (pastTabBtn && pastTabPane) {
                pastTabBtn.classList.add('active');
                pastTabPane.classList.add('show', 'active');

                // Use Bootstrap Tab API if available
                if (typeof bootstrap !== 'undefined' && bootstrap.Tab) {
                    try {
                        const pastTab = new bootstrap.Tab(pastTabBtn);
                        pastTab.show();
                    } catch(e) {
                        // Fallback: just ensure classes are set
                        console.log('Bootstrap Tab API not available, using class-based approach');
                    }
                }
            }
        }, 100);
    @endif
});
</script>

@include('layouts.partials.call-to-action')
@endsection

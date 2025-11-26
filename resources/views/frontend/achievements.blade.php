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

<!-- Filter Section -->
<section class="py-4 bg-light">
    <div class="container">
        <div class="row align-items-center">
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
        </div>
    </div>
</section>

<!-- Achievements Grid -->
<section class="py-5">
    <div class="container">
        @if($achievements->count() > 0)
            <div id="achievements-grid" class="row g-4">
                @foreach($achievements as $achievement)
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
                @endforeach
            </div>

            <!-- List View (Hidden by default) -->
            <div id="achievements-list" class="d-none">
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
            <div class="d-flex justify-content-center mt-5">
                {{ $achievements->links('pagination::bootstrap-4') }}
            </div>
        @else
            <!-- No Results -->
            <div class="text-center py-5">
                <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                    <i class="fas fa-search fa-4x text-warning"></i>
                </div>
                <h3 class="fw-bold text-dark mb-3">No Achievements Found</h3>
                <p class="text-muted mb-4">Try adjusting your filters or check back later for new achievements.</p>
                <a href="{{ route('achievements') }}" class="btn btn-success btn-lg px-4 py-3">
                    <i class="fas fa-refresh me-2"></i>Clear Filters
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-gradient-to-r from-success to-info text-white">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2 class="display-4 fw-bold mb-4">Share Your Achievement</h2>
                <p class="lead mb-4 fs-5">
                    Have a success story to share? We'd love to hear about your open government achievements and feature them on our platform.
                </p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="#" class="btn btn-light btn-lg px-5 py-3">
                        <i class="fas fa-plus me-2"></i>Submit Achievement
                    </a>
                    <a href="{{ route('technical.group') }}" class="btn btn-outline-light btn-lg px-5 py-3">
                        <i class="fas fa-users me-2"></i>Join Working Groups
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
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
    const gridView = document.getElementById('achievements-grid');
    const listView = document.getElementById('achievements-list');

    if (view === 'grid') {
        gridView.classList.remove('d-none');
        listView.classList.add('d-none');
    } else {
        gridView.classList.add('d-none');
        listView.classList.remove('d-none');
    }
}
</script>
@endsection

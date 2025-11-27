@extends('layouts.frontendlayout')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-dark to-secondary text-white py-5">
    <div class="container">
        <div class="text-center">
            <h1 class="display-3 fw-bold mb-3">Archived Achievements</h1>
            <p class="lead fs-4">Historical achievements from past Technical Working Groups</p>
            <div class="border-bottom border-3 border-warning mx-auto mt-4" style="width: 100px;"></div>
        </div>
    </div>
</section>

<!-- Achievements Section -->
<section class="py-5">
    <div class="container">
        <!-- Filter Section -->
        <div class="card mb-5 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="d-flex flex-wrap gap-3 align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-filter text-warning me-2"></i>
                                <span class="fw-semibold text-dark">Filter by:</span>
                            </div>
                            <select class="form-select form-select-sm" style="width: auto;" onchange="filterByYear(this.value)">
                                <option value="">All Years</option>
                                @for($year = date('Y'); $year >= 2020; $year--)
                                    <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                @endfor
                            </select>
                            <select class="form-select form-select-sm" style="width: auto;" onchange="filterByTWG(this.value)">
                                <option value="">All Past TWGs</option>
                                @foreach($archivedTWGs as $twg)
                                    <option value="{{ $twg->id }}" {{ request('twg') == $twg->id ? 'selected' : '' }}>{{ $twg->name }} @if($twg->date_range)({{ $twg->date_range }})@endif</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <div class="bg-warning bg-opacity-10 rounded p-3">
                            <span class="text-warning fw-bold fs-5">{{ $achievements->total() }} archived achievements</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Achievements Grid -->
        <div class="row g-4">
            @forelse($achievements as $achievement)
            <div class="col-lg-4">
                <div class="card h-100 shadow-sm border-0 text-center">
                    <div class="card-body d-flex flex-column p-4">
                        <div class="mb-4">
                            <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 100px; height: 100px;">
                                <i class="fas fa-trophy fa-3x text-warning"></i>
                            </div>
                        </div>
                        <div class="mb-3">
                            <span class="badge bg-warning">{{ $achievement->technicalWorkingGroup->name ?? 'General' }}</span>
                            @if($achievement->technicalWorkingGroup && $achievement->technicalWorkingGroup->date_range)
                                <span class="badge bg-secondary ms-2">{{ $achievement->technicalWorkingGroup->date_range }}</span>
                            @endif
                        </div>
                        <h5 class="card-title fw-semibold mb-3">{{ $achievement->title }}</h5>
                        <p class="card-text text-muted flex-grow-1 mb-4">{{ Str::limit($achievement->description, 150) }}</p>
                        <div class="mt-auto">
                            <div class="mb-3">
                                <span class="text-muted small">{{ $achievement->submitted_year }} • {{ $achievement->policy_area }}</span>
                            </div>
                            <a href="{{ route('achievement.detail', $achievement->slug) }}" class="btn btn-outline-warning btn-sm">
                                Learn More <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                    <i class="fas fa-archive fa-4x text-muted"></i>
                </div>
                <h3 class="h3 mb-3 text-muted">No archived achievements found</h3>
                <p class="text-muted fs-5">No achievements from past Technical Working Groups.</p>
                <a href="{{ route('achievements') }}" class="btn btn-success mt-3">View Current Achievements</a>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($achievements->hasPages())
        <div class="d-flex justify-content-center mt-5">
            {{ $achievements->links('pagination::bootstrap-4') }}
        </div>
        @endif
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

function filterByTWG(twg) {
    const url = new URL(window.location);
    if (twg) {
        url.searchParams.set('twg', twg);
    } else {
        url.searchParams.delete('twg');
    }
    window.location = url;
}
</script>

@include('layouts.partials.call-to-action')
@endsection


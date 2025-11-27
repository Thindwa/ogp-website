@extends('layouts.frontendlayout')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-dark to-secondary text-white py-5">
    <div class="container">
        <div class="text-center">
            <h1 class="display-3 fw-bold mb-3">Events & Updates</h1>
            <p class="lead fs-4">Stay informed about the latest developments in Open Government Partnership Malawi</p>
            <div class="border-bottom border-3 border-success mx-auto mt-4" style="width: 100px;"></div>
        </div>
    </div>
</section>

<!-- Events Grid -->
<section class="py-5">
    <div class="container">
        <!-- Tabs Navigation -->
        <ul class="nav nav-pills justify-content-center mb-4" id="eventsTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ !request('archive') ? 'active' : '' }}" id="current-events-tab" data-bs-toggle="pill" data-bs-target="#current-events" type="button" role="tab" onclick="switchEventsTab('current')">
                    Current Events
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ request('archive') ? 'active' : '' }}" id="past-events-tab" data-bs-toggle="pill" data-bs-target="#past-events" type="button" role="tab" onclick="switchEventsTab('past')">
                    Past Events
                </button>
            </li>
        </ul>

        <!-- Tabs Content -->
        <div class="tab-content" id="eventsTabContent">
            <!-- Current Events Tab -->
            <div class="tab-pane fade {{ !request('archive') ? 'show active' : '' }}" id="current-events" role="tabpanel">
                <!-- Filter Bar -->
        <div class="card mb-5 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label fw-bold text-dark">Filter by Working Group:</label>
                                <select class="form-select form-select-lg" onchange="filterByCategory(this.value)">
                                    <option value="">All Working Groups</option>
                                    <option value="Anti-Corruption" {{ request('category') == 'Anti-Corruption' ? 'selected' : '' }}>Anti-Corruption</option>
                                    <option value="Digital Governance" {{ request('category') == 'Digital Governance' ? 'selected' : '' }}>Digital Governance</option>
                                    <option value="Natural Resources" {{ request('category') == 'Natural Resources' ? 'selected' : '' }}>Natural Resources</option>
                                    <option value="Public Service Delivery" {{ request('category') == 'Public Service Delivery' ? 'selected' : '' }}>Public Service Delivery</option>
                                    <option value="Access to Information" {{ request('category') == 'Access to Information' ? 'selected' : '' }}>Access to Information</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold text-dark">Filter by Year:</label>
                                <select class="form-select form-select-lg" onchange="filterByYear(this.value)">
                                    <option value="">All Years</option>
                                    <option value="2024" {{ request('year') == '2024' ? 'selected' : '' }}>2024</option>
                                    <option value="2023" {{ request('year') == '2023' ? 'selected' : '' }}>2023</option>
                                    <option value="2022" {{ request('year') == '2022' ? 'selected' : '' }}>2022</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold text-dark">Status:</label>
                                <select class="form-select form-select-lg" onchange="filterByStatus(this.value)">
                                    <option value="">All Articles</option>
                                    <option value="featured" {{ request('status') == 'featured' ? 'selected' : '' }}>Featured Only</option>
                                </select>
                            </div>
                </div>
            </div>
                    <div class="col-md-4 text-md-end">
                        <div class="bg-success bg-opacity-10 rounded p-3">
                            <span class="text-success fw-bold fs-5">{{ $events->total() }} events found</span>
                </div>
            </div>
                </div>
            </div>
        </div>

        <!-- Events -->
        <div class="row g-4">
            @forelse($events as $event)
            <div class="col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    @if($event->featured_image)
                    <img src="{{ asset('storage/' . $event->featured_image) }}" class="card-img-top" alt="{{ $event->title }}" style="height: 250px; object-fit: cover;">
                    @else
                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 250px;">
                        <img src="{{ asset('images/news-placeholder.jpg') }}" alt="Event placeholder" class="img-fluid" style="max-height: 200px;">
                    </div>
                    @endif

                    <div class="card-body d-flex flex-column p-4">
                        <div class="mb-3">
                            <span class="text-muted small">{{ $event->technicalWorkingGroup->name ?? 'General' }}</span>
                            @if($event->is_featured)
                                <span class="text-warning small ms-2">• Featured</span>
                            @endif
                        </div>

                        <h5 class="card-title fw-bold mb-3">
                            <a href="{{ route('event.detail', $event->slug) }}" class="text-decoration-none text-dark">{{ $event->title }}</a>
                        </h5>

                        <p class="card-text text-muted flex-grow-1 mb-4">{{ Str::limit($event->excerpt, 120) }}</p>

                        <div class="mt-auto">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ $event->published_at ? $event->published_at->format('M d, Y') : 'Draft' }}
                                </small>
                                <small class="text-muted">
                                    <i class="fas fa-user me-1"></i>
                                    {{ $event->author ?? 'OGP Secretariat' }}
                                </small>
                            </div>
                            <a href="{{ route('event.detail', $event->slug) }}" class="btn btn-outline-success w-100">
                                <i class="fas fa-arrow-right me-2"></i>Read More
                            </a>
                </div>
            </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                    <img src="{{ asset('images/news-placeholder.jpg') }}" alt="Event placeholder" class="img-fluid" style="max-height: 80px;">
                </div>
                <h3 class="h3 mb-3 text-muted">No events found</h3>
                <p class="text-muted fs-5">Check back later for the latest updates.</p>
            </div>
            @endforelse
            </div>

        <!-- Pagination -->
        @if($events->hasPages())
        <div class="d-flex justify-content-center mt-5">
            <nav aria-label="Events pagination">
                {{ $events->links('pagination::bootstrap-4') }}
            </nav>
        </div>
        @endif

            </div>

            <!-- Past Events Tab -->
            <div class="tab-pane fade {{ request('archive') ? 'show active' : '' }}" id="past-events" role="tabpanel">
                <!-- Filter Bar -->
                <div class="card mb-5 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold text-dark">Filter by Working Group:</label>
                                        <select class="form-select form-select-lg" onchange="filterByTWG(this.value)">
                                            <option value="">All Working Groups</option>
                                            @foreach($archivedTWGs as $twg)
                                                <option value="{{ $twg->id }}" {{ request('twg') == $twg->id ? 'selected' : '' }}>{{ $twg->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold text-dark">Filter by Year:</label>
                                        <select class="form-select form-select-lg" onchange="filterByYear(this.value)">
                                            <option value="">All Years</option>
                                            <option value="2024" {{ request('year') == '2024' ? 'selected' : '' }}>2024</option>
                                            <option value="2023" {{ request('year') == '2023' ? 'selected' : '' }}>2023</option>
                                            <option value="2022" {{ request('year') == '2022' ? 'selected' : '' }}>2022</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold text-dark">Status:</label>
                                        <select class="form-select form-select-lg" onchange="filterByStatus(this.value)">
                                            <option value="">All Articles</option>
                                            <option value="featured" {{ request('status') == 'featured' ? 'selected' : '' }}>Featured Only</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <div class="bg-warning bg-opacity-10 rounded p-3">
                                    <span class="text-warning fw-bold fs-5">{{ $events->total() }} events found</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Events -->
                <div class="row g-4">
                    @forelse($events as $event)
                    <div class="col-lg-4">
                        <div class="card h-100 shadow-sm border-0">
                            @if($event->featured_image)
                            <img src="{{ asset('storage/' . $event->featured_image) }}" class="card-img-top" alt="{{ $event->title }}" style="height: 250px; object-fit: cover;">
                            @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 250px;">
                                <img src="{{ asset('images/news-placeholder.jpg') }}" alt="Event placeholder" class="img-fluid" style="max-height: 200px;">
                            </div>
                            @endif

                            <div class="card-body d-flex flex-column p-4">
                                <div class="mb-3">
                                    <span class="text-muted small">{{ $event->technicalWorkingGroup->name ?? 'General' }}</span>
                                    @if($event->is_featured)
                                        <span class="text-warning small ms-2">• Featured</span>
                                    @endif
                                </div>

                                <h5 class="card-title fw-bold mb-3">
                                    <a href="{{ route('event.detail', $event->slug) }}" class="text-decoration-none text-dark">{{ $event->title }}</a>
                                </h5>

                                <p class="card-text text-muted flex-grow-1 mb-4">{{ Str::limit($event->excerpt, 120) }}</p>

                                <div class="mt-auto">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <small class="text-muted">
                                            <i class="fas fa-calendar me-1"></i>
                                            {{ $event->published_at ? $event->published_at->format('M d, Y') : 'Draft' }}
                                        </small>
                                        <small class="text-muted">
                                            <i class="fas fa-user me-1"></i>
                                            {{ $event->author ?? 'OGP Secretariat' }}
                                        </small>
                                    </div>
                                    <a href="{{ route('event.detail', $event->slug) }}" class="btn btn-outline-warning w-100">
                                        <i class="fas fa-arrow-right me-2"></i>Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center py-5">
                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                            <img src="{{ asset('images/news-placeholder.jpg') }}" alt="Event placeholder" class="img-fluid" style="max-height: 80px;">
                        </div>
                        <h3 class="h3 mb-3 text-muted">No archived events found</h3>
                        <p class="text-muted fs-5">Check back later for archived updates.</p>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if($events->hasPages())
                <div class="d-flex justify-content-center mt-5">
                    <nav aria-label="Events pagination">
                        {{ $events->links('pagination::bootstrap-4') }}
                    </nav>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<script>
function switchEventsTab(tab) {
    const url = new URL(window.location);
    if (tab === 'past') {
        url.searchParams.set('archive', '1');
    } else {
        url.searchParams.delete('archive');
    }
    window.location = url;
}

function filterByCategory(category) {
    const url = new URL(window.location);
    if (category) {
        url.searchParams.set('category', category);
    } else {
        url.searchParams.delete('category');
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

function filterByYear(year) {
    const url = new URL(window.location);
    if (year) {
        url.searchParams.set('year', year);
    } else {
        url.searchParams.delete('year');
    }
    window.location = url;
}

function filterByStatus(status) {
    const url = new URL(window.location);
    if (status) {
        url.searchParams.set('status', status);
    } else {
        url.searchParams.delete('status');
    }
    window.location = url;
}

// Set active tab on page load
document.addEventListener('DOMContentLoaded', function() {
    @if(request('archive'))
        document.getElementById('past-events-tab').classList.add('active');
        document.getElementById('current-events-tab').classList.remove('active');
        document.getElementById('past-events').classList.add('show', 'active');
        document.getElementById('current-events').classList.remove('show', 'active');
    @endif
});
</script>

@include('layouts.partials.call-to-action')
@endsection

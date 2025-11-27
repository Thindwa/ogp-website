@extends('layouts.frontendlayout')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-dark to-secondary text-white py-5">
    <div class="container">
        <div class="text-center">
            <h1 class="display-3 fw-bold mb-3">Documents</h1>
            <p class="lead fs-4">Access important policy documents, reports, and resources</p>
            <div class="border-bottom border-3 border-warning mx-auto mt-4" style="width: 100px;"></div>
        </div>
    </div>
</section>

<!-- Documents Section -->
<section class="py-5">
    <div class="container">
        <!-- Tabs Navigation -->
        <ul class="nav nav-pills justify-content-center mb-4" id="documentsTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ !request('archive') ? 'active' : '' }}" id="current-docs-tab" data-bs-toggle="pill" data-bs-target="#current-docs" type="button" role="tab" onclick="switchDocsTab('current')">
                    Current Documents
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ request('archive') ? 'active' : '' }}" id="past-docs-tab" data-bs-toggle="pill" data-bs-target="#past-docs" type="button" role="tab" onclick="switchDocsTab('past')">
                    Past Documents
                </button>
            </li>
        </ul>

        <!-- Tabs Content -->
        <div class="tab-content" id="documentsTabContent">
            <!-- Current Documents Tab -->
            <div class="tab-pane fade {{ !request('archive') ? 'show active' : '' }}" id="current-docs" role="tabpanel">
                <!-- Filter Section -->
                <div class="row align-items-center mb-4 bg-light p-3 rounded">
            <div class="col-lg-8">
                <div class="d-flex flex-wrap gap-3 align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-filter text-success me-2"></i>
                        <span class="fw-semibold text-dark">Filter by:</span>
                    </div>
                    <select class="form-select form-select-sm" style="width: auto;" onchange="filterByCategory(this.value)">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                        @endforeach
                    </select>
                    <select class="form-select form-select-sm" style="width: auto;" onchange="filterByType(this.value)">
                        <option value="">All Types</option>
                        @foreach($types as $type)
                            <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>{{ strtoupper($type) }}</option>
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
                    <span class="text-muted me-3">Showing {{ $documents->count() }} of {{ $documents->total() }} documents</span>
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

            <div id="current-documents-grid" class="row g-4">
                @forelse($documents as $document)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm hover-lift">
                        <div class="card-body p-4">
                            <!-- Document Header -->
                            <div class="d-flex align-items-start mb-3">
                                <div class="me-3">
                                    @if($document->file_type === 'pdf')
                                        <div class="bg-danger bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                            <i class="fas fa-file-pdf fa-lg text-danger"></i>
                                        </div>
                                    @elseif($document->file_type === 'doc' || $document->file_type === 'docx')
                                        <div class="bg-primary bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                            <i class="fas fa-file-word fa-lg text-primary"></i>
                                        </div>
                                    @elseif($document->file_type === 'xlsx' || $document->file_type === 'xls')
                                        <div class="bg-success bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                            <i class="fas fa-file-excel fa-lg text-success"></i>
                                        </div>
                                    @else
                                        <div class="bg-secondary bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                            <i class="fas fa-file fa-lg text-secondary"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fw-bold mb-2 text-dark">{{ Str::limit($document->title, 50) }}</h5>
                                    <p class="text-muted small mb-2">{{ $document->category }} • {{ strtoupper($document->file_type) }}</p>
                                </div>
                            </div>

                            <!-- Document Description -->
                            <div class="mb-3">
                                <p class="text-muted small mb-0">{{ Str::limit(strip_tags($document->description), 80) }}</p>
                            </div>

                            <!-- Working Group -->
                            <div class="mb-3">
                                <small class="text-muted">
                                    <i class="fas fa-users me-1"></i>
                                    {{ $document->technicalWorkingGroup->name ?? 'General' }}
                                </small>
                            </div>

                            <!-- Action Button -->
                            <div class="d-flex justify-content-start">
                                <a href="{{ route('document.download', $document->slug) }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-download me-2"></i>Download
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
                    <h3 class="fw-bold text-dark mb-3">No Documents Found</h3>
                    <p class="text-muted mb-4">Try adjusting your filters or check back later for new documents.</p>
                    <a href="{{ route('documents') }}" class="btn btn-success btn-lg px-4 py-3">
                        <i class="fas fa-refresh me-2"></i>Clear Filters
                    </a>
                </div>
                @endforelse
            </div>

            <!-- List View (Hidden by default) -->
            <div id="current-documents-list" class="d-none">
                @foreach($documents as $document)
                <div class="card mb-3 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-md-1">
                                @if($document->file_type === 'pdf')
                                    <div class="bg-danger bg-opacity-10 rounded d-flex align-items-center justify-content-center mx-auto" style="width: 40px; height: 40px;">
                                        <i class="fas fa-file-pdf text-danger"></i>
                                    </div>
                                @elseif($document->file_type === 'doc' || $document->file_type === 'docx')
                                    <div class="bg-primary bg-opacity-10 rounded d-flex align-items-center justify-content-center mx-auto" style="width: 40px; height: 40px;">
                                        <i class="fas fa-file-word text-primary"></i>
                                    </div>
                                @elseif($document->file_type === 'xlsx' || $document->file_type === 'xls')
                                    <div class="bg-success bg-opacity-10 rounded d-flex align-items-center justify-content-center mx-auto" style="width: 40px; height: 40px;">
                                        <i class="fas fa-file-excel text-success"></i>
                                    </div>
                                @else
                                    <div class="bg-secondary bg-opacity-10 rounded d-flex align-items-center justify-content-center mx-auto" style="width: 40px; height: 40px;">
                                        <i class="fas fa-file text-secondary"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <h5 class="fw-bold mb-1 text-dark">{{ $document->title }}</h5>
                                <p class="text-muted small mb-2">{{ $document->category }} • {{ strtoupper($document->file_type) }}</p>
                                <p class="text-muted mb-0 small">{{ Str::limit(strip_tags($document->description), 100) }}</p>
                            </div>
                            <div class="col-md-3 text-md-end">
                                <a href="{{ route('document.download', $document->slug) }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-download me-2"></i>Download
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($documents->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $documents->links('pagination::bootstrap-4') }}
            </div>
            @endif
            </div>

            <!-- Past Documents Tab -->
            <div class="tab-pane fade {{ request('archive') ? 'show active' : '' }}" id="past-docs" role="tabpanel">
                <!-- Filter Section -->
                <div class="row align-items-center mb-4">
                    <div class="col-lg-8">
                        <div class="d-flex flex-wrap gap-3 align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-filter text-warning me-2"></i>
                                <span class="fw-semibold text-dark">Filter by:</span>
                            </div>
                            <select class="form-select form-select-sm" style="width: auto;" onchange="filterByCategory(this.value)">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                                @endforeach
                            </select>
                            <select class="form-select form-select-sm" style="width: auto;" onchange="filterByType(this.value)">
                                <option value="">All Types</option>
                                @foreach($types as $type)
                                    <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>{{ strtoupper($type) }}</option>
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
                            <span class="text-muted me-3">Showing {{ $documents->count() }} of {{ $documents->total() }} documents</span>
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

                <div id="past-documents-grid" class="row g-4">
                    @forelse($documents as $document)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body p-4">
                                <!-- Document Header -->
                                <div class="d-flex align-items-start mb-3">
                                    <div class="me-3">
                                        @if($document->file_type === 'pdf')
                                            <div class="bg-danger bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                <i class="fas fa-file-pdf fa-lg text-danger"></i>
                                            </div>
                                        @elseif($document->file_type === 'doc' || $document->file_type === 'docx')
                                            <div class="bg-primary bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                <i class="fas fa-file-word fa-lg text-primary"></i>
                                            </div>
                                        @elseif($document->file_type === 'xlsx' || $document->file_type === 'xls')
                                            <div class="bg-success bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                <i class="fas fa-file-excel fa-lg text-success"></i>
                                            </div>
                                        @else
                                            <div class="bg-secondary bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                <i class="fas fa-file fa-lg text-secondary"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="fw-bold mb-2 text-dark">{{ Str::limit($document->title, 50) }}</h5>
                                        <p class="text-muted small mb-2">{{ $document->category }} • {{ strtoupper($document->file_type) }}</p>
                                    </div>
                                </div>

                                <!-- Document Description -->
                                <div class="mb-3">
                                    <p class="text-muted small mb-0">{{ Str::limit(strip_tags($document->description), 80) }}</p>
                                </div>

                                <!-- Working Group -->
                                <div class="mb-3">
                                    <small class="text-muted">
                                        <i class="fas fa-users me-1"></i>
                                        {{ $document->technicalWorkingGroup->name ?? 'General' }}
                                    </small>
                                </div>

                                <!-- Action Button -->
                                <div class="d-flex justify-content-start">
                                    <a href="{{ route('document.download', $document->slug) }}" class="btn btn-outline-warning btn-sm">
                                        <i class="fas fa-download me-2"></i>Download
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
                        <h3 class="fw-bold text-dark mb-3">No Archived Documents Found</h3>
                        <p class="text-muted mb-4">Try adjusting your filters or check back later for archived documents.</p>
                    </div>
                    @endforelse
                </div>

                <!-- List View (Hidden by default) -->
                <div id="past-documents-list" class="d-none">
                    @foreach($documents as $document)
                    <div class="card mb-3 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="row align-items-center">
                                <div class="col-md-1">
                                    @if($document->file_type === 'pdf')
                                        <div class="bg-danger bg-opacity-10 rounded d-flex align-items-center justify-content-center mx-auto" style="width: 40px; height: 40px;">
                                            <i class="fas fa-file-pdf text-danger"></i>
                                        </div>
                                    @elseif($document->file_type === 'doc' || $document->file_type === 'docx')
                                        <div class="bg-primary bg-opacity-10 rounded d-flex align-items-center justify-content-center mx-auto" style="width: 40px; height: 40px;">
                                            <i class="fas fa-file-word text-primary"></i>
                                        </div>
                                    @elseif($document->file_type === 'xlsx' || $document->file_type === 'xls')
                                        <div class="bg-success bg-opacity-10 rounded d-flex align-items-center justify-content-center mx-auto" style="width: 40px; height: 40px;">
                                            <i class="fas fa-file-excel text-success"></i>
                                        </div>
                                    @else
                                        <div class="bg-secondary bg-opacity-10 rounded d-flex align-items-center justify-content-center mx-auto" style="width: 40px; height: 40px;">
                                            <i class="fas fa-file text-secondary"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <h5 class="fw-bold mb-1 text-dark">{{ $document->title }}</h5>
                                    <p class="text-muted small mb-2">{{ $document->category }} • {{ strtoupper($document->file_type) }}</p>
                                    <p class="text-muted mb-0 small">{{ Str::limit(strip_tags($document->description), 100) }}</p>
                                </div>
                                <div class="col-md-3 text-md-end">
                                    <a href="{{ route('document.download', $document->slug) }}" class="btn btn-outline-warning btn-sm">
                                        <i class="fas fa-download me-2"></i>Download
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($documents->hasPages())
                <div class="d-flex justify-content-center mt-5">
                    {{ $documents->links('pagination::bootstrap-4') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</section>



<script>
function switchDocsTab(tab) {
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

function filterByType(type) {
    const url = new URL(window.location);
    if (type) {
        url.searchParams.set('type', type);
    } else {
        url.searchParams.delete('type');
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
    const isPastTab = document.getElementById('past-docs').classList.contains('active');
    const gridViewId = isPastTab ? 'past-documents-grid' : 'current-documents-grid';
    const listViewId = isPastTab ? 'past-documents-list' : 'current-documents-list';

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
        document.getElementById('past-docs-tab').classList.add('active');
        document.getElementById('current-docs-tab').classList.remove('active');
        document.getElementById('past-docs').classList.add('show', 'active');
        document.getElementById('current-docs').classList.remove('show', 'active');
    @endif
});
</script>

@include('layouts.partials.call-to-action')
@endsection

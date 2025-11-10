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
    </div>
</section>

<!-- Documents Grid -->
<section class="py-5">
    <div class="container">
        @if($documents->count() > 0)
            <div id="documents-grid" class="row g-4">
                @foreach($documents as $document)
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
                                <a href="{{ route('document.detail', $document->slug) }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-download me-2"></i>Download
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- List View (Hidden by default) -->
            <div id="documents-list" class="d-none">
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
                                <a href="{{ route('document.detail', $document->slug) }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-download me-2"></i>Download
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-5">
                {{ $documents->links('pagination::bootstrap-4') }}
            </div>
        @else
            <!-- No Results -->
            <div class="text-center py-5">
                <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                    <i class="fas fa-search fa-4x text-warning"></i>
                </div>
                <h3 class="fw-bold text-dark mb-3">No Documents Found</h3>
                <p class="text-muted mb-4">Try adjusting your filters or check back later for new documents.</p>
                <a href="{{ route('documents') }}" class="btn btn-success btn-lg px-4 py-3">
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
                <h2 class="display-4 fw-bold mb-4">Submit a Document</h2>
                <p class="lead mb-4 fs-5">
                    Have a document to share? We'd love to include it in our resource library.
                </p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="#" class="btn btn-light btn-lg px-5 py-3">
                        <i class="fas fa-upload me-2"></i>Submit Document
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
    const gridView = document.getElementById('documents-grid');
    const listView = document.getElementById('documents-list');

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

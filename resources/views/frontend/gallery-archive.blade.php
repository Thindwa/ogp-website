@extends('layouts.frontendlayout')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-dark to-secondary text-white py-5">
    <div class="container">
        <div class="text-center">
            <h1 class="display-3 fw-bold mb-3">Archived Gallery</h1>
            <p class="lead fs-4">Historical gallery items from past Technical Working Groups</p>
            <div class="border-bottom border-3 border-warning mx-auto mt-4" style="width: 100px;"></div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
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
                            <select class="form-select form-select-sm" style="width: auto;" onchange="filterByCategory(this.value)">
                                <option value="">All Categories</option>
                                @foreach($galleryItems->pluck('category')->unique()->filter()->sort()->values() as $category)
                                    <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                                @endforeach
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
                            <span class="text-warning fw-bold fs-5">{{ $galleryItems->total() }} archived items</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gallery Grid -->
        <div class="row g-4">
            @forelse($galleryItems as $item)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    @if($item->getFirstMediaUrl('gallery'))
                        <img src="{{ $item->getFirstMediaUrl('gallery') }}" class="card-img-top" alt="{{ $item->title }}" style="height: 250px; object-fit: cover;">
                    @else
                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 250px;">
                            <i class="fas fa-image fa-3x text-muted"></i>
                        </div>
                    @endif
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <span class="badge bg-warning">{{ $item->technicalWorkingGroup->name ?? 'General' }}</span>
                            @if($item->technicalWorkingGroup && $item->technicalWorkingGroup->date_range)
                                <span class="badge bg-secondary ms-2">{{ $item->technicalWorkingGroup->date_range }}</span>
                            @endif
                        </div>
                        <h5 class="card-title fw-bold mb-3">{{ $item->title }}</h5>
                        <p class="card-text text-muted mb-3">{{ Str::limit($item->description, 100) }}</p>
                        <a href="{{ route('gallery.detail', $item->slug) }}" class="btn btn-outline-warning btn-sm">View Details</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                    <i class="fas fa-archive fa-4x text-muted"></i>
                </div>
                <h3 class="h3 mb-3 text-muted">No archived gallery items found</h3>
                <p class="text-muted fs-5">No gallery items from past Technical Working Groups.</p>
                <a href="{{ route('gallery') }}" class="btn btn-success mt-3">View Current Gallery</a>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($galleryItems->hasPages())
        <div class="d-flex justify-content-center mt-5">
            {{ $galleryItems->links('pagination::bootstrap-4') }}
        </div>
        @endif
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


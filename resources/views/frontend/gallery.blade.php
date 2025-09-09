@extends('layouts.frontendlayout')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-dark to-secondary text-white py-5">
    <div class="container">
        <div class="text-center">
            <h1 class="display-3 fw-bold mb-3">Photo Gallery</h1>
            <p class="lead fs-4">Visual stories of our work in promoting open government in Malawi</p>
            <div class="border-bottom border-3 border-warning mx-auto mt-4" style="width: 100px;"></div>
        </div>
    </div>
</section>

<!-- Gallery Grid -->
<section class="py-5">
    <div class="container">
        <!-- Filter Bar -->
        <div class="card mb-5 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label fw-bold text-dark">Category:</label>
                                <select class="form-select form-select-lg" onchange="filterByCategory(this.value)">
                                    <option value="">All Categories</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold text-dark">Year:</label>
                                <select class="form-select form-select-lg" onchange="filterByYear(this.value)">
                                    <option value="">All Years</option>
                                    <option value="2024" {{ request('year') == '2024' ? 'selected' : '' }}>2024</option>
                                    <option value="2023" {{ request('year') == '2023' ? 'selected' : '' }}>2023</option>
                                    <option value="2022" {{ request('year') == '2022' ? 'selected' : '' }}>2022</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold text-dark">Status:</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="featuredOnly" style="transform: scale(1.2);" onchange="filterByStatus(this.checked)" {{ request('status') == 'featured' ? 'checked' : '' }}>
                                    <label class="form-check-label fw-bold" for="featuredOnly">
                                        Featured Only
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <div class="bg-warning bg-opacity-10 rounded p-3">
                            <span class="text-warning fw-bold fs-5">{{ $galleryItems->total() }} photos found</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gallery Grid -->
        <div class="row g-4">
            @forelse($galleryItems as $item)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card shadow-sm border-0" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-image="{{ $item->getFirstMediaUrl('gallery') }}" data-bs-title="{{ $item->title }}" data-bs-description="{{ $item->description }}">
                    <div class="position-relative">
                        <img src="{{ $item->getFirstMediaUrl('gallery') }}" class="card-img-top" alt="{{ $item->title }}" style="height: 250px; object-fit: cover;">
                        <div class="position-absolute top-0 end-0 m-2">
                            @if($item->is_featured)
                                <span class="badge bg-success">Featured</span>
                            @endif
                        </div>
                        <div class="position-absolute top-50 start-50 translate-middle">
                            <div class="bg-white bg-opacity-75 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <i class="fas fa-search-plus fa-lg text-dark"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <h6 class="card-title fw-bold mb-2">{{ $item->title }}</h6>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-warning">{{ $item->category ?? 'General' }}</span>
                            <small class="text-muted">{{ $item->created_at->format('M d, Y') }}</small>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                    <i class="fas fa-images fa-4x text-muted"></i>
                </div>
                <h3 class="h3 mb-3 text-muted">No photos found</h3>
                <p class="text-muted fs-5">Check back later for new gallery updates.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($galleryItems->hasPages())
        <div class="d-flex justify-content-center mt-5">
            <nav aria-label="Gallery pagination">
                {{ $galleryItems->links('pagination::bootstrap-4') }}
            </nav>
        </div>
        @endif
    </div>
</section>

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="imageModalTitle">Image Title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img id="imageModalImage" src="" class="img-fluid rounded" alt="">
                <p id="imageModalDescription" class="mt-3 text-muted"></p>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageModal = document.getElementById('imageModal');
    const imageModalTitle = document.getElementById('imageModalTitle');
    const imageModalImage = document.getElementById('imageModalImage');
    const imageModalDescription = document.getElementById('imageModalDescription');

    imageModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const image = button.getAttribute('data-bs-image');
        const title = button.getAttribute('data-bs-title');
        const description = button.getAttribute('data-bs-description');

        imageModalTitle.textContent = title;
        imageModalImage.src = image;
        imageModalImage.alt = title;
        imageModalDescription.textContent = description;
    });
});

function filterByCategory(category) {
    const url = new URL(window.location);
    if (category) {
        url.searchParams.set('category', category);
    } else {
        url.searchParams.delete('category');
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

function filterByStatus(checked) {
    const url = new URL(window.location);
    if (checked) {
        url.searchParams.set('status', 'featured');
    } else {
        url.searchParams.delete('status');
    }
    window.location = url;
}
</script>
@endsection

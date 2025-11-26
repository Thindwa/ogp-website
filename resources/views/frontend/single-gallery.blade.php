@extends('layouts.frontendlayout')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-dark to-secondary text-white py-4">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-white-50">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('gallery') }}" class="text-decoration-none text-white-50">Gallery</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">{{ $galleryItem->title }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Gallery Item Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Gallery Item Header -->
                <div class="text-center mb-4">
                    <h1 class="display-4 fw-bold mb-3 text-dark">{{ $galleryItem->title }}</h1>
                    <div class="d-flex justify-content-center flex-wrap gap-2 mb-3">
                        <span class="badge bg-warning px-3 py-2">{{ $galleryItem->category ?? 'General' }}</span>
                        @if($galleryItem->is_featured)
                            <span class="badge bg-success px-3 py-2">Featured</span>
                        @endif
                        @if($galleryItem->is_active)
                            <span class="badge bg-info px-3 py-2">Active</span>
                        @else
                            <span class="badge bg-secondary px-3 py-2">Inactive</span>
                        @endif
                    </div>
                    <p class="text-muted fw-semibold">{{ $galleryItem->technicalWorkingGroup->name ?? 'General' }}</p>
                </div>

                <!-- Main Image -->
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-body p-0">
                        <img src="{{ $galleryItem->getFirstMediaUrl('gallery') }}" alt="{{ $galleryItem->title }}" class="img-fluid rounded" data-bs-toggle="modal" data-bs-target="#imageModal" style="cursor: pointer;">
                    </div>
                </div>

                <!-- Gallery Item Description -->
                @if($galleryItem->description)
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-warning text-white">
                        <h5 class="mb-0 fw-bold">Description</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="gallery-content">
                            {!! $galleryItem->description !!}
                        </div>
                    </div>
                </div>
                @endif

                <!-- Gallery Item Details -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4 text-center">
                                <div class="bg-secondary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                    <i class="fas fa-calendar fa-lg text-secondary"></i>
                                </div>
                                <h6 class="fw-bold text-dark mb-2">Created Date</h6>
                                <p class="text-muted mb-0 fs-5">{{ $galleryItem->created_at->format('F d, Y') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4 text-center">
                                <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                    <i class="fas fa-tags fa-lg text-info"></i>
                                </div>
                                <h6 class="fw-bold text-dark mb-2">Category</h6>
                                <p class="text-muted mb-0 fs-5">{{ $galleryItem->category ?? 'General' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Gallery Item Info -->
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0 fw-bold">Image Information</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <strong class="text-dark">Category:</strong>
                            <span class="badge bg-warning ms-2">{{ $galleryItem->category ?? 'General' }}</span>
                        </div>
                        <div class="mb-3">
                            <strong class="text-dark">Working Group:</strong>
                            <p class="mb-0 text-muted">{{ $galleryItem->technicalWorkingGroup->name ?? 'General' }}</p>
                        </div>
                        <div class="mb-3">
                            <strong class="text-dark">Status:</strong>
                            @if($galleryItem->is_active)
                                <span class="badge bg-info ms-2">Active</span>
                            @else
                                <span class="badge bg-secondary ms-2">Inactive</span>
                            @endif
                        </div>
                        @if($galleryItem->is_featured)
                        <div class="mb-3">
                            <strong class="text-dark">Featured:</strong>
                            <span class="badge bg-success ms-2">Yes</span>
                        </div>
                        @endif
                        <div class="mb-0">
                            <strong class="text-dark">Last Updated:</strong>
                            <p class="mb-0 text-muted">{{ $galleryItem->updated_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Related Gallery Items -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-warning text-white">
                        <h5 class="mb-0 fw-bold">Related Images</h5>
                    </div>
                    <div class="card-body p-0">
                        @forelse($relatedGalleryItems as $related)
                        <div class="d-flex p-3 border-bottom">
                            <img src="{{ $related->getFirstMediaUrl('gallery') }}" alt="{{ $related->title }}" class="rounded me-3" style="width: 60px; height: 60px; object-fit: cover;" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-image="{{ $related->getFirstMediaUrl('gallery') }}" data-bs-title="{{ $related->title }}" data-bs-description="{{ $related->description }}" style="cursor: pointer;">
                            <div class="flex-grow-1">
                                <h6 class="mb-1 fw-bold">
                                    <a href="{{ route('gallery.detail', $related->slug) }}" class="text-decoration-none text-dark">{{ Str::limit($related->title, 40) }}</a>
                                </h6>
                                <small class="text-muted">{{ $related->category ?? 'General' }}</small>
                            </div>
                        </div>
                        @empty
                        <div class="p-3 text-center">
                            <p class="text-muted mb-0">No related images found.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
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
</script>
@endsection

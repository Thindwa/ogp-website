@extends('layouts.frontendlayout')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-dark to-secondary text-white py-4">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-white-50">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('documents') }}" class="text-decoration-none text-white-50">Documents</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">{{ $document->title }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Document Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Document Header -->
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start mb-4">
                            <div class="me-3">
                                @if($document->file_type === 'pdf')
                                    <div class="bg-danger bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                        <i class="fas fa-file-pdf fa-3x text-danger"></i>
                                    </div>
                                @elseif($document->file_type === 'doc' || $document->file_type === 'docx')
                                    <div class="bg-primary bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                        <i class="fas fa-file-word fa-3x text-primary"></i>
                                    </div>
                                @elseif($document->file_type === 'xlsx' || $document->file_type === 'xls')
                                    <div class="bg-success bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                        <i class="fas fa-file-excel fa-3x text-success"></i>
                                    </div>
                                @else
                                    <div class="bg-secondary bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                        <i class="fas fa-file fa-3x text-secondary"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-grow-1">
                                <h1 class="h2 fw-bold mb-3 text-dark">{{ $document->title }}</h1>
                                <p class="text-muted fw-semibold mb-2">{{ $document->category }} • {{ strtoupper($document->file_type) }}</p>
                                <p class="text-muted mb-0">{{ $document->technicalWorkingGroup->name ?? 'General' }}</p>
                            </div>
                        </div>

                        <!-- Download Button -->
                        <div class="d-flex gap-2">
                            <a href="{{ route('document.download', $document->slug) }}" class="btn btn-success btn-lg px-4 py-3">
                                <i class="fas fa-download me-2"></i>Download Document
                            </a>
                            <button class="btn btn-outline-secondary btn-lg px-4 py-3" onclick="shareDocument()">
                                <i class="fas fa-share-alt me-2"></i>Share
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Document Description -->
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0 fw-bold">Document Description</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="document-content">
                            {!! $document->description !!}
                        </div>
                    </div>
                </div>

                <!-- Document Details -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4 text-center">
                                <div class="bg-secondary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                    <i class="fas fa-calendar fa-lg text-secondary"></i>
                                </div>
                                <h6 class="fw-bold text-dark mb-2">Created Date</h6>
                                <p class="text-muted mb-0 fs-5">{{ $document->created_at->format('F d, Y') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4 text-center">
                                <div class="bg-secondary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                    <i class="fas fa-download fa-lg text-secondary"></i>
                                </div>
                                <h6 class="fw-bold text-dark mb-2">Download Count</h6>
                                <p class="text-muted mb-0 fs-5">{{ $document->download_count ?? 0 }} downloads</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Document Info -->
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0 fw-bold">Document Information</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <strong class="text-dark">File Type:</strong>
                            <p class="mb-0 text-muted">{{ strtoupper($document->file_type) }}</p>
                        </div>
                        <div class="mb-3">
                            <strong class="text-dark">Category:</strong>
                            <p class="mb-0 text-muted">{{ $document->category }}</p>
                        </div>
                        <div class="mb-3">
                            <strong class="text-dark">Working Group:</strong>
                            <p class="mb-0 text-muted">{{ $document->technicalWorkingGroup->name ?? 'General' }}</p>
                        </div>

                    </div>
                </div>

                <!-- Related Documents -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0 fw-bold">Related Documents</h5>
                    </div>
                    <div class="card-body p-0">
                        @forelse($relatedDocuments as $related)
                        <div class="d-flex p-3 border-bottom">
                            <div class="me-3">
                                @if($related->file_type === 'pdf')
                                    <div class="bg-danger bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="fas fa-file-pdf text-danger"></i>
                                    </div>
                                @elseif($related->file_type === 'doc' || $related->file_type === 'docx')
                                    <div class="bg-primary bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="fas fa-file-word text-primary"></i>
                                    </div>
                                @else
                                    <div class="bg-secondary bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="fas fa-file text-secondary"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1 fw-bold">
                                    <a href="{{ route('document.detail', $related->slug) }}" class="text-decoration-none text-dark">{{ Str::limit($related->title, 40) }}</a>
                                </h6>
                                <small class="text-muted">{{ $related->category }} • {{ strtoupper($related->file_type) }}</small>
                            </div>
                        </div>
                        @empty
                        <div class="p-3 text-center">
                            <p class="text-muted mb-0">No related documents found.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<script>
function shareDocument() {
    if (navigator.share) {
        navigator.share({
            title: '{{ $document->title }}',
            text: '{{ Str::limit(strip_tags($document->description), 100) }}',
            url: window.location.href
        });
    } else {
        // Fallback for browsers that don't support Web Share API
        navigator.clipboard.writeText(window.location.href).then(function() {
            alert('Link copied to clipboard!');
        });
    }
}
</script>

@include('layouts.partials.call-to-action')
@endsection

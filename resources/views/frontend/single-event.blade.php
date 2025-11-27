@extends('layouts.frontendlayout')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-dark to-secondary text-white py-4">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-white-50">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('events') }}" class="text-decoration-none text-white-50">Events</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">{{ $event->title }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Event Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Event Header -->
                <div class="mb-4">
                    <div class="d-flex flex-wrap gap-2 mb-3">
                        <span class="text-muted small">{{ $event->technicalWorkingGroup->name ?? 'General' }}</span>
                        @if($event->is_featured)
                            <span class="text-warning small ms-2">• Featured</span>
                        @endif
                        <span class="text-muted small ms-2">• {{ $event->author ?? 'OGP Secretariat' }}</span>
                    </div>
                    <h1 class="display-4 fw-bold mb-3 text-dark">{{ $event->title }}</h1>
                    <div class="d-flex align-items-center text-muted mb-4">
                        <i class="fas fa-calendar me-2"></i>
                        <span>{{ $event->published_at ? $event->published_at->format('F d, Y') : 'Draft' }}</span>
                        <span class="mx-2">•</span>
                        <i class="fas fa-clock me-2"></i>
                        <span>{{ $event->published_at ? $event->published_at->diffForHumans() : 'Not published' }}</span>
                    </div>
                </div>

                <!-- Featured Image -->
                @if($event->featured_image)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $event->featured_image) }}" alt="{{ $event->title }}" class="img-fluid rounded shadow">
                </div>
                @else
                <div class="mb-4">
                    <img src="{{ asset('images/news-placeholder.jpg') }}" alt="{{ $event->title }}" class="img-fluid rounded shadow">
                </div>
                @endif

                <!-- Event Body -->
                <div class="article-content mb-5">
                    {!! $event->content !!}
                </div>

                <!-- Event Tags -->
                @if($event->tags)
                <div class="mb-5">
                    <h6 class="fw-bold text-dark mb-3">Tags:</h6>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach(explode(',', $event->tags) as $tag)
                        <span class="badge bg-light text-dark border">{{ trim($tag) }}</span>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Event Info -->
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0 fw-bold">Event Information</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <strong class="text-dark">Author:</strong>
                            <p class="mb-0 text-muted">{{ $event->author ?? 'OGP Secretariat' }}</p>
                        </div>
                        <div class="mb-3">
                            <strong class="text-dark">Published:</strong>
                            <p class="mb-0 text-muted">{{ $event->published_at ? $event->published_at->format('F d, Y') : 'Draft' }}</p>
                        </div>
                        <div class="mb-3">
                            <strong class="text-dark">Category:</strong>
                            <p class="mb-0 text-muted">{{ $event->technicalWorkingGroup->name ?? 'General' }}</p>
                        </div>

                    </div>
                </div>

                <!-- Related Events -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0 fw-bold">Related Events</h5>
                    </div>
                    <div class="card-body p-0">
                        @forelse($relatedEvents as $related)
                        <div class="d-flex p-3 border-bottom">
                            <div class="me-3">
                                @if($related->featured_image)
                                    <img src="{{ asset('storage/' . $related->featured_image) }}" alt="{{ $related->title }}" class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('images/news-placeholder.jpg') }}" alt="{{ $related->title }}" class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                @endif
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1 fw-bold">
                                    <a href="{{ route('event.detail', $related->slug) }}" class="text-decoration-none text-dark">{{ Str::limit($related->title, 50) }}</a>
                                </h6>
                                <small class="text-muted">{{ $related->published_at ? $related->published_at->format('M d, Y') : 'Draft' }}</small>
                            </div>
                        </div>
                        @empty
                        <div class="p-3 text-center">
                            <p class="text-muted mb-0">No related events found.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<script>
function shareOnFacebook() {
    const url = encodeURIComponent(window.location.href);
    window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank');
}

function shareOnTwitter() {
    const url = encodeURIComponent(window.location.href);
    const text = encodeURIComponent('{{ $event->title }}');
    window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}`, '_blank');
}

function shareOnLinkedIn() {
    const url = encodeURIComponent(window.location.href);
    window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${url}`, '_blank');
}

function copyLink() {
    navigator.clipboard.writeText(window.location.href).then(function() {
        alert('Link copied to clipboard!');
    });
}
</script>

@include('layouts.partials.call-to-action')
@endsection

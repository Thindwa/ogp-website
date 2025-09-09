@extends('layouts.frontendlayout')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-dark to-secondary text-white py-4">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-white-50">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('news') }}" class="text-decoration-none text-white-50">News</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">{{ $article->title }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Article Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Article Header -->
                <div class="mb-4">
                    <div class="d-flex flex-wrap gap-2 mb-3">
                        <span class="text-muted small">{{ $article->technicalWorkingGroup->name ?? 'General' }}</span>
                        @if($article->is_featured)
                            <span class="text-warning small ms-2">• Featured</span>
                        @endif
                        <span class="text-muted small ms-2">• {{ $article->author ?? 'OGP Secretariat' }}</span>
                    </div>
                    <h1 class="display-4 fw-bold mb-3 text-dark">{{ $article->title }}</h1>
                    <div class="d-flex align-items-center text-muted mb-4">
                        <i class="fas fa-calendar me-2"></i>
                        <span>{{ $article->published_at ? $article->published_at->format('F d, Y') : 'Draft' }}</span>
                        <span class="mx-2">•</span>
                        <i class="fas fa-clock me-2"></i>
                        <span>{{ $article->published_at ? $article->published_at->diffForHumans() : 'Not published' }}</span>
                    </div>
                </div>

                <!-- Featured Image -->
                @if($article->featured_image)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="img-fluid rounded shadow">
                </div>
                @else
                <div class="mb-4">
                    <img src="{{ asset('images/news-placeholder.jpg') }}" alt="{{ $article->title }}" class="img-fluid rounded shadow">
                </div>
                @endif

                <!-- Article Body -->
                <div class="article-content mb-5">
                    {!! $article->content !!}
                </div>

                <!-- Article Tags -->
                @if($article->tags)
                <div class="mb-5">
                    <h6 class="fw-bold text-dark mb-3">Tags:</h6>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach(explode(',', $article->tags) as $tag)
                        <span class="badge bg-light text-dark border">{{ trim($tag) }}</span>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Share Article -->
                <div class="card border-0 shadow-sm mb-5">
                    <div class="card-body p-4">
                        <h6 class="fw-bold text-dark mb-3">Share this article:</h6>
                        <div class="d-flex gap-2">
                            <a href="#" class="btn btn-outline-primary btn-sm" onclick="shareOnFacebook()">
                                <i class="fab fa-facebook-f me-1"></i>Facebook
                            </a>
                            <a href="#" class="btn btn-outline-info btn-sm" onclick="shareOnTwitter()">
                                <i class="fab fa-twitter me-1"></i>Twitter
                            </a>
                            <a href="#" class="btn btn-outline-success btn-sm" onclick="shareOnLinkedIn()">
                                <i class="fab fa-linkedin-in me-1"></i>LinkedIn
                            </a>
                            <button class="btn btn-outline-secondary btn-sm" onclick="copyLink()">
                                <i class="fas fa-link me-1"></i>Copy Link
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Article Info -->
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0 fw-bold">Article Information</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <strong class="text-dark">Author:</strong>
                            <p class="mb-0 text-muted">{{ $article->author ?? 'OGP Secretariat' }}</p>
                        </div>
                        <div class="mb-3">
                            <strong class="text-dark">Published:</strong>
                            <p class="mb-0 text-muted">{{ $article->published_at ? $article->published_at->format('F d, Y') : 'Draft' }}</p>
                        </div>
                        <div class="mb-3">
                            <strong class="text-dark">Category:</strong>
                            <p class="mb-0 text-muted">{{ $article->technicalWorkingGroup->name ?? 'General' }}</p>
                        </div>
                        <div class="mb-0">
                            <strong class="text-dark">Status:</strong>
                            <p class="mb-0 text-muted">{{ $article->is_featured ? 'Featured' : 'Regular' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Related Articles -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0 fw-bold">Related Articles</h5>
                    </div>
                    <div class="card-body p-0">
                        @forelse($relatedArticles as $related)
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
                                    <a href="{{ route('news.detail', $related->slug) }}" class="text-decoration-none text-dark">{{ Str::limit($related->title, 50) }}</a>
                                </h6>
                                <small class="text-muted">{{ $related->published_at ? $related->published_at->format('M d, Y') : 'Draft' }}</small>
                            </div>
                        </div>
                        @empty
                        <div class="p-3 text-center">
                            <p class="text-muted mb-0">No related articles found.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-gradient-to-r from-dark to-secondary text-white">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2 class="display-4 fw-bold mb-4">Stay Updated</h2>
                <p class="lead mb-4 fs-5">
                    Subscribe to our newsletter to receive the latest news and updates about Open Government Partnership Malawi.
                </p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="#" class="btn btn-light btn-lg px-5 py-3">
                        <i class="fas fa-envelope me-2"></i>Subscribe
                    </a>
                    <a href="{{ route('news') }}" class="btn btn-outline-light btn-lg px-5 py-3">
                        <i class="fas fa-newspaper me-2"></i>View All News
                    </a>
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
    const text = encodeURIComponent('{{ $article->title }}');
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
@endsection

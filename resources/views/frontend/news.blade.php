@extends('layouts.frontendlayout')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-dark to-secondary text-white py-5">
    <div class="container">
        <div class="text-center">
            <h1 class="display-3 fw-bold mb-3">News & Updates</h1>
            <p class="lead fs-4">Stay informed about the latest developments in Open Government Partnership Malawi</p>
            <div class="border-bottom border-3 border-success mx-auto mt-4" style="width: 100px;"></div>
        </div>
    </div>
</section>

<!-- News Grid -->
<section class="py-5">
    <div class="container">
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
                            <span class="text-success fw-bold fs-5">{{ $news->total() }} articles found</span>
                </div>
            </div>
                </div>
            </div>
        </div>

        <!-- News Articles -->
        <div class="row g-4">
            @forelse($news as $article)
            <div class="col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    @if($article->featured_image)
                    <img src="{{ asset('storage/' . $article->featured_image) }}" class="card-img-top" alt="{{ $article->title }}" style="height: 250px; object-fit: cover;">
                    @else
                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 250px;">
                        <img src="{{ asset('images/news-placeholder.jpg') }}" alt="News placeholder" class="img-fluid" style="max-height: 200px;">
                    </div>
                    @endif

                    <div class="card-body d-flex flex-column p-4">
                        <div class="mb-3">
                            <span class="text-muted small">{{ $article->technicalWorkingGroup->name ?? 'General' }}</span>
                            @if($article->is_featured)
                                <span class="text-warning small ms-2">• Featured</span>
                            @endif
                        </div>

                        <h5 class="card-title fw-bold mb-3">
                            <a href="{{ route('news.detail', $article->slug) }}" class="text-decoration-none text-dark">{{ $article->title }}</a>
                        </h5>

                        <p class="card-text text-muted flex-grow-1 mb-4">{{ Str::limit($article->excerpt, 120) }}</p>

                        <div class="mt-auto">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ $article->published_at ? $article->published_at->format('M d, Y') : 'Draft' }}
                                </small>
                                <small class="text-muted">
                                    <i class="fas fa-user me-1"></i>
                                    {{ $article->author ?? 'OGP Secretariat' }}
                                </small>
                            </div>
                            <a href="{{ route('news.detail', $article->slug) }}" class="btn btn-outline-success w-100">
                                <i class="fas fa-arrow-right me-2"></i>Read More
                            </a>
                </div>
            </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                    <img src="{{ asset('images/news-placeholder.jpg') }}" alt="News placeholder" class="img-fluid" style="max-height: 80px;">
                </div>
                <h3 class="h3 mb-3 text-muted">No news articles found</h3>
                <p class="text-muted fs-5">Check back later for the latest updates.</p>
            </div>
            @endforelse
            </div>

        <!-- Pagination -->
        @if($news->hasPages())
        <div class="d-flex justify-content-center mt-5">
            <nav aria-label="News pagination">
                {{ $news->links('pagination::bootstrap-4') }}
            </nav>
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
</script>
@endsection

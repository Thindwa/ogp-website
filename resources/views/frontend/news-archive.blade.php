@extends('layouts.frontendlayout')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-dark to-secondary text-white py-5">
    <div class="container">
        <div class="text-center">
            <h1 class="display-3 fw-bold mb-3">Archived News & Updates</h1>
            <p class="lead fs-4">Historical news from past Technical Working Groups</p>
            <div class="border-bottom border-3 border-warning mx-auto mt-4" style="width: 100px;"></div>
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
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-dark">Filter by Past TWG:</label>
                                <select class="form-select form-select-lg" onchange="filterByTWG(this.value)">
                                    <option value="">All Past TWGs</option>
                                    @foreach($archivedTWGs as $twg)
                                        <option value="{{ $twg->id }}" {{ request('twg') == $twg->id ? 'selected' : '' }}>{{ $twg->name }} @if($twg->date_range)({{ $twg->date_range }})@endif</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-dark">Filter by Year:</label>
                                <select class="form-select form-select-lg" onchange="filterByYear(this.value)">
                                    <option value="">All Years</option>
                                    @for($year = date('Y'); $year >= 2020; $year--)
                                        <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <div class="bg-warning bg-opacity-10 rounded p-3">
                            <span class="text-warning fw-bold fs-5">{{ $news->total() }} archived articles</span>
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
                            <span class="badge bg-warning">{{ $article->technicalWorkingGroup->name ?? 'General' }}</span>
                            @if($article->technicalWorkingGroup && $article->technicalWorkingGroup->date_range)
                                <span class="badge bg-secondary ms-2">{{ $article->technicalWorkingGroup->date_range }}</span>
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
                            </div>
                            <a href="{{ route('news.detail', $article->slug) }}" class="btn btn-outline-warning w-100">
                                <i class="fas fa-arrow-right me-2"></i>Read More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                    <i class="fas fa-archive fa-4x text-muted"></i>
                </div>
                <h3 class="h3 mb-3 text-muted">No archived news articles found</h3>
                <p class="text-muted fs-5">No news articles from past Technical Working Groups.</p>
                <a href="{{ route('news') }}" class="btn btn-success mt-3">View Current News</a>
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
</script>

@include('layouts.partials.call-to-action')
@endsection


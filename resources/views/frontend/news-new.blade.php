@extends('layouts.frontendlayout')

@section('content')
<!-- Page Header -->
<section class="section" style="background: var(--gray-50);">
    <div class="container">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-4">News & Updates</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Stay informed about the latest developments in Open Government Partnership Malawi
            </p>
        </div>
    </div>
</section>

<!-- News Grid -->
<section class="section">
    <div class="container">
        <!-- Filter Bar -->
        <div class="card mb-8">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <span class="font-medium">Filter by:</span>
                        <select class="form-control" style="width: auto; min-width: 150px;">
                            <option value="">All Categories</option>
                            <option value="transparency">Transparency</option>
                            <option value="accountability">Accountability</option>
                            <option value="participation">Participation</option>
                        </select>
                        <select class="form-control" style="width: auto; min-width: 150px;">
                            <option value="">All Years</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                        </select>
                    </div>
                    <div class="text-sm text-gray-500">
                        {{ $news->total() }} articles found
                    </div>
                </div>
            </div>
        </div>

        <!-- News Articles -->
        <div class="grid grid-cols-3">
            @forelse($news as $article)
            <div class="card">
                @if($article->featured_image)
                <img src="{{ asset('storage/' . $article->featured_image) }}"
                     alt="{{ $article->title }}" class="card-image">
                @else
                <div class="card-image" style="background: var(--gray-100); display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-newspaper text-4xl text-gray-400"></i>
                </div>
                @endif

                <div class="card-body">
                    <div class="card-meta mb-3">
                        <span class="badge badge-primary">{{ $article->technicalWorkingGroup->name ?? 'General' }}</span>
                        @if($article->is_featured)
                            <span class="badge badge-success">Featured</span>
                        @endif
                    </div>

                    <h3 class="card-title">
                        <a href="{{ route('news.detail', $article->slug) }}">{{ $article->title }}</a>
                    </h3>

                    <p class="card-text">{{ Str::limit($article->excerpt, 120) }}</p>

                    <div class="card-meta">
                        <span>{{ $article->published_at ? $article->published_at->format('M d, Y') : 'Draft' }}</span>
                        <span>•</span>
                        <span>{{ $article->author ?? 'OGP Secretariat' }}</span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-newspaper text-2xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">No news articles found</h3>
                <p class="text-gray-500">Check back later for the latest updates.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($news->hasPages())
        <div class="mt-8">
            {{ $news->links() }}
        </div>
        @endif
    </div>
</section>

@endsection

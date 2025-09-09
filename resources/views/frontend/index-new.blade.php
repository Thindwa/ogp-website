@extends('layouts.frontendlayout')

@section('content')
<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">Open Government Partnership Malawi</h1>
            <p class="hero-subtitle">
                Promoting transparency, accountability, and citizen participation in government through collaborative initiatives and innovative solutions.
            </p>
            <div class="hero-actions">
                <a href="{{ route('about') }}" class="btn btn-primary btn-lg">Learn More</a>
                <a href="{{ route('documents') }}" class="btn btn-outline btn-lg">View Documents</a>
            </div>
        </div>
    </div>
</section>

<!-- Quick Stats Section -->
<section class="section" style="background: var(--gray-50);">
    <div class="container">
        <div class="grid grid-cols-4">
            <div class="text-center">
                <div class="text-4xl font-bold text-accent-600 mb-2">5</div>
                <div class="text-gray-600">Working Groups</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-accent-600 mb-2">{{ $featuredNews->count() }}</div>
                <div class="text-gray-600">News Articles</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-accent-600 mb-2">{{ $featuredAchievements->count() }}</div>
                <div class="text-gray-600">Achievements</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-accent-600 mb-2">3</div>
                <div class="text-gray-600">Action Plans</div>
            </div>
        </div>
    </div>
</section>

<!-- Latest News Section -->
<section class="section">
    <div class="container">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Latest News</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Stay informed about the latest developments in Open Government Partnership Malawi
            </p>
        </div>

        <div class="grid grid-cols-3">
            @forelse($featuredNews->take(3) as $news)
            <div class="card">
                <img src="{{ $news->featured_image ? asset('storage/' . $news->featured_image) : asset('images/news-placeholder.jpg') }}"
                     alt="{{ $news->title }}" class="card-image">
                <div class="card-body">
                    <div class="card-meta mb-3">
                        <span class="badge badge-primary">{{ $news->technicalWorkingGroup->name ?? 'General' }}</span>
                        @if($news->is_featured)
                            <span class="badge badge-success">Featured</span>
                        @endif
                    </div>
                    <h3 class="card-title">
                        <a href="{{ route('news.detail', $news->slug) }}">{{ $news->title }}</a>
                    </h3>
                    <p class="card-text">{{ Str::limit($news->excerpt, 120) }}</p>
                    <div class="card-meta">
                        <span>{{ $news->published_at ? $news->published_at->format('M d, Y') : 'Draft' }}</span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12">
                <p class="text-gray-500">No news articles available at the moment.</p>
            </div>
            @endforelse
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('news') }}" class="btn btn-outline">View All News</a>
        </div>
    </div>
</section>

<!-- Featured Achievements Section -->
<section class="section" style="background: var(--gray-50);">
    <div class="container">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Recent Achievements</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Celebrating our progress in promoting transparency and accountability
            </p>
        </div>

        <div class="grid grid-cols-3">
            @forelse($featuredAchievements->take(3) as $achievement)
            <div class="card">
                <div class="card-body text-center">
                    <div class="w-16 h-16 bg-accent-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-trophy text-2xl text-accent-600"></i>
                    </div>
                    <h3 class="card-title">{{ $achievement->title }}</h3>
                    <p class="card-text">{{ Str::limit($achievement->description, 150) }}</p>
                    <div class="card-meta">
                        <span class="badge badge-secondary">{{ $achievement->submitted_year }}</span>
                        <span class="badge badge-primary">{{ $achievement->policy_area }}</span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12">
                <p class="text-gray-500">No achievements available at the moment.</p>
            </div>
            @endforelse
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('achievements') }}" class="btn btn-outline">View All Achievements</a>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="section">
    <div class="container">
        <div class="card" style="background: linear-gradient(135deg, var(--accent-600) 0%, var(--accent-500) 100%); color: white;">
            <div class="card-body text-center py-16">
                <h2 class="text-3xl font-bold mb-4">Get Involved</h2>
                <p class="text-lg mb-8 max-w-2xl mx-auto">
                    Join us in building a more transparent, accountable, and participatory government in Malawi.
                </p>
                <div class="flex gap-4 justify-center">
                    <a href="{{ route('technical.group') }}" class="btn btn-secondary btn-lg">Join Working Group</a>
                    <a href="{{ route('documents') }}" class="btn btn-outline btn-lg" style="color: white; border-color: white;">Download Resources</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

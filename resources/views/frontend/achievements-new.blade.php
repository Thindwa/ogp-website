@extends('layouts.frontendlayout')

@section('content')
<!-- Page Header -->
<section class="section" style="background: var(--gray-50);">
    <div class="container">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-4">Our Achievements</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Celebrating our progress in promoting transparency, accountability, and citizen participation
            </p>
        </div>
    </div>
</section>

<!-- Achievements Grid -->
<section class="section">
    <div class="container">
        <!-- Filter Bar -->
        <div class="card mb-8">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <span class="font-medium">Filter by:</span>
                        <select class="form-control" style="width: auto; min-width: 150px;">
                            <option value="">All Policy Areas</option>
                            <option value="transparency">Transparency</option>
                            <option value="accountability">Accountability</option>
                            <option value="participation">Participation</option>
                            <option value="technology">Technology</option>
                        </select>
                        <select class="form-control" style="width: auto; min-width: 150px;">
                            <option value="">All Years</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                        </select>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="form-control" style="width: auto;">
                            <span>Featured Only</span>
                        </label>
                    </div>
                    <div class="text-sm text-gray-500">
                        {{ $achievements->total() }} achievements found
                    </div>
                </div>
            </div>
        </div>

        <!-- Achievements Grid -->
        <div class="grid grid-cols-3">
            @forelse($achievements as $achievement)
            <div class="card">
                <div class="card-body text-center">
                    <div class="w-20 h-20 bg-accent-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-trophy text-3xl text-accent-600"></i>
                    </div>

                    <h3 class="card-title">{{ $achievement->title }}</h3>
                    <p class="card-text">{{ Str::limit($achievement->description, 150) }}</p>

                    <div class="card-meta mb-4">
                        <span class="badge badge-secondary">{{ $achievement->submitted_year }}</span>
                        <span class="badge badge-primary">{{ $achievement->policy_area }}</span>
                        @if($achievement->is_featured)
                            <span class="badge badge-success">Featured</span>
                        @endif
                    </div>

                    <div class="text-sm text-gray-500 mb-4">
                        <span>{{ $achievement->technicalWorkingGroup->name ?? 'General' }}</span>
                    </div>

                    <a href="{{ route('achievement.detail', $achievement->slug) }}" class="btn btn-outline btn-sm">
                        Learn More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-trophy text-2xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">No achievements found</h3>
                <p class="text-gray-500">Check back later for our latest accomplishments.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($achievements->hasPages())
        <div class="mt-8">
            {{ $achievements->links() }}
        </div>
        @endif
    </div>
</section>

<!-- Impact Statistics -->
<section class="section" style="background: var(--gray-50);">
    <div class="container">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Our Impact</h2>
            <p class="text-lg text-gray-600">Measuring our progress in numbers</p>
        </div>

        <div class="grid grid-cols-4">
            <div class="text-center">
                <div class="text-4xl font-bold text-accent-600 mb-2">15+</div>
                <div class="text-gray-600">Policy Reforms</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-accent-600 mb-2">50+</div>
                <div class="text-gray-600">Stakeholder Engagements</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-accent-600 mb-2">100+</div>
                <div class="text-gray-600">Citizens Reached</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-accent-600 mb-2">3</div>
                <div class="text-gray-600">Action Plans Completed</div>
            </div>
        </div>
    </div>
</section>

@endsection

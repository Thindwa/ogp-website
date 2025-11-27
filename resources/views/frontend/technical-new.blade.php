@extends('layouts.frontendlayout')

@section('content')
<!-- Page Header -->
<section class="section" style="background: var(--gray-50);">
    <div class="container">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-4">Technical Working Groups</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Collaborative groups driving open government initiatives across different policy areas
            </p>
        </div>
    </div>
</section>

<!-- Working Groups Grid -->
<section class="section">
    <div class="container">
        <div class="grid grid-cols-3">
            @forelse($technicalWorkingGroups as $group)
            <div class="card hover:shadow-lg transition-all">
                <div class="card-body text-center">
                    <div class="w-20 h-20 bg-accent-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        @if($group->icon)
                            <i class="{{ $group->icon }} text-3xl text-accent-600"></i>
                        @else
                            <i class="fas fa-users text-3xl text-accent-600"></i>
                        @endif
                    </div>

                    <h3 class="card-title">{{ $group->name }}</h3>
                    <p class="card-text">{{ Str::limit($group->description, 150) }}</p>

                    <div class="card-meta mb-4">
                        <span class="badge badge-primary">{{ $group->focus_area }}</span>
                        @if($group->is_active)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-secondary">Inactive</span>
                        @endif
                    </div>

                    <div class="text-sm text-gray-500 mb-4">
                        <div class="flex items-center justify-center gap-4">
                            <span><i class="fas fa-calendar mr-1"></i>Est. {{ $group->established_year ?? 'N/A' }}</span>
                            <span><i class="fas fa-users mr-1"></i>{{ $group->member_count ?? 0 }} members</span>
                        </div>
                    </div>

                    <a href="{{ route('technical.detail', $group->slug) }}" class="btn btn-outline btn-sm">
                        Learn More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-users text-2xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">No working groups found</h3>
                <p class="text-gray-500">Check back later for new group formations.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="section" style="background: var(--gray-50);">
    <div class="container">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">How Working Groups Work</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Understanding the collaborative process that drives our open government initiatives
            </p>
        </div>

        <div class="grid grid-cols-4">
            <div class="text-center">
                <div class="w-16 h-16 bg-accent-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-lightbulb text-2xl text-accent-600"></i>
                </div>
                <h3 class="font-semibold mb-2">Identify Issues</h3>
                <p class="text-sm text-gray-600">Groups identify key challenges in their policy areas</p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-accent-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-comments text-2xl text-accent-600"></i>
                </div>
                <h3 class="font-semibold mb-2">Collaborate</h3>
                <p class="text-sm text-gray-600">Stakeholders work together to develop solutions</p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-accent-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-tasks text-2xl text-accent-600"></i>
                </div>
                <h3 class="font-semibold mb-2">Implement</h3>
                <p class="text-sm text-gray-600">Groups implement and monitor their initiatives</p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-accent-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-chart-line text-2xl text-accent-600"></i>
                </div>
                <h3 class="font-semibold mb-2">Measure Impact</h3>
                <p class="text-sm text-gray-600">Track progress and measure outcomes</p>
            </div>
        </div>
    </div>
</section>



@endsection

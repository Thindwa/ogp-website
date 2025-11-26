@extends('layouts.frontendlayout')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-dark to-secondary text-white py-4">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-white-50">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('technical.group') }}" class="text-decoration-none text-white-50">Working Groups</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">{{ $group->name }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Technical Group Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Group Header -->
                <div class="text-center mb-5">
                    <div class="bg-secondary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 120px; height: 120px;">
                        @if($group->icon)
                            <i class="{{ $group->icon }} fa-4x text-secondary"></i>
                        @else
                            <i class="fas fa-users fa-4x text-secondary"></i>
                        @endif
                    </div>
                    <h1 class="display-4 fw-bold mb-3 text-dark">{{ $group->name }}</h1>
                    <p class="lead text-muted">{{ $group->short_description ?? 'Technical Working Group' }}</p>
                    <p class="text-muted">{{ $group->is_active ? 'Active Group' : 'Inactive Group' }}</p>
                </div>

                <!-- Group Description -->
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0 fw-bold">About This Working Group</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="group-content">
                            {!! $group->description !!}
                        </div>
                    </div>
                </div>

                <!-- Group Objectives -->
                @if($group->objectives && is_array($group->objectives) && count($group->objectives) > 0)
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0 fw-bold">Objectives</h5>
                    </div>
                    <div class="card-body p-4">
                        <ul class="list-unstyled mb-0">
                            @foreach($group->objectives as $objective)
                            <li class="mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                {{ is_array($objective) ? $objective['objective'] : $objective }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                <!-- Group Challenges -->
                @if($group->challenges && is_array($group->challenges) && count($group->challenges) > 0)
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0 fw-bold">Key Challenges</h5>
                    </div>
                    <div class="card-body p-4">
                        <ul class="list-unstyled mb-0">
                            @foreach($group->challenges as $challenge)
                            <li class="mb-2">
                                <i class="fas fa-exclamation-triangle text-warning me-2"></i>
                                {{ is_array($challenge) ? $challenge['challenge'] : $challenge }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                <!-- Group Interventions -->
                @if($group->interventions && is_array($group->interventions) && count($group->interventions) > 0)
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0 fw-bold">Key Interventions</h5>
                    </div>
                    <div class="card-body p-4">
                        <ul class="list-unstyled mb-0">
                            @foreach($group->interventions as $intervention)
                            <li class="mb-2">
                                <i class="fas fa-tools text-info me-2"></i>
                                {{ is_array($intervention) ? $intervention['intervention'] : $intervention }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                <!-- Working Group Info -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0 fw-bold">Working Group</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="bg-secondary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-users fa-lg text-secondary"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1 text-dark">{{ $group->name }}</h6>
                                <small class="text-muted">Technical Working Group</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Group Info -->
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0 fw-bold">Group Information</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <strong class="text-dark">Status:</strong>
                            <p class="mb-0 text-muted">{{ $group->is_active ? 'Active' : 'Inactive' }}</p>
                        </div>
                        @if($group->contact_person)
                        <div class="mb-3">
                            <strong class="text-dark">Contact Person:</strong>
                            <p class="mb-0 text-muted">{{ $group->contact_person }}</p>
                        </div>
                        @endif
                        @if($group->contact_email)
                        <div class="mb-3">
                            <strong class="text-dark">Contact Email:</strong>
                            <p class="mb-0 text-muted">{{ $group->contact_email }}</p>
                        </div>
                        @endif
                        <div class="mb-0">
                            <strong class="text-dark">Last Updated:</strong>
                            <p class="mb-0 text-muted">{{ $group->updated_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0 fw-bold">Contact Information</h5>
                    </div>
                    <div class="card-body p-4">
                        @if($group->contact_email)
                        <div class="mb-3">
                            <i class="fas fa-envelope me-2 text-secondary"></i>
                            <span class="text-muted">{{ $group->contact_email }}</span>
                        </div>
                        @else
                        <div class="mb-3">
                            <i class="fas fa-envelope me-2 text-secondary"></i>
                            <span class="text-muted">info@ogp.mw</span>
                        </div>
                        @endif
                        <div class="mb-3">
                            <i class="fas fa-phone me-2 text-secondary"></i>
                            <span class="text-muted">+265 1 123 456</span>
                        </div>
                        <div class="mb-0">
                            <i class="fas fa-map-marker-alt me-2 text-secondary"></i>
                            <span class="text-muted">Lilongwe, Malawi</span>
                        </div>
                    </div>
                </div>

                <!-- Related Groups -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0 fw-bold">Related Working Groups</h5>
                    </div>
                    <div class="card-body p-0">
                        @forelse($relatedGroups as $related)
                        <div class="d-flex p-3 border-bottom">
                            <div class="bg-secondary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                @if($related->icon)
                                    <i class="{{ $related->icon }} text-secondary"></i>
                                @else
                                    <i class="fas fa-users text-secondary"></i>
                                @endif
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1 fw-bold">
                                    <a href="{{ route('technical.detail', $related->slug) }}" class="text-decoration-none text-dark">{{ $related->name }}</a>
                                </h6>
                                <small class="text-muted">{{ $related->short_description ?? 'Working Group' }}</small>
                            </div>
                        </div>
                        @empty
                        <div class="p-3 text-center">
                            <p class="text-muted mb-0">No related working groups found.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Join Group Section -->
<section class="py-5 bg-gradient-to-r from-dark to-secondary text-white">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2 class="display-4 fw-bold mb-4">Join {{ $group->name }}</h2>
                <p class="lead mb-4 fs-5">
                    Interested in contributing to this working group? Contact us to learn more about how you can get involved.
                </p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="#" class="btn btn-light btn-lg px-5 py-3">
                        <i class="fas fa-envelope me-2"></i>Contact Group
                    </a>
                    <a href="{{ route('technical.group') }}" class="btn btn-outline-light btn-lg px-5 py-3">
                        <i class="fas fa-users me-2"></i>View All Groups
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@extends('layouts.frontendlayout')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-dark to-secondary text-white py-5">
    <div class="container">
        <div class="text-center">
            <h1 class="h1 h1-md display-3-md fw-light mb-3 mb-md-4">About Open Government Partnership</h1>
            <div class="border-bottom border-3 border-success mx-auto mb-3 mb-md-4" style="width: 100px;"></div>
            <p class="lead lh-lg mb-0 fs-5 fs-md-4">Promoting transparency, accountability, and citizen participation in government</p>
        </div>
    </div>
</section>

<!-- About Content -->
@php
    $ogpGlobal = $aboutPage;
@endphp

<section class="py-5">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <h2 class="h2 h1-md display-4-md fw-light mb-3 mb-md-4 text-dark">{{ $aboutPage->ogp_global_title ?? 'What is Open Government Partnership?' }}</h2>
                <div class="border-bottom border-3 border-success mx-auto mb-3 mb-md-4" style="width: 100px;"></div>
                <p class="lead text-muted lh-lg mb-3 mb-md-4 fs-6 fs-md-5">
                    {{ $aboutPage->ogp_global_content ?? 'The Open Government Partnership (OGP) is a multilateral initiative that aims to secure concrete commitments from governments to promote transparency, empower citizens, fight corruption, and harness new technologies to strengthen governance.' }}
                </p>
                @if($aboutPage->ogp_global_description)
                <p class="text-muted mb-3 mb-md-4 lh-lg">
                    {{ $aboutPage->ogp_global_description }}
                </p>
                @endif
                <div class="d-flex gap-2 gap-md-3 flex-wrap">
                    <a href="{{ route('documents') }}" class="btn btn-success btn-md btn-lg-md px-4 px-md-5 py-2 py-md-3 rounded-pill">
                        <i class="fas fa-file-alt me-2"></i>View Our Action Plans
                    </a>
                    <a href="{{ route('technical.group') }}" class="btn btn-outline-success btn-md btn-lg-md px-4 px-md-5 py-2 py-md-3 rounded-pill">
                        <i class="fas fa-users me-2"></i>Join Working Groups
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="bg-light rounded-4 p-4 text-center">
                    @if($aboutPage->ogp_global_image)
                        <img src="{{ asset('storage/' . $aboutPage->ogp_global_image) }}" alt="Government of Malawi" class="img-fluid mb-3" style="max-height: 300px;">
                    @else
                        <img src="{{ asset('images/arms.png') }}" alt="Government of Malawi" class="img-fluid mb-3" style="max-height: 300px;">
                    @endif
                    <h5 class="fw-semibold text-dark">Government of Malawi</h5>
                    <p class="text-muted">Committed to Open Government Principles</p>
                </div>
            </div>
        </div>

                    </div>
</section>

<!-- OGP Global Section -->
@if($ogpGlobal)
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="h2 h1-md display-4-md fw-light mb-3 mb-md-4 text-center text-dark">{{ $ogpGlobal->title ?? 'OGP Global' }}</h2>
                <div class="border-bottom border-3 border-primary mx-auto mb-3 mb-md-5" style="width: 100px;"></div>
            </div>
                        </div>

        <div class="row mb-5">
            <div class="col-lg-10 mx-auto">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <p class="lead text-muted lh-lg fs-6 fs-md-5">
                            {!! $ogpGlobal->content ?? 'The Open Government Partnership (OGP) is a multilateral partnership that aims to secure concrete commitments from national governments to promote open government, active citizen participation, transparency, accountability, and the harnessing of new technologies to strengthen governance.' !!}
                        </p>
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </section>
@endif

<!-- OGP in Malawi Timeline -->
@if($aboutPage->malawi_timeline_title)
<section class="py-5">
            <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="h2 h1-md display-4-md fw-light mb-3 mb-md-4 text-center text-dark">{{ $aboutPage->malawi_timeline_title ?? 'OGP in Malawi' }}</h2>
                <div class="border-bottom border-3 border-success mx-auto mb-3 mb-md-5" style="width: 100px;"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="timeline">
                    @if($aboutPage->malawi_timeline_data && is_array($aboutPage->malawi_timeline_data))
                        @foreach($aboutPage->malawi_timeline_data as $year => $description)
                        <div class="timeline-item mb-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px;">
                                            <span class="fw-semibold text-success fs-4">{{ $year }}</span>
                                        </div>

                                    </div>
                                    <p class="text-muted mb-0 lh-lg">
                                        {{ $description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="timeline-item mb-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <p class="text-muted mb-0 lh-lg">
                                        {{ $aboutPage->malawi_timeline_content ?? 'Malawi\'s journey with OGP has been marked by significant milestones and challenges.' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- How OGP Works in Malawi -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="h2 h1-md display-4-md fw-light mb-3 mb-md-4 text-center text-dark">How Is OGP Working in Malawi</h2>
                <div class="border-bottom border-3 border-warning mx-auto mb-3 mb-md-5" style="width: 100px;"></div>
            </div>
                </div>

        <div class="row g-4 mb-5">
            <div class="col-lg-12">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <i class="fas fa-users fa-lg text-success"></i>
                            </div>
                             <h4 class="fw-semibold mb-0 text-dark">{{ $aboutPage->steering_committee_title ?? '1. National Steering Committee' }}</h4>
                        </div>
                        <p class="text-muted lh-lg">
                            {{ $aboutPage->steering_committee_content ?? 'OGP in Malawi is coordinated by a National Steering Committee that leads the implementation of the Malawi OGP 2023–2025 National Action Plan. The committee includes government and civil society representatives who collaboratively guide implementation across sectors.' }}
                        </p>

                        @if($aboutPage->steering_committee_membership)
                        <div class="mt-4">
                            <h6 class="fw-semibold text-dark mb-3">OGP Malawi National Steering Committee Membership</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="fw-semibold text-success mb-2">Government Institutions</h6>
                                    <ul class="list-unstyled">
                                        @if(isset($aboutPage->steering_committee_membership['government_institutions']))
                                            @foreach($aboutPage->steering_committee_membership['government_institutions'] as $institution)
                                                <li class="mb-1">
                                                    <i class="fas fa-check-circle text-success me-2"></i>
                                                    {{ $institution }}
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="fw-semibold text-primary mb-2">Civil Society Organizations</h6>
                                    <ul class="list-unstyled">
                                        @if(isset($aboutPage->steering_committee_membership['civil_society_organizations']))
                                            @foreach($aboutPage->steering_committee_membership['civil_society_organizations'] as $organization)
                                                <li class="mb-1">
                                                    <i class="fas fa-check-circle text-primary me-2"></i>
                                                    {{ $organization }}
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            @if(isset($aboutPage->steering_committee_membership['ex_officio_members']))
                            <div class="mt-3">
                                <h6 class="fw-semibold text-warning mb-2">Ex-Officio Members</h6>
                                <ul class="list-unstyled">
                                    @foreach($aboutPage->steering_committee_membership['ex_officio_members'] as $member)
                                        <li class="mb-1">
                                            <i class="fas fa-check-circle text-warning me-2"></i>
                                            {{ $member }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-info bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <i class="{{ $aboutPage->action_plan_icon ?? 'fas fa-file-alt' }} fa-lg text-info"></i>
                            </div>
                            <h4 class="fw-semibold mb-0 text-dark">{{ $aboutPage->action_plan_title ?? '2. Malawi National Action Plan' }}</h4>
                        </div>
                        <p class="text-muted lh-lg">
                            {{ $aboutPage->action_plan_content ?? 'The Malawi OGP National Action Plan 2023–2025 outlines the country\'s commitments toward transparency, accountability, and citizen engagement. It was developed collaboratively with input from government and civil society.' }}
                        </p>
                        @if($aboutPage->action_plan_description)
                        <p class="text-muted lh-lg">
                            {{ $aboutPage->action_plan_description }}
                        </p>
                        @endif
                    </div>
                    </div>
                </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-warning bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <i class="{{ $aboutPage->secretariat_icon ?? 'fas fa-building' }} fa-lg text-warning"></i>
                            </div>
                            <h4 class="fw-semibold mb-0 text-dark">{{ $aboutPage->secretariat_title ?? '3. Secretariat' }}</h4>
                        </div>
                        <p class="text-muted lh-lg">
                            {{ $aboutPage->secretariat_content ?? 'The Secretariat provides administrative and technical support to the OGP Malawi initiative, coordinating activities between government agencies, civil society organizations, and other stakeholders.' }}
                        </p>
                        @if($aboutPage->secretariat_description)
                        <p class="text-muted lh-lg">
                            {{ $aboutPage->secretariat_description }}
                        </p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <i class="{{ $aboutPage->technical_working_groups_icon ?? 'fas fa-cogs' }} fa-lg text-primary"></i>
                            </div>
                            <h4 class="fw-semibold mb-0 text-dark">{{ $aboutPage->technical_working_groups_title ?? '4. Technical Working Groups' }}</h4>
                        </div>
                        <p class="text-muted mb-3 lh-lg">
                            {{ $aboutPage->technical_working_groups_content ?? 'Technical Working Groups (TWGs) are formed to coordinate and track progress on specific commitment areas within the action plan. These groups consist of representatives from government ministries, civil society, and technical experts who meet regularly to review progress and provide implementation support.' }}
                        </p>
                        @if($aboutPage->technical_working_groups_list && is_array($aboutPage->technical_working_groups_list))
                        <ol class="list-unstyled mb-0">
                            @foreach($aboutPage->technical_working_groups_list as $index => $twg)
                            <li class="mb-1">
                                <h6 class="fw-semibold text-dark mb-0">{{ $index }}. {{ $twg }}</h6>
                            </li>
                            @endforeach
                        </ol>
                        @else
                        <ol class="list-unstyled mb-0">

                        </ol>
                        @endif
                    </div>
                </div>
                    </div>
                </div>



            </div>
        </section>

<!-- Call to Action -->
<section class="py-5 bg-gradient-to-r from-success to-info text-white">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2 class="h2 h1-md display-4-md fw-light mb-3 mb-md-4 text-white">Get Involved</h2>
                <div class="border-bottom border-3 border-warning mx-auto mb-3 mb-md-4" style="width: 100px;"></div>
                <p class="lead mb-3 mb-md-4 lh-lg fs-6 fs-md-5 text-white">
                    Join us in building a more transparent, accountable, and participatory government in Malawi. Your voice matters in shaping our democracy.
                </p>
                <div class="d-flex gap-2 gap-md-3 justify-content-center flex-wrap">
                    <a href="{{ route('technical.group') }}" class="btn btn-light btn-md btn-lg-md px-4 px-md-5 py-2 py-md-3 rounded-pill">
                        <i class="fas fa-users me-2"></i>Join Working Groups
                    </a>
                    <a href="{{ route('documents') }}" class="btn btn-outline-light btn-md btn-lg-md px-4 px-md-5 py-2 py-md-3 rounded-pill">
                        <i class="fas fa-download me-2"></i>Download Resources
                    </a>
                </div>
      </div>
      </div>
    </div>
  </section>
@endsection

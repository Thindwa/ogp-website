@extends('layouts.frontendlayout')

@section('content')
    <!-- Page Header -->
    <section class="bg-gradient-to-r from-dark to-secondary text-white py-5">
        <div class="container">
            <div class="text-center">
                <h1 class="h1 h1-md display-3-md fw-light mb-3 mb-md-4">Open Government Partnership</h1>
                <div class="border-bottom border-3 border-success mx-auto mb-3 mb-md-4" style="width: 100px;"></div>
                <p class="lead lh-lg mb-0 fs-5 fs-md-4">Promoting transparency, accountability, and citizen participation in
                    government</p>
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
                    <h2 class="h2 h1-md display-4-md fw-light mb-3 mb-md-4 text-dark">
                        {{ $aboutPage->ogp_global_title ?? 'What is Open Government Partnership?' }}</h2>
                    <div class="border-bottom border-3 border-success mx-auto mb-3 mb-md-4" style="width: 100px;"></div>
                    <p class="lead text-muted lh-lg mb-3 mb-md-4 fs-6 fs-md-5">
                        {{ $aboutPage->ogp_global_content ?? 'The Open Government Partnership (OGP) is a multilateral initiative that aims to secure concrete commitments from governments to promote transparency, empower citizens, fight corruption, and harness new technologies to strengthen governance.' }}
                    </p>
                    @if ($aboutPage->ogp_global_description)
                        <p class="text-muted mb-3 mb-md-4 lh-lg">
                            {{ $aboutPage->ogp_global_description }}
                        </p>
                    @endif

                </div>
                <div class="col-lg-6">
                    <div class="bg-light rounded-4 p-4 text-center">
                        @if ($aboutPage->ogp_global_image)
                            <img src="{{ asset('storage/' . $aboutPage->ogp_global_image) }}" alt="Government of Malawi"
                                class="img-fluid mb-3" style="max-height: 300px;">
                        @else
                            <img src="{{ asset('images/arms.png') }}" alt="Government of Malawi" class="img-fluid mb-3"
                                style="max-height: 300px;">
                        @endif

                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Who is in OGP Section -->
    @php
        $whoIsOgp = $homePage ?? $aboutPage;
        $howOgpWorks = $homePage ?? $aboutPage;
        $malawiOgp = $homePage ?? $aboutPage;
    @endphp

    @if(($homePage->who_is_ogp_title ?? $aboutPage->who_is_ogp_title) || ($homePage->who_is_ogp_content ?? $aboutPage->who_is_ogp_content) || ($homePage->how_ogp_works_title ?? $aboutPage->how_ogp_works_title) || ($homePage->how_ogp_works_content ?? $aboutPage->how_ogp_works_content) || ($homePage->malawi_ogp_title ?? $aboutPage->malawi_ogp_title) || ($homePage->malawi_ogp_content ?? $aboutPage->malawi_ogp_content) || ($homePage->malawi_ogp_description ?? $aboutPage->malawi_ogp_description ?? $aboutPage->description))
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    @if($homePage->who_is_ogp_title ?? $aboutPage->who_is_ogp_title)
                    <div class="text-center mb-5">
                        <h2 class="display-4 fw-light text-dark mb-0">{{ $homePage->who_is_ogp_title ?? $aboutPage->who_is_ogp_title }}</h2>
                    </div>
                    @endif

                    <div class="row g-4">
                        @if($homePage->who_is_ogp_content ?? $aboutPage->who_is_ogp_content)
                        <div class="col-12">
                            <div class="bg-dark bg-opacity-75 p-3 p-md-5 rounded-4 shadow-sm border-start border-5 border-warning">
                                <div class="row align-items-center">
                                    <div class="col-12 col-lg-1 mb-3 mb-lg-0">
                                        <div class="text-center">
                                            <div class="bg-warning text-white rounded-circle d-inline-flex align-items-center justify-content-center overflow-hidden" style="width: 60px; height: 60px;">
                                                <img src="{{ asset('images/flag.jpeg') }}" alt="Globe" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-11">
                                        <p class="lead text-white mb-0 lh-lg fs-6 fs-md-5 text-center text-lg-start">
                                            {!! $homePage->who_is_ogp_content ?? $aboutPage->who_is_ogp_content !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if(($homePage->how_ogp_works_title ?? $aboutPage->how_ogp_works_title) || ($homePage->how_ogp_works_content ?? $aboutPage->how_ogp_works_content))
                        <div class="col-12 col-md-6">
                            <div class="bg-white p-3 p-md-5 h-100 shadow-sm rounded-4 border border-light">
                                <div class="d-flex flex-column flex-md-row align-items-start mb-4">
                                    <div class="flex-shrink-0 mb-3 mb-md-0">
                                        <div class="bg-warning rounded-3 d-flex align-items-center justify-content-center me-0 me-md-4 mx-auto overflow-hidden" style="width: 50px; height: 50px;">
                                            <img src="{{ asset('images/flag.jpeg') }}" alt="Cogs" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 text-center text-md-start">
                                        @if($homePage->how_ogp_works_title ?? $aboutPage->how_ogp_works_title)
                                        <h4 class="h5 h4-md fw-bold text-dark mb-3">{{ $homePage->how_ogp_works_title ?? $aboutPage->how_ogp_works_title }}</h4>
                                        @endif
                                        @if($homePage->how_ogp_works_content ?? $aboutPage->how_ogp_works_content)
                                        <p class="text-muted lh-lg mb-0 small">
                                            {{ $homePage->how_ogp_works_content ?? $aboutPage->how_ogp_works_content }}
                                        </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if(($homePage->malawi_ogp_title ?? $aboutPage->malawi_ogp_title) || ($homePage->malawi_ogp_content ?? $aboutPage->malawi_ogp_content))
                        <div class="col-12 col-md-6">
                            <div class="bg-white p-3 p-md-5 h-100 shadow-sm rounded-4 border border-light">
                                <div class="d-flex flex-column flex-md-row align-items-start mb-4">
                                    <div class="flex-shrink-0 mb-3 mb-md-0">
                                        <div class="bg-warning rounded-3 d-flex align-items-center justify-content-center me-0 me-md-4 mx-auto overflow-hidden" style="width: 50px; height: 50px;">
                                            <img src="{{ asset('images/flag.jpeg') }}" alt="Flag" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 text-center text-md-start">
                                        @if($homePage->malawi_ogp_title ?? $aboutPage->malawi_ogp_title)
                                        <h4 class="h5 h4-md fw-bold text-dark mb-3">{{ $homePage->malawi_ogp_title ?? $aboutPage->malawi_ogp_title }}</h4>
                                        @endif
                                        @if($homePage->malawi_ogp_content ?? $aboutPage->malawi_ogp_content)
                                        <p class="text-muted lh-lg mb-0 small">
                                            {!! $homePage->malawi_ogp_content ?? $aboutPage->malawi_ogp_content !!}
                                        </p>
                                        @endif
                                    </div>
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
                    <h2 class="h2 h1-md display-4-md fw-light mb-3 mb-md-4 text-center text-dark">How Is OGP Working in
                        Malawi</h2>
                    <div class="border-bottom border-3 border-warning mx-auto mb-3 mb-md-5" style="width: 100px;"></div>
                </div>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-lg-12">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3"
                                    style="width: 50px; height: 50px;">
                                    <i class="fas fa-users fa-lg text-success"></i>
                                </div>
                                <h4 class="fw-semibold mb-0 text-dark">
                                    {{ $aboutPage->steering_committee_title ?? '1. National Steering Committee' }}</h4>
                            </div>
                            <p class="text-muted lh-lg">
                                {{ $aboutPage->steering_committee_content ?? 'OGP in Malawi is coordinated by a National Steering Committee that leads the implementation of the Malawi OGP 2023–2025 National Action Plan. The committee includes government and civil society representatives who collaboratively guide implementation across sectors.' }}
                            </p>

                            @if ($aboutPage->steering_committee_membership)
                                <div class="mt-4">
                                    <h6 class="fw-semibold text-dark mb-3">OGP Malawi National Steering Committee Membership
                                    </h6>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="fw-semibold text-success mb-2">Government Institutions</h6>
                                            <ul class="list-unstyled">
                                                @if (isset($aboutPage->steering_committee_membership['government_institutions']))
                                                    @foreach ($aboutPage->steering_committee_membership['government_institutions'] as $institution)
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
                                                @if (isset($aboutPage->steering_committee_membership['civil_society_organizations']))
                                                    @foreach ($aboutPage->steering_committee_membership['civil_society_organizations'] as $organization)
                                                        <li class="mb-1">
                                                            <i class="fas fa-check-circle text-primary me-2"></i>
                                                            {{ $organization }}
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    @if (isset($aboutPage->steering_committee_membership['ex_officio_members']))
                                        <div class="mt-3">
                                            <h6 class="fw-semibold text-warning mb-2">Ex-Officio Members</h6>
                                            <ul class="list-unstyled">
                                                @foreach ($aboutPage->steering_committee_membership['ex_officio_members'] as $member)
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
                                <div class="bg-info bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3"
                                    style="width: 50px; height: 50px;">
                                    <i class="{{ $aboutPage->action_plan_icon ?? 'fas fa-file-alt' }} fa-lg text-info"></i>
                                </div>
                                <h4 class="fw-semibold mb-0 text-dark">
                                    {{ $aboutPage->action_plan_title ?? '2. Malawi National Action Plan' }}</h4>
                            </div>
                            <p class="text-muted lh-lg">
                                {{ $aboutPage->action_plan_content ?? 'The Malawi OGP National Action Plan 2023–2025 outlines the country\'s commitments toward transparency, accountability, and citizen engagement. It was developed collaboratively with input from government and civil society.' }}
                            </p>
                            @if ($aboutPage->action_plan_description)
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
                                <div class="bg-warning bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3"
                                    style="width: 50px; height: 50px;">
                                    <i
                                        class="{{ $aboutPage->secretariat_icon ?? 'fas fa-building' }} fa-lg text-warning"></i>
                                </div>
                                <h4 class="fw-semibold mb-0 text-dark">
                                    {{ $aboutPage->secretariat_title ?? '3. Secretariat' }}</h4>
                            </div>
                            <p class="text-muted lh-lg">
                                {{ $aboutPage->secretariat_content ?? 'The Secretariat provides administrative and technical support to the OGP Malawi initiative, coordinating activities between government agencies, civil society organizations, and other stakeholders.' }}
                            </p>
                            @if ($aboutPage->secretariat_description)
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
                                <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3"
                                    style="width: 50px; height: 50px;">
                                    <i
                                        class="{{ $aboutPage->technical_working_groups_icon ?? 'fas fa-cogs' }} fa-lg text-primary"></i>
                                </div>
                                <h4 class="fw-semibold mb-0 text-dark">
                                    {{ $aboutPage->technical_working_groups_title ?? '4. Technical Working Groups' }}</h4>
                            </div>
                            <p class="text-muted mb-3 lh-lg">
                                {{ $aboutPage->technical_working_groups_content ?? 'Technical Working Groups (TWGs) are formed to coordinate and track progress on specific commitment areas within the action plan. These groups consist of representatives from government ministries, civil society, and technical experts who meet regularly to review progress and provide implementation support.' }}
                            </p>
                            @if ($aboutPage->technical_working_groups_list && is_array($aboutPage->technical_working_groups_list))
                                <ol class="list-unstyled mb-0">
                                    @foreach ($aboutPage->technical_working_groups_list as $index => $twg)
                                        <li class="mb-1">
                                            <h6 class="fw-semibold text-dark mb-0">{{ $index }}.
                                                {{ $twg }}</h6>
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

    @include('layouts.partials.call-to-action')
@endsection

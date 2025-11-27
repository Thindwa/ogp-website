@extends('layouts.frontendlayout')

@section('content')
<!-- Gallery Slider Section -->
<section class="py-0">
    <div id="gallerySlider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach($galleryItems as $index => $item)
                <button type="button" data-bs-target="#gallerySlider" data-bs-slide-to="{{ $index }}"
                        class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                        aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>
      <div class="carousel-inner">
            @forelse($galleryItems as $index => $item)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <div class="position-relative" style="height: 50vh; min-height: 600px;">
                        @if($item->getFirstMediaUrl('gallery'))
                            <img src="{{ $item->getFirstMediaUrl('gallery') }}"
                                 class="d-block w-100 h-100"
                                 style="object-fit: cover;"
                                 alt="{{ $item->alt_text ?: $item->title }}">
                        @else
                            <div class="d-block w-100 h-100 bg-gradient-to-r from-dark to-secondary d-flex align-items-center justify-content-center">
                                <div class="text-center text-white px-3">
                                    <i class="fas fa-image fa-3x fa-5x-md mb-2 mb-md-3 opacity-50"></i>
                                    <h3 class="h4 h3-md fw-bold">{{ $item->title }}</h3>
                                </div>
                            </div>
                        @endif
                        <!-- Text overlay positioned at bottom -->
                        <div class="carousel-caption position-absolute bottom-0 start-0 end-0 text-start">
                            <div class="bg-gradient-to-top from-dark to-transparent p-2 p-md-4">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <h2 class="h3 h2-md display-5-md fw-light mb-2 mb-md-3 text-white">{{ $item->title }}</h2>
                                            @if($item->description)
                                                <p class="small lead-md mb-3 mb-md-4 text-white d-none d-md-block">{{ Str::limit($item->description, 120) }}</p>
                                            @endif
                                            {{-- <div class="d-flex gap-2 gap-md-3 flex-wrap">


                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
            </div>
          </div>
        </div>
            @empty
                <div class="carousel-item active">
                    <div class="position-relative" style="height: 50vh; min-height: 300px;">
                        <div class="d-block w-100 h-100 bg-gradient-to-r from-dark to-secondary d-flex align-items-center justify-content-center">
                            <div class="text-center text-white px-3">
                                <i class="fas fa-images fa-3x fa-5x-md mb-2 mb-md-3 opacity-50"></i>
                                <h2 class="h3 h2-md display-4-md fw-light mb-2 mb-md-3">Open Government Partnership Malawi</h2>
                                <p class="small lead-md mb-3 mb-md-4 lh-lg fs-6 fs-md-5 d-none d-md-block">
                                    Promoting transparency, accountability, and citizen participation in government through collaborative initiatives and innovative solutions.
                                </p>
                                <div class="d-flex gap-2 gap-md-3 flex-wrap justify-content-center">
                                    <a href="{{ route('about') }}" class="btn btn-light btn-sm btn-lg-md px-3 px-md-4 py-2 py-md-3 rounded-pill">
                                        <i class="fas fa-info-circle me-1 me-md-2"></i>Learn More
                                    </a>

            </div>
          </div>
        </div>
            </div>
          </div>
            @endforelse
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#gallerySlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
        <button class="carousel-control-next" type="button" data-bs-target="#gallerySlider" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>


<!-- Mission & Vision Section -->
<section class="py-3 py-md-5 bg-white">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center mb-3 mb-md-5">
            <h2 class="h2 h1-md display-4-md fw-light text-dark mb-0">Mission & Vision</h2>
        </div>

        <div class="row g-0">
            @php
                $mission = $homePage;
                $vision = $homePage;
            @endphp

            @if($mission)
            <div class="col-12 col-lg-6">
                <div class="p-3 p-md-5 h-100 d-flex flex-column justify-content-center" style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);">
                    <div class="mb-3 mb-md-4">
                        <div class="d-flex flex-column flex-md-row align-items-center align-items-md-start mb-3">
                            <div class="flex-shrink-0 mb-3 mb-md-0">
                                <div class="bg-warning text-white d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; border-radius: 15px;">
                                    <i class="{{ $mission->mission_icon }} fa-lg fa-2x-md"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-0 ms-md-4 text-center text-md-start">
                                <h3 class="h4 h2-md fw-bold text-dark mb-0">{{ $mission->mission_title }}</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted lh-lg mb-0 fs-6 fs-md-5 text-center text-md-start">
                        {{ $mission->mission_content }}
                    </p>
                </div>
            </div>
            @endif

            @if($vision)
            <div class="col-12 col-lg-6">
                <div class="p-3 p-md-5 h-100 d-flex flex-column justify-content-center bg-dark text-white">
                    <div class="mb-3 mb-md-4">
                        <div class="d-flex flex-column flex-md-row align-items-center align-items-md-start mb-3">
                            <div class="flex-shrink-0 mb-3 mb-md-0">
                                <div class="bg-warning text-white d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; border-radius: 15px;">
                                    <i class="{{ $vision->vision_icon }} fa-lg fa-2x-md"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-0 ms-md-4 text-center text-md-start">
                                <h3 class="h4 h2-md fw-bold text-white mb-0">{{ $vision->vision_title }}</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-light lh-lg mb-0 fs-6 fs-md-5 text-center text-md-start">
                        {{ $vision->vision_content }}
                    </p>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

       <!-- About Section -->
@if($homePage->about_title || $homePage->about_description)
<section class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            @if($homePage->about_image)
            <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                <div class="position-relative">
                    <div class="position-relative overflow-hidden" style="border-radius: 20px;">
                        <img src="{{ asset('storage/' . $homePage->about_image) }}"
                             alt="{{ $homePage->about_title ?? 'About OGP Malawi' }}"
                             class="img-fluid w-100"
                             style="height: 300px; object-fit: cover;">
                    </div>
                </div>
            </div>
            @endif

            <div class="col-12 col-lg-6">
                <div class="ps-0 ps-lg-5">
                    @if($homePage->about_title)
                    <div class="mb-3 mb-md-4 text-center text-lg-start">
                        <h2 class="h2 h1-md display-4-md fw-light text-dark mb-3 mb-md-4">
                            {{ $homePage->about_title }}
                        </h2>
                    </div>
                    @endif

                    @if($homePage->about_description)
                    <div class="mb-4 mb-md-5 text-center text-lg-start">
                        <p class="lead text-muted lh-lg mb-0 fs-6 fs-md-5">
                            {{ $homePage->about_description }}
                        </p>
                    </div>
                    @endif

                    <!-- Modern CTA buttons -->
                    <div class="d-flex flex-column flex-sm-row gap-2 gap-md-3 justify-content-center justify-content-lg-start">
                        <a href="{{ route('about') }}" class="btn btn-success btn-md btn-lg-md px-4 px-md-5 py-2 py-md-3 rounded-pill">
                            Learn More About Us
                        </a>

                    </div>
                </div>
          </div>
        </div>
    </div>
</section>
@endif



<!-- Latest Events Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-3 mb-md-5">
            <h2 class="h2 h1-md display-4-md fw-light text-dark mb-0">Latest Events</h2>
            <div class="border-bottom border-3 border-success mx-auto mb-3 mb-md-4" style="width: 100px;"></div>
            <p class="lead text-muted lh-lg mb-0 fs-6 fs-md-5">Stay informed about the latest developments in Open Government Partnership Malawi</p>
        </div>

        <div class="row g-4">
            @forelse($featuredEvents->take(3) as $event)
            <div class="col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    @if($event->featured_image)
                    <img src="{{ asset('storage/' . $event->featured_image) }}" class="card-img-top" alt="{{ $event->title }}" style="height: 250px; object-fit: cover;">
                    @else
                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 250px;">
                        <img src="{{ asset('images/news-placeholder.jpg') }}" alt="Event placeholder" class="img-fluid" style="max-height: 200px;">
                    </div>
                    @endif
                    <div class="card-body d-flex flex-column p-4">
                        <div class="mb-3">
                            <span class="text-muted small">{{ $event->technicalWorkingGroup->name ?? 'General' }}</span>
                            @if($event->is_featured)
                                <span class="text-warning small ms-2">• Featured</span>
                            @endif
                        </div>
                        <h5 class="card-title fw-semibold mb-3">
                            <a href="{{ route('event.detail', $event->slug) }}" class="text-decoration-none text-dark">{{ $event->title }}</a>
                        </h5>
                        <p class="card-text text-muted flex-grow-1 mb-4">{{ Str::limit($event->excerpt, 120) }}</p>
                        <div class="mt-auto">
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ $event->published_at ? $event->published_at->format('M d, Y') : 'Draft' }}
                                </small>
                                <a href="{{ route('event.detail', $event->slug) }}" class="btn btn-outline-success btn-sm">
                                    Read More <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 100px; height: 100px;">
                    <img src="{{ asset('images/news-placeholder.jpg') }}" alt="Event placeholder" class="img-fluid" style="max-height: 60px;">
                </div>
                <h3 class="h4 mb-2 text-muted">No events available</h3>
                <p class="text-muted">Check back later for the latest updates.</p>
            </div>
            @endforelse
        </div>
    </div>
  </section>

<!-- Featured Achievements Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-3 mb-md-5">
            <h2 class="h2 h1-md display-4-md fw-light text-dark mb-0">Recent Achievements</h2>
            <div class="border-bottom border-3 border-warning mx-auto mb-3 mb-md-4" style="width: 100px;"></div>
            <p class="lead text-muted lh-lg mb-0 fs-6 fs-md-5">Celebrating our progress in promoting transparency and accountability</p>
        </div>

        <div class="row g-4">
            @forelse($featuredAchievements->take(3) as $achievement)
            <div class="col-lg-4">
                <div class="card h-100 shadow-sm border-0 text-center">
                    <div class="card-body d-flex flex-column p-4">
                        <div class="mb-4">
                            <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 100px; height: 100px;">
                                <i class="fas fa-trophy fa-3x text-warning"></i>
                            </div>
                        </div>
                        <h5 class="card-title fw-semibold mb-3">{{ $achievement->title }}</h5>
                        <p class="card-text text-muted flex-grow-1 mb-4">{{ Str::limit($achievement->description, 150) }}</p>
                        <div class="mt-auto">
                            <div class="mb-3">
                                <span class="text-muted small">{{ $achievement->submitted_year }} • {{ $achievement->policy_area }}</span>
                            </div>
                            <a href="{{ route('achievement.detail', $achievement->slug) }}" class="btn btn-outline-warning btn-sm">
                                Learn More <i class="fas fa-arrow-right ms-1"></i>
                            </a>
        </div>
      </div>
        </div>
      </div>
            @empty
            <div class="col-12 text-center py-5">
                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 100px; height: 100px;">
                    <i class="fas fa-trophy fa-3x text-muted"></i>
                </div>
                <h3 class="h4 mb-2 text-muted">No achievements available</h3>
                <p class="text-muted">Check back later for our latest accomplishments.</p>
            </div>
            @endforelse
        </div>
    </div>
  </section>

@include('layouts.partials.call-to-action')
@endsection

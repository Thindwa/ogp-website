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
                    <div class="position-relative" style="height: 60vh; min-height: 400px;">
                        @if($item->getFirstMediaUrl('gallery'))
                            <img src="{{ $item->getFirstMediaUrl('gallery') }}"
                                 class="d-block w-100 h-100"
                                 style="object-fit: cover;"
                                 alt="{{ $item->alt_text ?: $item->title }}">
                        @else
                            <div class="d-block w-100 h-100 bg-gradient-to-r from-dark to-secondary d-flex align-items-center justify-content-center">
                                <div class="text-center text-white">
                                    <i class="fas fa-image fa-5x mb-3 opacity-50"></i>
                                    <h3 class="fw-bold">{{ $item->title }}</h3>
                                </div>
                            </div>
                        @endif
                        <!-- Text overlay positioned at bottom -->
                        <div class="carousel-caption d-none d-md-block position-absolute bottom-0 start-0 end-0 text-start">
                            <div class="bg-gradient-to-top from-dark to-transparent p-4">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h2 class="display-5 fw-bold mb-3 text-white">{{ $item->title }}</h2>
                                            @if($item->description)
                                                <p class="lead mb-4 text-white">{{ Str::limit($item->description, 120) }}</p>
                                            @endif
                                            <div class="d-flex gap-3 flex-wrap">
                                                <a href="{{ route('about') }}" class="btn btn-success btn-lg px-4 py-2">
                                                    <i class="fas fa-info-circle me-2"></i>Learn More
                                                </a>
                                                <a href="{{ route('gallery') }}" class="btn btn-outline-light btn-lg px-4 py-2">
                                                    <i class="fas fa-images me-2"></i>View Gallery
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
          </div>
        </div>
            @empty
                <div class="carousel-item active">
                    <div class="position-relative" style="height: 60vh; min-height: 400px;">
                        <div class="d-block w-100 h-100 bg-gradient-to-r from-dark to-secondary d-flex align-items-center justify-content-center">
                            <div class="text-center text-white">
                                <i class="fas fa-images fa-5x mb-3 opacity-50"></i>
                                <h2 class="display-4 fw-bold mb-3">Open Government Partnership Malawi</h2>
                                <p class="lead mb-4 fs-4">
                                    Promoting transparency, accountability, and citizen participation in government through collaborative initiatives and innovative solutions.
                                </p>
                                <div class="d-flex gap-3 flex-wrap justify-content-center">
                                    <a href="{{ route('about') }}" class="btn btn-light btn-lg px-4 py-3">
                                        <i class="fas fa-info-circle me-2"></i>Learn More
                                    </a>
                                    <a href="{{ route('documents') }}" class="btn btn-outline-light btn-lg px-4 py-3">
                                        <i class="fas fa-file-alt me-2"></i>View Documents
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
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-5">
        @php
            $mission = $homePage;
            $vision = $homePage;
        @endphp

            @if($mission)
            <div class="col-lg-6">
                <div class="text-center">
                    <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 100px; height: 100px;">
                        <i class="{{ $mission->icon ?? 'fas fa-eye' }} fa-3x text-success"></i>
                    </div>
                    <h3 class="h2 fw-bold text-dark mb-3">{{ $mission->mission_title ?? 'Our Mission' }}</h3>
                    <p class="lead text-muted">
                        {{ $mission->mission_content ?? 'To promote transparency, accountability, and citizen participation in government through collaborative initiatives and innovative solutions that strengthen democratic governance in Malawi.' }}
                    </p>
                </div>
      </div>
            @endif

            @if($vision)
            <div class="col-lg-6">
                <div class="text-center">
                    <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 100px; height: 100px;">
                        <i class="{{ $vision->icon ?? 'fas fa-rocket' }} fa-3x text-warning"></i>
                    </div>
                    <h3 class="h2 fw-bold text-dark mb-3">{{ $vision->vision_title ?? 'Our Vision' }}</h3>
                    <p class="lead text-muted">
                        {{ $vision->vision_content ?? 'A Malawi where government is open, transparent, and accountable to its citizens, fostering trust, participation, and sustainable development for all.' }}
                    </p>
                </div>
            </div>
            @endif
        </div>
    </div>
  </section>

<!-- Who is in OGP Section -->
@php
    $whoIsOgp = $homePage;
    $howOgpWorks = $homePage;
    $malawiOgp = $homePage;
@endphp

@if($homePage->who_is_ogp_title || $homePage->how_ogp_works_title || $homePage->malawi_ogp_title)
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                @if($homePage->who_is_ogp_title)
                 <div class="d-flex align-items-center mb-3">
                       <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                        <i class="fas fa-globe fa-2x text-primary"></i>
                    </div>
                    <h2 class="h1 fw-bold text-dark mb-1">{{ $homePage->who_is_ogp_title }}</h2>

                </div>
                @endif

                <div class="row g-4">
                    @if($homePage->who_is_ogp_content)
                    <div class="col-12">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <p class="lead text-muted mb-4">
                                    {!! $homePage->who_is_ogp_content !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($homePage->how_ogp_works_content)
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                        <i class="fas fa-cogs fa-lg text-success"></i>
                                    </div>
                                    <h4 class="h5 fw-bold text-dark mb-0">{{ $homePage->how_ogp_works_title ?? 'How Does OGP Work?' }}</h4>
                                </div>
                                <p class="text-muted mb-0">
                                    {{ $homePage->how_ogp_works_content }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($homePage->malawi_ogp_content)
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-warning bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                        <i class="fas fa-flag fa-lg text-warning"></i>
                                    </div>
                                    <h4 class="h5 fw-bold text-dark mb-0">{{ $homePage->malawi_ogp_title ?? 'When Did Malawi Join OGP?' }}</h4>
                                </div>
                                <p class="text-muted mb-0">
                                    {!! $homePage->malawi_ogp_content !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($malawiOgp && $malawiOgp->description)
                    <div class="col-12">
                        <div class="card border-0 bg-light">
                            <div class="card-body p-4 text-center">
                                <p class="text-muted mb-0">
                                    {!! $malawiOgp->description !!}
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

<!-- Latest News Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-4 fw-bold mb-3 text-dark">Latest News</h2>
            <p class="lead text-muted fs-5">Stay informed about the latest developments in Open Government Partnership Malawi</p>
            <div class="border-bottom border-3 border-success mx-auto" style="width: 100px;"></div>
        </div>

        <div class="row g-4">
            @forelse($featuredNews->take(3) as $news)
            <div class="col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    @if($news->featured_image)
                    <img src="{{ asset('storage/' . $news->featured_image) }}" class="card-img-top" alt="{{ $news->title }}" style="height: 250px; object-fit: cover;">
                    @else
                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 250px;">
                        <img src="{{ asset('images/news-placeholder.jpg') }}" alt="News placeholder" class="img-fluid" style="max-height: 200px;">
                    </div>
                    @endif
                    <div class="card-body d-flex flex-column p-4">
                        <div class="mb-3">
                            <span class="text-muted small">{{ $news->technicalWorkingGroup->name ?? 'General' }}</span>
                            @if($news->is_featured)
                                <span class="text-warning small ms-2">• Featured</span>
                            @endif
                        </div>
                        <h5 class="card-title fw-bold mb-3">
                            <a href="{{ route('news.detail', $news->slug) }}" class="text-decoration-none text-dark">{{ $news->title }}</a>
                        </h5>
                        <p class="card-text text-muted flex-grow-1 mb-4">{{ Str::limit($news->excerpt, 120) }}</p>
                        <div class="mt-auto">
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ $news->published_at ? $news->published_at->format('M d, Y') : 'Draft' }}
                                </small>
                                <a href="{{ route('news.detail', $news->slug) }}" class="btn btn-outline-success btn-sm">
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
                    <img src="{{ asset('images/news-placeholder.jpg') }}" alt="News placeholder" class="img-fluid" style="max-height: 60px;">
                </div>
                <h3 class="h4 mb-2 text-muted">No news articles available</h3>
                <p class="text-muted">Check back later for the latest updates.</p>
            </div>
            @endforelse
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('news') }}" class="btn btn-success btn-lg px-5 py-3">
                <i class="fas fa-newspaper me-2"></i>View All News
            </a>
      </div>
    </div>
  </section>

<!-- Featured Achievements Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-4 fw-bold mb-3 text-dark">Recent Achievements</h2>
            <p class="lead text-muted fs-5">Celebrating our progress in promoting transparency and accountability</p>
            <div class="border-bottom border-3 border-warning mx-auto" style="width: 100px;"></div>
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
                        <h5 class="card-title fw-bold mb-3">{{ $achievement->title }}</h5>
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

        <div class="text-center mt-5">
            <a href="{{ route('achievements') }}" class="btn btn-warning btn-lg px-5 py-3">
                <i class="fas fa-trophy me-2"></i>View All Achievements
            </a>
      </div>
    </div>
  </section>

<!-- Call to Action Section -->
<section class="py-5 bg-gradient-to-r from-success to-info text-white">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2 class="display-4 fw-bold mb-4">Get Involved</h2>
                <p class="lead mb-4 fs-5">
                    Join us in building a more transparent, accountable, and participatory government in Malawi.
                </p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="{{ route('technical.group') }}" class="btn btn-light btn-lg px-5 py-3">
                        <i class="fas fa-users me-2"></i>Join Working Group
                    </a>
                    <a href="{{ route('documents') }}" class="btn btn-outline-light btn-lg px-5 py-3">
                        <i class="fas fa-download me-2"></i>Download Resources
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

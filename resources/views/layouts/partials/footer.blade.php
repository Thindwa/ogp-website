@php
    $footer = $footerSettings ?? new \App\Models\FooterSettings();
@endphp

<footer class="bg-dark text-light py-5 mt-5">
    <div class="container">
        <div class="row g-4">
            <!-- About Section -->
            <div class="col-lg-4">
                <div class="mb-4">
                    <div class="d-flex align-items-center mb-3">
                        @if($footer->logo_image)
                            <img src="{{ asset('storage/' . $footer->logo_image) }}" alt="{{ $footer->logo_alt ?? 'OGP Malawi' }}" height="50" class="me-3">
                        @else
                            <img src="{{ asset('images/download.png') }}" alt="OGP Malawi" height="50" class="me-3">
                        @endif
                        <h5 class="fw-bold mb-0 text-white">{{ $footer->organization_name ?? 'OGP Malawi' }}</h5>
                    </div>
                    <p class="text-light mb-4">
                        {{ $footer->description ?? 'Promoting transparency, accountability, and citizen participation in government through collaborative initiatives and innovative solutions.' }}
                    </p>
                    <div class="d-flex gap-3">
                        @if($footer->facebook_url)
                        <a href="{{ $footer->facebook_url }}" target="_blank" rel="noopener noreferrer" class="text-success text-decoration-none">
                            <i class="fab fa-facebook fa-lg"></i>
                        </a>
                        @endif
                        @if($footer->twitter_url)
                        <a href="{{ $footer->twitter_url }}" target="_blank" rel="noopener noreferrer" class="text-success text-decoration-none">
                            <i class="fab fa-twitter fa-lg"></i>
                        </a>
                        @endif
                        @if($footer->linkedin_url)
                        <a href="{{ $footer->linkedin_url }}" target="_blank" rel="noopener noreferrer" class="text-success text-decoration-none">
                            <i class="fab fa-linkedin fa-lg"></i>
                        </a>
                        @endif
                        @if($footer->youtube_url)
                        <a href="{{ $footer->youtube_url }}" target="_blank" rel="noopener noreferrer" class="text-success text-decoration-none">
                            <i class="fab fa-youtube fa-lg"></i>
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2">
                <h6 class="fw-bold text-white mb-3">Quick Links</h6>
                <ul class="list-unstyled">
                    @if($footer->quick_links && is_array($footer->quick_links) && count($footer->quick_links) > 0)
                        @foreach($footer->quick_links as $link)
                            <li class="mb-2">
                                <a href="{{ $link['url'] ?? '#' }}" class="text-light text-decoration-none">
                                    <i class="fas fa-chevron-right me-2 text-success"></i>{{ $link['title'] ?? 'Link' }}
                                </a>
                            </li>
                        @endforeach
                    @else
                        <li class="mb-2">
                            <a href="{{ route('about') }}" class="text-light text-decoration-none">
                                <i class="fas fa-chevron-right me-2 text-success"></i>About OGP
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('technical.group') }}" class="text-light text-decoration-none">
                                <i class="fas fa-chevron-right me-2 text-success"></i>Working Groups
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('achievements') }}" class="text-light text-decoration-none">
                                <i class="fas fa-chevron-right me-2 text-success"></i>Achievements
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('documents') }}" class="text-light text-decoration-none">
                                <i class="fas fa-chevron-right me-2 text-success"></i>Documents
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('events') }}" class="text-light text-decoration-none">
                                <i class="fas fa-chevron-right me-2 text-success"></i>Events
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('gallery') }}" class="text-light text-decoration-none">
                                <i class="fas fa-chevron-right me-2 text-success"></i>Gallery
                            </a>
                        </li>
                    @endif
                </ul>
            </div>

            <!-- Resources -->
            <div class="col-lg-3">
                <h6 class="fw-bold text-white mb-3">Resources</h6>
                <ul class="list-unstyled">
                    @php
                        $documentCategories = \App\Models\Document::where('is_public', true)
                            ->distinct()
                            ->pluck('category')
                            ->filter()
                            ->sort()
                            ->values();
                    @endphp
                    @if($documentCategories->count() > 0)
                        @foreach($documentCategories as $category)
                            <li class="mb-2">
                                <a href="{{ route('documents', ['category' => $category]) }}" class="text-light text-decoration-none">
                                    <i class="fas fa-chevron-right me-2 text-warning"></i>{{ $category }}
                                </a>
                            </li>
                        @endforeach
                    @else
                        <li class="mb-2">
                            <a href="{{ route('documents') }}" class="text-light text-decoration-none">
                                <i class="fas fa-chevron-right me-2 text-warning"></i>All Documents
                            </a>
                        </li>
                    @endif
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-3">
                <h6 class="fw-bold text-white mb-3">Contact Information</h6>
                @if($footer->address)
                <div class="mb-3">
                    <div class="d-flex align-items-start">
                        <i class="fas fa-map-marker-alt text-success me-3 mt-1"></i>
                        <div>
                            <p class="text-light mb-0">{{ $footer->address }}</p>
                            @if($footer->address_detail)
                            <small class="text-light">{{ $footer->address_detail }}</small>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
                @if($footer->email)
                <div class="mb-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-envelope text-success me-3"></i>
                        <div>
                            <a href="mailto:{{ $footer->email }}" class="text-light text-decoration-none mb-0">{{ $footer->email }}</a>
                        </div>
                    </div>
                </div>
                @endif
                @if($footer->phone)
                <div class="mb-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-phone text-success me-3"></i>
                        <div>
                            <a href="tel:{{ $footer->phone }}" class="text-light text-decoration-none mb-0">{{ $footer->phone }}</a>
                        </div>
                    </div>
                </div>
                @endif
                @if($footer->website)
                <div class="mb-0">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-globe text-success me-3"></i>
                        <div>
                            <a href="{{ $footer->website }}" target="_blank" rel="noopener noreferrer" class="text-light text-decoration-none mb-0">{{ $footer->website }}</a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Footer Bottom -->
        <hr class="my-4 border-secondary">
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="text-light mb-0">
                    &copy; {{ date('Y') }} {{ $footer->organization_name ?? 'Open Government Partnership Malawi' }}. All rights reserved.
                </p>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="d-flex align-items-center justify-content-md-end">
                    <img src="{{ asset('images/arms.png') }}" alt="Government of Malawi" height="30" class="me-2">
                    <span class="text-light">Government of Malawi</span>
                </div>
            </div>
        </div>
    </div>
</footer>

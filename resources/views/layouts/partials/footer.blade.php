<footer class="bg-dark text-light py-5 mt-5">
    <div class="container">
        <div class="row g-4">
            <!-- About Section -->
            <div class="col-lg-4">
                <div class="mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('images/download.png') }}" alt="OGP Malawi" height="50" class="me-3">
                        <h5 class="fw-bold mb-0 text-white">OGP Malawi</h5>
                    </div>
                    <p class="text-light mb-4">
                        Promoting transparency, accountability, and citizen participation in government through collaborative initiatives and innovative solutions.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-success text-decoration-none">
                            <i class="fab fa-facebook fa-lg"></i>
                        </a>
                        <a href="#" class="text-success text-decoration-none">
                            <i class="fab fa-twitter fa-lg"></i>
                        </a>
                        <a href="#" class="text-success text-decoration-none">
                            <i class="fab fa-linkedin fa-lg"></i>
                        </a>
                        <a href="#" class="text-success text-decoration-none">
                            <i class="fab fa-youtube fa-lg"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2">
                <h6 class="fw-bold text-white mb-3">Quick Links</h6>
                <ul class="list-unstyled">
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
                        <a href="{{ route('news') }}" class="text-light text-decoration-none">
                            <i class="fas fa-chevron-right me-2 text-success"></i>News
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('gallery') }}" class="text-light text-decoration-none">
                            <i class="fas fa-chevron-right me-2 text-success"></i>Gallery
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Resources -->
            <div class="col-lg-3">
                <h6 class="fw-bold text-white mb-3">Resources</h6>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="#" class="text-light text-decoration-none">
                            <i class="fas fa-chevron-right me-2 text-warning"></i>Action Plans
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-light text-decoration-none">
                            <i class="fas fa-chevron-right me-2 text-warning"></i>Progress Reports
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-light text-decoration-none">
                            <i class="fas fa-chevron-right me-2 text-warning"></i>Policy Documents
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-light text-decoration-none">
                            <i class="fas fa-chevron-right me-2 text-warning"></i>Guidelines
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-light text-decoration-none">
                            <i class="fas fa-chevron-right me-2 text-warning"></i>Best Practices
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-3">
                <h6 class="fw-bold text-white mb-3">Contact Information</h6>
                <div class="mb-3">
                    <div class="d-flex align-items-start">
                        <i class="fas fa-map-marker-alt text-success me-3 mt-1"></i>
                        <div>
                            <p class="text-light mb-0">Lilongwe, Malawi</p>
                            <small class="text-light">Government Complex</small>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-envelope text-success me-3"></i>
                        <div>
                            <p class="text-light mb-0">info@ogp.mw</p>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-phone text-success me-3"></i>
                        <div>
                            <p class="text-light mb-0">+265 1 123 456</p>
                        </div>
                    </div>
                </div>
                <div class="mb-0">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-globe text-success me-3"></i>
                        <div>
                            <p class="text-light mb-0">www.ogp.mw</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <hr class="my-4 border-secondary">
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="text-light mb-0">
                    &copy; {{ date('Y') }} Open Government Partnership Malawi. All rights reserved.
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

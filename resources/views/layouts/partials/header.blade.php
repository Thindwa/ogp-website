<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('images/download.png') }}" alt="OGP Malawi" height="50" class="me-2">
            <span class="fw-bold text-primary">OGP Malawi</span>
        </a>

        <!-- Mobile toggle button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active fw-bold' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active fw-bold' : '' }}" href="{{ route('about') }}">About OGP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('technical.group') ? 'active fw-bold' : '' }}" href="{{ route('technical.group') }}">Working Groups</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('achievements') ? 'active fw-bold' : '' }}" href="{{ route('achievements') }}">Achievements</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('documents') ? 'active fw-bold' : '' }}" href="{{ route('documents') }}">Documents</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('news') ? 'active fw-bold' : '' }}" href="{{ route('news') }}">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('gallery') ? 'active fw-bold' : '' }}" href="{{ route('gallery') }}">Gallery</a>
                </li>
            </ul>

            <!-- Government Logo -->
            <div class="ms-3">
                <img src="{{ asset('images/arms.png') }}" alt="Government of Malawi" height="40">
            </div>
        </div>
    </div>
</nav>

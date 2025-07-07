<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container d-flex justify-content-between align-items-center">

      <!-- Left: Logo -->
      <div class="header-left">
        <a href="{{ route('home') }}" class="logo d-flex align-items-center">
          <img src="{{ asset('images/download.png') }}" alt="Logo" style="width: 100px; height: auto;">
        </a>
      </div>

      <!-- Center: Navigation Menu -->
      <div class="header-center flex-grow-1 d-flex justify-content-center">
        <nav id="navmenu" class="navmenu">
          <ul class="d-flex list-unstyled mb-0 gap-3">
            <li><a href="{{ route('home') }}" class="active">Home</a></li>
            <li><a href="{{ route('about') }}">About OGP</a></li>
            <li><a href="{{ route('technical.group') }}">Technical Working Groups</a></li>
            <li><a href="{{ route('achievements') }}">Achievements</a></li>

            <li><a href="{{ route('downloads') }}">Downloads</a></li>
            <li><a href="{{ route('news') }}">News</a></li>
            <li><a href="{{ route('gallery') }}">Gallery</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
      </div>

      <!-- Right: Social Links or Another Logo -->
      <div class="header-right">
        <a href="{{ route('home') }}" class="d-flex align-items-center">
          <img src="{{ asset('images/arms.png') }}" alt="Logo" style="width: 60px; height: auto;">
        </a>
      </div>

    </div>
  </header>

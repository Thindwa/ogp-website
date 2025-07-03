
<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center">

        <a href="{{ route('home') }}" class="log d-flex align-items-center me-auto">
            <img src="{{ asset('images/download.png') }}" alt="Logo" style="width: 100px; height: auto;">
        </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('home') }}" class="active">Home</a></li>
          <li><a href="{{ route('about') }}">About OGP</a></li>
          <li><a href="{{ route('technical.group') }}">Technical Groups</a></li>
          <li><a href="{{ route('achievements') }}">Achievements</a></li>
          <li><a href="{{ route('gallery') }}">Gallery</a></li>
          <li><a href="{{ route('downloads') }}">Downloads</a></li>
          <li><a href="{{ route('news') }}">News</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <div class="header-social-links">
        <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>

    </div>
  </header>

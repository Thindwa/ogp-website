<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'OGP Malawi - Open Government Partnership')</title>
    <meta name="description" content="Open Government Partnership Malawi - Promoting transparency, accountability, and citizen participation">

    <!-- Favicon -->
    <link href="{{ asset('images/arms.png') }}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    {{-- @if(env('UMAMI_WEBSITE_ID') && env('UMAMI_URL'))
    <script async defer data-website-id="{{ env('UMAMI_WEBSITE_ID') }}" src="{{ env('UMAMI_URL') }}/script.js"></script>
    @endif --}}

    <style>
        /* Global Font Family */
        body, html {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif !important;
            font-weight: 400;
            line-height: 1.6;
        }

        /* Typography Scale */
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif !important;
            font-weight: 600;
            line-height: 1.3;
        }

        /* Display classes */
        .display-1, .display-2, .display-3, .display-4, .display-5, .display-6 {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif !important;
            font-weight: 700;
            line-height: 1.2;
        }

        /* Lead text */
        .lead {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif !important;
            font-weight: 400;
        }

        /* Button text */
        .btn {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif !important;
            font-weight: 500;
        }

        /* Form elements */
        input, textarea, select, .form-control, .form-select {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif !important;
        }

        /* Navigation */
        .navbar, .nav-link {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif !important;
        }

        /* Footer */
        footer {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif !important;
        }

        /* Utility Classes */
        .bg-gradient-to-r {
            background: linear-gradient(to right, #212529, #6c757d);
        }
        .bg-gradient-to-top {
            background: linear-gradient(to top, rgba(0,0,0,0.8), rgba(0,0,0,0.4), transparent);
        }
        .min-vh-50 {
            min-height: 50vh;
        }
        .hover-lift:hover {
            transform: translateY(-5px);
            transition: transform 0.3s ease;
        }

        /* Footer text visibility improvements - only for footer */
        footer .text-muted {
            color: #adb5bd !important;
        }
        footer .text-muted:hover {
            color: #ffffff !important;
        }
        footer a {
            transition: color 0.3s ease;
        }
        footer a:hover {
            color: #ffffff !important;
        }

        /* Font Weight Utilities */
        .fw-light { font-weight: 300 !important; }
        .fw-normal { font-weight: 400 !important; }
        .fw-medium { font-weight: 500 !important; }
        .fw-semibold { font-weight: 600 !important; }
        .fw-bold { font-weight: 700 !important; }
        .fw-bolder { font-weight: 800 !important; }
    </style>
</head>

<body>
    @include('layouts.partials.header')

    <main>
        @yield('content')
    </main>

    @include('layouts.partials.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>

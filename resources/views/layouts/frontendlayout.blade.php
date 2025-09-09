<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'OGP Malawi - Open Government Partnership')</title>
    <meta name="description" content="Open Government Partnership Malawi - Promoting transparency, accountability, and citizen participation">

    <!-- Favicon -->
    <link href="{{ asset('images/arms.png') }}" rel="icon">

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

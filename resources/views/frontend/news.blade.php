@extends('layouts.frontendlayout')
<style>
/* OGP News Section */
    .news-page {
        padding: 80px 0;
        background-color: #f8fafc;
    }

    .page-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .page-header h1 {
        font-size: 2.8rem;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .page-header p {
        font-size: 1.1rem;
        color: #546e7a;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .news-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 30px;
    }

    .news-card {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        transition: 0.3s ease;
        display: flex;
        flex-direction: column;
    }

    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
    }

    .news-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .news-content {
        padding: 20px;
    }

    .news-title {
        font-size: 1.4rem;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .news-date {
        font-size: 0.9rem;
        color: #999;
        margin-bottom: 10px;
    }

    .news-excerpt {
        font-size: 1rem;
        color: #555;
        margin-bottom: 15px;
    }

    .read-more {
        font-weight: 500;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .read-more:hover {
        color: #1bbd36;
    }

    @media (max-width: 768px) {
        .news-page {
            padding: 60px 0;
        }

        .page-header h1 {
            font-size: 2rem;
        }

        .news-grid {
            grid-template-columns: 1fr;
        }
    }

    /* OGP Hero Section */
    .hero-section {
        background: linear-gradient(135deg, #1bbd36 0%, #283593 100%);
        color: white;
        padding: 120px 0;
        position: relative;
        overflow: hidden;
        text-align: center;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?ixlib=rb-1.2.1&auto=format&fit=crop&w=1352&q=80');
        background-size: cover;
        background-position: center;
        opacity: 0.15;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        margin: 0 auto;
    }

    .hero-content h1 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .hero-content p {
        font-size: 1.2rem;
        opacity: 0.9;
        max-width: 700px;
        margin: 0 auto;
    }
    </style>
@section('content')

<section class="news-page">
    <div class="container">
        <h2 class="mb-4">OGP Malawi News</h2>
        <div class="news-grid">
            <!-- News Item 1 -->
            <div class="news-card">
                <img src="{{asset('/images/he.jpg')}}" alt="News image" class="news-image">
                <div class="news-content">
                    <h3 class="news-title">OGP Malawi Launches New Transparency Campaign</h3>
                    <div class="news-date">May 25, 2025</div>
                    <p class="news-excerpt">
                        The new campaign aims to increase citizen access to government procurement data...
                    </p>
                    <a href="{{route('news.detail', ['slug' => 'ogp-malawi-launches-new-transparency-campaign'])}}" class="read-more">Read more</a>
                </div>
            </div>

            <!-- News Item 2 -->
            <div class="news-card">
                <img src="{{asset('/images/he-chakwera.jpg')}}" alt="News image" class="news-image">
                <div class="news-content">
                    <h3 class="news-title">Open Data Portal Receives Major Update</h3>
                    <div class="news-date">May 12, 2025</div>
                    <p class="news-excerpt">
                        With enhanced usability and search functions, the portal is now easier to use...
                    </p>
                    <a href="{{route('news.detail', ['slug' => 'open-data-portal-receives-major-update'])}}" class="read-more">Read more</a>
                </div>
            </div>

            <!-- News Item 3 -->
            <div class="news-card">
                <img src="{{asset('/images/openweek.jpg')}}" alt="News image" class="news-image">
                <div class="news-content">
                    <h3 class="news-title">Civil Society Roundtable Held in Lilongwe</h3>
                    <div class="news-date">April 30, 2025</div>
                    <p class="news-excerpt">
                        The event brought together key stakeholders to discuss progress and challenges...
                    </p>
                    <a href="{{route('news.detail', ['slug' => 'civil-society-roundtable-held-in-lilongwe'])}}" class="read-more">Read more</a>
                </div>
            </div>


              <!-- News Item 4 -->
              <div class="news-card">
                <img src="{{asset('/images/he.jpg')}}" alt="News image" class="news-image">
                <div class="news-content">
                    <h3 class="news-title">OGP Malawi Launches New Transparency Campaign</h3>
                    <div class="news-date">May 25, 2025</div>
                    <p class="news-excerpt">
                        The new campaign aims to increase citizen access to government procurement data...
                    </p>
                    <a href="{{route('news.detail', ['slug' => 'ogp-malawi-launches-new-transparency-campaign'])}}" class="read-more">Read more</a>
                </div>
            </div>

            <!-- News Item 5 -->
            <div class="news-card">
                <img src="{{asset('/images/he-chakwera.jpg')}}" alt="News image" class="news-image">
                <div class="news-content">
                    <h3 class="news-title">Open Data Portal Receives Major Update</h3>
                    <div class="news-date">May 12, 2025</div>
                    <p class="news-excerpt">
                        With enhanced usability and search functions, the portal is now easier to use...
                    </p>
                    <a href="{{route('news.detail', ['slug' => 'open-data-portal-receives-major-update'])}}" class="read-more">Read more</a>
                </div>
            </div>

            <!-- News Item 6 -->
            <div class="news-card">
                <img src="{{asset('/images/openweek.jpg')}}" alt="News image" class="news-image">
                <div class="news-content">
                    <h3 class="news-title">Civil Society Roundtable Held in Lilongwe</h3>
                    <div class="news-date">April 30, 2025</div>
                    <p class="news-excerpt">
                        The event brought together key stakeholders to discuss progress and challenges...
                    </p>
                    <a href="{{route('news.detail', ['slug' => 'civil-society-roundtable-held-in-lilongwe'])}}" class="read-more">Read more</a>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

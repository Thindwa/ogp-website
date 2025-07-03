@extends('layouts.frontendlayout')

<style>
    /* Highlights Page Styles */
    .highlights-page {
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
        color: #283593;
    }

    .page-header p {
        font-size: 1.1rem;
        color: #546e7a;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .filter-section {
        background: #fff;
        border-radius: 10px;
        padding: 30px;
        margin-bottom: 40px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .filter-title {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 20px;
        color: #333;
    }

    .filter-controls {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 20px;
    }

    .filter-btn {
        background: #fff;
        border: 1px solid #ddd;
        padding: 8px 20px;
        border-radius: 30px;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.3s;
    }

    .filter-btn:hover, .filter-btn.active {
        background: #1bbd36;
        color: #fff;
        border-color: #1bbd36;
    }

    .twg-filter {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .twg-btn {
        background: #fff;
        border: 1px solid #ddd;
        padding: 8px 20px;
        border-radius: 30px;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.3s;
    }

    .twg-btn:hover, .twg-btn.active {
        background: #283593;
        color: #fff;
        border-color: #283593;
    }

    .highlight-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 30px;
    }

    .highlight-card {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease;
    }

    .highlight-card:hover {
        transform: translateY(-5px);
    }

    .highlight-image-container {
        position: relative;
        height: 220px;
        overflow: hidden;
    }

    .highlight-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .highlight-card:hover .highlight-image {
        transform: scale(1.05);
    }

    .highlight-content {
        padding: 25px;
    }

    .highlight-date {
        font-weight: 600;
        color: #1bbd36;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
    }

    .highlight-date i {
        margin-right: 8px;
    }

    .highlight-title {
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 15px;
        color: #283593;
        line-height: 1.4;
    }

    .highlight-description {
        color: #555;
        line-height: 1.7;
        margin-bottom: 20px;
    }

    .highlight-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 20px;
    }

    .highlight-tag {
        display: inline-block;
        background: #f0f7ff;
        color: #1bbd36;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
    }

    .highlight-documents {
        margin-top: 20px;
        border-top: 1px solid #eee;
        padding-top: 20px;
    }

    .documents-title {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 15px;
        color: #333;
    }

    .document-list {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .document-item {
        display: flex;
        align-items: center;
        padding: 8px 12px;
        background: #f9f9f9;
        border-radius: 5px;
        transition: background 0.2s;
    }

    .document-item:hover {
        background: #f0f0f0;
    }

    .document-icon {
        margin-right: 10px;
        color: #1bbd36;
    }

    .document-name {
        flex: 1;
        font-size: 0.9rem;
    }

    .document-link {
        color: #1bbd36;
        font-size: 0.9rem;
        text-decoration: none;
    }

    .document-link:hover {
        text-decoration: underline;
    }

    .no-results {
        text-align: center;
        padding: 50px;
        grid-column: 1 / -1;
        color: #666;
    }

    @media (max-width: 768px) {
        .highlight-grid {
            grid-template-columns: 1fr;
        }

        .page-header h1 {
            font-size: 2.2rem;
        }

        .filter-controls, .twg-filter {
            justify-content: center;
        }
    }

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
</style>

@section('content')
    <div class="">
        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

                <div class="carousel-item active">
                    <img src="{{ asset('images/he.jpg')}}" alt="">
                    <div class="container section-header">
                        <h2>WHO IS IN OGP?</h2>
                        <p class="text-white">The Open Government Partnership (OGP) includes 75 countries and 150 local governments,
                            representing more than two billion people, and thousands of civil society organizations.</p>
                        <a href="{{ route('about') }}" class="btn-get-started">Read More</a>
                    </div>
                </div><!-- End Carousel Item -->

                <div class="carousel-item">
                    <img src="{{ asset('images/openweek.jpg')}}" alt="">
                    <div class="container section-header">
                        <h2>HOW DOES OGP WORK?</h2>
                        <p class="text-white">The OGP is based on the idea that civil society and government co-create action plans with
                            concrete commitments. These commitments are then credibly implemented, with the help of partner
                            organizations with on the respective countries or from around the world</p>
                        <a href="{{ route('about') }}" class="btn-get-started">Read More</a>
                    </div>
                </div><!-- End Carousel Item -->

                <div class="carousel-item">
                    <img src="{{ asset('images/he-chakwera.jpg')}}" alt="">
                    <div class="container section-header">
                        <h2>WHEN DID MALAWI JOIN OGP?</h2>
                        <p class="text-white">Malaŵi has been a member of the OGP Global Body since 2013. Through OGP, Malaŵi has a tool to
                            embrace democracy by promoting its Constitutional principles of transparency, accountability and
                            citizen engagement</p>
                        <a href="{{ route('about') }}" class="btn-get-started">Read More</a>
                    </div>
                </div><!-- End Carousel Item -->

                <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

                <ol class="carousel-indicators"></ol>

            </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container">

                <div class="row position-relative">

                    <div class="col-lg-4 about-img" data-aos="zoom-out" data-aos-delay="200"><img
                            src="{{ asset('images/he-chakwera.jpg') }}"></div>

                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="inner-title">WHAT IS OPEN GOVERNMENT PARTNERSHIP (OGP)?</h2>
                        <div class="our-story">
                            <h4>Est 2011</h4>
                            <h3>Our Story</h3>
                            <p>Open Government Partnership is an organization of reformers inside and outside of governments
                                working to transform how government serves its citizens. It was formed in 2011, when
                                government leaders and civil society advocates came together to create a unique partnership
                                that promotes transparent, participatory, inclusive and accountable governance through
                                government and civil society advocate collaboration.</p>

                            <div class="watch-video d-flex align-items-center position-relative">
                                <i class="bi bi-play-circle"></i>
                                <a href="" class="glightbox stretched-link">Read More</a>
                                <div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /About Section -->

        <!-- OGP Highlights Section -->
        <section class="highlights-section">
            <div class="highlight-shape shape-1"></div>
            <div class="highlight-shape shape-2"></div>

            <div class="container">
                <div class="page-header" data-aos="fade-up">
                    <h2>OGP Malawi Highlights and Notable Achievements</h2>
                    <p>Discover the key achievements and milestones of Malawi's Open Government Partnership initiative</p>
                </div>

                <div class="highlight-grid">
                    <!-- Highlight Item 1 -->
                    <div class="highlight-card" data-category="launches" data-twg="digital-governance">
                        <div class="highlight-image-container">
                            <img src="{{asset('/images/he-chakwera.jpg')}}" alt="President launching portal" class="highlight-image">
                        </div>
                        <div class="highlight-content">
                            <div class="highlight-date">
                                <i class="far fa-calendar-alt"></i> June 15, 2025
                            </div>
                            <h3 class="highlight-title">Launch of National Open Data Portal by H.E. President Chakwera</h3>
                            <p class="highlight-description">
                                His Excellency President Lazarus Chakwera officially launched Malawi's National Open Data Portal, marking a significant step in government transparency.
                            </p>
                            <div class="highlight-tags">
                                <span class="highlight-tag">Digital Governance</span>
                                <span class="highlight-tag">Presidential</span>
                            </div>
                            <div class="highlight-documents">
                                <h4 class="documents-title">Supporting Documents</h4>
                                <div class="document-list">
                                    <a href="#" class="document-item">
                                        <i class="fas fa-file-pdf document-icon"></i>
                                        <span class="document-name">Launch Event Minutes.pdf</span>
                                        <span class="document-link">Download</span>
                                    </a>
                                    <a href="#" class="document-item">
                                        <i class="fas fa-image document-icon"></i>
                                        <span class="document-name">Photo Gallery (15 images)</span>
                                        <span class="document-link">View</span>
                                    </a>
                                    <a href="#" class="document-item">
                                        <i class="fas fa-link document-icon"></i>
                                        <span class="document-name">Portal Website</span>
                                        <span class="document-link">Visit</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Highlight Item 2 -->
                    <div class="highlight-card" data-category="legislative" data-twg="right-to-information">
                        <div class="highlight-image-container">
                            <img src="{{asset('/images/openweek.jpg')}}" alt="Parliament session" class="highlight-image">
                        </div>
                        <div class="highlight-content">
                            <div class="highlight-date">
                                <i class="far fa-calendar-alt"></i> April 5, 2025
                            </div>
                            <h3 class="highlight-title">Passage of Access to Information Act Amendments</h3>
                            <p class="highlight-description">
                                Parliament unanimously passed amendments to strengthen the Access to Information Act, reducing response times for information requests.
                            </p>
                            <div class="highlight-tags">
                                <span class="highlight-tag">Right to Information</span>
                                <span class="highlight-tag">Legislation</span>
                            </div>
                            <div class="highlight-documents">
                                <h4 class="documents-title">Supporting Documents</h4>
                                <div class="document-list">
                                    <a href="#" class="document-item">
                                        <i class="fas fa-file-pdf document-icon"></i>
                                        <span class="document-name">Amended Act Text.pdf</span>
                                        <span class="document-link">Download</span>
                                    </a>
                                    <a href="#" class="document-item">
                                        <i class="fas fa-file-alt document-icon"></i>
                                        <span class="document-name">Parliamentary Debate Transcript</span>
                                        <span class="document-link">View</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Highlight Item 3 -->
                    <div class="highlight-card" data-category="events" data-twg="open-parliament">
                        <div class="highlight-image-container">
                            <img src="{{asset('/images/he.jpg')}}" alt="Regional office opening" class="highlight-image">
                        </div>
                        <div class="highlight-content">
                            <div class="highlight-date">
                                <i class="far fa-calendar-alt"></i> February 20, 2025
                            </div>
                            <h3 class="highlight-title">Establishment of Regional OGP Offices</h3>
                            <p class="highlight-description">
                                OGP Malawi expanded operations with new regional offices in Blantyre, Mzuzu, and Zomba to better coordinate with local governments.
                            </p>
                            <div class="highlight-tags">
                                <span class="highlight-tag">Open Parliament</span>
                                <span class="highlight-tag">Expansion</span>
                            </div>
                            <div class="highlight-documents">
                                <h4 class="documents-title">Supporting Documents</h4>
                                <div class="document-list">
                                    <a href="#" class="document-item">
                                        <i class="fas fa-file-pdf document-icon"></i>
                                        <span class="document-name">Establishment Plan.pdf</span>
                                        <span class="document-link">Download</span>
                                    </a>
                                    <a href="#" class="document-item">
                                        <i class="fas fa-image document-icon"></i>
                                        <span class="document-name">Opening Ceremony Photos</span>
                                        <span class="document-link">View</span>
                                    </a>
                                    <a href="#" class="document-item">
                                        <i class="fas fa-file-word document-icon"></i>
                                        <span class="document-name">Memorandum of Understanding</span>
                                        <span class="document-link">Download</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>

            <div class="text-center mt-3">
                <a href="{{ route('achievements') }}" class="btn btn-outline-success">Find More Achievements</a>
            </div>

        </section>

        <section class="news-page">
            <div class="container">
                <div class="page-header">
                    <h1>Latest News</h1>
                    <p>Get the latest updates, stories, and announcements from OGP Malawi.</p>
                </div>

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

                </div>
            </div>
        </section>

        <!-- OGP Malawi Videos Section -->
        <section class="ogp-videos-section py-5" style="background-color: #eef2f7;">
            <div class="container">

                <!-- Page Header -->
                <div class="section-header">
                    <h1>OGP Malawi Videos</h1>
                    <p>Watch key highlights, discussions, and success stories from the Open
                        Government Partnership in Malawi.</p>
                </div>

                <!-- Videos Grid -->
                <div class="row g-4">
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="ratio ratio-16x9 shadow rounded">
                            <iframe src="https://www.youtube.com/embed/XGSy3_Czz8k" title="OGP Malawi Overview"
                                allowfullscreen></iframe>
                        </div>
                        <p class="mt-2 text-center fw-semibold">OGP Malawi Overview</p>
                    </div>

                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="ratio ratio-16x9 shadow rounded">
                            <iframe src="https://www.youtube.com/embed/ScMzIvxBSi4" title="Citizen Engagement"
                                allowfullscreen></iframe>
                        </div>
                        <p class="mt-2 text-center fw-semibold">Citizen Engagement</p>
                    </div>

                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="ratio ratio-16x9 shadow rounded">
                            <iframe src="https://www.youtube.com/embed/ysz5S6PUM-U" title="OGP Malawi Commitments"
                                allowfullscreen></iframe>
                        </div>
                        <p class="mt-2 text-center fw-semibold">OGP Malawi Commitments</p>
                    </div>
                </div>

            </div>
        </section>

    </div>
@endsection

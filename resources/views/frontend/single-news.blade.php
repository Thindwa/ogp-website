@extends('layouts.frontendlayout')
<style>
    /* Single News Article with Sidebar Styles */
    .single-news-page {
        padding: 80px 0;
        background-color: #f8fafc;
    }

    .article-layout {
        display: grid;
        grid-template-columns: 1fr 300px;
        gap: 40px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .article-container {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .sidebar {
        display: flex;
        flex-direction: column;
        gap: 30px;
    }

    .sidebar-widget {
        background: #fff;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .widget-title {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #1bbd36;
        color: #333;
    }

    .sidebar-news-item {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
    }

    .sidebar-news-item:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }

    .sidebar-news-image {
        width: 80px;
        height: 60px;
        object-fit: cover;
        border-radius: 5px;
    }

    .sidebar-news-content {
        flex: 1;
    }

    .sidebar-news-title {
        font-size: 0.95rem;
        font-weight: 500;
        margin-bottom: 5px;
        line-height: 1.4;
    }

    .sidebar-news-date {
        font-size: 0.8rem;
        color: #999;
    }

    .event-item {
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px dashed #ddd;
    }

    .event-item:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }

    .event-date {
        display: inline-block;
        background: #f0f7ff;
        color: #1bbd36;
        padding: 3px 8px;
        border-radius: 4px;
        font-size: 0.8rem;
        font-weight: 500;
        margin-bottom: 5px;
    }

    .event-title {
        font-size: 0.95rem;
        font-weight: 500;
        line-height: 1.4;
    }

    .highlight-item {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 15px;
    }

    .highlight-icon {
        color: #1bbd36;
        font-size: 1.2rem;
    }

    .highlight-text {
        font-size: 0.95rem;
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
    /* Existing article styles (from previous design) */
    .article-header {
        position: relative;
    }

    .article-image {
        width: 100%;
        height: 450px;
        object-fit: cover;
    }

    .article-meta {
        padding: 25px 40px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .article-date {
        font-size: 0.95rem;
        color: #999;
    }

    .article-category {
        background: #1bbd36;
        color: white;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
    }

    .article-content {
        padding: 0 40px 40px;
    }

    .article-title {
        font-size: 2.2rem;
        font-weight: 700;
        margin-bottom: 20px;
        line-height: 1.3;
    }

    .article-body {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #444;
    }

    .article-body p {
        margin-bottom: 25px;
    }

    .article-body img {
        max-width: 100%;
        height: auto;
        margin: 30px 0;
        border-radius: 8px;
    }

    .article-footer {
        padding: 30px 40px;
        border-top: 1px solid #eee;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .share-buttons a {
        display: inline-block;
        margin-right: 10px;
        color: #555;
        transition: color 0.2s;
    }

    .share-buttons a:hover {
        color: #1bbd36;
    }

    .back-to-news {
        color: #1bbd36;
        font-weight: 500;
        text-decoration: none;
    }

    .back-to-news:hover {
        text-decoration: underline;
    }

    /* Related News Section */
    .related-news {
        padding: 60px 0 80px;
        grid-column: 1 / -1;
    }

    .section-title {
        font-size: 1.8rem;
        font-weight: 600;
        margin-bottom: 40px;
        text-align: center;
    }

    .related-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 25px;
    }

    @media (max-width: 992px) {
        .article-layout {
            grid-template-columns: 1fr;
        }

        .sidebar {
            margin-top: 40px;
        }
    }

    @media (max-width: 768px) {
        .single-news-page {
            padding: 40px 0;
        }

        .article-image {
            height: 300px;
        }

        .article-meta,
        .article-content,
        .article-footer {
            padding: 20px;
        }

        .article-title {
            font-size: 1.8rem;
        }

        .related-news {
            padding: 40px 0;
        }
    }
</style>

@section('content')
<section class="hero-section">
    <div class="hero-content">
        <h2>News Article</h2>
        <p>Stay informed with the latest developments from OGP Malawi</p>
    </div>
</section>

<section class="single-news-page">
    <div class="container">
        <div class="article-layout">
            <div class="article-container">
                <div class="article-header">
                    <img src="{{asset('/images/he.jpg')}}" alt="News article image" class="article-image">
                </div>

                <div class="article-meta">
                    <span class="article-date">Published: May 25, 2025</span>
                    <span class="article-category">Transparency</span>
                </div>

                <div class="article-content">
                    <h1 class="article-title">OGP Malawi Launches New Transparency Campaign to Empower Citizens</h1>

                    <div class="article-body">
                        <p>The Open Government Partnership (OGP) Malawi has launched an ambitious new transparency campaign aimed at increasing citizen access to government procurement data and improving accountability in public spending.</p>

                        <p>The initiative, dubbed "Open Contracts Malawi," will make procurement information from all government ministries and departments available through a centralized digital platform. This marks a significant step forward in the country's commitment to open governance.</p>

                        <img src="{{asset('/images/openweek.jpg')}}" alt="Campaign launch event">

                        <p>At the launch event in Lilongwe, OGP Malawi Coordinator Jane Banda emphasized how this initiative aligns with Malawi's National Action Plan. "When citizens can see how public funds are being spent, it creates a powerful check against misuse and builds trust between government and the people," Banda stated.</p>

                        <h3>Key Features of the Campaign</h3>

                        <p>The transparency campaign includes several innovative components:</p>

                        <ul>
                            <li>A user-friendly portal with searchable contract data</li>
                            <li>Regular disclosure of tender awards and contract performance</li>
                            <li>Capacity building for civil society to monitor implementation</li>
                            <li>Public awareness campaigns in all districts</li>
                        </ul>

                        <p>The system will initially cover major procurement activities, with plans to expand to all government contracts by the end of 2025. The platform will provide details including contract amounts, winning bidders, delivery timelines, and performance assessments.</p>

                        <p>Minister of Finance Hon. Gondwe praised the initiative, noting that "transparency in procurement is essential for combating corruption and ensuring taxpayers get value for money." The minister committed to ensuring all ministries comply with the new disclosure requirements.</p>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Latest News Widget -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">Latest News</h3>
                    <div class="sidebar-news-item">
                        <img src="{{asset('/images/he-chakwera.jpg')}}" alt="News thumbnail" class="sidebar-news-image">
                        <div class="sidebar-news-content">
                            <h4 class="sidebar-news-title">Open Data Portal Receives Major Update</h4>
                            <div class="sidebar-news-date">May 12, 2025</div>
                        </div>
                    </div>
                    <div class="sidebar-news-item">
                        <img src="{{asset('/images/openweek.jpg')}}" alt="News thumbnail" class="sidebar-news-image">
                        <div class="sidebar-news-content">
                            <h4 class="sidebar-news-title">Civil Society Roundtable Discussion</h4>
                            <div class="sidebar-news-date">April 30, 2025</div>
                        </div>
                    </div>
                    <div class="sidebar-news-item">
                        <img src="{{asset('/images/he.jpg')}}" alt="News thumbnail" class="sidebar-news-image">
                        <div class="sidebar-news-content">
                            <h4 class="sidebar-news-title">Annual Report on Government Reforms</h4>
                            <div class="sidebar-news-date">April 15, 2025</div>
                        </div>
                    </div>
                </div>

                <!-- Highlights Widget -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">Highlights</h3>
                    <div class="highlight-item">
                        <span class="highlight-icon"><i class="fas fa-check-circle"></i></span>
                        <span class="highlight-text">Malawi improves in Open Budget Index</span>
                    </div>
                    <div class="highlight-item">
                        <span class="highlight-icon"><i class="fas fa-check-circle"></i></span>
                        <span class="highlight-text">New anti-corruption measures implemented</span>
                    </div>
                    <div class="highlight-item">
                        <span class="highlight-icon"><i class="fas fa-check-circle"></i></span>
                        <span class="highlight-text">Citizen engagement portal launched</span>
                    </div>
                    <div class="highlight-item">
                        <span class="highlight-icon"><i class="fas fa-check-circle"></i></span>
                        <span class="highlight-text">OGP Malawi receives international recognition</span>
                    </div>
                </div>

                <!-- Events Widget -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">Upcoming Events</h3>
                    <div class="event-item">
                        <div class="event-date">JUN 15, 2025</div>
                        <h4 class="event-title">Open Government Forum in Blantyre</h4>
                    </div>
                    <div class="event-item">
                        <div class="event-date">JUL 3-5, 2025</div>
                        <h4 class="event-title">Regional OGP Summit</h4>
                    </div>
                    <div class="event-item">
                        <div class="event-date">AUG 10, 2025</div>
                        <h4 class="event-title">Public Consultation on Data Privacy</h4>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
@endsection

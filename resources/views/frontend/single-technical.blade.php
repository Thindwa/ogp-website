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

    }s

    .highlight-icon {
        color: #1bbd36;
        font-size: 1.2rem;
    }

    .highlight-text {
        font-size: 0.95rem;
    }
    .section-intro {
        text-align: center;

    }

    .section-intro h2 {
        font-size: 2.5rem;
        font-weight: 700;

        position: relative;
        display: inline-block;
    }

    .section-intro h2::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, #1bbd36 0%, #00bcd4 100%);
        border-radius: 2px;
    }

    .section-intro p {
        font-size: 1.1rem;
        color: #546e7a;
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


<section class="single-news-page">
    <div class="container">

        <div class="article-layout">
            <div class="article-container">
                <div class="section-intro">
                    <h2>Anti-Corruption</h2>

                </div>
                {{-- <div class="article-header">
                    <img src="{{asset('/images/he.jpg')}}" alt="News article image" class="article-image">
                </div> --}}

                <div class="article-content">


                    <div class="article-body pt-5">
                        <p>The Anti-Corruption thematic area seeks to enhance Open Contracting and Beneficial Ownership transparency to reduce opportunities for procurement malpractice. The approach to achieving this lies in institutionalizing and operationalizing beneficial ownership transparency for all legal entities in Malawi engaged in public procurement.</p>

                        <h3>Specific Challenges</h3>
                        <p>The specific challenges to be addressed within this thematic area include:</p>
                        <ul>
                            <li>Limited public oversight due to lack of incorporation of open contracting principles.</li>
                            <li>Non-disclosure of beneficial owners by business entities.</li>
                            <li>The need to strengthen mechanisms for reporting corrupt practices.</li>
                        </ul>

                        <h3>Proposed Interventions</h3>
                        <p>The interventions put forward to address the challenges outlined above are as follows:</p>
                        <ul>
                            <li>Institutionalize and operationalize the Companies Regulations for beneficial ownership transparency for all legal entities in Malawi engaged in public procurement.</li>
                            <li>Issue public notices on compliance requirements for all registered companies to submit a list of beneficiaries.</li>
                            <li>Assess and verify reporting of registered companies in compliance with Companies Regulations.</li>
                            <li>Bi-annual publication of the list of compliant companies.</li>
                            <li>Legislative mapping of legal provisions supporting transparency of beneficial ownership, public procurement policies, regulations and processes, access to information, and corrupt practices for developing public service announcement communication materials.</li>
                            <li>Review of whistle-blowing and corrupt practices reporting and response mechanisms available.</li>
                            <li>Facilitate the development and revision of Public Procurement Guidelines.</li>
                        </ul>
                    </div>
                </div>

            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                    <!-- Highlights Widget -->
                    <div class="sidebar-widget">
                        <h3 class="widget-title"> Anti-Corruption related Documents</h3>
                        <div class="highlight-item">
                            <span class="highlight-icon"><i class="fas fa-check-circle"></i></span>
                            <span class="highlight-text">Malawi improves in Open Budget Index.pdf</span>
                        </div>
                        <div class="highlight-item">
                            <span class="highlight-icon"><i class="fas fa-check-circle"></i></span>
                            <span class="highlight-text">New anti-corruption measures implemented.pdf</span>
                        </div>
                        <div class="highlight-item">
                            <span class="highlight-icon"><i class="fas fa-check-circle"></i></span>
                            <span class="highlight-text">Citizen engagement portal launched.pdf</span>
                        </div>
                        <div class="highlight-item">
                            <span class="highlight-icon"><i class="fas fa-check-circle"></i></span>
                            <span class="highlight-text">OGP Malawi receives international recognition.pdf</span>
                        </div>
                    </div>
                <!-- Latest News Widget -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">Other Technical Groups</h3>
                    <div class="sidebar-news-item">

                        <div class="sidebar-news-content">
                            <h4 class="sidebar-news-title">Access to Information</h4>
                        </div>
                    </div>
                    <div class="sidebar-news-item">

                        <div class="sidebar-news-content">
                            <h4 class="sidebar-news-title">Digital Governance</h4>
                        </div>
                    </div>
                    <div class="sidebar-news-item">

                        <div class="sidebar-news-content">
                            <h4 class="sidebar-news-title">Natural Resources</h4>
                        </div>
                    </div>
                    <div class="sidebar-news-item">

                        <div class="sidebar-news-content">
                            <h4 class="sidebar-news-title">Public Service Delivery
                            </h4>
                        </div>
                    </div>
                </div>




            </div>


        </div>
    </div>
</section>
@endsection

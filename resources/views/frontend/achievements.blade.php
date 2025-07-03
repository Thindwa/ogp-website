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
<section class="hero-section">
    <div class="hero-content">

            <h1>Our Notable Achievements</h1>
            <p>Explore the significant milestones and accomplishments that mark OGP Malawi's journey, complete with supporting documentation and evidence.</p>

    </div>

</section>

<section class="highlights-page">
    <div class="container">


        <div class="filter-section">
            <h3 class="filter-title">Filter by Category</h3>
            <div class="filter-controls">
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn" data-filter="launches">Launches</button>
                <button class="filter-btn" data-filter="legislative">Legislative</button>
                <button class="filter-btn" data-filter="awards">Awards</button>
                <button class="filter-btn" data-filter="events">Events</button>
                <button class="filter-btn" data-filter="reports">Reports</button>
            </div>

            <h3 class="filter-title" style="margin-top: 25px;">Filter by Technical Working Group</h3>
            <div class="twg-filter">
                <button class="twg-btn active" data-twg="all">All Groups</button>
                <button class="twg-btn" data-twg="open-parliament">Open Parliament</button>
                <button class="twg-btn" data-twg="digital-governance">Digital Governance</button>
                <button class="twg-btn" data-twg="natural-resources">Natural Resources</button>
                <button class="twg-btn" data-twg="right-to-information">Right to Information</button>
                <button class="twg-btn" data-twg="anti-corruption">Anti-Corruption</button>
            </div>
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

            <!-- Highlight Item 4 -->
            <div class="highlight-card" data-category="awards" data-twg="anti-corruption">
                <div class="highlight-image-container">
                    <img src="{{asset('/images/he-chakwera.jpg')}}" alt="Award ceremony" class="highlight-image">
                </div>
                <div class="highlight-content">
                    <div class="highlight-date">
                        <i class="far fa-calendar-alt"></i> November 30, 2024
                    </div>
                    <h3 class="highlight-title">Malawi Receives OGP Global Award for Innovation</h3>
                    <p class="highlight-description">
                        Malawi received the prestigious Innovation Award for its citizen engagement platform that uses USSD technology to reach rural populations.
                    </p>
                    <div class="highlight-tags">
                        <span class="highlight-tag">Anti-Corruption</span>
                        <span class="highlight-tag">International</span>
                    </div>
                    <div class="highlight-documents">
                        <h4 class="documents-title">Supporting Documents</h4>
                        <div class="document-list">
                            <a href="#" class="document-item">
                                <i class="fas fa-file-pdf document-icon"></i>
                                <span class="document-name">Award Certificate.pdf</span>
                                <span class="document-link">Download</span>
                            </a>
                            <a href="#" class="document-item">
                                <i class="fas fa-link document-icon"></i>
                                <span class="document-name">OGP Global Announcement</span>
                                <span class="document-link">Visit</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Highlight Item 5 -->
            <div class="highlight-card" data-category="reports" data-twg="natural-resources">
                <div class="highlight-image-container">
                    <img src="{{asset('/images/openweek.jpg')}}" alt="Report launch" class="highlight-image">
                </div>
                <div class="highlight-content">
                    <div class="highlight-date">
                        <i class="far fa-calendar-alt"></i> September 12, 2024
                    </div>
                    <h3 class="highlight-title">Quarterly Natural Resources Transparency Report</h3>
                    <p class="highlight-description">
                        The comprehensive report details revenue flows from natural resources and measures to combat illegal mining and logging activities.
                    </p>
                    <div class="highlight-tags">
                        <span class="highlight-tag">Natural Resources</span>
                        <span class="highlight-tag">Quarterly Report</span>
                    </div>
                    <div class="highlight-documents">
                        <h4 class="documents-title">Supporting Documents</h4>
                        <div class="document-list">
                            <a href="#" class="document-item">
                                <i class="fas fa-file-pdf document-icon"></i>
                                <span class="document-name">Full Report Q3 2024.pdf</span>
                                <span class="document-link">Download</span>
                            </a>
                            <a href="#" class="document-item">
                                <i class="fas fa-file-excel document-icon"></i>
                                <span class="document-name">Supporting Data Sheets</span>
                                <span class="document-link">Download</span>
                            </a>
                            <a href="#" class="document-item">
                                <i class="fas fa-file-powerpoint document-icon"></i>
                                <span class="document-name">Presentation Slides</span>
                                <span class="document-link">Download</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Category filter functionality
        const categoryFilterButtons = document.querySelectorAll('.filter-btn');
        const twgFilterButtons = document.querySelectorAll('.twg-btn');
        const highlightCards = document.querySelectorAll('.highlight-card');

        function filterHighlights() {
            const activeCategory = document.querySelector('.filter-btn.active').dataset.filter;
            const activeTwg = document.querySelector('.twg-btn.active').dataset.twg;

            highlightCards.forEach(card => {
                const cardCategory = card.dataset.category;
                const cardTwg = card.dataset.twg;

                const categoryMatch = activeCategory === 'all' || cardCategory === activeCategory;
                const twgMatch = activeTwg === 'all' || cardTwg === activeTwg;

                if (categoryMatch && twgMatch) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });

            // Show no results message if no cards are visible
            const visibleCards = document.querySelectorAll('.highlight-card[style="display: block;"]');
            const noResults = document.querySelector('.no-results');

            if (visibleCards.length === 0) {
                if (!noResults) {
                    const noResultsDiv = document.createElement('div');
                    noResultsDiv.className = 'no-results';
                    noResultsDiv.textContent = 'No highlights found matching your filters.';
                    document.querySelector('.highlight-grid').appendChild(noResultsDiv);
                }
            } else if (noResults) {
                noResults.remove();
            }
        }

        categoryFilterButtons.forEach(button => {
            button.addEventListener('click', function() {
                categoryFilterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                filterHighlights();
            });
        });

        twgFilterButtons.forEach(button => {
            button.addEventListener('click', function() {
                twgFilterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                filterHighlights();
            });
        });
    });
</script>
@endsection

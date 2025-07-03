@extends('layouts.frontendlayout')

@section('content')

<style>
    .highlight-detail {
        padding: 80px 0;
        background-color: #f8fafc;
    }

    .highlight-container {
        max-width: 900px;
        margin: 0 auto;
    }

    .highlight-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .highlight-category {
        display: inline-block;
        padding: 8px 20px;
        background: linear-gradient(135deg, #3f51b5 0%, #00bcd4 100%);
        color: white;
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .highlight-header h1 {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1a237e;
        margin-bottom: 20px;
    }

    .highlight-meta {
        display: flex;
        justify-content: center;
        gap: 20px;
        color: #78909c;
        font-size: 0.9rem;
    }

    .highlight-image {
        width: 100%;
        height: 400px;
        border-radius: 12px;
        object-fit: cover;
        margin-bottom: 40px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .highlight-content {
        background: white;
        border-radius: 12px;
        padding: 50px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .highlight-stats {
        display: flex;
        justify-content: center;
        gap: 40px;
        margin: 40px 0;
    }

    .stat-item {
        text-align: center;
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: #3f51b5;
        line-height: 1;
        margin-bottom: 5px;
    }

    .stat-label {
        font-size: 1rem;
        color: #78909c;
    }

    .highlight-body p {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #455a64;
        margin-bottom: 20px;
    }

    .highlight-body h2 {
        font-size: 1.8rem;
        font-weight: 600;
        color: #1a237e;
        margin: 40px 0 20px;
    }

    .highlight-body h3 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #1a237e;
        margin: 30px 0 15px;
    }

    .highlight-body ul,
    .highlight-body ol {
        margin-bottom: 20px;
        padding-left: 20px;
    }

    .highlight-body li {
        margin-bottom: 10px;
        line-height: 1.6;
    }

    .related-highlights {
        margin-top: 80px;
    }

    .related-title {
        text-align: center;
        font-size: 1.8rem;
        font-weight: 600;
        color: #1a237e;
        margin-bottom: 40px;
    }

    .related-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 30px;
    }

    .related-item {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .related-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    .related-image {
        height: 180px;
        background-size: cover;
        background-position: center;
    }

    .related-content {
        padding: 25px;
    }

    .related-content h3 {
        font-size: 1.2rem;
        font-weight: 600;
        color: #1a237e;
        margin-bottom: 10px;
    }

    .related-content p {
        color: #546e7a;
        line-height: 1.6;
        margin-bottom: 15px;
        font-size: 0.9rem;
    }

    @media (max-width: 768px) {
        .highlight-detail {
            padding: 60px 0;
        }

        .highlight-header h1 {
            font-size: 2rem;
        }

        .highlight-image {
            height: 250px;
        }

        .highlight-content {
            padding: 30px;
        }

        .highlight-stats {
            flex-direction: column;
            gap: 20px;
        }
    }
</style>

@section('content')
<section class="highlight-detail">
    <div class="container highlight-container">
        <div class="highlight-header" data-aos="fade-up">
            <span class="highlight-category">Anti-Corruption</span>
            <h1>Commitments Achieved</h1>
            <div class="highlight-meta">
                <span>Published: June 15, 2023</span>
                <span>Updated: January 10, 2024</span>
            </div>
        </div>

        <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Commitments Achieved" class="highlight-image" data-aos="fade-up">

        <div class="highlight-content" data-aos="fade-up">
            <div class="highlight-stats">
                <div class="stat-item">
                    <div class="stat-number">24</div>
                    <div class="stat-label">Commitments</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">85%</div>
                    <div class="stat-label">Completion Rate</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">3</div>
                    <div class="stat-label">Years</div>
                </div>
            </div>

            <div class="highlight-body">
                <h2>Milestones in Open Governance</h2>
                <p>Since joining the Open Government Partnership, Malawi has made significant progress in fulfilling its commitments to enhance transparency, accountability, and citizen participation in governance. Our 24 completed commitments represent a major step forward in open governance.</p>

                <h3>Key Achievements</h3>
                <ul>
                    <li>Implemented open contracting standards across all government procurement</li>
                    <li>Established a public beneficial ownership registry</li>
                    <li>Launched the Malawi Open Data Portal with 150+ datasets</li>
                    <li>Trained 500+ government officials on open governance principles</li>
                    <li>Developed citizen feedback mechanisms for all major services</li>
                </ul>

                <h3>Impact and Results</h3>
                <p>The implementation of these commitments has led to measurable improvements in government transparency and service delivery. Public trust in government institutions has increased by 22% according to recent surveys, and procurement-related complaints have decreased by 35% since the introduction of open contracting standards.</p>

                <p>Looking ahead, we are building on this success with our new action plan that includes 15 additional commitments focused on digital governance and natural resource transparency.</p>
            </div>
        </div>

        <div class="related-highlights" data-aos="fade-up">
            <h2 class="related-title">Related Highlights</h2>
            <div class="related-grid">
                <a href="{{ url('/highlights/stakeholders-engaged') }}" class="related-item">
                    <div class="related-image" style="background-image: url('https://images.unsplash.com/photo-1521737711867-e3b97375f902?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');"></div>
                    <div class="related-content">
                        <h3>Stakeholders Engaged</h3>
                        <p>Government and civil society organizations collaborating in our process</p>
                    </div>
                </a>

                <a href="{{ url('/highlights/policies-implemented') }}" class="related-item">
                    <div class="related-image" style="background-image: url('https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');"></div>
                    <div class="related-content">
                        <h3>Policies Implemented</h3>
                        <p>Key policy reforms advancing transparency and accountability</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@extends('layouts.frontendlayout')

@section('title', 'About OGP Malawi - Open Government Partnership')

<style>
    .ogp-about {
        color: #333;
        line-height: 1.8;
    }

    .hero-section {
        background: linear-gradient(135deg, #1bbd36 0%, #283593 100%);
        color: white;
        padding: 100px 0;
        position: relative;
        overflow: hidden;
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
        z-index: 1;
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
    }

    .hero-content h1 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .hero-content p {
        font-size: 1.1rem;
        opacity: 0.9;
    }

    .content-section {
        padding: 60px 0;
    }

    .section-title {
        text-align: center;
        margin-bottom: 50px;
    }

    .section-title h2 {
        font-size: 2.5rem;
        font-weight: 700;
        position: relative;
        display: inline-block;
    }

    .section-title h2::after {
        content: '';
        position: absolute;
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, #1bbd36 0%, #00bcd4 100%);
        border-radius: 2px;
    }

    .info-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        margin-bottom: 40px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
    }

    .card-image {
        height: 250px;
        background-size: cover;
        background-position: center;
    }

    .card-content {
        padding: 30px;
    }

    .card-content h3 {
        font-size: 1.8rem;
        font-weight: 600;

        margin-bottom: 20px;
    }

    .card-content p {
        margin-bottom: 20px;
        color: #555;
    }

    .timeline-section {
        background: #f8fafc;
        padding: 80px 0;
    }

    .timeline-item {
        display: flex;
        margin-bottom: 50px;
        position: relative;
    }

    .timeline-year {
        flex: 0 0 120px;
        text-align: center;
        position: relative;
    }

    .year-bubble {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #1bbd36 0%, #00bcd4 100%);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        font-weight: 700;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }

    .timeline-content {
        flex: 1;
        padding: 20px 30px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        margin-left: 20px;
        position: relative;
    }

    .timeline-content::before {
        content: '';
        position: absolute;
        left: -20px;
        top: 30px;
        width: 0;
        height: 0;
        border-top: 15px solid transparent;
        border-bottom: 15px solid transparent;
        border-right: 20px solid white;
    }

    .timeline-content h3 {
        font-size: 1.5rem;

        margin-bottom: 15px;
    }

    .twg-section {
        padding: 80px 0;
    }

    .twg-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
    }

    .twg-card {
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        border-top: 4px solid #1bbd36;
    }

    .twg-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    .twg-card h3 {
        font-size: 1.4rem;

        margin-bottom: 15px;
        display: flex;
        align-items: center;
    }

    .twg-card h3 span {
        width: 30px;
        height: 30px;
        background: #1bbd36;
        color: white;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        font-size: 0.9rem;
    }

    .twg-card p {
        color: #555;
    }

    @media (max-width: 768px) {
        .hero-content h1 {
            font-size: 2.2rem;
        }

        .section-title h2 {
            font-size: 2rem;
        }

        .timeline-item {
            flex-direction: column;
        }

        .timeline-year {
            margin-bottom: 20px;
        }

        .timeline-content {
            margin-left: 0;
        }

        .timeline-content::before {
            display: none;
        }
    }


    .twg-card {
    text-align: center;
}

.explore-link {
    display: inline-block;
    margin-top: 10px;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
}

.explore-link:hover {
    color: #0f172a;
    text-decoration: underline;
}

</style>

@section('content')
<div class="ogp-about">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content ">
            <h2>OGP Malawi</h2>
            <p>Transforming how government serves citizens through transparency, accountability, and participation</p>
        </div>
    </section>

    <!-- What is OGP Section -->
    <section class="content-section">
        <div class="container">
            <div class="section-title">
                <h2>What is OGP?</h2>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="info-card">
                        <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');"></div>
                        <div class="card-content">
                            <h3>Open Government Partnership</h3>
                            <p>The Open Government Partnership (OGP) is a multilateral initiative that aims to secure concrete commitments from governments to promote transparency, empower citizens, fight corruption, and harness new technologies to strengthen governance.</p>
                            <p>Established in 2011, OGP brings together government reformers and civil society leaders to create action plans that make governments more inclusive, responsive, and accountable.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-card">
                        <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1521791055366-0d553872125f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');"></div>
                        <div class="card-content">
                            <h3>Global Reach</h3>
                            <p>OGP includes 75 countries and 150 local governments, representing more than two billion people, along with thousands of civil society organizations.</p>
                            <p>Member countries work alongside civil society organizations to co-create two-year action plans with concrete commitments to enhance transparency, accountability and public participation in government.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How OGP Works Section -->
    <section class="timeline-section">
        <div class="container">
            <div class="section-title">
                <h2>OGP in Malawi</h2>
            </div>

            <div class="timeline-item">
                <div class="timeline-year">
                    <div class="year-bubble">2013</div>
                </div>
                <div class="timeline-content">
                    <h3>Malawi Joins OGP</h3>
                    <p>Malawi became a member of the OGP Global Partnership, embracing democratic principles of transparency, accountability and citizen engagement as outlined in our Constitution.</p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-year">
                    <div class="year-bubble">2019</div>
                </div>
                <div class="timeline-content">
                    <h3>Temporary Interruptions</h3>
                    <p>OGP Malawi's initiatives were interrupted by the protracted electoral process and subsequently by the COVID-19 pandemic, slowing progress on implementation.</p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-year">
                    <div class="year-bubble">2022</div>
                </div>
                <div class="timeline-content">
                    <h3>Revitalization</h3>
                    <p>His Excellency Dr. Lazarus McCarthy Chakwera, President of Malawi, revitalized OGP Malawi. A co-creation kick-off workshop was held in August 2022 with government, civil society, and private sector stakeholders.</p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-year">
                    <div class="year-bubble">2023</div>
                </div>
                <div class="timeline-content">
                    <h3>New Action Plan</h3>
                    <p>Malawi launched its 2023-2025 National Action Plan with commitments across five thematic areas, guided by a National Steering Committee and Technical Working Groups.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How OGP Works in Malawi -->
    <section class="content-section">
        <div class="container">
            <div class="section-title">
                <h2>How OGP Works in Malawi</h2>
            </div>

            <div class="info-card">
                <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1521791136064-7986c2920216?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');"></div>
                <div class="card-content">
                    <h3>National Steering Committee</h3>
                    <p>OGP in Malawi is coordinated by a National Steering Committee that leads the implementation of the Malawi OGP 2023-2025 National Action Plan. The committee includes government and civil society representatives who collaboratively guide implementation across sectors.</p>
                    <p>The National Steering Committee provides oversight and support to government agencies, civil society organizations, and private sector stakeholders in fulfilling the commitments outlined in the action plan.</p>
                </div>
            </div>
        </div>
    </section>

  <!-- Technical Working Groups -->
<section class="twg-section" style="background-color: #f8fafc;">
    <div class="container">
        <div class="section-title">
            <h2>Technical Working Groups</h2>
            <p>Five thematic groups driving OGP implementation in Malawi</p>
        </div>

        <div class="twg-grid">
            <div class="twg-card">
                <h3><span>1</span> Open Parliament</h3>
                <p>Improving transparency on public debt and government financing through parliamentary openness and accountability measures.</p>
                <a href="{{route('technical.detail', ['slug' => 'open-parliament'])}}" class="explore-link">Explore More</a>
            </div>

            <div class="twg-card">
                <h3><span>2</span> Digital Governance</h3>
                <p>Accelerating adoption of e-government services and increasing ICT utilization among Malawians for better service delivery.</p>
                <a href="{{route('technical.detail', ['slug' => 'digital-governance'])}}" class="explore-link">Explore More</a>
            </div>

            <div class="twg-card">
                <h3><span>3</span> Natural Resources</h3>
                <p>Enhancing transparency in natural resource governance including contracts, production, exports and revenue management.</p>
                <a href="{{route('technical.detail', ['slug' => 'natural-resources'])}}" class="explore-link">Explore More</a>
            </div>

            <div class="twg-card">
                <h3><span>4</span> Right to Information</h3>
                <p>Actualizing transparency on political party and campaign financing through implementation of relevant legislation.</p>
                <a href="{{route('technical.detail', ['slug' => 'right-to-information'])}}" class="explore-link">Explore More</a>
            </div>

            <div class="twg-card">
                <h3><span>5</span> Anti-Corruption</h3>
                <p>Strengthening anti-corruption measures through open contracting and beneficial ownership transparency.</p>
                <a href="{{route('technical.detail', ['slug' => 'anti-corruption'])}}" class="explore-link ">Explore More</a>
            </div>
        </div>
    </div>
</section>

</div>
@endsection

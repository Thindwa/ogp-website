@extends('layouts.frontendlayout')

<style>
    .highlights-section {
        background-color: #f8fafc;
        padding: 80px 0;
        position: relative;
    }

    .highlight-shape {
        position: absolute;
        width: 300px;
        height: 300px;
        background: linear-gradient(135deg, rgba(63, 81, 181, 0.1) 0%, rgba(0, 188, 212, 0.1) 100%);
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        z-index: 0;
    }

    .shape-1 {
        top: -100px;
        left: -100px;
    }

    .shape-2 {
        bottom: -50px;
        right: -100px;
    }

    .section-header {
        text-align: center;
        margin-bottom: 60px;
        position: relative;
        z-index: 1;
    }

    .section-header h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .section-header p {
        font-size: 1.1rem;
        color: #546e7a;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .highlight-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        position: relative;
        z-index: 1;
    }

    .highlight-card {
        background: white;
        border-radius: 12px;
        padding: 40px 30px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .highlight-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    .card-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: linear-gradient(135deg, #1bbd36 0%, #00bcd4 100%);
        color: white;
        font-size: 32px;
    }

    .card-icon svg {
        width: 40px;
        height: 40px;
    }

    .highlight-card h3 {
        font-size: 1.4rem;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .highlight-card p {
        color: #546e7a;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1bbd36;
        margin-bottom: 10px;
        line-height: 1;
    }

    .stat-label {
        font-size: 1rem;
        color: #78909c;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .highlight-card::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, #1bbd36 0%, #00bcd4 100%);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.3s ease;
    }

    .highlight-card:hover::after {
        transform: scaleX(1);
    }

    @media (max-width: 768px) {
        .highlights-section {
            padding: 60px 0;
        }

        .section-header h2 {
            font-size: 2rem;
        }

        .highlight-cards {
            grid-template-columns: 1fr;
        }
    }
</style>

@section('content')
    <!-- OGP Highlights Section -->
    <section class="highlights-section">
        <div class="highlight-shape shape-1"></div>
        <div class="highlight-shape shape-2"></div>

        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2>OGP Malawi Highlights</h2>
                <p>Discover the key achievements and milestones of Malawi's Open Government Partnership initiative</p>
            </div>

            <div class="highlight-cards">
                <!-- Highlight 1 -->
                <div class="highlight-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3>Commitments Achieved</h3>
                    <div class="stat-number">24</div>
                    <p>Completed commitments from our action plans since joining OGP</p>
                </div>

                <!-- Highlight 2 -->
                <div class="highlight-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3>Stakeholders Engaged</h3>
                    <div class="stat-number">150+</div>
                    <p>Government and civil society organizations collaborating in our process</p>
                </div>

                <!-- Highlight 3 -->
                <div class="highlight-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3>Policies Implemented</h3>
                    <div class="stat-number">8</div>
                    <p>Key policy reforms advancing transparency and accountability</p>
                </div>

                <!-- Highlight 4 -->
                <div class="highlight-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3>Action Plans</h3>
                    <div class="stat-number">4</div>
                    <p>Completed national action plans driving open government reforms</p>
                </div>
            </div>
        </div>
    </section>
@endsection

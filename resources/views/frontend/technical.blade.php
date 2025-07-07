@extends('layouts.frontendlayout')

<style>
    .technical-groups-page {
        color: #333;
        line-height: 1.6;
    }

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

    .groups-section {
        padding: 80px 0;
        background-color: #f8fafc;
    }

    .section-intro {
        text-align: center;
        margin-bottom: 60px;
    }

    .section-intro h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 15px;
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

    .groups-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 30px;
    }

    .group-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
    }

    .group-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        padding: 30px 30px 0;
        position: relative;
    }

    .card-number {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 25px;
        font-weight: 700;
        font-size: 28px;
        color: white;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 0 30px 30px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .card-body h3 {
        font-size: 1.5rem;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .card-body p {
        color: #546e7a;
        line-height: 1.7;
        margin-bottom: 25px;
        flex-grow: 1;
    }

    .read-more {
        display: inline-flex;
        align-items: center;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .read-more:hover {
        transform: translateX(5px);
    }

    .read-more svg {
        margin-left: 8px;
        transition: all 0.3s ease;
    }

    .read-more:hover svg {
        transform: translateX(5px);
    }

    /* Color variants */
    .card-1 .card-number {
        background: linear-gradient(45deg, #00bcd4, #00acc1);
    }

    .card-2 .card-number {
        background: linear-gradient(45deg, #ff9800, #fb8c00);
    }

    .card-3 .card-number {
        background: linear-gradient(45deg, #009688, #00897b);
    }

    .card-4 .card-number {
        background: linear-gradient(45deg, #f44336, #e53935);
    }

    .card-5 .card-number {
        background: linear-gradient(45deg, #3f51b5, #3949ab);
    }

    @media (max-width: 768px) {
        .hero-section {
            padding: 80px 0;
        }

        .hero-content h1 {
            font-size: 2.2rem;
        }

        .section-intro h2 {
            font-size: 2rem;
        }

        .groups-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

@section('content')
    <div class="technical-groups-page">

        <!-- Groups Section -->
        <section class="groups-section">
            <div class="container">
                <div class="section-intro text-start">
                    <h2>Technical Working Groups</h2>

                </div>

                <div class="groups-grid">
                    <!-- Group 1 -->
                    <div class="group-card card-1" data-aos="fade-up">
                        <div class=" mx-auto py-3">
                            <!-- PNG Icon -->
                            <img src="{{ asset('images/anti-corruption.png') }}" alt="Anti-Corruption Icon" width="48"
                                height="48">
                        </div>
                        <div class="card-body text-center">
                            <h3>Anti-Corruption</h3>
                            <p class="mx-auto" style="max-width: 300px;">Enhancing transparency in procurement through Open
                                Contracting and Beneficial Ownership disclosures to reduce opportunities for corruption and
                                malpractice in public procurement processes.</p>
                            <div class="text-center">
                                <a href="{{ route('technical.detail', ['slug' => 'anti-corruption']) }}" class="read-more">
                                    Learn more
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Group 2 -->
                    <div class="group-card card-2" data-aos="fade-up" data-aos-delay="100">
                        <div class=" mx-auto py-3">
                            <!-- PNG Icon -->
                            <img src="{{ asset('images/info.png') }}" alt="Anti-Corruption Icon" width="48"
                                height="48">
                        </div>
                        <div class="card-body text-center">
                            <h3>Access to Information</h3>
                            <p class="mx-auto" style="max-width: 300px;">Promoting transparency in political financing by
                                implementing the Political Parties Act (2018) and strengthening right to information
                                frameworks for greater government accountability.</p>
                            <div class="text-center">
                                <a href="{{ route('technical.detail', ['slug' => 'access-to-information']) }}"
                                    class="read-more">
                                    Learn more
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Group 3 -->
                    <div class="group-card card-3" data-aos="fade-up" data-aos-delay="200">
                        <div class=" mx-auto py-3">
                            <!-- PNG Icon -->
                            <img src="{{ asset('images/money.png') }}" alt="Anti-Corruption Icon" width="48"
                                height="48">
                        </div>
                        <div class="card-body text-center">
                            <h3>Digital Governance</h3>
                            <p class="mx-auto" style="max-width: 300px;">Accelerating the adoption of digital government
                                services and increasing ICT utilization among citizens to improve service delivery and
                                government-citizen interactions.</p>
                            <div class="text-center">
                                <a href="{{ route('technical.detail', ['slug' => 'digital-governance']) }}"
                                    class="read-more">
                                    Learn more
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Group 4 -->
                    <div class="group-card card-4" data-aos="fade-up" data-aos-delay="300">
                        <div class=" mx-auto py-3">
                            <!-- PNG Icon -->
                            <img src="{{ asset('images/natural.png') }}" alt="Anti-Corruption Icon" width="48"
                                height="48">
                        </div>
                        <div class="card-body text-center">
                            <h3>Natural Resources</h3>
                            <p class="mx-auto" style="max-width: 300px;">Enhancing transparency in the governance of
                                Malawi's natural resources including contracts, production data, revenue collection, and
                                environmental impact management.</p>
                            <div class="text-center">
                                <a href="{{ route('technical.detail', ['slug' => 'natural-resources']) }}"
                                    class="read-more">
                                    Learn more
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Group 5 -->
                    <div class="group-card card-5" data-aos="fade-up" data-aos-delay="400">
                        <div class=" mx-auto py-3">
                            <!-- PNG Icon -->
                            <img src="{{ asset('images/post-office.png') }}" alt="Anti-Corruption Icon" width="48"
                                height="48">
                        </div>
                        <div class="card-body text-center">
                            <h3>Public Service Delivery</h3>
                            <p class="mx-auto" style="max-width: 300px;">Improving efficiency and accountability in public
                                services through citizen engagement mechanisms and open government practices across key
                                service delivery sectors.</p>
                            <div class="text-center">
                                <a href="{{ route('technical.detail', ['slug' => 'public-service-delivery']) }}"
                                    class="read-more">
                                    Learn more
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

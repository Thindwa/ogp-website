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
    }

    .section-title h2 {
        font-size: 2.5rem;
        font-weight: 700;
        position: relative;
        display: inline-block;
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

        <!-- What is OGP Section -->
        <section class="content-section pb-0">
            <div class="container mx-auto">
                <div class="row">
                    <div class="text-start mb-4">
                        <h2> OGP Global</h2>

                    </div>
                    <div class="col-md-12">

                        <div class="lead">
                            <p>The Open Government Partnership (OGP) is a multilateral partnership that aims to secure
                                concrete commitments from national governments to promote open government, active citizen
                                participation, transparency, accountability, and the harnessing of new technologies to
                                strengthen governance. This initiative started in 2011 and includes national governments,
                                the private sector, and civil society organizations (CSOs) working together to co-create
                                action plans with concrete commitments across various thematic areas.</p>

                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!-- How OGP Works Section -->
        <section class="timeline-section pb-0">
            <div class="container">
                <div class="text-start mb-5">
                    <h2>OGP in Malawi</h2>
                </div>

                <div class="timeline-item">
                    <div class="timeline-year">
                        <div class="year-bubble">2013</div>
                    </div>
                    <div class="timeline-content">
                        <h3>Malawi Joins OGP</h3>
                        <p class="lead">Malawi became a member of the OGP Global Partnership, embracing democratic principles of
                            transparency, accountability and citizen engagement as outlined in our Constitution.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-year">
                        <div class="year-bubble">2019</div>
                    </div>
                    <div class="timeline-content">
                        <h3>Temporary Interruptions</h3>
                        <p class="lead">OGP Malawi's initiatives were interrupted by the protracted electoral process and subsequently by
                            the COVID-19 pandemic, slowing progress on implementation.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-year">
                        <div class="year-bubble">2022</div>
                    </div>
                    <div class="timeline-content">
                        <h3>Revitalization</h3>
                        <p class="lead">His Excellency Dr. Lazarus McCarthy Chakwera, President of Malawi, revitalized OGP Malawi. A
                            co-creation kick-off workshop was held in August 2022 with government, civil society, and
                            private sector stakeholders.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-year">
                        <div class="year-bubble">2023</div>
                    </div>
                    <div class="timeline-content">
                        <h3>New Action Plan</h3>
                        <p class="lead">Malawi launched its 2023-2025 National Action Plan with commitments across five thematic areas,
                            guided by a National Steering Committee and Technical Working Groups.</p>
                    </div>
                </div>
            </div>
        </section>

       <!-- How OGP Works in Malawi -->
<!-- How OGP Works in Malawi -->
<section class="content-section bg-light">
    <div class="container">
      <div class="text-start mb-4">
        <h2 class="fw-bold">How Is OGP Working in Malawi</h2>
      </div>

      <div class="bg-white shadow-sm p-4 rounded">
        <!-- 1. National Steering Committee -->
        <h3 class="fw-semibold mb-3">1. National Steering Committee</h3>
        <p class="lead">
          OGP in Malawi is coordinated by a National Steering Committee that leads the implementation of the Malawi OGP 2023–2025 National Action Plan. The committee includes government and civil society representatives who collaboratively guide implementation across sectors.
        </p>
        <p class="lead">
          The National Steering Committee provides oversight and support to government agencies, civil society organizations, and private sector stakeholders in fulfilling the commitments outlined in the action plan.
        </p>

        <!-- Table -->
        <div class="table-responsive mt-4">
          <table class="table table-bordered align-middle">
            <thead class="table-light">
              <tr>
                <th colspan="2" class="text-center">OGP Malawi National Steering Committee Membership</th>
              </tr>
              <tr>
                <th>Government Institutions</th>
                <th>Civil Society Organizations</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>NGO Regulatory Authority</td>
                <td>Malawi Confederation of Chambers of Commerce and Industry (MCCCI)</td>
              </tr>
              <tr>
                <td>Ministry of Justice</td>
                <td>Malawi Building and Civil Engineering Contractors and Allied Traders Association (MABCATA)</td>
              </tr>
              <tr>
                <td>Ministry of Foreign Affairs</td>
                <td>Council for Non-Governmental Organizations in Malawi (CONGOMA)</td>
              </tr>
              <tr>
                <td>National Assembly</td>
                <td>Public Affairs Committee (PAC)</td>
              </tr>
              <tr>
                <td>Ministry of Information and Digitalization</td>
                <td>Federation of Disability on Malawi</td>
              </tr>
              <tr>
                <td>Ministry of Mining</td>
                <td>Centre for Social Accountability and Transparency</td>
              </tr>
              <tr>
                <td colspan="2"><strong>Ex-Officio Member:</strong> United States Agency for International Development (USAID)</td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- 2. Malawi National Action Plan -->
        <h3 class="fw-semibold mt-5 mb-3">2. Malawi National Action Plan</h3>
        <p class="lead">
          The Malawi OGP National Action Plan 2023–2025 outlines the country’s commitments toward transparency, accountability, and citizen engagement. It was developed collaboratively with input from government and civil society.
        </p>
        <a href="#" class="btn btn-outline-success" target="_blank">
          <i class="bi bi-file-earmark-text"></i> View or Download National Action Plan (PDF)
        </a>

         <!-- 2. Secritariate -->
         <h3 class="fw-semibold mt-5 mb-3">3. Secretariate</h3>
         <p class="lead">
           The Malawi OGP National Action Plan 2023–2025 outlines the country’s commitments toward transparency, accountability, and citizen engagement. It was developed collaboratively with input from government and civil society.
         </p>


        <!-- 3. Technical Working Groups -->
        <h3 class="fw-semibold mt-5 mb-3">4. Technical Working Groups</h3>
        <p class="lead">
          Technical Working Groups (TWGs) are formed to coordinate and track progress on specific commitment areas within the action plan. These groups consist of representatives from government ministries, civil society, and technical experts who meet regularly to review progress and provide implementation support.
        </p>
        <div class="twg-grid">
            <div class="twg-card">
                <h3><span>1</span> Open Parliament</h3>
                <p class="lead">Improving transparency on public debt and government financing through parliamentary openness and
                    accountability measures.</p>
                <a href="{{ route('technical.detail', ['slug' => 'open-parliament']) }}"
                    class="explore-link">Explore More</a>
            </div>

            <div class="twg-card">
                <h3><span>2</span> Digital Governance</h3>
                <p class="lead">Accelerating adoption of e-government services and increasing ICT utilization among Malawians for
                    better service delivery.</p>
                <a href="{{ route('technical.detail', ['slug' => 'digital-governance']) }}"
                    class="explore-link">Explore More</a>
            </div>

            <div class="twg-card">
                <h3><span>3</span> Natural Resources</h3>
                <p class="lead">Enhancing transparency in natural resource governance including contracts, production, exports
                    and revenue management.</p>
                <a href="{{ route('technical.detail', ['slug' => 'natural-resources']) }}"
                    class="explore-link">Explore More</a>
            </div>

            <div class="twg-card">
                <h3><span>4</span> Right to Information</h3>
                <p class="lead">Actualizing transparency on political party and campaign financing through implementation of
                    relevant legislation.</p>
                <a href="{{ route('technical.detail', ['slug' => 'right-to-information']) }}"
                    class="explore-link">Explore More</a>
            </div>

            <div class="twg-card">
                <h3><span>5</span> Anti-Corruption</h3>
                <p class="lead">Strengthening anti-corruption measures through open contracting and beneficial ownership
                    transparency.</p>
                <a href="{{ route('technical.detail', ['slug' => 'anti-corruption']) }}"
                    class="explore-link ">Explore More</a>
            </div>
        </div>
      </div>
    </div>
  </section>





    </div>
@endsection

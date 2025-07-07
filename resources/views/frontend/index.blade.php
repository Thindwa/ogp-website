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

<section id="hero" class="pt-0">
    <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

      <div class="carousel-inner">

        <div class="carousel-item active">
          <img src="{{ asset('images/he.jpg')}}" class="d-block w-100" style="height: 500px; object-fit: cover;" alt="">
          <div class="carousel-caption d-none d-md-block text-center">
            <div class="p-3 bg-dark bg-opacity-50 rounded">
              <h5 class="text-white">President at the Launch</h5>
              <p class="lead">Captured during the official opening ceremony</p>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <img src="{{ asset('images/openweek.jpg')}}" class="d-block w-100" style="height: 500px; object-fit: cover;" alt="">
          <div class="carousel-caption d-none d-md-block text-center">
            <div class="p-3 bg-dark bg-opacity-50 rounded">
              <h5 class="text-white">Open Government Week</h5>
              <p class="lead">Showcasing transparency and collaboration in public service</p>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <img src="{{ asset('images/he-chakwera.jpg')}}" class="d-block w-100" style="height: 500px; object-fit: cover;" alt="">
          <div class="carousel-caption d-none d-md-block text-center">
            <div class="p-3 bg-dark bg-opacity-50 rounded">
              <h5 class="text-white">President Chakwera's Address</h5>
              <p class="lead">Highlighting the government's commitment to openness</p>
            </div>
          </div>
        </div>

      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>

      <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>

      <div class="carousel-indicators">
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2"></button>
      </div>

    </div>
  </section>



       <!-- About Section -->
<section id="about" class="py-5 bg-light">
    <div class="container">
      <div class="row g-5 align-items-center">

        <!-- Image -->
        <div class="col-lg-5" data-aos="zoom-out" data-aos-delay="200">
          <div class="rounded shadow-sm overflow-hidden">
            <img src="{{ asset('images/he-chakwera.jpg') }}" alt="About OGP" class="img-fluid w-100">
          </div>
        </div>

        <!-- Text Content -->
        <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
          <h2 class="fw-bold mb-3 ">What is Open Government Partnership (OGP)?</h2>

          <p class="text-secondary lead">
            Open Government Partnership is an organization of reformers inside and outside of governments working to transform how government serves its citizens. It was formed in 2011, when government leaders and civil society advocates came together to create a unique partnership that promotes transparent, participatory, inclusive and accountable governance through government  and civil society advocate collaboration.
          </p>
        </div>

      </div>
    </div>
  </section>

   <!-- OGP Details Section -->
<section class="py-5 bg-white">
    <div class="container">
      <div class="row mb-4" data-aos="fade-up">
        <div class="col-lg-12">
          <h3 class="fw-bold mb-3 ">Who is in OGP?</h3>
          <p class="text-secondary lead">
            The Open Government Partnership (OGP) includes 75 countries and 150 local governments, representing more than two billion people, and thousands of civil society organizations. These national governments and local jurisdictions work alongside thousands of civil society organizations to co-create two-year action plans. Each member submits a plan co-created with civil society that outlines concrete commitments to enhance transparency, accountability, and public participation in government.
          </p>
        </div>
      </div>

      <div class="row mb-4" data-aos="fade-up">
        <div class="col-lg-12">
          <h3 class="fw-bold mb-3 ">How Does OGP Work?</h3>
          <p class="text-secondary lead">
            The OGP is based on the idea that civil society and government co-create action plans with concrete commitments. These commitments are then credibly implemented with support from partner organizations either within the member country or globally.
          </p>
          <p class="text-secondary lead">
            The process begins when a state endorses the Open Government Declaration, signaling its commitment to transparency, access to information, and civic participation. Action plans are co-created with civil society to improve services and enhance people’s lives, with progress openly reported.
          </p>
        </div>
      </div>

      <div class="row" data-aos="fade-up">
        <div class="col-lg-12">
          <h3 class="fw-bold mb-3 ">When Did Malawi Join OGP?</h3>
          <p class="text-secondary lead">
            Malaŵi has been a member of the OGP Global Body since 2013. Through OGP, Malaŵi embraces democratic values by promoting its constitutional principles of transparency, accountability, and citizen engagement. OGP in Malawi is a partnership among Government, Civil Society Organizations, and the Private Sector.
          </p>
        </div>
      </div>
    </div>
  </section>

@endsection

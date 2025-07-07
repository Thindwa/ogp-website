@extends('layouts.frontendlayout')

@section('content')

<section class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">

        <div class="card shadow-sm border-0">
          <div class="card-body p-5">

            <h1 class="card-title h3 fw-bold mb-4 text-secondary">
              {{ $achievement->title }}
            </h1>

            <div class="mb-3">
              <span class="badge bg-info text-dark me-2">Submitted: {{ $achievement->submitted_year }}</span>
              <span class="badge bg-secondary">{{ $achievement->policy_area }}</span>
            </div>

            <hr class="my-4">

            <div class="fs-6 lh-lg text-secondary">
              {!! nl2br(e($achievement->description)) !!}
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</section>

@endsection

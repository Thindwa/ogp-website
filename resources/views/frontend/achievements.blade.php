@extends('layouts.frontendlayout')

@section('content')

<section class="highlights-page py-5">
  <div class="container">
    <h2 class="mb-4">OGP Malawi Achievements</h2>

    <div class="table-responsive">
      <table id="reformsTable" class="table table-striped table-hover">
        <thead class="table-light">
          <tr>
            <th>Title</th>
            <th>Submitted</th>
            <th>Policy Areas</th>
          </tr>
        </thead>
        <tbody>
          <tr class="clickable-row" data-href="{{ route('achievement.detail', ['slug' => 'transparency-laws']) }}">
            <td>Reform laws related to transparency and access to information</td>
            <td>2020</td>
            <td>Public Participation</td>
          </tr>
          <tr class="clickable-row" data-href="{{ route('achievement.detail', ['slug' => 'accountability-plan']) }}">
            <td>Transparency and Accountability Improvement and Reinforcement Plan</td>
            <td>2020</td>
            <td>Anti-Corruption and Integrity</td>
          </tr>
          <tr class="clickable-row" data-href="{{ route('achievement.detail', ['slug' => 'citizen-participation']) }}">
            <td>Promote citizen participation in public affairs</td>
            <td>2020</td>
            <td>Public Participation</td>
          </tr>
          <tr class="clickable-row" data-href="{{ route('achievement.detail', ['slug' => 'regulatory-traceability']) }}">
            <td>Improve traceability of regulatory draft and approval processes</td>
            <td>2020</td>
            <td>Public Participation</td>
          </tr>
          <tr class="clickable-row" data-href="{{ route('achievement.detail', ['slug' => 'integrity-systems']) }}">
            <td>Public Integrity Systems</td>
            <td>2020</td>
            <td>Anti-Corruption and Integrity</td>
          </tr>
          <tr class="clickable-row" data-href="{{ route('achievement.detail', ['slug' => 'whistleblower-protection']) }}">
            <td>Establish legal whistleblower protections</td>
            <td>2020</td>
            <td>Anti-Corruption and Integrity</td>
          </tr>
          <tr class="clickable-row" data-href="{{ route('achievement.detail', ['slug' => 'open-gov-education']) }}">
            <td>Education and Training in Open Government</td>
            <td>2020</td>
            <td>Gender</td>
          </tr>
          <tr class="clickable-row" data-href="{{ route('achievement.detail', ['slug' => 'inclusive-communication']) }}">
            <td>Inclusive Communication about Open Government</td>
            <td>2020</td>
            <td>Public Participation</td>
          </tr>
          <tr class="clickable-row" data-href="{{ route('achievement.detail', ['slug' => 'open-gov-observatory']) }}">
            <td>Observatory of Open Government</td>
            <td>2020</td>
            <td>Digital Governance</td>
          </tr>
          <tr class="clickable-row" data-href="{{ route('achievement.detail', ['slug' => 'mandate-auditing']) }}">
            <td>Publish mandate commitments to allow for social auditing</td>
            <td>2020</td>
            <td>Public Participation</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

@endsection

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const rows = document.querySelectorAll(".clickable-row");
    rows.forEach(row => {
      row.style.cursor = "pointer";
      row.addEventListener("click", () => {
        window.location.href = row.dataset.href;
      });
    });
  });
</script>


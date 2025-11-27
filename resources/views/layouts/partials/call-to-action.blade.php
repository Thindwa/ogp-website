@php
    $currentRoute = Route::currentRouteName();
@endphp

<!-- Call to Action Section -->
<section class="py-5 bg-gradient-to-r from-success to-info text-white">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <div class="border-bottom border-3 border-warning mx-auto mb-3 mb-md-4" style="width: 100px;"></div>

                <div class="d-flex gap-1 gap-md-2 justify-content-center flex-nowrap">
                    @if($currentRoute !== 'events' && $currentRoute !== 'event.detail')
                    <a href="{{ route('events') }}" class="btn btn-outline-light btn-sm btn-md btn-lg-md px-2 px-md-4 py-2 py-md-3 rounded-pill">
                        <i class="fas fa-calendar me-1 me-md-2"></i>View All Events
                    </a>
                    @endif
                    @if($currentRoute !== 'achievements' && $currentRoute !== 'achievement.detail')
                    <a href="{{ route('achievements') }}" class="btn btn-outline-light btn-sm btn-md btn-lg-md px-2 px-md-4 py-2 py-md-3 rounded-pill">
                        <i class="fas fa-trophy me-1 me-md-2"></i>View All Achievements
                    </a>
                    @endif
                    @if($currentRoute !== 'documents' && $currentRoute !== 'document.detail')
                    <a href="{{ route('documents') }}" class="btn btn-outline-light btn-sm btn-md btn-lg-md px-2 px-md-4 py-2 py-md-3 rounded-pill">
                        <i class="fas fa-download me-1 me-md-2"></i>View All Documents
                    </a>
                    @endif
                    @if($currentRoute !== 'gallery' && $currentRoute !== 'gallery.detail')
                    <a href="{{ route('gallery') }}" class="btn btn-outline-light btn-sm btn-md btn-lg-md px-2 px-md-4 py-2 py-md-3 rounded-pill">
                        <i class="fas fa-images me-1 me-md-2"></i>View Gallery
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>


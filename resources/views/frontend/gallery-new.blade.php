@extends('layouts.frontendlayout')

@section('content')
<!-- Page Header -->
<section class="section" style="background: var(--gray-50);">
    <div class="container">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-4">Photo Gallery</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Visual stories of our work in promoting open government in Malawi
            </p>
        </div>
    </div>
</section>

<!-- Gallery Grid -->
<section class="section">
    <div class="container">
        <!-- Filter Bar -->
        <div class="card mb-8">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <span class="font-medium">Filter by:</span>
                        <select class="form-control" style="width: auto; min-width: 150px;">
                            <option value="">All Categories</option>
                            <option value="events">Events</option>
                            <option value="meetings">Meetings</option>
                            <option value="workshops">Workshops</option>
                            <option value="conferences">Conferences</option>
                        </select>
                        <select class="form-control" style="width: auto; min-width: 150px;">
                            <option value="">All Years</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                        </select>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="form-control" style="width: auto;">
                            <span>Featured Only</span>
                        </label>
                    </div>
                    <div class="text-sm text-gray-500">
                        {{ $galleryItems->total() }} photos found
                    </div>
                </div>
            </div>
        </div>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-4">
            @forelse($galleryItems as $item)
            <div class="card overflow-hidden hover:shadow-lg transition-all cursor-pointer" onclick="openLightbox('{{ $item->getFirstMediaUrl('gallery') }}', '{{ $item->title }}', '{{ $item->description }}')">
                <div class="relative">
                    <img src="{{ $item->getFirstMediaUrl('gallery') }}"
                         alt="{{ $item->title }}"
                         class="w-full h-48 object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-30 transition-all flex items-center justify-center">
                        <i class="fas fa-search-plus text-white text-2xl opacity-0 hover:opacity-100 transition-all"></i>
                    </div>
                    @if($item->is_featured)
                    <div class="absolute top-2 right-2">
                        <span class="badge badge-success">Featured</span>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <h3 class="card-title text-sm">{{ $item->title }}</h3>
                    <div class="card-meta">
                        <span class="badge badge-primary">{{ $item->category ?? 'General' }}</span>
                        <span class="text-xs text-gray-500">{{ $item->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-4 text-center py-12">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-images text-2xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">No photos found</h3>
                <p class="text-gray-500">Check back later for new gallery updates.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($galleryItems->hasPages())
        <div class="mt-8">
            {{ $galleryItems->links() }}
        </div>
        @endif
    </div>
</section>

<!-- Lightbox Modal -->
<div id="lightbox" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden flex items-center justify-center p-4">
    <div class="max-w-4xl max-h-full relative">
        <button onclick="closeLightbox()" class="absolute -top-12 right-0 text-white text-2xl hover:text-gray-300">
            <i class="fas fa-times"></i>
        </button>
        <img id="lightbox-image" src="" alt="" class="max-w-full max-h-full object-contain rounded-lg">
        <div class="mt-4 text-center">
            <h3 id="lightbox-title" class="text-white text-xl font-semibold mb-2"></h3>
            <p id="lightbox-description" class="text-gray-300"></p>
        </div>
    </div>
</div>

<script>
function openLightbox(imageSrc, title, description) {
    document.getElementById('lightbox-image').src = imageSrc;
    document.getElementById('lightbox-title').textContent = title;
    document.getElementById('lightbox-description').textContent = description;
    document.getElementById('lightbox').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    document.getElementById('lightbox').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Close lightbox when clicking outside the image
document.getElementById('lightbox').addEventListener('click', function(e) {
    if (e.target === this) {
        closeLightbox();
    }
});

// Close lightbox with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeLightbox();
    }
});
</script>

@endsection

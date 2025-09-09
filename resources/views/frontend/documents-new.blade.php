@extends('layouts.frontendlayout')

@section('content')
<!-- Page Header -->
<section class="section" style="background: var(--gray-50);">
    <div class="container">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-4">Documents & Resources</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Access official documents, reports, and resources from Open Government Partnership Malawi
            </p>
        </div>
    </div>
</section>

<!-- Documents Grid -->
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
                            <option value="action-plan">Action Plans</option>
                            <option value="report">Reports</option>
                            <option value="policy">Policy Documents</option>
                            <option value="guideline">Guidelines</option>
                        </select>
                        <select class="form-control" style="width: auto; min-width: 150px;">
                            <option value="">All File Types</option>
                            <option value="pdf">PDF</option>
                            <option value="doc">Word Document</option>
                            <option value="xlsx">Excel</option>
                        </select>
                        <select class="form-control" style="width: auto; min-width: 150px;">
                            <option value="">All Working Groups</option>
                            <option value="transparency">Transparency</option>
                            <option value="accountability">Accountability</option>
                            <option value="participation">Participation</option>
                        </select>
                    </div>
                    <div class="text-sm text-gray-500">
                        {{ $documents->total() }} documents found
                    </div>
                </div>
            </div>
        </div>

        <!-- Documents Grid -->
        <div class="grid grid-cols-3">
            @forelse($documents as $document)
            <div class="card">
                <div class="card-body">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-12 h-12 bg-accent-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            @if($document->file_type === 'pdf')
                                <i class="fas fa-file-pdf text-xl text-red-500"></i>
                            @elseif($document->file_type === 'doc' || $document->file_type === 'docx')
                                <i class="fas fa-file-word text-xl text-blue-500"></i>
                            @elseif($document->file_type === 'xlsx' || $document->file_type === 'xls')
                                <i class="fas fa-file-excel text-xl text-green-500"></i>
                            @else
                                <i class="fas fa-file text-xl text-gray-500"></i>
                            @endif
                        </div>
                        <div class="flex-1">
                            <h3 class="card-title">{{ $document->title }}</h3>
                            <div class="card-meta mb-2">
                                <span class="badge badge-primary">{{ $document->category }}</span>
                                <span class="badge badge-secondary">{{ strtoupper($document->file_type) }}</span>
                            </div>
                        </div>
                    </div>

                    <p class="card-text mb-4">{{ Str::limit($document->description, 100) }}</p>

                    <div class="card-meta mb-4">
                        <span class="text-sm text-gray-500">
                            <i class="fas fa-download mr-1"></i>
                            {{ $document->download_count ?? 0 }} downloads
                        </span>
                        <span class="text-sm text-gray-500 ml-4">
                            <i class="fas fa-calendar mr-1"></i>
                            {{ $document->created_at->format('M d, Y') }}
                        </span>
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">
                            {{ $document->technicalWorkingGroup->name ?? 'General' }}
                        </span>
                        <a href="{{ route('document.detail', $document->slug) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-download mr-2"></i>Download
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-file-alt text-2xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">No documents found</h3>
                <p class="text-gray-500">Check back later for new resources.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($documents->hasPages())
        <div class="mt-8">
            {{ $documents->links() }}
        </div>
        @endif
    </div>
</section>

<!-- Quick Access Section -->
<section class="section" style="background: var(--gray-50);">
    <div class="container">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Quick Access</h2>
            <p class="text-lg text-gray-600">Popular document categories</p>
        </div>

        <div class="grid grid-cols-4">
            <a href="#" class="card text-center hover:shadow-lg transition-all">
                <div class="card-body">
                    <div class="w-16 h-16 bg-accent-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-clipboard-list text-2xl text-accent-600"></i>
                    </div>
                    <h3 class="font-semibold mb-2">Action Plans</h3>
                    <p class="text-sm text-gray-600">National action plans and commitments</p>
                </div>
            </a>

            <a href="#" class="card text-center hover:shadow-lg transition-all">
                <div class="card-body">
                    <div class="w-16 h-16 bg-accent-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-chart-line text-2xl text-accent-600"></i>
                    </div>
                    <h3 class="font-semibold mb-2">Progress Reports</h3>
                    <p class="text-sm text-gray-600">Implementation progress and updates</p>
                </div>
            </a>

            <a href="#" class="card text-center hover:shadow-lg transition-all">
                <div class="card-body">
                    <div class="w-16 h-16 bg-accent-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-2xl text-accent-600"></i>
                    </div>
                    <h3 class="font-semibold mb-2">Stakeholder Guides</h3>
                    <p class="text-sm text-gray-600">Guidelines for civil society participation</p>
                </div>
            </a>

            <a href="#" class="card text-center hover:shadow-lg transition-all">
                <div class="card-body">
                    <div class="w-16 h-16 bg-accent-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-cog text-2xl text-accent-600"></i>
                    </div>
                    <h3 class="font-semibold mb-2">Technical Resources</h3>
                    <p class="text-sm text-gray-600">Implementation tools and methodologies</p>
                </div>
            </a>
        </div>
    </div>
</section>

@endsection

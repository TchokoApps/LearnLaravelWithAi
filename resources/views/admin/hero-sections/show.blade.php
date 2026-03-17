@extends('admin.admin_master')

@section('admin')
    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Hero Section Details</h4>
            </div>
            <div class="text-end">
                <a href="{{ route('admin.hero-sections.index') }}" class="btn btn-sm btn-secondary">
                    <i data-feather="arrow-left" class="me-1" style="height: 16px; width: 16px;"></i>Back to List
                </a>
            </div>
        </div>

        <!-- start row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-3 text-center">
                                @if ($heroSection->hero_image && \Storage::disk('public')->exists($heroSection->hero_image))
                                    <img src="{{ asset('storage/' . $heroSection->hero_image) }}" alt="{{ $heroSection->title }}" style="height: 250px; width: auto; border-radius: 8px; object-fit: cover;">
                                @else
                                    <div class="bg-light p-4 rounded" style="height: 250px; display: flex; align-items: center; justify-content: center;">
                                        <i data-feather="image" style="height: 64px; width: 64px; color: #ccc;"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-9">
                                <div class="mb-3">
                                    <label class="text-muted small">Title</label>
                                    <h5 class="fw-semibold">{{ $heroSection->title }}</h5>
                                </div>
                                <div class="mb-3">
                                    <label class="text-muted small">Button Text</label>
                                    <h5 class="fw-semibold">{{ $heroSection->button_text }}</h5>
                                </div>
                                <div class="mb-3">
                                    <label class="text-muted small">Button URL</label>
                                    <p class="mb-0"><a href="{{ $heroSection->button_url }}" target="_blank">{{ $heroSection->button_url }}</a></p>
                                </div>
                                <div class="mb-3">
                                    <label class="text-muted small">Created</label>
                                    <p class="mb-0">{{ $heroSection->created_at->format('M d, Y H:i A') }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="text-muted small">Last Updated</label>
                                    <p class="mb-0">{{ $heroSection->updated_at->format('M d, Y H:i A') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="text-muted small">Description</label>
                            <div class="card bg-light border-0">
                                <div class="card-body">
                                    <p class="mb-0">{{ $heroSection->description }}</p>
                                </div>
                            </div>
                        </div>

                        @if ($heroSection->hero_shape && \Storage::disk('public')->exists($heroSection->hero_shape))
                            <div class="mb-4">
                                <label class="text-muted small">Hero Shape</label>
                                <div class="card bg-light border-0 p-4">
                                    <img src="{{ asset('storage/' . $heroSection->hero_shape) }}" alt="{{ $heroSection->title }}" style="height: 150px; width: auto; object-fit: contain;">
                                </div>
                            </div>
                        @endif

                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.hero-sections.edit', $heroSection->id) }}" class="btn btn-warning">
                                <i data-feather="edit" class="me-1" style="height: 16px; width: 16px;"></i>Edit
                            </a>
                            <form action="{{ route('admin.hero-sections.destroy', $heroSection->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this hero section?')">
                                    <i data-feather="trash-2" class="me-1" style="height: 16px; width: 16px;"></i>Delete
                                </button>
                            </form>
                            <a href="{{ route('admin.hero-sections.index') }}" class="btn btn-light">Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
@endsection

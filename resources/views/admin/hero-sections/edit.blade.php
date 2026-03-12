@extends('admin.admin_master')

@section('admin')
    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Edit Hero Section</h4>
            </div>
            <div class="text-end">
                <a href="{{ route('hero-sections.index') }}" class="btn btn-sm btn-secondary">
                    <i data-feather="arrow-left" class="me-1" style="height: 16px; width: 16px;"></i>Back to List
                </a>
            </div>
        </div>

        <!-- start row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Edit Hero Section</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('hero-sections.update', $heroSection->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $heroSection->title) }}" placeholder="Enter hero title" required>
                                @error('title')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" placeholder="Enter hero description" required>{{ old('description', $heroSection->description) }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="button_text" class="form-label">Button Text <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('button_text') is-invalid @enderror" id="button_text" name="button_text" value="{{ old('button_text', $heroSection->button_text) }}" placeholder="Enter button text" required>
                                @error('button_text')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="button_url" class="form-label">Button URL <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('button_url') is-invalid @enderror" id="button_url" name="button_url" value="{{ old('button_url', $heroSection->button_url) }}" placeholder="Enter button URL" required>
                                @error('button_url')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="hero_image" class="form-label">Hero Image</label>
                                @if ($heroSection->hero_image && \Storage::disk('public')->exists($heroSection->hero_image))
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $heroSection->hero_image) }}" alt="{{ $heroSection->title }}" style="height: 100px; width: auto; border-radius: 4px; object-fit: cover;">
                                        <p class="form-text text-muted mt-1">Current Image</p>
                                    </div>
                                @endif
                                <input type="file" class="form-control @error('hero_image') is-invalid @enderror" id="hero_image" name="hero_image" accept="image/*">
                                <small class="form-text text-muted">Accepted formats: JPG, PNG, GIF. Max size: 2MB (Leave empty to keep current image)</small>
                                @error('hero_image')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="hero_shape" class="form-label">Hero Shape</label>
                                @if ($heroSection->hero_shape && \Storage::disk('public')->exists($heroSection->hero_shape))
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $heroSection->hero_shape) }}" alt="{{ $heroSection->title }}" style="height: 100px; width: auto; border-radius: 4px; object-fit: cover;">
                                        <p class="form-text text-muted mt-1">Current Shape</p>
                                    </div>
                                @endif
                                <input type="file" class="form-control @error('hero_shape') is-invalid @enderror" id="hero_shape" name="hero_shape" accept="image/*,.svg">
                                <small class="form-text text-muted">Accepted formats: JPG, PNG, GIF, SVG. Max size: 2MB (Leave empty to keep current shape)</small>
                                @error('hero_shape')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i data-feather="save" class="me-1" style="height: 16px; width: 16px;"></i>Update Hero Section
                                </button>
                                <a href="{{ route('hero-sections.index') }}" class="btn btn-light">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
@endsection

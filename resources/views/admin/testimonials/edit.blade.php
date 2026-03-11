@extends('admin.admin_master')

@section('admin')
    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Edit Testimonial</h4>
            </div>
            <div class="text-end">
                <a href="{{ route('testimonials.index') }}" class="btn btn-sm btn-secondary">
                    <i data-feather="arrow-left" class="me-1" style="height: 16px; width: 16px;"></i>Back to List
                </a>
            </div>
        </div>

        <!-- start row -->
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Edit Testimonial</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $testimonial->name) }}" placeholder="Enter testimonial owner name" required>
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $testimonial->title) }}" placeholder="Enter testimonial owner title (e.g., CEO, Manager)" required>
                                @error('title')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="text" class="form-label">Testimonial Text <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('text') is-invalid @enderror" id="text" name="text" rows="5" placeholder="Enter the testimonial content" required>{{ old('text', $testimonial->text) }}</textarea>
                                @error('text')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                @if ($testimonial->image && \Storage::disk('public')->exists($testimonial->image))
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name }}" style="height: 100px; width: auto; border-radius: 4px; object-fit: cover;">
                                        <p class="form-text text-muted mt-1">Current Image</p>
                                    </div>
                                @endif
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                                <small class="form-text text-muted">Accepted formats: JPG, PNG, GIF. Max size: 2MB (Leave empty to keep current image)</small>
                                @error('image')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i data-feather="save" class="me-1" style="height: 16px; width: 16px;"></i>Update Testimonial
                                </button>
                                <a href="{{ route('testimonials.index') }}" class="btn btn-light">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
@endsection

@extends('admin.admin_master')

@section('admin')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-3">
                    <h6 class="mb-0">Create Smart Financial Section</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.feature-sections.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="section_title" class="form-label">Section Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('section_title') is-invalid @enderror"
                                   id="section_title" name="section_title" value="{{ old('section_title') }}" required>
                            @error('section_title')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="feature_title" class="form-label">Feature Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('feature_title') is-invalid @enderror"
                                   id="feature_title" name="feature_title" value="{{ old('feature_title') }}" required>
                            @error('feature_title')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="feature_description" class="form-label">Feature Description <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('feature_description') is-invalid @enderror"
                                      id="feature_description" name="feature_description" rows="4" required>{{ old('feature_description') }}</textarea>
                            @error('feature_description')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="feature_icon" class="form-label">Feature Icon</label>
                            <input type="file" class="form-control @error('feature_icon') is-invalid @enderror"
                                   id="feature_icon" name="feature_icon" accept="image/*">
                            <small class="text-muted">Accepted formats: JPEG, PNG, GIF, SVG. Max size: 2MB</small>
                            @error('feature_icon')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="display_order" class="form-label">Display Order <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('display_order') is-invalid @enderror"
                                   id="display_order" name="display_order" value="{{ old('display_order', 0) }}" min="0" required>
                            @error('display_order')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                                       value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    Active
                                </label>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="ni ni-fat-add"></i> Create Feature
                            </button>
                            <a href="{{ route('admin.feature-sections.index') }}" class="btn btn-secondary">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

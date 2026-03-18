@extends('admin.admin_master')

@section('admin')
    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Add New FAQ</h4>
            </div>
        </div>

        <!-- Form row -->
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">FAQ Information</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Please fix the following errors:</strong>
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('faqs.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror"
                                       value="{{ old('title') }}" placeholder="e.g., Real-Time Expense Tracking" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" rows="5" class="form-control @error('description') is-invalid @enderror"
                                          placeholder="Enter the FAQ description..." required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="order" class="form-label">Order</label>
                                        <input type="number" id="order" name="order" class="form-control @error('order') is-invalid @enderror"
                                               value="{{ old('order', 0) }}" min="0" placeholder="0">
                                        @error('order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">
                                                Active
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="border-top pt-3 mt-3">
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i data-feather="save" class="me-1" style="height: 16px; width: 16px;"></i>Create FAQ
                                    </button>
                                    <a href="{{ route('faqs.index') }}" class="btn btn-secondary">
                                        <i data-feather="x" class="me-1" style="height: 16px; width: 16px;"></i>Cancel
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->

    </div><!-- container-xxl -->
@endsection

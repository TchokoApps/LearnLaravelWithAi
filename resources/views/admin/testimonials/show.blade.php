@extends('admin.admin_master')

@section('admin')
    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Testimonial Details</h4>
            </div>
            <div class="text-end">
                <a href="{{ route('testimonials.index') }}" class="btn btn-sm btn-secondary">
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
                                @if ($testimonial->image && \Storage::disk('public')->exists($testimonial->image))
                                    <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name }}" style="height: 200px; width: auto; border-radius: 8px; object-fit: cover;">
                                @else
                                    <div class="bg-light p-4 rounded" style="height: 200px; display: flex; align-items: center; justify-content: center;">
                                        <i data-feather="image" style="height: 64px; width: 64px; color: #ccc;"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-9">
                                <div class="mb-3">
                                    <label class="text-muted small">Name</label>
                                    <h5 class="fw-semibold">{{ $testimonial->name }}</h5>
                                </div>
                                <div class="mb-3">
                                    <label class="text-muted small">Title</label>
                                    <h5 class="fw-semibold">{{ $testimonial->title }}</h5>
                                </div>
                                <div class="mb-3">
                                    <label class="text-muted small">Created</label>
                                    <p class="mb-0">{{ $testimonial->created_at->format('M d, Y H:i A') }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="text-muted small">Last Updated</label>
                                    <p class="mb-0">{{ $testimonial->updated_at->format('M d, Y H:i A') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="text-muted small">Testimonial Text</label>
                            <div class="card bg-light border-0">
                                <div class="card-body">
                                    <p class="mb-0">{{ $testimonial->text }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <a href="{{ route('testimonials.edit', $testimonial->id) }}" class="btn btn-warning">
                                <i data-feather="edit" class="me-1" style="height: 16px; width: 16px;"></i>Edit
                            </a>
                            <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this testimonial?')">
                                    <i data-feather="trash-2" class="me-1" style="height: 16px; width: 16px;"></i>Delete
                                </button>
                            </form>
                            <a href="{{ route('testimonials.index') }}" class="btn btn-light">Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
@endsection

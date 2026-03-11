@extends('admin.admin_master')

@section('admin')
    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">All Testimonials</h4>
            </div>
            <div class="text-end">
                <a href="{{ route('testimonials.create') }}" class="btn btn-sm btn-primary">
                    <i data-feather="plus" class="me-1" style="height: 16px; width: 16px;"></i>Add Testimonial
                </a>
            </div>
        </div>

        <!-- start row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title">Testimonials List</h5>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Text</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($testimonials as $index => $testimonial)
                                        <tr>
                                            <td>
                                                <h6 class="m-0">{{ $index + 1 }}</h6>
                                            </td>
                                            <td>
                                                <h6 class="m-0">{{ $testimonial->name }}</h6>
                                            </td>
                                            <td>
                                                <h6 class="m-0">{{ $testimonial->title }}</h6>
                                            </td>
                                            <td>
                                                @if ($testimonial->image && \Storage::disk('public')->exists($testimonial->image))
                                                    <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name }}" style="height: 40px; width: 40px; border-radius: 4px; object-fit: cover;">
                                                @else
                                                    <span class="badge bg-light text-dark">No Image</span>
                                                @endif
                                            </td>
                                            <td>
                                                <p class="m-0" style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                    {{ $testimonial->text }}
                                                </p>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('testimonials.show', $testimonial->id) }}" class="btn btn-sm btn-info" title="View">
                                                        <i data-feather="eye" style="height: 16px; width: 16px;"></i>
                                                    </a>
                                                    <a href="{{ route('testimonials.edit', $testimonial->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                                        <i data-feather="edit" style="height: 16px; width: 16px;"></i>
                                                    </a>
                                                    <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure?')">
                                                            <i data-feather="trash-2" style="height: 16px; width: 16px;"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-4">
                                                <p class="text-muted mb-0">No testimonials found.</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
@endsection

@extends('admin.admin_master')

@section('admin')
    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Hero Sections</h4>
            </div>
            <div class="text-end">
                <a href="{{ route('admin.hero-sections.create') }}" class="btn btn-sm btn-primary">
                    <i data-feather="plus" class="me-1" style="height: 16px; width: 16px;"></i>Add Hero Section
                </a>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Datatable -->
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">All Hero Sections</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <table class="table table-bordered dt-responsive table-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Button Text</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($heroSections as $index => $section)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $section->title }}</td>
                                        <td>{{ $section->button_text }}</td>
                                        <td>
                                            @if ($section->hero_image && \Storage::disk('public')->exists($section->hero_image))
                                                <img src="{{ asset('storage/' . $section->hero_image) }}"
                                                    alt="{{ $section->title }}"
                                                    style="height: 40px; width: 40px; border-radius: 4px; object-fit: cover;">
                                            @else
                                                <span class="badge bg-light text-dark">No Image</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('admin.hero-sections.show', $section->id) }}"
                                                    class="btn btn-sm btn-info" title="View">
                                                    <i data-feather="eye" style="height: 16px; width: 16px;"></i>
                                                </a>
                                                <a href="{{ route('admin.hero-sections.edit', $section->id) }}"
                                                    class="btn btn-sm btn-warning" title="Edit">
                                                    <i data-feather="edit" style="height: 16px; width: 16px;"></i>
                                                </a>
                                                <form action="{{ route('admin.hero-sections.destroy', $section->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                                        onclick="return confirm('Are you sure?')">
                                                        <i data-feather="trash-2" style="height: 16px; width: 16px;"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4">
                                            <p class="text-muted mb-0">No hero sections found.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
        <!-- end Datatable -->

    </div> <!-- container-fluid -->
@endsection

@extends('admin.admin_master')

@section('admin')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-3">
                        <div class="row">
                            <div class="col-md-10">
                                <h6 class="mb-0">Feature Sections</h6>
                            </div>
                            <div class="col-md-2 d-flex justify-content-end">
                                <a href="{{ route('admin.feature-sections.create') }}"
                                    class="btn btn-primary btn-sm">
                                    <i class="ni ni-fat-add"></i> Add New Feature
                                </a>
                            </div>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mx-4 mt-3" role="alert">
                            <span class="alert-text">{{ session('success') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Section Title</th>
                                    <th>Feature Title</th>
                                    <th>Order</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($sections as $section)
                                    <tr>
                                        <td>{{ $section->id }}</td>
                                        <td>{{ $section->section_title }}</td>
                                        <td>{{ $section->feature_title }}</td>
                                        <td>{{ $section->display_order }}</td>
                                        <td>
                                            <span class="badge badge-{{ $section->is_active ? 'success' : 'secondary' }}">
                                                {{ $section->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('admin.feature-sections.show', $section->id) }}"
                                                    class="btn btn-sm btn-info" title="View">
                                                    <i data-feather="eye" style="height: 16px; width: 16px;"></i>
                                                </a>
                                                <a href="{{ route('admin.feature-sections.edit', $section->id) }}"
                                                    class="btn btn-sm btn-warning" title="Edit">
                                                    <i data-feather="edit" style="height: 16px; width: 16px;"></i>
                                                </a>
                                                <form
                                                    action="{{ route('admin.feature-sections.destroy', $section->id) }}"
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
                                        <td colspan="6" class="text-center py-4">
                                            <p class="text-secondary">No smart financial sections found.</p>
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
@endsection

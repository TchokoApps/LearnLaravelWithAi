@extends('admin.admin_master')

@section('admin')
    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">All FAQs</h4>
            </div>
            <div class="text-end">
                <a href="{{ route('faqs.create') }}" class="btn btn-sm btn-primary">
                    <i data-feather="plus" class="me-1" style="height: 16px; width: 16px;"></i>Add FAQ
                </a>
            </div>
        </div>

        <!-- Datatables  -->
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">FAQ Management</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($faqs as $index => $faq)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $faq->order }}</td>
                                        <td class="fw-semibold">{{ $faq->title }}</td>
                                        <td>{{ Str::limit($faq->description, 80) }}</td>
                                        <td>
                                            <span class="badge {{ $faq->is_active ? 'bg-success' : 'bg-danger' }}">
                                                {{ $faq->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('faqs.edit', $faq->id) }}"
                                                    class="btn btn-sm btn-warning" title="Edit">
                                                    <i data-feather="edit" style="height: 16px; width: 16px;"></i>
                                                </a>
                                                <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                                            onclick="return confirm('Are you sure you want to delete this FAQ?')">
                                                        <i data-feather="trash-2" style="height: 16px; width: 16px;"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">
                                            No FAQs found. <a href="{{ route('faqs.create') }}">Create one</a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->

    </div><!-- container-xxl -->
@endsection

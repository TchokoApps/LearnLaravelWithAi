@extends('admin.admin_master')

@section('admin')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-3">
                    <h6 class="mb-0">Smart Financial Section Details</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p><strong>Section Title:</strong></p>
                            <p>{{ $featureSection->section_title }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Feature Title:</strong></p>
                            <p>{{ $featureSection->feature_title }}</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12">
                            <p><strong>Feature Description:</strong></p>
                            <p>{{ $featureSection->feature_description }}</p>
                        </div>
                    </div>

                    @if($featureSection->feature_icon)
                        <div class="row mb-4">
                            <div class="col-12">
                                <p><strong>Feature Icon:</strong></p>
                                <img src="{{ asset('storage/' . $featureSection->feature_icon) }}" alt="Feature Icon" style="max-height: 200px;">
                            </div>
                        </div>
                    @endif

                    <div class="row mb-4">
                        <div class="col-md-3">
                            <p><strong>Display Order:</strong></p>
                            <p>{{ $featureSection->display_order }}</p>
                        </div>
                        <div class="col-md-3">
                            <p><strong>Status:</strong></p>
                            <span class="badge badge-{{ $featureSection->is_active ? 'success' : 'secondary' }}">
                                {{ $featureSection->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Created At:</strong></p>
                            <p>{{ $featureSection->created_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12">
                            <p><strong>Updated At:</strong></p>
                            <p>{{ $featureSection->updated_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.feature-sections.edit', $featureSection->id) }}" class="btn btn-warning">
                            <i class="ni ni-pencil-brush"></i> Edit
                        </a>
                        <form action="{{ route('admin.feature-sections.destroy', $featureSection->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="ni ni-basket"></i> Delete
                            </button>
                        </form>
                        <a href="{{ route('admin.feature-sections.index') }}" class="btn btn-secondary">
                            Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

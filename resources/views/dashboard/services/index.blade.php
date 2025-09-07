@extends('dashboard.layouts.app')

@section('title', 'Manage Services')

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Services</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Services</h3>
        <div class="card-tools">
            <a href="{{ route('dashboard.services.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Service
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="width: 50px">#</th>
                        <th>Icon</th>
                        <th>English Title</th>
                        <th>Arabic Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $service)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-center">
                            @if($service->icon)
                                <i class="fas fa-{{ $service->icon }} fa-2x"></i>
                            @else
                                <span class="text-muted">No icon</span>
                            @endif
                        </td>
                        <td>
                            <strong>{{ $service->title_en }}</strong>
                            <p class="text-muted mb-0 small">{{ Str::limit($service->description_en, 50) }}</p>
                        </td>
                        <td>
                            <strong class="text-right" dir="rtl">{{ $service->title_ar }}</strong>
                            <p class="text-muted mb-0 small text-right" dir="rtl">{{ Str::limit($service->description_ar, 50) }}</p>
                        </td>
                        <td style="width: 150px">
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('dashboard.services.edit', $service) }}" class="btn btn-info" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $service->id }}" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            
                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this service?
                                            <div class="mt-3">
                                                <strong>English:</strong> {{ $service->title_en }}
                                                <br>
                                                <strong>Arabic:</strong> <span dir="rtl">{{ $service->title_ar }}</span>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <form action="{{ route('dashboard.services.delete', $service) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            <div class="text-muted">No services found.</div>
                            <a href="{{ route('dashboard.services.create') }}" class="btn btn-primary mt-2">
                                <i class="fas fa-plus"></i> Add New Service
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($services->hasPages())
        <div class="mt-4">
            {{ $services->links() }}
        </div>
        @endif
    </div>
</div>
@endsection

@push('styles')
<style>
    .table th, .table td {
        vertical-align: middle !important;
    }
    .fa-2x {
        font-size: 1.5em;
    }
</style>
@endpush

@extends('dashboard.layouts.app')

@section('title', 'Manage Portfolio')

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Portfolio</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Portfolio Items</h3>
        <div class="card-tools">
            <a href="{{ route('dashboard.portfolio.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Item
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="width: 50px">#</th>
                        <th>Image</th>
                        <th>English Title</th>
                        <th>Arabic Title</th>
                        <th>Category</th>
                        <th style="width: 150px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($portfolios as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-center">
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title_en }}" class="img-fluid" style="max-height: 60px;">
                            @else
                                <span class="text-muted">No image</span>
                            @endif
                        </td>
                        <td>
                            <strong>{{ $item->title_en }}</strong>
                            <p class="text-muted mb-0 small">{{ Str::limit($item->description_en, 50) }}</p>
                        </td>
                        <td>
                            <strong class="text-right" dir="rtl">{{ $item->title_ar }}</strong>
                            <p class="text-muted mb-0 small text-right" dir="rtl">{{ Str::limit($item->description_ar, 50) }}</p>
                        </td>
                        <td>
                            <span class="badge badge-info">{{ $item->category }}</span>
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('dashboard.portfolio.edit', $item) }}" class="btn btn-info" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $item->id }}" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            
                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this portfolio item?
                                            <div class="mt-3">
                                                <strong>English:</strong> {{ $item->title_en }}
                                                <br>
                                                <strong>Arabic:</strong> <span dir="rtl">{{ $item->title_ar }}</span>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <form action="{{ route('dashboard.portfolio.delete', $item) }}" method="POST" class="d-inline">
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
                        <td colspan="6" class="text-center py-4">
                            <div class="text-muted">No portfolio items found.</div>
                            <a href="{{ route('dashboard.portfolio.create') }}" class="btn btn-primary mt-2">
                                <i class="fas fa-plus"></i> Add New Item
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($portfolios->hasPages())
        <div class="mt-4">
            {{ $portfolios->links() }}
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
    .img-thumbnail {
        max-height: 60px;
        width: auto;
    }
</style>
@endpush

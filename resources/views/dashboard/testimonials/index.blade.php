@extends('dashboard.layouts.app')

@section('title', 'Manage Testimonials')

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Testimonials</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Testimonials</h3>
        <div class="card-tools">
            <a href="{{ route('dashboard.testimonials.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Rating</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $testimonial)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                @if($testimonial->image)
                                    <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name_en }}" class="rounded-circle mr-3" style="width: 40px; height: 40px; object-fit: cover;">
                                @endif
                                <div>
                                    <div>{{ $testimonial->name_en }}</div>
                                    <div class="small text-muted" dir="rtl">{{ $testimonial->name_ar }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div>{{ $testimonial->position_en }}</div>
                            <div class="small text-muted" dir="rtl">{{ $testimonial->position_ar }}</div>
                        </td>
                        <td>
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-warning' : 'text-muted' }}"></i>
                            @endfor
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('dashboard.testimonials.edit', $testimonial) }}" class="btn btn-info" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $testimonial->id }}" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            
                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $testimonial->id }}" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Confirm Delete</h5>
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span>&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this testimonial?</p>
                                            <p class="mb-0"><strong>EN:</strong> {{ $testimonial->name_en }}</p>
                                            <p class="mb-0" dir="rtl"><strong>AR:</strong> {{ $testimonial->name_ar }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <form action="{{ route('dashboard.testimonials.delete', $testimonial) }}" method="POST" class="d-inline">
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
                            <div class="text-muted">No testimonials found.</div>
                            <a href="{{ route('dashboard.testimonials.create') }}" class="btn btn-primary mt-2">
                                <i class="fas fa-plus"></i> Add New Testimonial
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

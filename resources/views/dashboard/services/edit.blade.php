@extends('dashboard.layouts.app')

@section('title', 'Edit Service: ' . $service->title_en)

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dashboard.services.index') }}">Services</a></li>
    <li class="breadcrumb-item active">Edit: {{ $service->title_en }}</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Service</h3>
                <div class="card-tools">
                    <a href="{{ route('dashboard.services.index') }}" class="btn btn-light btn-sm">
                        <i class="fas fa-arrow-left"></i> Back to Services
                    </a>
                </div>
            </div>
            <form action="{{ route('dashboard.services.update', $service) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title_en">English Title *</label>
                                <input type="text" name="title_en" id="title_en" class="form-control @error('title_en') is-invalid @enderror" value="{{ old('title_en', $service->title_en) }}" required>
                                @error('title_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title_ar">Arabic Title *</label>
                                <input type="text" name="title_ar" id="title_ar" class="form-control @error('title_ar') is-invalid @enderror text-right" dir="rtl" value="{{ old('title_ar', $service->title_ar) }}" required>
                                @error('title_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description_en">English Description *</label>
                                <textarea name="description_en" id="description_en" class="form-control @error('description_en') is-invalid @enderror" rows="5" required>{{ old('description_en', $service->description_en) }}</textarea>
                                @error('description_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description_ar">Arabic Description *</label>
                                <textarea name="description_ar" id="description_ar" class="form-control @error('description_ar') is-invalid @enderror text-right" dir="rtl" rows="5" required>{{ old('description_ar', $service->description_ar) }}</textarea>
                                @error('description_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="icon">Icon *</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i id="icon-preview" class="fas fa-{{ $service->icon }}"></i></span>
                                    </div>
                                    <input type="text" name="icon" id="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon', $service->icon) }}" placeholder="e.g., shield-alt, lock, user-shield" required>
                                    <div class="input-group-append">
                                        <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank" class="btn btn-outline-secondary" title="Browse Icons">
                                            <i class="fas fa-search"></i>
                                        </a>
                                    </div>
                                    @error('icon')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <small class="form-text text-muted">Enter a Font Awesome icon name (without the 'fa-' prefix).</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Service
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Update icon preview
    document.addEventListener('DOMContentLoaded', function() {
        const iconInput = document.getElementById('icon');
        const iconPreview = document.getElementById('icon-preview');
        
        // Set initial icon
        iconPreview.className = 'fas fa-' + iconInput.value;
        
        // Update on input change
        iconInput.addEventListener('input', function() {
            iconPreview.className = 'fas fa-' + this.value;
        });
    });
</script>
@endpush

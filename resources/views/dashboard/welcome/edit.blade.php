@extends('dashboard.layouts.app')

@section('title', 'Edit Welcome Page Content')

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Welcome Page</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Welcome Page Content</h3>
                <div class="card-tools">
                    <a href="{{ route('home') }}" class="btn btn-light btn-sm" target="_blank">
                        <i class="fas fa-external-link-alt"></i> View Live
                    </a>
                </div>
            </div>
            <form action="{{ route('dashboard.welcome.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="mb-4">Hero Section</h4>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title_en">English Title *</label>
                                <input type="text" name="title_en" id="title_en" class="form-control @error('title_en') is-invalid @enderror" value="{{ old('title_en', $about->title_en ?? '') }}" required>
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
                                <input type="text" name="title_ar" id="title_ar" class="form-control @error('title_ar') is-invalid @enderror text-right" dir="rtl" value="{{ old('title_ar', $about->title_ar ?? '') }}" required>
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
                                <textarea name="description_en" id="description_en" class="form-control @error('description_en') is-invalid @enderror" rows="5" required>{{ old('description_en', $about->description_en ?? '') }}</textarea>
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
                                <textarea name="description_ar" id="description_ar" class="form-control @error('description_ar') is-invalid @enderror text-right" dir="rtl" rows="5" required>{{ old('description_ar', $about->description_ar ?? '') }}</textarea>
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
                                <label for="cta_text_en">English CTA Button Text *</label>
                                <input type="text" name="cta_text_en" id="cta_text_en" class="form-control @error('cta_text_en') is-invalid @enderror" value="{{ old('cta_text_en', $about->cta_text_en ?? 'Get Started') }}" required>
                                @error('cta_text_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cta_text_ar">Arabic CTA Button Text *</label>
                                <input type="text" name="cta_text_ar" id="cta_text_ar" class="form-control @error('cta_text_ar') is-invalid @enderror text-right" dir="rtl" value="{{ old('cta_text_ar', $about->cta_text_ar ?? 'ابدأ الآن') }}" required>
                                @error('cta_text_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cta_link">CTA Button Link *</label>
                        <input type="url" name="cta_link" id="cta_link" class="form-control @error('cta_link') is-invalid @enderror" value="{{ old('cta_link', $about->cta_link ?? route('contact')) }}" required>
                        @error('cta_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <hr class="my-4">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="main_image">About Section Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <small class="form-text text-muted">Recommended size: 800x600px. Leave empty to keep current image.</small>
                                @if(isset($about->image) && $about->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $about->image) }}" alt="Current About Image" class="img-fluid mt-2" style="max-height: 200px;">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Update file input label
    document.addEventListener('DOMContentLoaded', function() {
        // For hero image
        document.getElementById('hero_image').addEventListener('change', function(e) {
            var fileName = e.target.files[0] ? e.target.files[0].name : 'Choose file';
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
        
        // For main image
        document.getElementById('main_image').addEventListener('change', function(e) {
            var fileName = e.target.files[0] ? e.target.files[0].name : 'Choose file';
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
    });
</script>
@endpush

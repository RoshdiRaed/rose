@extends('dashboard.layouts.app')

@section('title', 'Add New Portfolio Item')

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dashboard.portfolio.index') }}">Portfolio</a></li>
    <li class="breadcrumb-item active">Add New</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add New Portfolio Item</h3>
                <div class="card-tools">
                    <a href="{{ route('dashboard.portfolio.index') }}" class="btn btn-light btn-sm">
                        <i class="fas fa-arrow-left"></i> Back to Portfolio
                    </a>
                </div>
            </div>
            <form action="{{ route('dashboard.portfolio.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title_en">English Title *</label>
                                <input type="text" name="title_en" id="title_en" class="form-control @error('title_en') is-invalid @enderror" value="{{ old('title_en') }}" required>
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
                                <input type="text" name="title_ar" id="title_ar" class="form-control @error('title_ar') is-invalid @enderror text-right" dir="rtl" value="{{ old('title_ar') }}" required>
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
                                <textarea name="description_en" id="description_en" class="form-control @error('description_en') is-invalid @enderror" rows="5" required>{{ old('description_en') }}</textarea>
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
                                <textarea name="description_ar" id="description_ar" class="form-control @error('description_ar') is-invalid @enderror text-right" dir="rtl" rows="5" required>{{ old('description_ar') }}</textarea>
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
                                <label for="category">Category *</label>
                                <select name="category" id="category" class="form-control @error('category') is-invalid @enderror" required>
                                    <option value="">Select a category</option>
                                    <option value="Security Solutions" {{ old('category') == 'Security Solutions' ? 'selected' : '' }}>Security Solutions</option>
                                    <option value="Surveillance" {{ old('category') == 'Surveillance' ? 'selected' : '' }}>Surveillance</option>
                                    <option value="Access Control" {{ old('category') == 'Access Control' ? 'selected' : '' }}>Access Control</option>
                                    <option value="Alarm Systems" {{ old('category') == 'Alarm Systems' ? 'selected' : '' }}>Alarm Systems</option>
                                    <option value="Other" {{ old('category') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Featured Image *</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" required>
                                    <label class="custom-file-label" for="image">Choose file</label>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <small class="form-text text-muted">Recommended size: 800x600px. Max file size: 2MB.</small>
                                <div id="imagePreview" class="mt-2 d-none">
                                    <img id="previewImg" src="#" alt="Preview" class="img-fluid" style="max-height: 200px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Portfolio Item
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Update file input label and show preview
    document.addEventListener('DOMContentLoaded', function() {
        // For image preview
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    imagePreview.classList.remove('d-none');
                }
                
                reader.readAsDataURL(file);
                
                // Update file label
                const fileName = file.name;
                const nextSibling = e.target.nextElementSibling;
                nextSibling.innerText = fileName;
            }
        });
    });
</script>
@endpush

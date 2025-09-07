@extends('dashboard.layouts.app')

@section('title', 'Edit Testimonial: ' . $testimonial->name_en)

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dashboard.testimonials.index') }}">Testimonials</a></li>
    <li class="breadcrumb-item active">Edit: {{ $testimonial->name_en }}</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Testimonial</h3>
                <div class="card-tools">
                    <a href="{{ route('dashboard.testimonials.index') }}" class="btn btn-light btn-sm">
                        <i class="fas fa-arrow-left"></i> Back to Testimonials
                    </a>
                </div>
            </div>
            <form action="{{ route('dashboard.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name_en">English Name *</label>
                                <input type="text" name="name_en" id="name_en" class="form-control @error('name_en') is-invalid @enderror" value="{{ old('name_en', $testimonial->name_en) }}" required>
                                @error('name_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name_ar">Arabic Name *</label>
                                <input type="text" name="name_ar" id="name_ar" class="form-control @error('name_ar') is-invalid @enderror text-right" dir="rtl" value="{{ old('name_ar', $testimonial->name_ar) }}" required>
                                @error('name_ar')
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
                                <label for="position_en">English Position *</label>
                                <input type="text" name="position_en" id="position_en" class="form-control @error('position_en') is-invalid @enderror" value="{{ old('position_en', $testimonial->position_en) }}" required>
                                @error('position_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="position_ar">Arabic Position *</label>
                                <input type="text" name="position_ar" id="position_ar" class="form-control @error('position_ar') is-invalid @enderror text-right" dir="rtl" value="{{ old('position_ar', $testimonial->position_ar) }}" required>
                                @error('position_ar')
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
                                <label for="content_en">English Testimonial *</label>
                                <textarea name="content_en" id="content_en" class="form-control @error('content_en') is-invalid @enderror" rows="4" required>{{ old('content_en', $testimonial->content_en) }}</textarea>
                                @error('content_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="content_ar">Arabic Testimonial *</label>
                                <textarea name="content_ar" id="content_ar" class="form-control @error('content_ar') is-invalid @enderror text-right" dir="rtl" rows="4" required>{{ old('content_ar', $testimonial->content_ar) }}</textarea>
                                @error('content_ar')
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
                                <label for="rating">Rating *</label>
                                <select name="rating" id="rating" class="form-control @error('rating') is-invalid @enderror" required>
                                    @for($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}" {{ old('rating', $testimonial->rating) == $i ? 'selected' : '' }}>
                                            {{ $i }} {{ $i === 1 ? 'Star' : 'Stars' }}
                                        </option>
                                    @endfor
                                </select>
                                @error('rating')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Profile Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                                    <label class="custom-file-label" for="image">Choose new image (optional)</label>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <small class="form-text text-muted">Leave empty to keep current image. Recommended size: 200x200px. Max file size: 2MB.</small>
                                
                                @if($testimonial->image)
                                    <div class="mt-2">
                                        <p class="mb-1">Current Image:</p>
                                        <img src="{{ asset('storage/' . $testimonial->image) }}" alt="Current Image" class="img-fluid rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                                    </div>
                                @endif
                                
                                <div id="imagePreview" class="mt-2 d-none">
                                    <p class="mb-1">New Image Preview:</p>
                                    <img id="previewImg" src="#" alt="Preview" class="img-fluid rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Testimonial
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

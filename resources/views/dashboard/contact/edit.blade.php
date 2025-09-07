@extends('dashboard.layouts.app')

@section('title', 'Contact Information')

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Contact Information</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Contact Information</h3>
                <div class="card-tools">
                    <a href="{{ route('contact') }}" class="btn btn-light btn-sm" target="_blank">
                        <i class="fas fa-external-link-alt"></i> View Live
                    </a>
                </div>
            </div>
            <form action="{{ route('dashboard.contact.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-4">Contact Details</h4>
                            
                            <div class="form-group">
                                <label for="email">Email Address *</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $contactInfo->email ?? '') }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="phone">Phone Number *</label>
                                <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $contactInfo->phone ?? '') }}" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="address_en">English Address *</label>
                                <textarea name="address_en" id="address_en" class="form-control @error('address_en') is-invalid @enderror" rows="3" required>{{ old('address_en', $contactInfo->address_en ?? '') }}</textarea>
                                @error('address_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="address_ar">Arabic Address *</label>
                                <textarea name="address_ar" id="address_ar" class="form-control @error('address_ar') is-invalid @enderror text-right" dir="rtl" rows="3" required>{{ old('address_ar', $contactInfo->address_ar ?? '') }}</textarea>
                                @error('address_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="map_embed">Map Embed Code</label>
                                <textarea name="map_embed" id="map_embed" class="form-control @error('map_embed') is-invalid @enderror" rows="4" placeholder="Paste Google Maps iframe code here">{{ old('map_embed', $contactInfo->map_embed ?? '') }}</textarea>
                                @error('map_embed')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <small class="form-text text-muted">Paste the iframe code from Google Maps Embed API</small>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <h4 class="mb-4">Social Media Links</h4>
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fab fa-facebook-f"></i></span>
                                    </div>
                                    <input type="url" name="facebook" class="form-control @error('facebook') is-invalid @enderror" placeholder="Facebook URL" value="{{ old('facebook', $contactInfo->facebook ?? '') }}">
                                    @error('facebook')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                    </div>
                                    <input type="url" name="twitter" class="form-control @error('twitter') is-invalid @enderror" placeholder="Twitter URL" value="{{ old('twitter', $contactInfo->twitter ?? '') }}">
                                    @error('twitter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                    </div>
                                    <input type="url" name="instagram" class="form-control @error('instagram') is-invalid @enderror" placeholder="Instagram URL" value="{{ old('instagram', $contactInfo->instagram ?? '') }}">
                                    @error('instagram')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fab fa-linkedin-in"></i></span>
                                    </div>
                                    <input type="url" name="linkedin" class="form-control @error('linkedin') is-invalid @enderror" placeholder="LinkedIn URL" value="{{ old('linkedin', $contactInfo->linkedin ?? '') }}">
                                    @error('linkedin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="alert alert-info mt-4">
                                <h5><i class="icon fas fa-info"></i> Preview</h5>
                                <p class="mb-2">This is how your contact information will appear on the website:</p>
                                
                                <div class="bg-white p-3 rounded">
                                    @if(isset($contactInfo->address_en) || isset($contactInfo->address_ar))
                                        <p class="mb-2"><strong>Address (EN):</strong> {{ $contactInfo->address_en ?? 'Not set' }}</p>
                                        <p class="mb-2 text-right" dir="rtl"><strong>العنوان (AR):</strong> {{ $contactInfo->address_ar ?? 'غير محدد' }}</p>
                                    @else
                                        <p class="text-muted">No address set yet</p>
                                    @endif
                                    
                                    @if(isset($contactInfo->phone))
                                        <p class="mb-1"><strong>Phone:</strong> {{ $contactInfo->phone }}</p>
                                    @endif
                                    
                                    @if(isset($contactInfo->email))
                                        <p class="mb-0"><strong>Email:</strong> {{ $contactInfo->email }}</p>
                                    @endif
                                </div>
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

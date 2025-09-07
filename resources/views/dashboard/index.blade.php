@extends('dashboard.layouts.app')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <li class="breadcrumb-item active">ROSE</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ \App\Models\Service::count() }}</h3>
                <p>Services</p>
            </div>
            <div class="icon">
                <i class="fas fa-cog"></i>
            </div>
            <a href="{{ route('dashboard.services.index') }}" class="small-box-footer">
                Manage Services <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ \App\Models\Portfolio::count() }}</h3>
                <p>Portfolio Items</p>
            </div>
            <div class="icon">
                <i class="fas fa-briefcase"></i>
            </div>
            <a href="{{ route('dashboard.portfolio.index') }}" class="small-box-footer">
                Manage Portfolio <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ \App\Models\ContactSubmission::count() }}</h3>
                <p>Contact Submissions</p>
            </div>
            <div class="icon">
                <i class="fas fa-envelope"></i>
            </div>
            <a href="{{ route('dashboard.contact.edit') }}" class="small-box-footer">
                View Contact Info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>Welcome Page</h3>
                <p>Edit Content</p>
            </div>
            <div class="icon">
                <i class="fas fa-home"></i>
            </div>
            <a href="{{ route('dashboard.welcome.edit') }}" class="small-box-footer">
                Edit Content <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Recent Activity</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <p>Welcome to your dashboard! Here you can manage your website content including services, portfolio items, contact information, and more.</p>
                <p>Use the navigation menu on the left to access different sections of the dashboard.</p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection
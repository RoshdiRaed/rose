<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - {{ config('app.name', 'Laravel') }}</title>
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <!-- OverlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('vendor/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    @stack('styles')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('home') }}" class="nav-link" target="_blank">View Site</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user"></i>
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="fas fa-user-cog mr-2"></i> Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('dashboard') }}" class="brand-link">
            <span class="brand-text font-weight-light">ROSE</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dashboard.welcome.edit') }}" class="nav-link {{ request()->routeIs('dashboard.welcome.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Welcome Page</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dashboard.services.index') }}" class="nav-link {{ request()->routeIs('dashboard.services.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>Services</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dashboard.portfolio.index') }}" class="nav-link {{ request()->routeIs('dashboard.portfolio.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-briefcase"></i>
                            <p>Portfolio</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dashboard.contact.edit') }}" class="nav-link {{ request()->routeIs('dashboard.contact.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-address-book"></i>
                            <p>Contact Info</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dashboard.testimonials.index') }}" class="nav-link {{ request()->routeIs('dashboard.testimonials.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-quote-right"></i>
                            <p>Testimonials</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contact-submissions') }}" class="nav-link {{ request()->routeIs('contact-submissions') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-envelope"></i>
                            <p>Contact Submissions</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('title', 'Dashboard')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            @yield('breadcrumbs')
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('success') }}
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('content')
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; {{ date('Y') }} <a href="{{ config('app.url') }}">{{ config('app.name') }}</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
@stack('scripts')
</body>
</html>
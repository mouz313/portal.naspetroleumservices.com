<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!--<link rel="icon" type="image/x-icon" href="#">-->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('admindashboard/images/logo.png')  }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>NAS Petroleum Services</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admindashboard/vendors/iconfonts/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admindashboard/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('admindashboard/vendors/css/vendor.bundle.addons.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css" integrity="sha512-1k7mWiTNoyx2XtmI96o+hdjP8nn0f3Z2N4oF/9ZZRgijyV4omsKOXEnqL1gKQNPy2MTSP9rIEWGcH/CInulptA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    
    
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admindashboard/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="http://www.urbanui.com/" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo"  style="display: initial" href="{{route('admin.home')}}"><img
                        src="{{ asset('admindashboard/images/logo.png') }}" alt="logo" /></a>
                {{-- <a class="navbar-brand brand-logo-mini" href="index-2.html"><img src="images/logo-mini.svg" alt="logo"/></a> --}}
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="fas fa-bars"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    @if(Auth::user()->role==2)
                    <li class="nav-item d-lg-flex">
                        <a class="nav-link" href="{{route('user.show.register')}}">
                            <i class="fa fa-user-plus" aria-hidden="true" title="Add New Customer"></i>
                        </a>
                    </li>
                    @endif
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="fas fa-bars"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="fas fa-fill-drip"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close fa fa-times"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles primary"></div>
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>
            

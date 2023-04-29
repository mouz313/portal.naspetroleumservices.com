<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>NAS Petroleum Services</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admindashboard/vendors/iconfonts/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admindashboard/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('admindashboard/vendors/css/vendor.bundle.addons.css') }}">
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
                <a class="navbar-brand brand-logo" href="{{route('admin.home')}}"><img
                        src="{{ asset('admindashboard/images/logo.png') }}" alt="logo" /></a>
                {{-- <a class="navbar-brand brand-logo-mini" href="index-2.html"><img src="images/logo-mini.svg" alt="logo"/></a> --}}
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="fas fa-bars"></span>
                </button>
               
                <ul class="navbar-nav navbar-nav-right">
                    {{-- <li class="nav-item d-none d-lg-flex">
                        <a class="nav-link" href="#">
                            <span class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add New Customer</span>
                        </a>
                    </li> --}}
                   
                   
                    <!--<li class="nav-item nav-profile dropdown">-->
                    <!--    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"-->
                    <!--        id="profileDropdown">-->
                    <!--        <img src="{{ asset('admindashboard/images/faces/face5.jpg') }}" alt="profile" />-->
                    <!--    </a>-->
                    <!--    <div class="dropdown-menu dropdown-menu-right navbar-dropdown"-->
                    <!--        aria-labelledby="profileDropdown">-->
                    <!--        <a class="dropdown-item">-->
                    <!--            <i class="fas fa-cog text-primary"></i>-->
                    <!--            Settings-->
                    <!--        </a>-->
                    <!--        <div class="dropdown-divider"></div>-->
                    <!--        {{-- <li> <a href="{{route('editprofile')}}"></a> Profile </li> --}}-->
                    <!--        <a class="dropdown-item">-->
                    <!--            <i class="fas fa-power-off text-primary"></i>-->
                    <!--            <a class="dropdown-item" href="{{ route('userprofile') }}">-->
                    <!--                {{ __('Profile') }}-->
                    <!--            </a>-->
                    <!--        <div class="dropdown-divider"></div>-->
                    <!--        <a class="dropdown-item">-->
                    <!--            {{-- <i class="fas fa-power-off text-primary"></i> --}}-->
                    <!--            <a class="dropdown-item" href="{{ route('logout') }}"-->
                    <!--                onclick="event.preventDefault();-->
                    <!--             document.getElementById('logout-form').submit();">-->
                    <!--                {{ __('Logout') }}-->
                    <!--            </a>-->
                    <!--            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">-->
                    <!--              @csrf-->
                    <!--          </form>-->
                    <!--        </a>-->
                    <!--    </div>-->
                    </li>
                    
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
            

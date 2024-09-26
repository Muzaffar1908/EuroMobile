<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <title>{{ $title ?? 'Page Title' }}</title>

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('/assets/images/favicon.ico') }}">

        <!-- jquery.vectormap css -->
        <link href="{{ asset('/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        @yield('style')

        <!-- Bootstrap Css -->
        <link href="{{ asset('/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

        <!-- App favicon -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/libs/toastr/build/toastr.min.css') }}">

    </head>
    <body data-topbar="dark">

        <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                       <!-- LOGO -->
                       <div class="navbar-brand-box">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('/assets/images/logo-sm.png') }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('/assets/images/logo-dark.png') }}" alt="" height="20">
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('/assets/images/logo-sm-light.png') }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('/assets/images/logo-light.png') }}" alt="" height="20">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                        <!-- App Search-->
                        <form class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="ri-search-line"></span>
                            </div>
                        </form>

                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-search-line"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
                    
                                <form class="p-3">
                                    <div class="mb-3 m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ...">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="dropdown d-none d-sm-inline-block">
                            <button type="button" class="btn header-item waves-effect"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('/assets/images/flags/us.jpg') }}" alt="Header Language" height="16">
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                    
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="{{ asset('/assets/images/flags/spain.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="{{ asset('/assets/images/flags/germany.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="{{ asset('/assets/images/flags/italy.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="{{ asset('/assets/images/flags/russia.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>
                                </a>
                            </div>
                        </div>

                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                                <i class="ri-fullscreen-line"></i>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block user-dropdown">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{ asset('/assets/images/users/avatar-2.jpg') }}"
                                    alt="Header Avatar">
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0"> Muzaffar Ahmadaliyev </h6>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar style="max-height: 230px;">
                                    <!-- item-->
                                    <a href="" class="text-reset notification-item">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-xs me-3 mt-1">
                                                <span class="avatar-title bg-soft-primary rounded-circle font-size-16">
                                                    <i class="ri-user-line text-primary font-size-16"></i> 
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 text-truncate">
                                                <h6 class="mb-1">Profile</h6>
                                                <p class="mb-0 font-size-12">View personal profile details.</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!-- item-->
                                <div class="pt-2 border-top">
                                    <div class="d-grid">
                                        <a class="dropdown-item btn btn-sm btn-link font-size-14 text-center" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                <i class="ri-shut-down-line align-middle me-1"></i>{{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="#" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ asset('/assets/images/logo-sm-light.png') }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('/assets/images/logo-dark.png') }}" alt="" height="22">
                        </span>
                    </a>

                    <a href="#" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ asset('/assets/images/logo-sm-light.png') }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('/assets/images/logo-light.png') }}" alt="" height="22">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

                <div data-simplebar class="sidebar-menu-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="#" class="waves-effect">
                                    <i class="ri-home-gear-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li class="menu-title">Shops</li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span>Shops</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('m-index') }}">Main Shops</a></li>
                                </ul>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('sh-index') }}">Shops</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-store-2-line"></i>
                                    <span>Categories</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('cat-index') }}">Category</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-store-2-line"></i>
                                    <span>Products</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('p-index') }}">Product</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        @yield('content')
                        <!-- end page title -->
                       
                    </div><!-- end row -->
                    
                </div>
                <!-- End Page-content -->
               
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Euro Mobile.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    <a href="#" target="_blank">Euro Mobile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
        

        <!-- JAVASCRIPT -->
        <script src="{{ asset('/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('/assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('/assets/libs/node-waves/waves.min.js') }}"></script>

        <!-- Datatable js -->
        @yield('scripts')

        <!-- jquery.vectormap map -->
        <script src="{{ asset('/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ asset('/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('/assets/js/app.js') }}"></script>

         <!-- toastr plugin -->
          <script src="{{ asset('/assets/libs/toastr/build/toastr.min.js') }}"></script>

         <!-- toastr init -->
         <script src="{{ asset('/assets/js/pages/toastr.init.js') }}"></script>

        @if(Session::has('success'))
            <script>
                Command: toastr["success"]("{{ Session::get('success') }}")

                toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": 300,
                "hideDuration": 1000,
                "timeOut": 5000,
                "extendedTimeOut": 1000,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
                }
            </script>
        @endif    

    </body>
</html>

@extends('layouts.app')

@section('style')
    <link rel="shortcut icon" href="{{ asset('/assets/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="p-4">
                    <div class="card overflow-hidden mt-2">
                        <div class="auth-logo text-center bg-primary position-relative">
                            <div class="img-overlay"></div>
                            <div class="position-relative pt-4 py-5 mb-1">
                                <h5 class="text-white">Welcome EuroMobile !</h5>
                            <p class="text-white-50 mb-0">Sign in to continue to Admin Panel.</p>
                            </div>
                        </div>
                        <div class="card-body position-relative">
                            <div class="p-4 mt-n5 card rounded">
                                <form class="form-horizontal" action="{{ route('login') }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email">
                                    </div>

                                    <div class="mb-3">
                                        <label for="userpassword">Password</label>
                                        <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter password">        
                                    </div>

                                    <div class="form-check mt-3">
                                        <input type="checkbox" class="form-check-input" id="auth-remember-check">
                                        <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                    </div>

                                    <div class="mt-3">
                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log IN</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- JAVASCRIPT -->
    <script src="{{ asset('/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/node-waves/waves.min.js') }}"></script>

    <script src="{{ asset('/assets/js/app.js') }}"></script>
@endsection

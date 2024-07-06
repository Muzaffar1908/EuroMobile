@extends('components.layouts.app')
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Shop Update</h4><br>
                        <form action="{{ route('sh-update', $shop->id) }}" method="POST" class="needs-validation" novalidate>
                            @csrf
                            @method('PUT')
                        
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="validationCustom03" class="form-label">Main Shop Name</label>
                                        <select class="form-select @error('main_shop_id') is-invalid @enderror" name="main_shop_id" id="validationCustom03" required>
                                            @if($mainshops)
                                                <option selected disabled value="">Choose...</option>
                                                @foreach($mainshops as $mainshop)
                                                    <option value="{{ $mainshop->id }}" {{ $shop->main_shop_id == $mainshop->id ? 'selected' : '' }}>
                                                        {{ $mainshop->name }}
                                                    </option>
                                                @endforeach
                                            @else
                                                <option value="">No shops available</option>
                                            @endif
                                        </select>
                                        @error('main_shop_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="validationCustom02" class="form-label">Shop Name</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="validationCustom02" placeholder="Shop name" value="{{ old('name', $shop->name) }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>  
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

 <script src="{{ asset('/assets/libs/parsleyjs/parsley.min.js') }}"></script>

 <script src="{{ asset('/assets/js/pages/form-validation.init.js') }}"></script>

 <script src="{{ asset('/assets/js/app.js') }}"></script>

@endsection

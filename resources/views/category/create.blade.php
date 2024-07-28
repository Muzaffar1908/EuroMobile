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
                        <h4 class="card-title">Category Create</h4><br>
                        <form action="{{ route('cat-store') }}" method="POST" class="needs-validation" novalidate>
                            @csrf

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Single Select</label>
                                        <select class="form-control select2" name="parent_id">
                                            <option>Select...</option>
                                            @foreach ($categories as $item)
                                              <option value="{{ $item->id }}">{{ $item->name_uz }}</option>
                                            @endforeach
                                        </select>
                                    </div>    
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Name uz</label>
                                        <input type="text" name="name_uz" class="form-control" id="validationCustom01" placeholder="Name uz" required>
                                        @error('name_uz') <small class="text-danger">{{ $message }}</small> @enderror
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="validationCustom02" class="form-label">Name ru</label>
                                        <input type="text" name="name_ru" class="form-control" id="validationCustom02" placeholder="Name ru" required>
                                        @error('name_ru') <small class="text-danger">{{ $message }}</small> @enderror
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="validationCustom03" class="form-label">Name en</label>
                                        <input type="text" name="name_en" class="form-control" id="validationCustom03" placeholder="Name en" required>
                                        @error('name_en') <small class="text-danger">{{ $message }}</small> @enderror
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="validationCustom04" class="form-label">Index</label>
                                        <input type="text" name="index" class="form-control" id="validationCustom04" placeholder="Index" required>
                                        @error('index') <small class="text-danger">{{ $message }}</small> @enderror
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="validationCustom05" class="form-label">Slug</label>
                                        <input type="text" name="slug" class="form-control" id="validationCustom05" placeholder="Slug" required>
                                        @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
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

  <script>
    document.getElementById('validationCustom01').addEventListener('input', function() {
        let nameUz = this.value;
        let slug = nameUz.trim().toLowerCase().replace(/[^\w\s-]/g, '').replace(/[\s_-]+/g, '-').replace(/^-+|-+$/g, '');
        document.getElementById('validationCustom05').value = slug;
    });
 </script>

@endsection


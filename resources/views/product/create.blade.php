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
                        <h4 class="card-title">Product Create</h4><br>
                        <form action="{{ route('p-store') }}" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
                            @csrf
                        
                            <!-- Main Shop Selection -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Select Main Shop</label>
                                        <select class="form-control select2" name="main_shop_id" required>
                                            <option value="">Select Shop...</option>
                                            <option value="{{ $mainshop->id }}">{{ $mainshop->name }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        
                            <!-- Category Selection -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Select Categories</label>
                                        <select class="form-control select2" name="category_id" required>
                                            <option value="">Select Category...</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name_uz }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        
                            <!-- Dynamic Input Fields for Products -->
                            <div class="row" id="inputContainer">
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label for="name_0" class="form-label">Name</label>
                                        <input type="text" name="inputs[0][name]" class="form-control" id="name_0" placeholder="Name ..." required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label for="image_0" class="form-label">Image</label>
                                        <input type="file" name="inputs[0][image]" class="form-control" id="image_0" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label for="valyuta_0" class="form-label">Valyuta</label>
                                        <input type="text" name="inputs[0][valyuta]" class="form-control" id="valyuta_0" placeholder="Valyuta ..." required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label for="price_0" class="form-label">Price</label>
                                        <input type="text" name="inputs[0][price]" class="form-control" id="price_0" placeholder="Price ..." required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label for="count_0" class="form-label">Count</label>
                                        <input type="text" name="inputs[0][count]" class="form-control" id="count_0" placeholder="Count ..." required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <button type="button" name="add" id="add" class="btn btn-primary" style="margin-top: 30px">Add More</button>
                                    </div>
                                </div>
                            </div>
                        
                            <!-- Submit Button -->
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
    let inputIndex = 1;

    document.getElementById('add').addEventListener('click', function () {
        let newInputRow = `
            <div class="row" id="inputRow_${inputIndex}">
                <div class="col-md-2">
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Name</label>
                        <input type="text" name="inputs[${inputIndex}][name]" class="form-control" id="validationCustom01" placeholder="Name ..." required>
                        <small class="text-danger"></small>
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <label for="validationCustom02" class="form-label">Image</label>
                        <input type="file" name="inputs[${inputIndex}][image]" class="form-control" id="validationCustom02" placeholder="Image ..." required>
                        <small class="text-danger"></small>
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Valyuta</label>
                        <input type="text" name="inputs[${inputIndex}][valyuta]" class="form-control" id="validationCustom01" placeholder="Valyuta ..." required>
                        <small class="text-danger"></small>
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <label for="validationCustom02" class="form-label">Price</label>
                        <input type="text" name="inputs[${inputIndex}][price]" class="form-control" id="validationCustom02" placeholder="Price ..." required>
                        <small class="text-danger"></small>
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Count</label>
                        <input type="text" name="inputs[${inputIndex}][count]" class="form-control" id="validationCustom01" placeholder="Count ..." required>
                        <small class="text-danger"></small>
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <button type="button" class="btn btn-danger" onclick="removeInputRow(${inputIndex})" style="margin-top: 30px">Remove</button>
                    </div>
                </div>
            </div>`;
        
        document.getElementById('inputContainer').insertAdjacentHTML('beforeend', newInputRow);
        inputIndex++;
    });

    function removeInputRow(index) {
        document.getElementById(`inputRow_${index}`).remove();
    }
 </script>

@endsection


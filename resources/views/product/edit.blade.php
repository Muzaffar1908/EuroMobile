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
                        <h4 class="card-title">Product Update</h4><br>
                        <form action="" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
                            @csrf
                            @method('PUT') <!-- For updating, use PUT or PATCH method -->
                        
                            <!-- Main Shop Selection -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Select Main Shop</label>
                                        <select class="form-control select2" name="main_shop_id" required>
                                            <option value="">Select Shop...</option>
                                            <option value="{{ $mainshop->id }}" {{ $product->main_shop_id == $mainshop->id ? 'selected' : '' }}>
                                                {{ $mainshop->name }}
                                            </option>
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
                                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name_uz }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        
                            <!-- Dynamic Input Fields for Products -->
                            <div class="row" id="inputContainer">
                                @foreach($product as $index => $input)
                                  @if(is_object($input))
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="name_{{ $index }}" class="form-label">Name</label>
                                            <input type="text" name="inputs[{{ $index }}][name]" class="form-control" id="name_{{ $index }}" value="{{ $input->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="image_{{ $index }}" class="form-label">Image</label>
                                            <input type="file" name="inputs[{{ $index }}][image]" class="form-control" id="image_{{ $index }}">
                                            <img src="{{ asset('storage/'.$input->image) }}" alt="Existing Image" style="max-height: 100px; margin-top: 10px;">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="valyuta_{{ $index }}" class="form-label">Valyuta</label>
                                            <input type="text" name="inputs[{{ $index }}][valyuta]" class="form-control" id="valyuta_{{ $index }}" value="{{ $input->valyuta }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="price_{{ $index }}" class="form-label">Price</label>
                                            <input type="text" name="inputs[{{ $index }}][price]" class="form-control" id="price_{{ $index }}" value="{{ $input->price }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="count_{{ $index }}" class="form-label">Count</label>
                                            <input type="text" name="inputs[{{ $index }}][count]" class="form-control" id="count_{{ $index }}" value="{{ $input->count }}" required>
                                        </div>
                                    </div>
                                  @endif
                                @endforeach
                            </div>
                        
                            <!-- Add More Button -->
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <button type="button" id="add" class="btn btn-primary" style="margin-top: 30px">Add More</button>
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
    let inputIndex = {{ count($product) }}; // Keep track of the number of inputs already present

    document.getElementById('add').addEventListener('click', function () {
        const inputContainer = document.getElementById('inputContainer');
        
        // Create new input fields
        let newInputFields = 
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="name_${inputIndex}" class="form-label">Name</label>
                    <input type="text" name="inputs[${inputIndex}][name]" class="form-control" id="name_${inputIndex}" placeholder="Name ..." required>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="image_${inputIndex}" class="form-label">Image</label>
                    <input type="file" name="inputs[${inputIndex}][image]" class="form-control" id="image_${inputIndex}" required>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="valyuta_${inputIndex}" class="form-label">Valyuta</label>
                    <input type="text" name="inputs[${inputIndex}][valyuta]" class="form-control" id="valyuta_${inputIndex}" placeholder="Valyuta ..." required>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="price_${inputIndex}" class="form-label">Price</label>
                    <input type="text" name="inputs[${inputIndex}][price]" class="form-control" id="price_${inputIndex}" placeholder="Price ..." required>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="count_${inputIndex}" class="form-label">Count</label>
                    <input type="text" name="inputs[${inputIndex}][count]" class="form-control" id="count_${inputIndex}" placeholder="Count ..." required>
                </div>
            </div>
        ;
        
        // Append the new input fields to the container
        inputContainer.insertAdjacentHTML('beforeend', newInputFields);
        inputIndex++; // Increment the input index
    });
 </script>

@endsection


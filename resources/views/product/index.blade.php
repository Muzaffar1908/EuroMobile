@extends('components.layouts.app')
@section('style')
<!-- DataTables -->
<link href="{{asset('/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

<link href="{{asset('/assets/libs/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{asset('/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Products</h4>
                                <a href="{{ route('p-create') }}" class="btn btn-success btn-sm waves-effect waves-light">Product Add</a>
                            </div><br>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Main Shop Name</th>
                                    <th>Category Name</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Valyuta</th>
                                    <th>Price</th>
                                    <th>Count</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                    @foreach($products as $key => $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->main_shops->name }}</td>
                                            <td>{{ $product->categories->name_uz }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>
                                                @if ($product->image)
                                                    <img src="{{asset('/images/products/' .$product->image)}}" width="50px" alt="Product Image">
                                                @else
                                                    No Image Found
                                                @endif
                                            </td>
                                            <td>{{ $product->valyuta }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->count }}</td>
                                            <td style="width: 100px">
                                                <a href="{{ route('p-edit', $product->id) }}" class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form action="" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-primary btn-sm edit" title="Delete">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
 <!-- Required datatable js -->
 <script src="{{asset('/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
 <script src="{{asset('/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

 <!-- Buttons examples -->
 <script src="{{asset('/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
 <script src="{{asset('/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
 <script src="{{asset('/assets/libs/jszip/jszip.min.js')}}"></script>
 <script src="{{asset('/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
 <script src="{{asset('/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
 <script src="{{asset('/assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
 <script src="{{asset('/assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
 <script src="{{asset('/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>

 <script src="{{asset('/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
 <script src="{{asset('/assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>

 <!-- Responsive examples -->
 <script src="{{asset('/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
 <script src="{{asset('/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

 <!-- Datatable init js -->
 <script src="{{asset('/assets/js/pages/datatables.init.js')}}"></script>

@endsection

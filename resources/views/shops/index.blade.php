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
                            <h4 class="card-title">Shops</h4>
                            <a href="{{ route('sh-create') }}" class="btn btn-success btn-sm waves-effect waves-light">Shop Add</a>
                        </div><br>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>№</th>
                                    <th>MainShop Name</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($shops as $index => $shop)
                                <tr>
                                    <td>{{ $shop->id }}</td>
                                    <td>{{ $shop->main_shops->name }}</td>
                                    <td>{{ $shop->name }}</td>
                                    <td style="width: 100px">
                                        <a href="{{ route('sh-edit', $shop->id) }}" class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
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
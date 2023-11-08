@section('style')
<!-- DataTables -->
{{-- <link href="{{asset('/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

<link href="{{asset('/assets/libs/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" /> --}}

<!-- Responsive datatable examples -->
{{-- <link href="{{asset('/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" /> --}}

@endsection

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

               @include('livewire.shops.modal')

               <div>
                <section class="mt-10">
                    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                        <!-- Start coding here -->
                        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                            <div class="flex items-center justify-between d p-4">
                                <div class="flex">
                                    <div class="relative w-full">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <input  type="text"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                                            placeholder="Search" required="">
                                    </div>
                                </div>
                                <div class="flex space-x-3">
                                    <div class="flex space-x-3 items-center">
                                        <label class="w-40 text-sm font-medium text-gray-900">User Type :</label>
                                        <select 
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                            <option value="">All</option>
                                            <option value="0">User</option>
                                            <option value="1">Admin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-4 py-3">name</th>
                                            <th scope="col" class="px-4 py-3">email</th>
                                            <th scope="col" class="px-4 py-3">Role</th>
                                            <th scope="col" class="px-4 py-3">Joined</th>
                                            <th scope="col" class="px-4 py-3">Last update</th>
                                            <th scope="col" class="px-4 py-3">
                                                <span class="sr-only">Actions</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                name</th>
                                            <td class="px-4 py-3">email</td>
                                            <td class="px-4 py-3 text-green-500">
                                                admin</td>
                                            <td class="px-4 py-3">created_at</td>
                                            <td class="px-4 py-3">updated_at</td>
                                            <td class="px-4 py-3 flex items-center justify-end">
                                                <button class="px-3 py-1 bg-red-500 text-white rounded">X</button>
                                            </td>
                                        </tr>
            
                                    </tbody>
                                </table>
                            </div>
            
                            <div class="py-4 px-3">
                                <div class="flex ">
                                    <div class="flex space-x-4 items-center mb-3">
                                        <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                                        <select
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
               </div>

                {{-- <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Main Shops</h4>
                            <a href="#" class="btn btn-success btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addMainShopModal">Main Shop Add</a>
                        </div><br>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>№</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                                @isset($mainshops)
                                    <tr>
                                        <td>{{ $mainshops->id }}</td>
                                        <td>
                                            @if ($mainshops->user)
                                            {{ $mainshops->user->name }}
                                            @else
                                                No User
                                            @endif
                                        </td>
                                        <td>{{ $mainshops->name }}</td>
                                        <td style="width: 100px">
                                            <a href="#" wire:click="editMainShop({{ $mainshops->id }})" class="btn btn-outline-secondary btn-sm edit" title="Edit" data-bs-toggle="modal" data-bs-target="#updateMainShopModal">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

@section('scripts')
 <!-- Required datatable js -->
 {{-- <script src="{{asset('/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
 <script src="{{asset('/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script> --}}

 <!-- Buttons examples -->
 {{-- <script src="{{asset('/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
 <script src="{{asset('/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
 <script src="{{asset('/assets/libs/jszip/jszip.min.js')}}"></script>
 <script src="{{asset('/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
 <script src="{{asset('/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
 <script src="{{asset('/assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
 <script src="{{asset('/assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
 <script src="{{asset('/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script> --}}

 {{-- <script src="{{asset('/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
 <script src="{{asset('/assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script> --}}

 <!-- Responsive examples -->
 {{-- <script src="{{asset('/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
 <script src="{{asset('/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script> --}}

 <!-- Datatable init js -->
 {{-- <script src="{{asset('/assets/js/pages/datatables.init.js')}}"></script> --}}

@endsection

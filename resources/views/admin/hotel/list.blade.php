@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">List of Hotel</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <a style="float: right; border: 1px solid #cccc; border-radius:5%; padding:5px; margin-bottom:5px"
                        href="{{ route('admin.hotel.create') }}"><i class="fas fa-fw fa-plus"></i> Add New </a>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th style="width:10%">Image</th>
                                {{-- <th>Price</th> --}}
                                <th>Address and Phone</th>
                                <th>Description</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        @foreach ($hotels as $hotel)
                            <tbody>

                                <tr>
                                    <td>{{ $hotel->name }}</td>
                                    <td><img src="{{ asset('images/product/' . $hotel->img) }}" alt="{{ $hotel->name }} "
                                            height="200"></td>
                                    {{-- <td>{{ $hotel->price }}</td> --}}
                                    <td>{{ $hotel->address }}, {{ $hotel->phone }}</td>
                                    <td>{{ $hotel->des }}</td>
                                    <td><a href="{{ route('admin.hotel.detail', $hotel->id) }}"><i class="fas fa-fw fa-eye"></i></a>
                                        <br>
                                        <a href="{{ route('admin.hotel.edit', $hotel->id) }}"><i class="fas fa-fw fa-pen"></i></a>
                                        <br>
                                        <a href="{{ route('admin.hotel.delete',$hotel->id) }}" onclick="return confirm('Are you sure?')"><i class="fas fa-fw fa-trash" style="color:red"></i></a>
                                    </td>
                                </tr>



                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('js')
    <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>
@endsection

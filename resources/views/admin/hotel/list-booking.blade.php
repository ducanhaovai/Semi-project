@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">List of Room</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <a style="float: right; border: 1px solid #cccc; border-radius:5%; padding:5px; margin-bottom:5px" href=""><i class="fas fa-fw fa-plus"></i> Add New </a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th style="width:10%">Image</th>
                            <th>Customer</th>
                            <th>Hotel</th>
                            <th>Check-in date</th>
                            <th>Check-out date</th>
                            
                        </tr>
                    </thead>
                    @foreach($bookings as $booking)
                    <tbody>
                        
                        <tr>
                            <td>{{$booking->id}}</td>

                            <td ><img  src="" alt=" " height="200"></td>
                            <td>{{ $booking->user->name }}</td>
                            <td>{{$booking->hotel->name}}</td>
                            <td>{{ $booking->checkin_date }}</td>
                            <td>{{ $booking->checkout_date }}</td>
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
<script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>
@endsection
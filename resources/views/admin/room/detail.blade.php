@extends('admin.layouts.master')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('room') }}" class="btn btn-default"><i class="fas fa-fw fa-arrow-left"></i></a> Details Room</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="mb-3"> 
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr> 
                            <th style="width:50%">Image</th>
                            <th>Speciality</th>        
                        </tr>
                    </thead>
                    <tbody>
                        <tr>                                     
                            <td ><img src="{{ asset('images/rooms/' . $room->img) }}" alt="{{ $room->name }} "
                                height="200"></td>                               
                            <td>
                                Price: {{ $room->price }},<br>
                                max_occupancy: {{ $room->max_occupancy }},<br>
                                Hotel: {{ $room->hotel->name }},<br>
                                Des: {{ $room->des }}
                            </td>  
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
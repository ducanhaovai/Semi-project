@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Add new hotel</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="sbp-preview">
                <div class="sbp-preview-content">
                    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <strong>Name</strong>
                            <input class="form-control" id="exampleFormControlInput1" placeholder="Room name" name="name" />
                            <strong>Price</strong>
                            <input class="form-control" id="exampleFormControlInput1" placeholder="Price" name="price" />
                            <strong>Images</strong>
                            <input type="file" class="form-control" placeholder="Image" value="" name="img" />
                            <strong>Phone</strong>
                            <input class="form-control" id="exampleFormControlInput1" placeholder="phone" name="phone" />
                            <strong>Description</strong>
                            <input class="form-control" id="exampleFormControlInput1" placeholder="des" name="des" />
                            <strong>Address</strong>
                            <input class="form-control" id="exampleFormControlInput1" placeholder="address" name="address" />

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <h1 class="h3 mb-2 text-gray-800">Thêm mới Phòng</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="sbp-preview">
                <div class="sbp-preview-content">
                    <form action="{{ route('bookings.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            <label for="user_id">Customer:</label>
                            <select name="user_id" id="user_id">
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="hotel_id">Hotel:</label>
                            <select name="hotel_id" id="hotel_id">
                                @foreach($hotels as $hotel)
                                <option value="{{$hotel->id}}">{{$hotel->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="checkin_date">Check-in date:</label>
                            <input type="date" name="checkin_date" id="checkin_date">
                        </div>
                        <div>
                            <label for="checkout_date">Check-out date:</label>
                            <input type="date" name="checkout_date" id="checkout_date">
                        </div>
                        <div>
                            @if ($roomAvailable)
                            <button type="submit">Book Now</button>
                            @else
                            <button disabled>Booked Room</button>
                            @endif
                        </div>
                    </form>

                </div>

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
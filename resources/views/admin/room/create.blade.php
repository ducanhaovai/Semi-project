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
                        <form action="{{ route('hotel.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @include('admin.room.form')

                            <button type="submit" class="btn btn-primary">Submit</button>
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
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="hotel_id">Hotel:</label>
                                <select name="hotel_id" id="hotel_id">
                                    @foreach ($hotels as $hotel)
                                        <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
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
                                {{ session()->get('message') }}
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
    <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>
@endsection

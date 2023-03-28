@extends('layouts.master')

@section('content')
    <div class="hero-wrap js-fullheight" style="background-image: url('{{ asset('images/bg_5.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center"
                data-scrollax-parent="true">
                <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                    <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Booking
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-12 ftco-animate"><h4 class="mb-5">Booking</h4>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <form action="{{ route('bookings.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="fields">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="hidden" name="room_id" value="{{$room->id}}">
                                                <input disabled type="text" class="form-control" name="user_name"
                                                    value="{{ $room->name.' - '.number_format($room->price).' /night - ' . $room->des}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                                                <input disabled type="text" class="form-control" name="user_name"
                                                    value="{{ Auth::user()->name??'' }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" id="checkin_date" name="checkin_date" class="form-control"
                                                    placeholder="Date from">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" id="checkin_date" name="checkout_date" class="form-control"
                                                    placeholder="Date to">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <select class="form-control" name="payment_method">
                                                    <option value="">---- Select method payment ----</option>
                                                    <option value="1">Cash</option>
                                                    <option value="2">Bank transfer</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="submit" value="Book Now" class="btn btn-primary py-3">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->
            </div>
        </div>
    </section> <!-- .section -->
@endsection

@extends('layouts.master')

@section('content')
<div class="hero-wrap js-fullheight" style="background-image: url('{{ asset('images/bg_5.jpg') }}');">


    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="hotel.html">Hotel</a></span> <span>Hotel Single</span></p>
                <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Hotels Details
                </h1>
            </div>
        </div>
    </div>
</div>


<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 sidebar">
                <div class="sidebar-wrap bg-light ftco-animate">
                    <h3 class="heading mb-4">Find City</h3>
                    <form action="#">
                        <div class="fields">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Destination, City">
                            </div>
                            <div class="form-group">
                                <div class="select-wrap one-third">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="" id="" class="form-control" placeholder="Keyword search">
                                        <option value="">Select Location</option>
                                        <option value="">San Francisco USA</option>
                                        <option value="">Berlin Germany</option>
                                        <option value="">Lodon United Kingdom</option>
                                        <option value="">Paris Italy</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" id="checkin_date" class="form-control" placeholder="Date from">
                            </div>
                            <div class="form-group">
                                <input type="text" id="checkin_date" class="form-control" placeholder="Date to">
                            </div>
                            <div class="form-group">
                                <div class="range-slider">
                                    <span>
                                        <input type="number" value="25000" min="0" max="120000" /> -
                                        <input type="number" value="50000" min="0" max="120000" />
                                    </span>
                                    <input value="1000" min="0" max="120000" step="500" type="range" />
                                    <input value="50000" min="0" max="120000" step="500" type="range" />
                                    </svg>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Search" class="btn btn-primary py-3 px-5">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="sidebar-wrap bg-light ftco-animate">
                    <h3 class="heading mb-4">Star Rating</h3>
                    <form method="post" class="star-rating">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">
                                <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></span></p>
                            </label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">
                                <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i></span></p>
                            </label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">
                                <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
                            </label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">
                                <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
                            </label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">
                                <p class="rate"><span><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-12 ftco-animate">
                        <div class="single-slider owl-carousel">
                            <div class="item">
                                <div class="hotel-img"><img class="hotel-img" src="{{ asset('images/product/' . $hotels->img) }}" alt="{{ $hotels->name }} "></div>
                            </div>
                            <div class="item">
                                <div class="hotel-img"><img class="hotel-img" src="{{ asset('images/hotel-3.jpg') }}"></div>




                            </div>
                            <div class="item">
                                <img class="hotel-img" src="{{ asset('images/hotel-4.jpg') }}">
                            </div>
                            <div class="item">
                                <img class="hotel-img" src="{{ asset('images/hotel-5.jpg') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 hotel-single mt-4 mb-5 ftco-animate">
                        <span>Phone:{{ $hotels->phone }}</span>
                        <h2>{{ $hotels->name }}</h2>
                        <p class="rate mb-5">
                            <span class="loc"><a href="#"><i class="icon-map"></i>{{ $hotels->address }}</a></span>
                            <span class="star">
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star-o"></i>
                                8 Rating</span>
                        </p>
                        <p>{{ $hotels->des }}</p>

                    </div>
                    {{-- <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
                            <h4 class="mb-4">Take A Tour</h4>
                            <div class="block-16">
                                <figure>
                                    <img src="{{ asset('images/hotel-6.jpg') }}" alt="Image placeholder"
                    class="img-fluid">
                    <a href="https://vimeo.com/45830194" class="play-button popup-vimeo"><span class="icon-play"></span></a>
                    </figure>
                </div>
            </div> --}}
            <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
                <h4 class="mb-4">Our Rooms</h4>
                <div class="row">
                    @foreach ($hotels->room as $room)
                    <div class="col-md-4">
                        <div class="destination">
                            <a href="hotel-single.html" class="img img-2" style="background-image: url('{{ asset('images/rooms/' . $room->img) }}');"></a>
                            <div class="text p-3">
                                <div class="d-flex">
                                    <div class="one">
                                        <h3><a href="#">{{ $room->name }}</a></h3>
                                        <p class="rate">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star-o"></i>
                                            <span>8 Rating</span>
                                        </p>
                                    </div>
                                    <div class="two">
                                        <span class="price per-price">{{ $room->price }}<br><small>/night</small></span>
                                    </div>
                                </div>
                                <p>{{ $room->des }}</p>
                                <hr>
                                {{-- <p class="bottom-area d-flex">
                                                <span><i class="icon-map-o"></i> Miami, Fl</span>
                                                <span class="ml-auto"><a href="#">Book</a></span>
                                            </p> --}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
                <h4 class="mb-5">Booking</h4>
                <form action="{{ route('bookings.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
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
                    <div class="fields">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select name="room_id" class="form-control">
                                        <option value="">---- Chọn phòng cần book ----</option>
                                        @foreach ($hotels->room as $room1)
                                        <option value="{{ $room1->id }}">{{ $room1->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                    {{-- <input type="hidden" name="hotel_id" value="{{ $hotels->id }}"> --}}
                                    <input disabled type="text" class="form-control" name="user_name" value="{{ Auth::user()->name ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" id="checkin_date" name="checkin_date" class="form-control" placeholder="Date from">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" id="checkin_date" name="checkout_date" class="form-control" placeholder="Date to">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{-- @if ($roomAvailable)
                                    <input type="submit">Book Now</input>
                                @else
                                {{ session()->get('message') }}
                                    <input disabled>Booked Room</input>
                                    @endif --}}
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
                <h4 class="mb-4">Review &amp; Ratings</h4>
                <div class="row">
                    <div class="col-md-6">
                        <form method="post" class="star-rating">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">
                                    <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i> 100
                                            Ratings</span></p>
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">
                                    <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i> 30
                                            Ratings</span></p>
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">
                                    <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i> 5
                                            Ratings</span></p>
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">
                                    <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i> 0
                                            Ratings</span></p>
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">
                                    <p class="rate"><span><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i> 0
                                            Ratings</span></p>
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12 hotel-single ftco-animate mb-5 mt-5">
                <h4 class="mb-4">Related Hotels</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="destination">
                            <a href="hotel-single.html" class="img img-2" style="background-image: url('{{ asset('images/hotel-1.jpg') }}');"></a>
                            <div class="text p-3">
                                <div class="d-flex">
                                    <div class="one">
                                        <h3><a href="hotel-single.html">Hotel, Italy</a></h3>
                                        <p class="rate">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star-o"></i>
                                            <span>8 Rating</span>
                                        </p>
                                    </div>
                                    <div class="two">
                                        <span class="price per-price">$40<br><small>/night</small></span>
                                    </div>
                                </div>
                                <p>Far far away, behind the word mountains, far from the countries</p>
                                <hr>
                                <p class="bottom-area d-flex">
                                    <span><i class="icon-map-o"></i> Miami, Fl</span>
                                    <span class="ml-auto"><a href="#">Book Now</a></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="destination">
                            <a href="hotel-single.html" class="img img-2" style="background-image: url('{{ asset('images/hotel-2.jpg') }}');"></a>
                            <div class="text p-3">
                                <div class="d-flex">
                                    <div class="one">
                                        <h3><a href="hotel-single.html">Hotel, Italy</a></h3>
                                        <p class="rate">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star-o"></i>
                                            <span>8 Rating</span>
                                        </p>
                                    </div>
                                    <div class="two">
                                        <span class="price per-price">$40<br><small>/night</small></span>
                                    </div>
                                </div>
                                <p>Far far away, behind the word mountains, far from the countries</p>
                                <hr>
                                <p class="bottom-area d-flex">
                                    <span><i class="icon-map-o"></i> Miami, Fl</span>
                                    <span class="ml-auto"><a href="#">Book Now</a></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="destination">
                            <a href="hotel-single.html" class="img img-2" style="background-image: url('{{ asset('images/hotel-3.jpg') }}');"></a>
                            <div class="text p-3">
                                <div class="d-flex">
                                    <div class="one">
                                        <h3><a href="hotel-single.html">Hotel, Italy</a></h3>
                                        <p class="rate">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star-o"></i>
                                            <span>8 Rating</span>
                                        </p>
                                    </div>
                                    <div class="two">
                                        <span class="price per-price">$40<br><small>/night</small></span>
                                    </div>
                                </div>
                                <p>Far far away, behind the word mountains, far from the countries</p>
                                <hr>
                                <p class="bottom-area d-flex">
                                    <span><i class="icon-map-o"></i> Miami, Fl</span>
                                    <span class="ml-auto"><a href="#">Book Now</a></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div> <!-- .col-md-8 -->
    </div>
    </div>
</section> <!-- .section -->
@endsection
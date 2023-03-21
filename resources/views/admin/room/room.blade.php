@extends('admin.layouts.master')

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="sbp-preview">
            <div class="sbp-preview-content">
                <form action="{{ route('hotels.save-room', $hotels->id) }}" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <strong>Name</strong>
                        <input class="form-control" id="exampleFormControlInput1" placeholder="Room name" name="name" value="{{ isset($hotel->id)?$room->name:'' }}" />
                        <strong>Price</strong>
                        <input class="form-control" id="exampleFormControlInput1" placeholder="Price" name="price" value="{{ isset($hotel->id)?$room->price:'' }}" />
                        <strong>Images</strong>
                        <input type="file" class="form-control" placeholder="Image" value="" name="img" />
                        <strong>Phone</strong>
                        <input class="form-control" id="exampleFormControlInput1" placeholder="max_occupancy" name="max_occupancy" value="{{ isset($hotel->id)?$room->max_occupancy:'' }}" />
                        <strong>Description</strong>
                        <input class="form-control" id="exampleFormControlInput1" placeholder="des" name="des" value="{{ isset($hotel->id)?$room->des:'' }}" />
                        <strong>Address</strong>
                        <input class="form-control" id="exampleFormControlInput1" placeholder="address" name="address" value="{{ isset($hotel->id)?$room->address:'' }}" />
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
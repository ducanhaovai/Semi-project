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
<div class="mb-3">
    <strong>Name</strong>
    <input class="form-control" id="exampleFormControlInput1" placeholder="Room name" name="name" value="{{ isset($room->id)?$room->name:'' }}" />
    <strong>Price</strong>
    <input class="form-control" id="exampleFormControlInput1" placeholder="Price" name="price" value="{{ isset($room->id)?$room->price:'' }}" />
    <strong>Images</strong>
    <input type="file" class="form-control" placeholder="Image" value="" name="img" />
    <strong>Max occupancy</strong>
    <input class="form-control" id="exampleFormControlInput1" placeholder="max_occupancy" name="max_occupancy"  value="{{ isset($room->id)?$room->max_occupancy:'' }}" />
    <strong>Description</strong>
    <input class="form-control" id="exampleFormControlInput1" placeholder="des" name="des"  value="{{ isset($room->id)?$room->des:'' }}" />
    <strong>Hotel</strong>
    <select name="hotel_id" class="form-control">
        @foreach($hotels as $hotel)
        <option value="{{$hotel->id}}" {{ isset($room->id)?"selected":'' }}>{{$hotel->name}}</option>
        @endforeach
      </select>


</div>

<div class="mb-3">
    <strong>Name</strong>
    <input class="form-control" id="exampleFormControlInput1" placeholder="Room name" name="name" value="{{ isset($hotel->id)?$hotel->name:'' }}" />
    <strong>Price</strong>
    <input class="form-control" id="exampleFormControlInput1" placeholder="Price" name="price" value="{{ isset($hotel->id)?$hotel->price:'' }}" />
    <strong>Images</strong>
    <input type="file" class="form-control" placeholder="Image" value="" name="img" />
    <strong>Phone</strong>
    <input class="form-control" id="exampleFormControlInput1" placeholder="phone" name="phone"  value="{{ isset($hotel->id)?$hotel->phone:'' }}" />
    <strong>Description</strong>
    <input class="form-control" id="exampleFormControlInput1" placeholder="des" name="des"  value="{{ isset($hotel->id)?$hotel->des:'' }}" />
    <strong>Address</strong>
    <input class="form-control" id="exampleFormControlInput1" placeholder="address" name="address"  value="{{ isset($hotel->id)?$hotel->address:'' }}"  />

</div>
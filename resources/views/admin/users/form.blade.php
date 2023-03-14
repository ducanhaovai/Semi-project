
<div class="mb-3">
    <strong>Name</strong>
    <input class="form-control" id="exampleFormControlInput1" placeholder=" name" name="name" value="{{ isset($user->id)?$user->name:'' }}" />
    <strong>Email</strong>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="email" name="email" value="{{ isset($user->id)?$user->email:'' }}" />
    <strong>Phone</strong>
    <input class="form-control" placeholder="phone" name="phone" value="{{ isset($user->id)?$user->phone:'' }}" />
    <strong>Type</strong>
    <input class="form-control" id="" placeholder="type" name="type"  value="{{ isset($user->id)?$user->type:'' }}" />
    <strong>Password</strong>
    <input type="password" class="form-control" id="" placeholder="password" name="password"/>
</div>